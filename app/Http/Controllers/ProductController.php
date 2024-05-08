<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
    
        $limit = $request->query('limit');
        $products =  Product::where('is_active', true)->with(['images' => function ($q) {
            return $q->where('is_active', true);
        }])->limit($limit)->get();

        return response()->json(['data' => $products],200);
    }
}
