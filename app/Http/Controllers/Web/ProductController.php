<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('status', true)->paginate(10)->mapToGroups(function ($item) {
            return [$item['type_label'] => $item];
        })->all();

        return view('landing.product', compact('products'));
    }
}