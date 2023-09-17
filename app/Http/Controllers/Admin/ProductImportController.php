<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ProductImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductImportController extends Controller
{
    public function show()
    {

        return view('admin.products.productsImport');
    }

    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required|mimes:xlsx',
        ]);

        // Excel::import(new ProductImport, $request->file('import_file'));

        // return back()->with('success', 'Ürünler başarıyla içeri aktarıldı.');

        $import = new ProductImport();
        Excel::import($import, $request->file('import_file'));

        if ($import->getUpdateCount() > 0) {
            session()->flash('success', $import->getUpdateCount() . ' ürün başarıyla güncellendi.');
        } else {
            session()->flash('info', 'Hiçbir ürün güncellenmedi.');
        }

        return redirect()->back();
    }
}
