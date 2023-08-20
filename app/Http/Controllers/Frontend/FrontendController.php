<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function index()
    {
        return view('frontend.home');
        // dd("geldi");
    }
    public function categories()
    {
        return view('frontend.body.category');
        // dd("geldi");
    }
}
