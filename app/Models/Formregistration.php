<?php

namespace App\Models;

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
}
