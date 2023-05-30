<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->get('type');
        
        $product = Product::filter($request->only(['type']))->get();
        $product->transform(function($item) {
            return [
                'id' => $item->id,
                'thumbnail' => $item->thumbnail,
                'name' => $item->name,
                'price' => sprintf('Rp %s', number_format($item->price, 0, '.', ',')),
                'desc' => $item->desc,
                'meta' => $item->meta,
                'type' => [
                    'code' => $item->type,
                    'label' => $item->type->label()
                ]
            ];
        });

        // return $product;
        return view('landing.product', [
            'product' => $product
        ]);
    }
}
