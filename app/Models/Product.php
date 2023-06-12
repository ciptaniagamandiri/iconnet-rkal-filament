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
        'meta',
        'name',
        'type',
    ];

    protected $casts = [
        'status' => 'boolean',
        'meta' => 'json'
    ];

    public function getTypeLabelAttribute()
    {
        $type = '-';

        if ($this->type == 1) {
            $type = 'Paket Internet';
        } else {
            $type = 'Add On';
        }

        return $type;
    }
}