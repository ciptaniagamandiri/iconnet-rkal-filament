<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Coverage\Area;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;

class AreaController extends Controller
{
    public function index()
    {
        $provinsi = request()->province_id;
        $kota = request()->regency_id;
        $kecamatan = request()->district_id;
        $kelurahan = request()->village_id;

        $dataProvinsi = Province::whereIn('id', [61, 62, 63, 64, 65])->get();
        $dataKota = Regency::where('province_id', $provinsi)->get();
        $dataKecamatan = District::where('regency_id', $kota)->get();
        $dataKelurahan = Village::where('district_id', $kecamatan)->get();

        $areaCoverage = [];
        if ($provinsi) {
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
        // return response()->json($areaCoverage);
        return view('landing.area', compact('areaCoverage', 'dataProvinsi', 'dataKota', 'dataKecamatan', 'dataKelurahan'));
    }

    public function fetchDataKota()
    {
        $provinsi = request()->province_id;
        $kota = [];
        if ($provinsi) {
            $kota = Regency::where('province_id', $provinsi)->get();
        }
        return response()->json($kota);
    }

    public function fetchDataKecamatan()
    {
        $kota = request()->regency_id;
        $kecamatan = [];
        if ($kota) {
            $kecamatan = District::where('regency_id', $kota)->get();
        }
        return response()->json($kecamatan);
    }

    public function fetchDataKelurahan()
    {
        $kecamatan = request()->district_id;
        $kelurahan = [];
        if ($kecamatan) {
            $kelurahan = Village::where('district_id', $kecamatan)->get();
        }
        return response()->json($kelurahan);
    }
}