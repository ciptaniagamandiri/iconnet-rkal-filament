<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formregistration as Form;
use App\Models\Whatsapp\Otp;
use App\Services\whatsapp;
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

        $otp = Otp::where('otp', request()->otp)->where('status', 0)->first();
        DB::beginTransaction();
        try {
            if ($otp) {
                Form::create([
                    'name' => request()->name,
                    'address' => equest()->address,
                    'telp' => request()->telp,
                    'idcustomer' => request()->idcustomer,
                    'email' => request()->email,
                    'coordinate' => request()->coordinate,
                    'product_id' => request()->product_id,
                    'nik' => request()->nik,
                    'status' => false
                ]);

                (new whatsapp)->group('120363098214634193@g.us', sprintf(
                    "😍 Pesan dari %s,\nTelah mengisi form pemesanan paket internet pada website \n\n🔗 http://iconnet-kalimantan.id/  \n\n🔔 whatsapp: %s \n💌 email: %s \n💬 pesan: %s \n ",
                    request()->name,
                    request()->address,
                    request()->telp,
                    request()->idcustomer,
                    request()->email,
                    request()->coordinate,
                    request()->product_id,
                    request()->nik
                ));
    
                $otp->update(['status' => 1]);
    
                (new whatsapp)->sendMessage(request()->telp, sprintf("Yeay, pemesanan paket internet anda telah kami terima dan akan segera kami proses. terimakasih telah mempercayakan internet anda pada kami. \n\n Salam hangat kami, ICONNET 💌."));
            }
            DB::commit();
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
            Log::error($th->getMessage());
            DB::rollBack();
        }
        return redirect()->back();
    }

    public function otp(Request $request)
    {
        request()->validate(['telp' => 'required']);
    
        $otp = rand(100000, 900000);
        DB::beginTransaction();
        try {
            (new whatsapp)->sendMessage(request()->telp, sprintf("Pesan dari ICONNET, %s ini adalah kode otp anda.\nkode ini bersifat rahasia, masukkan kode ini di website kami http://iconnet-kalimantan.id/", $otp));
            Otp::create(['otp' =>  $otp]);

            DB::commit();
            return response()->json('success');
        } catch (\Throwable $th) {
            throw $th;
            Log::error($th->getMessage());
            DB::rollBack();
            return response()->json('error');
        }
        
    }
}
