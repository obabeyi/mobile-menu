<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;

class ProductExportController extends Controller
{
    //
    public function export()
    {
        return Excel::download(new ProductsExport, 'ürünler.xlsx');
    }
}
