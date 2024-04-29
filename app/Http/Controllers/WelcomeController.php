<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $products = Product::orderBy('updated_at', 'desc')->paginate(10);
        $categories = Category::all();

        return view('welcome', compact('products', 'categories'));
    }

}
