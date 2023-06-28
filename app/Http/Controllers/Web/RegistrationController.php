<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Whatsapp;
use App\Models\WhatsappOtp;
// use Illuminate\Http\Request;
use App\Services\Watzap;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

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
        $otp = rand(100000, 900000);
        $message = sprintf("%s ini adalah kode otp anda, jangan bagikan kode ini kepada siapapun.\n\npesan ini dikirim melalui layanan IconNet", $otp);
        try {
            $res = (new Watzap)->sendMessage($request->get('phone'), $message);
            WhatsappOtp::create([
                'number' => $request->get('phone'),
                'token' => $otp,
                'active' => 1,
            ]);
            return back()->with('otp_success', 'success');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'telp' => 'required',
            'idcustomer' => 'required',
            'email' => 'required',
            'coordinate' => 'required',
            'product_id' => 'required',
            'nik' => 'required',
            'otp' => 'required',
        ]);

        
    }
}
