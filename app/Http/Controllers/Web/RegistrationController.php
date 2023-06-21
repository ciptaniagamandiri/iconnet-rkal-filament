<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\Watzap;
use Illuminate\Support\Facades\Redirect;

class RegistrationController extends Controller
{
    public function registration(Product $product) {
        $listProduct = Product::where('status', 1)->get();
        return view('landing.form.registration', [
            'selectedProduct' => $product,
            'listProduct' => $listProduct
        ]);
    }

    public function requestOtp(Request $request) {
        try {
            $res = (new Watzap)->sendMessage($request->get('phone'), 'testine pesan');
            return $res;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
