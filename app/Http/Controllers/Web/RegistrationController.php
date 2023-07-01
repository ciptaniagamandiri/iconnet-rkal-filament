<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\Formregistration;
use App\Models\Product;
use App\Models\WhatsappOtp;
use Illuminate\Http\Request;
use App\Services\Watzap;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function registration(Product $product, Request $request)
    {
        $listProduct = Product::where('status', 1)->get();
        return view('landing.form.registration', [
            'selectedProduct' => $product,
            'listProduct' => $listProduct,
            'params' => [
                'phone' => $request->get('phone')
            ]
        ]);
    }

    public function requestOtp(Request $request)
    {
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
                'phone' => $request->get('phone')
            ];

            if ($res['status'] == '1005') {
                return redirect()->route('product.registration', $params)->with('otp_error', $res['message']);
            } else {
                return redirect()->route('product.registration', $params)->with('otp_success', 'success');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request)
    {

        $whatsappOtp = WhatsappOtp::where('token', $request->otp)->where('number', $request->telp)->first();

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'telp' => 'required|unique:App\Models\Formregistration,telp',
            'idcustomer' => 'required',
            'email' => 'required',
            'coordinate' => 'required',
            'product_id' => 'required',
            'nik' => 'required',
            'status' => 'nullable',
            'otp' => 'required',
            'file' => 'required'
        ]);

        DB::beginTransaction();

        try {
            if ($whatsappOtp) {
                $form = new Formregistration;

                $form->fill([
                    'name' => $request->name,
                    'address' => $request->address,
                    'telp' => $request->telp,
                    'idcustomer' => $request->idcustomer,
                    'email' => $request->email,
                    'coordinate' => json_encode($request->coordinate),
                    'product_id' => $request->product_id,
                    'nik' => $request->nik,
                    'status' => 0,
                ]);

                $form->save();
                $form->notificationSuccess($form);

                $whatsappOtp->update(['active' => 0]);

                $message = sprintf("Yeay, pemesanan paket internet anda telah kami terima dan akan segera kami proses. terimakasih telah mempercayakan internet anda pada kami. \n\n Salam hangat kami, ICONNET 💌.");
                (new Watzap)->sendMessage($request->telp, $message);
                DB::commit();
                return redirect()->back()->with('register_success', "Success");
            } else {
                return redirect()->back()->with('otp_error', 'OTP Tidak sesuai');
            }

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            DB::rollBack();
            return redirect()->back()->withErrors(["message" => "Request Failed " . $th->getMessage()]);

        }
    }
}