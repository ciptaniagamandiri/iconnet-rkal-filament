<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formregistration as Form;
use App\Models\Whatsapp\Otp;
use App\Services\Watzap;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FormregistrationController extends Controller
{
    public function form(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'address' => 'required',
            'telp' => 'required|unique:formregistrations',
            'idcustomer' => 'required|unique:formregistrations',
            'email' => 'required|unique:formregistrations',
            'coordinate' => 'required',
            'product_id' => 'required',
            'nik' => 'required|unique:formregistrations',
            'status' => 'required',
            'otp' => 'required'
        ]);

        $otp = Otp::where('otp', $request->otp)->where('status', 0)->first();
        DB::beginTransaction();
        try {
            if ($otp) {
                Form::create([
                    'name' => $request->name,
                    'address' => $request->address,
                    'telp' => $request->telp,
                    'idcustomer' => $request->idcustomer,
                    'email' => $request->email,
                    'coordinate' => $request->coordinate,
                    'product_id' => $request->product_id,
                    'nik' => $request->nik,
                    'status' => false
                ]);
                $otp->update(['status' => 1]);

                $message = sprintf("Yeay, pemesanan paket internet anda telah kami terima dan akan segera kami proses. terimakasih telah mempercayakan internet anda pada kami. \n\n Salam hangat kami, ICONNET 💌.");
                (new Watzap)->sendMessage($request, $message);
            }
            DB::commit();
            return redirect()->back();
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            DB::rollBack();
        }
    }

    public function otp(Request $request)
    {
        $request->validate([
            'telp' => 'required',
        ]);

        $otp = rand(100000, 900000);
        DB::beginTransaction();
        try {
            $message = sprintf("Pesan dari Iconnet, %s ini adalah kode otp anda.\nkode ini bersifat rahasia, input kode ini di website kami http://iconnet-kalimantan.id/", $otp);
            $sendOTP = (new Watzap)->sendMessage($request, $message);
            Otp::create([
                'otp' => $otp
            ]);
            DB::commit();
            return response()->json(['success', $sendOTP]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json($th->getMessage());
        }
    }
}