<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Coverage\Area;

class AreaController extends Controller
{
    public function index()
    {
        $provinsi = request()->province_id;
        $kota = request()->regency_id;
        $kecamatan = request()->district_id;
        $kelurahan = request()->village_id;

        $filter = compact('provinsi', 'kota', 'kecamatan', 'kelurahan');
        if (($filter)) {
            $areaCoverage = Area::with('province', 'regency', 'district', 'village')
                ->where('province_id', 'LIKE', '%' . $provinsi . '%')
                ->where('regency_id', 'LIKE', '%' . $kota . '%')
                ->where('district_id', 'LIKE', '%' . $kecamatan . '%')
                ->where('village_id', 'LIKE', '%' . $kelurahan . '%')
                ->get()
                ->groupBy(['province.name', 'regency.name', 'district.name', 'village.name']);
        } else {
            $areaCoverage = Area::get()->groupBy(['province.name', 'regency.name', 'district.name', 'village.name']);
        }
        return $areaCoverage;
        return view('landing.area', compact('areaCoverage'));
    }
}