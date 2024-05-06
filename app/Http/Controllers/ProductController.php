<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products =  Product::where('is_active', true)->with(['images' => function ($q) {
            return $q->where('is_active', true);
        }])->get();

        return response()->json(['data' => $products],200);
    }
}
