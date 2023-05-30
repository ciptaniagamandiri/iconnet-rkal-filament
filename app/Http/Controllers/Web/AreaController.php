<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Coverage\Map;
use App\Models\Coverage\Area;
class AreaController extends Controller
{
    public function index()
    {
        $provinsi = request()->province_id;
        $kota = request()->regency_id;
        $kecamatan = request()->district_id;
        $kelurahan = request()->village_id;

        $areaCoverage = Area::where('province_id', $provinsi)
            ->where('regency_id', $kota)
            ->where('district_id', $kecamatan)
            ->where('village_id', $kelurahan)
            ->get();
            
        return view('landing.area', compact('areaCoverage'));
    }
}
