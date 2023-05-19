<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimony extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'testimonies';

    protected $fillable = [
        'title',
        'link',
        'desc',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean'
    ];
}
