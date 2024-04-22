<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::paginate(10);
        $categories = Category::all();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function details($id)
    {
        try {
            // Retrieve the product with the specified ID
            $product = Product::findOrFail($id);
            
            // Debugging: Dump the retrieved product
            // dd($product);

            // Return the view with the product details
            return view('admin.products.details', compact('product'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            // Handle the case where the product is not found
            return redirect()->route('admin.dashboard.home')->with('error', 'Product not found!');
        }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        // Valider et enregistrer les données du formulaire pour créer un nouveau produit
        Product::create($request->validated());

        // Rediriger avec un message de succès
        return redirect()->route('admin.dashboard.home')->with('success', 'Product created successfully!');
    }

    public function edit($id)
     {
         // Récupérer le produit à éditer
         $product = Product::findOrFail($id);
 
         // Afficher le formulaire d'édition avec les données du produit
         return view('admin.products.edit', compact('product'));
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $id)
    {
        // Valider et mettre à jour les données du formulaire pour le produit spécifié
        $product = Product::findOrFail($id);
        $product->update($request->validated());

        // Rediriger avec un message de succès
        return redirect()->route('admin.dashboard.home')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Trouver et supprimer le produit spécifié
        $product = Product::findOrFail($id);
        $product->delete();

        // Rediriger avec un message de succès
        return redirect()->route('admin.dashboard.home')->with('success', 'Product deleted successfully!');
    }
}
