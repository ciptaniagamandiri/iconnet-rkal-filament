<?php

namespace App\Models\Coverage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
class Area extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'areas';

    protected $fillable = [
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
        'name',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function province() 
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function regency() 
    {
        return $this->belongsTo(Regency::class, 'regency_id');
    }

    public function district() 
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function village() 
    {
        return $this->belongsTo(Village::class, 'village_id');
    }
}
