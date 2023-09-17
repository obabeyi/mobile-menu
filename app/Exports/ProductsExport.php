<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Product::select('name', 'price')->get();
    }

    public function headings(): array
    {
        return [
            'Ürün İsmi',
            'Ürün Fiyatı',
        ];
    }
}
