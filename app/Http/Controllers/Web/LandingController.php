<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Models\Blog\Post;
use App\Models\Product;
use App\Models\Testimony;
use Illuminate\Cache\RateLimiting\Limit;

class LandingController extends Controller
{
    public function index()
    {
        $productQuery = Product::where('status', true)
            ->limit(16)
            ->get();

        $products = [];
        $addons = [];

        foreach ($productQuery as $key => $value) {
            if($value->type == 1) {
                $products [] = $value;
            } else if($value->type == 2) {
                $addons [] =  $value;
            }
        }

        return view('landing.index', [
            'products' => $products,
            'addons' => $addons,
        ]);
    }
}
