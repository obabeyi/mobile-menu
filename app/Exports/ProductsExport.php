<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class ProductsExport implements FromCollection, WithHeadings, WithCustomCsvSettings
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
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';',       // Noktalı virgül kullanarak sütunları ayırma
            'enclosure' => '"',
            'line_ending' => "\r\n",
            'use_bom' => true,        // UTF-8 BOM kullanarak karakter kodlama sorunlarını önleme
        ];
    }
}
