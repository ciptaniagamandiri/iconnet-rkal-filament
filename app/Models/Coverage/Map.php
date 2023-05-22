<?php

namespace App\Models\Coverage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;   

use App\Models\Province;
class Map extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'maps';

    protected $fillable = [
        'title',
        'file',
        'type',
        'status',
        'province_id',
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function province() 
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
