<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Models\Blog\Post;
use App\Models\Product;
use App\Models\Testimony;

class LandingController extends Controller
{
    public function index()
    {
        $carousels = Carousel::where('status', true)->paginate(10);
        $posts = Post::where('is_published', true)->paginate(10);
        $products = Product::where('status', true)->paginate(10)->mapToGroups(function ($item) {
            return [$item['type_label'] => $item];
        })->all();
        $testimonies = Testimony::where('status', true)->paginate(10);

        return view('landing.index', compact('carousels', 'posts', 'products', 'testimonies'));
    }
}