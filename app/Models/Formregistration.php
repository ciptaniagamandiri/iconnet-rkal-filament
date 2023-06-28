<?php

namespace App\Models;

use App\Services\Watzap;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formregistration extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'telp',
        'idcustomer',
        'email',
        'coordinate',
        'product_id',
        'nik',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function notificationSuccess($form) {
        $message = sprintf("
            Form Pendaftaran ICONNET
            \n\nNama Lengkap : %s 
            \nAlamat lengkap : %s
            \nNo. HP : %s
            \nNo. ID Pelanggan PLN : %s
            \nEmail : %s
            \nKoordinat : %s
            \nPaket  : %s
            \nNIK KTP : %s
        ", $form['name'],
            $form['address'],
            $form['telp'],
            $form['idcustomer'],
            $form['email'],
            $form['coordinate'],
            Product::where('id',$form['product_id'])->first()->name,
            $form['nik']
        );

        if(env('WAT_STATUS') == true ){
            $wa = new Watzap;
            // $message = 
            $status = $wa->sendMessageGroup(env("WAT_GROUP_ID"), $message);
            // send notification to customer 
            if($status['status'] == '200'){
                $wa->sendMessage($form['telp'], "Terima kasih telah mengisi formulir pendafataran, mohon menunggu informasi lebih lanjut dari sales kami");
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
}
