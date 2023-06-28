<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Formregistration;
use App\Models\Product;
use App\Models\Whatsapp;
use App\Models\WhatsappOtp;
use Illuminate\Http\Request;
use App\Services\Watzap;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Stevebauman\Location\Facades\Location;

class RegistrationController extends Controller
{
    public function registration(Product $product, Request $request) {
        $listProduct = Product::where('status', 1)->get();
        return view('landing.form.registration', [
            'selectedProduct' => $product,
            'listProduct' => $listProduct,
            'params' => [
                'phone' => $request->get('phone')
            ]
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
            
            $params = [
                'product' => $request->get('id'),
                'phone' =>  $request->get('phone')
            ];

            if($res['status'] == '1005'){
                return redirect()->route('product.registration', $params)->with('otp_error', $res['message']);
            } else {
                return redirect()->route('product.registration', $params)->with('otp_success', 'success');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request) {
        return $request->all();
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'telp' => 'required',
            'idcustomer' => 'required',
            'email' => 'required',
            'coordinate' => 'nullable',
            'product_id' => 'required',
            'nik' => 'required',
            'status' => 'nullable',
            'otp' => 'required'
        ]);

        // DB::beginTransaction();

        // try {
        //     $form = new Formregistration;

        //     $form->fill([
        //         'name'       => $request->name,
        //         'address'    => $request->address,
        //         'telp'       => $request->telp,
        //         'idcustomer' => $request->idcustomer,
        //         'email'      => $request->email,
        //         'coordinate' => "coor",
        //         'product_id' => $request->product_id,
        //         'nik'        => $request->nik,
        //         'status'     => 0,
        //     ]);

        //     $form->save();
        //     DB::commit();
        //     return redirect()->back()->with('otp_success', 'success');
        // } catch (\Throwable $th) {
        //     throw $th;
        //     DB::rollBack();
        // }
    }
}
