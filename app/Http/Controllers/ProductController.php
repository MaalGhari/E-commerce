<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Product;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('products.all', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $productRates = $product->users()->withPivot('comment')->get();

        return view('user.products.details', compact('product', 'productRates'));
    }

    /**
     * Show the form for editing the specified resource.
     */

     public function storeComment(StoreCommentRequest $request, $id)
     {
         Rate::create([
             'user_id' => Auth::user()->id,
             'product_id' => $id,
             'comment' => $request->comment
         ]);
 
         return redirect()->back()->with('success', 'your comment added successfully');
     }

    public function edit(Product $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $products)
    {
        //
    }
}
