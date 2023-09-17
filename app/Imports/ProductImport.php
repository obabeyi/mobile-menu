<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow

{
    protected $updateCount = 0;

    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {

        // İsmi ile ürünü bul
        $existingProduct = Product::where('name', $row['urun_ismi'])->first();

        // Eğer bu isimde bir ürün varsa fiyatını güncelle
        if ($existingProduct) {
            $existingProduct->price = $row['urun_fiyati'];
            $existingProduct->save();
            $this->updateCount++;
            return $existingProduct;
        }
        // // Eğer bu isimde bir ürün yoksa yeni ürünü oluştur
        // else {
        //     return new Product([
        //         'name' => $row['urun_ismi'],
        //         'price' => $row['urun_fiyati']
        //     ]);
        // }
    }
    public function getUpdateCount()
    {
        return $this->updateCount;
    }
}
