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
        // $carousels = Carousel::where('status', true)->paginate(10);
        // $posts = Post::where('is_published', true)->paginate(10);
        $products = Product::where('status', true)
            ->where('type', 1)
            ->paginate(10);
        // $testimonies = Testimony::where('status', true)->paginate(10);

        // $data = compact('carousels', 'posts', 'products', 'testimonies');
        return view('landing.index', [
            'products' => $products
        ]);
    }
}
