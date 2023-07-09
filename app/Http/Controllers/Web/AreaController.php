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

        $condition = $provinsi && $kota && $kecamatan && $kelurahan;
        $areaCoverage = [];
        if ($condition) {
            $areaCoverage = Area::with('province', 'regency', 'district', 'village')
                ->where('province_id', 'LIKE', '%' . $provinsi . '%')
                ->where('regency_id', 'LIKE', '%' . $kota . '%')
                ->where('district_id', 'LIKE', '%' . $kecamatan . '%')
                ->where('village_id', 'LIKE', '%' . $kelurahan . '%')
                ->get()
                ->groupBy(['province.name', 'regency.name', 'district.name', 'village.name']);
        }

        $areaKalbar = Regency::where('province_id', 61)->with('area')->whereHas('area', function ($q) {
            $q->where('status', 1);
        })->get();
        $areaKalteng = Regency::where('province_id', 62)->with('area')->whereHas('area', function ($q) {
            $q->where('status', 1);
        })->get();
        $areaKalsel = Regency::where('province_id', 63)->with('area')->whereHas('area', function ($q) {
            $q->where('status', 1);
        })->get();
        $areaKaltim = Regency::where('province_id', 64)->with('area')->whereHas('area', function ($q) {
            $q->where('status', 1);
        })->get();
        $areaKaltara = Regency::where('province_id', 65)->with('area')->whereHas('area', function ($q) {
            $q->where('status', 1);
        })->get();



        return view('landing.area', compact('areaKalbar', 'areaKalteng', 'areaKalsel', 'areaKaltim', 'areaKaltara', 'dataProvinsi', 'dataKota', 'dataKecamatan', 'dataKelurahan', 'condition', 'areaCoverage'));
    }

    public function fetchDataKota($id)
    {
        $kota = [];
        if ($id) {
            $kota = Regency::where('province_id', $id)->get();
        }
        return response()->json($kota);
    }

    public function fetchDataKecamatan($id)
    {
        $kecamatan = [];
        if ($id) {
            $kecamatan = District::where('regency_id', $id)->get();
        }
        return response()->json($kecamatan);
    }

    public function fetchDataKelurahan($id)
    {
        $kelurahan = [];
        if ($id) {
            $kelurahan = Village::where('district_id', $id)->get();
        }
        return response()->json($kelurahan);
    }
}