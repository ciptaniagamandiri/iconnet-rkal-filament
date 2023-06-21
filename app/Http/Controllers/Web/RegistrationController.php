<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function registration(Product $product) {
        // return $product;
        $listProduct = Product::where('status', 1)->get();
        return view('landing.form.registration', [
            'selectedProduct' => $product,
            'listProduct' => $listProduct
        ]);
    }
}
