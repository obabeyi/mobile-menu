<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Str;



class FrontendController extends Controller
{
    //

    public function DBTrans()
    {


        ini_set('max_execution_time', 0);

        // Eski kategorileri çek
        $oldCategories = DB::table('kategori')->get();

        // Yeni kategorileri ekleyelim
        DB::beginTransaction();
        try {
            foreach ($oldCategories as $oldCategory) {
                Category::insert([
                    "id" => $oldCategory->kategori_id,
                    "name" => $oldCategory->kategori_ad,
                    "parent" => 0,
                    "status" => $oldCategory->kategori_durum,
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e; // Hata oluştuğunda hatayı görmek için
        }

        // Eski ürünleri çek
        $oldProducts = DB::table('urunler')->get();

        $savedCount = 0;
        $unsavedCount = 0;

        DB::beginTransaction();
        try {
            foreach ($oldProducts as $oldProduct) {

                $kategoriExists = Category::where('id', $oldProduct->kategori_id)->first();

                // eğer kategori yoksa category_id'yi null yap
                $kategoriIdForUrun = $kategoriExists ? $oldProduct->kategori_id : null;
                echo "Old Product Category ID: " . $oldProduct->kategori_id . "<br>";

                $testCategory = Category::where('id', $oldProduct->kategori_id)->first();
                if ($testCategory) {
                    echo "Category exists with ID: " . $testCategory->id . "<br>";
                } else {
                    echo "Category does NOT exist with ID: " . $oldProduct->kategori_id . "<br>";
                }
                $product = new Product([
                    "id" => $oldProduct->urun_id,
                    "name" => $oldProduct->urun_ad,
                    "description" => $oldProduct->urun_detay,
                    "category_id" => $kategoriExists ? $oldProduct->kategori_id : null,
                    "slug" => Str::slug($oldProduct->urun_ad),
                    "price" => $oldProduct->fiyat,
                    "prepare_time" => $oldProduct->sure,
                    "status" => $oldProduct->urun_durum,
                    "product_code" => "NULL",
                    "barcode" => "NULL",
                ]);
                $product->save();
                $extension = pathinfo($oldProduct->urunfoto_resimyol, PATHINFO_EXTENSION);
                $mime_type = '';

                if (
                    $extension == 'jpg' ||
                    $extension == 'jpeg'
                ) {
                    $mime_type = 'image/jpeg';
                } else if ($extension == 'png') {
                    $mime_type = 'image/png';
                }
                $uuid = Str::uuid()->toString();
                if ($oldProduct->urunfoto_resimyol) {

                    $mediaEntry = Media::create([
                        "model_type" => "App\Models\Product",
                        "model_id" => $product->id,
                        "uuid" => $uuid,
                        "collection_name" => "image",
                        "name" => pathinfo($oldProduct->urunfoto_resimyol, PATHINFO_FILENAME),
                        "file_name" => $oldProduct->urunfoto_resimyol,
                        "mime_type" => $mime_type,
                        "disk" => "public",
                        "conversions_disk" => "public",
                        "size" => 1000,
                        "manipulations" => [],
                        "custom_properties" => [],
                        "generated_conversions" => ["thumb" => true, "preview" => true],
                        "responsive_images" => [],
                    ]);
                }

                $oldPath = $oldProduct->urunfoto_resimyol;
                // model_id'ye dayalı olarak yeni bir yol oluşturuyoruz.
                $newPath =  basename($oldPath);
                $newStoragePath = $product->id . "/" . basename($oldPath);
                // Veritabanını güncelle
                DB::table('media')->where('id', $mediaEntry->id)->update(['file_name' => $newPath]);
                // Öncelikle, $oldPath'in null veya boş olup olmadığını kontrol edelim.
                if ($oldPath) {
                    // Hedef klasörün mevcut olup olmadığını kontrol edelim. Eğer yoksa, oluşturalım.
                    $directoryPath = $product->id;
                    if (!Storage::disk('public')->exists($directoryPath)) {
                        Storage::disk('public')->makeDirectory($directoryPath);
                    }
                    // Şimdi dosyayı taşıyalım.
                    if (Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->move($oldPath, $newStoragePath);
                    } else {
                        echo "Kaynak dosya ($oldPath) bulunamadı!";
                    }
                } else {
                    echo "OldPath değeri boş!";
                }




                $savedCount++;
            }
            DB::commit();
        } catch (\Exception $e) {
            $unsavedCount = count($oldProducts) - $savedCount;
            DB::rollBack();
            throw $e; // Hata oluştuğunda hatayı görmek için
        }

        // if ($unsavedcount > 0) {
        //     DB::rollBack();
        // } else {
        //     DB::commit();
        // }
        // return $this->OldDBkoseyazisi();
    }

    public function index()
    {
        $campaigns = Campaign::with('media')->latest('id')->take('3')->get();
        // dd($campaigns);
        $category = Category::with('media')->orderBy('order', 'asc')->get();
        $categoryMenu = Category::with('media')->take(4)->orderBy('order', 'asc')->get();
        $products = Product::with('category')->get();
        $comments = Comment::latest()->take(5)->get();

        return view('frontend.home', compact('campaigns', 'category', 'products', 'comments', 'categoryMenu'));
        // dd("geldi");
    }

    public function categories()
    {
        $product = Product::with('category', 'category.media')->get();
        $category = Category::with('media')->get();
        return view('frontend.body.category', compact('category'));
        // dd("geldi");
    }
    public function categoryDetail($slug, $id)
    {
        if (isset($id)) {
            $products = Product::with('category', 'media')->where('category_id', $id)->get();
        } else {
            $products = [];
        }
        $settings = Setting::all();

        // dd($products);
        return view('frontend.body.category_details', compact('products', 'settings'));
        // dd("geldi");
    }
    public function productDetail($slug, $id)
    {

        $products = Product::with('category', 'media')->where('id', $id)->get();
        // dd($products);
        $comments = Comment::latest()->get();
        $settings = Setting::all();
        return view('frontend.body.product_details', compact('products', 'comments', 'settings'));
        // dd("geldi");
    }
}
