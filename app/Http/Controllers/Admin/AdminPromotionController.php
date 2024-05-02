<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromotionRequest;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Promotion;



class AdminPromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();

        return view('admin.promotions.index', compact('promotions'));
    }

   
    public function create()
    {
        $products = Product::all();

        return view('admin.promotions.create', compact('products'));
    }

    public function store(PromotionRequest $request)
    {
        try {
            $product = Product::findOrFail($request->product_id);
            $initialPrice = $product->price;
            $reducedPrice = $initialPrice - ($initialPrice * ($request->percentage_reduction / 100));
    
            $validatedData = $request->validated();
            $validatedData['reduced_price'] = $reducedPrice;
    
            Promotion::create($validatedData);
    
            return redirect()->route('admin.dashboard.promotions.index')->with('success', 'Promotion created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating promotion: ' . $e->getMessage());
    
            return back()->withInput()->with('error', 'Error creating promotion. Please try again.');
        }
    }
    
    public function show($id)
    {
        $promotion = Promotion::findOrFail($id);
        $product = $promotion->product;

        return view('admin.promotions.show', compact('promotion'));
    }

    
    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);

        return view('admin.promotions.edit', compact('promotion'));
    }

    
    public function update(PromotionRequest $request, $id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->update($request->validated());

        return redirect()->route('admin.dashboard.promotions.index')->with('success', 'Promotion updated successfully.');
    }

   
    public function delete($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();

        return redirect()->route('admin.dashboard.promotions.index')->with('success', 'Promotion deleted successfully.');
    }

        public function getPromotionStatistics()
    {
        $totalPromotions = Promotion::count();

        return [
            'totalPromotions' => $totalPromotions,
        ];
    }
    
}

