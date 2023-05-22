<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Coverage\Map;
class AreaController extends Controller
{
    public function index()
    {
        $data =  Province::whereIn('id', [61,62,63,64,65])->with('map', 'area')->get();
        return view('landing.area', compact('data'));
    }
}
