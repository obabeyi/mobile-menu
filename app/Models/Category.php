<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Category extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'categories';

    protected $appends = [
        'photo',
    ];

    public static $searchable = [
        'name',
        'parent',
        'order',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'Active'  => 'Aktif',
        'Passive' => 'Pasif',
    ];

    protected $fillable = [
        'name',
        'parent',
        'status',
        'order',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function categoryProducts()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }
    protected static function boot()
    {
        parent::boot();
        Category::creating(function ($model) {
            $maxOrder = Category::max('order') ?? 0;
            $model->order = $maxOrder + 1;
            // $model->order = Category::max('order') + 1;
            Category::updated(function ($category) {
                // Burada $category, güncellenen kategori modelini temsil eder
                $changedCategoryId = $category->id;
                $newOrder = $category->order;

                // Eğer tüm kategorilerin order değeri null'sa
                if (Category::whereNotNull('order')->count() == 0) {
                    $allCategories = Category::orderBy('id', 'asc')->get();
                    $currentOrder = 1; // Sıralamayı 1'den başlatıyoruz
                    foreach ($allCategories as $cat) {
                        $cat->order = $currentOrder++;
                        $cat->save();
                    }
                } else {
                    $categoriesToUpdate = Category::where('order', '>=', $newOrder)
                        ->where('id', '!=', $changedCategoryId) // güncellenen kategoriyi hariç tutuyoruz
                        ->orderBy('order', 'asc')
                        ->get();

                    $currentOrder = $newOrder + 1; // Güncellenen kategori için sırayı koruyoruz, diğerlerini 1 artırıyoruz
                    foreach ($categoriesToUpdate as $cat) {
                        $cat->order = $currentOrder++;
                        $cat->save();
                    }
                }
            });
        });
    }
}
