<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whatsapp extends Model
{
    use HasFactory;

    protected $table = 'whatsapps';
    protected $fillable = [
        'label',
        'credential',
        'type',
        'receive_message',
    ];

    protected $casts = [
        'receive_message' => 'boolean'
    ];
}
