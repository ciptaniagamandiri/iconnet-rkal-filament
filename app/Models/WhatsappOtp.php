<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatsappOtp extends Model
{
    use HasFactory;

    protected $table = 'whatsapp_otp';
    protected $fillable = [
        'number',
        'token',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean'
    ];
}
