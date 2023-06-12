<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formregistration as form;
use Illuminate\Support\Facades\Log;

class FormregistrationController extends Controller
{
    public function form(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'telp' => 'required|unique:formregistrations',
            'idcustomer' => 'required|unique:formregistrations',
            'email' => 'required|unique:formregistrations',
            'coordinate' => 'required',
            'product_id' => 'required',
            'nik' => 'required|unique:formregistrations',
            'status' => 'required',
        ]);

        try {
            $form = new form;
            $form->name = $request->name;
            $form->address = $request->address;
            $form->telp = $request->telp;
            $form->idcustomer = $request->idcustomer;
            $form->email = $request->email;
            $form->coordinate = $request->coordinate;
            $form->product_id = $request->product_id;
            $form->nik = $request->nik;
            $form->status = false;
            $form->save();

            return redirect()->back();
            // return response()->json(['status' => 'success', 'data' => $form], 200);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->back()->withErrors(["message" => "Request Failed " . $th->getMessage()]);
            // return response()->json(['status' => 'failed', "message" => $th->getMessage()], 500);
        }
    }
}
