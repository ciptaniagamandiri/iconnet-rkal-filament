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

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['type'] ?? null, function ($query, $type) {
            if($query) {
                $query->where(function ($query) use ($type) {
                    $query->where('type', $type)
                        ->where('status', 1);
                });
            }else {
                $query->where('status', 1);
            }
        });
    }
}
