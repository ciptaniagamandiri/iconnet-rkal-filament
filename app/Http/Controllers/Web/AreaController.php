<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        return view('landing.area');
    }
}
