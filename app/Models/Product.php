<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'thumbnail',
        'desc',
        'price',
        'status',
        'name',
        'type',
    ];

    protected $casts = [
        'status' => 'boolean'
    ];
}
