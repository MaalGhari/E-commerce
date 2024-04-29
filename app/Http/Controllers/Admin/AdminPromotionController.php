<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromotionRequest;
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
        return view('admin.promotions.create');
    }

    
    public function store(PromotionRequest $request)
    {
        Promotion::create($request->validated());

        return redirect()->route('admin.dashboard.promotions.index')->with('success', 'Promotion created successfully.');
    }

    
    public function show($id)
    {
        $promotion = Promotion::findOrFail($id);

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

