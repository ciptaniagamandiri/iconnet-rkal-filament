<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Coverage\Area;

class AreaController extends Controller
{
    public function index()
    {
        $areaCoverage = Area::get()->groupBy(['province.name', 'regency.name', 'district.name', 'village.name']);

        return view('landing.area', compact('areaCoverage'));
    }
}