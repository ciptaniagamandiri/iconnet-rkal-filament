<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $table = 'social_media';
    protected $fillable = [
        'name',
        'url',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

}
