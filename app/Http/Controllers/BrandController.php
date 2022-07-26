<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brands.index');
    }

public function frontEnd()
{
    $brands = Brand::latest()->get();
    return view('brands',['brands' => $brands]);
}

}
