<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('updated_at', 'desc')->paginate(10);
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
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(ProductRequest $request)
    {
        $validated = $request->validated();

        // Vérifiez s'il y a un fichier d'image dans la demande
        if ($request->hasFile('image')) {
            // Validez et stockez l'image
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assurez-vous que le fichier est une image et respecte les contraintes
            ]);

            // Stockez le fichier dans le dossier public/images
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);

            // Ajoutez le nom de l'image validée aux données validées
            $validated['image'] = $imageName;
        }

        // Créez le produit avec les données validées
        Product::create($validated);

        // Redirigez l'utilisateur vers la page appropriée avec un message de succès
        return redirect()->route('admin.dashboard.admin.products.index')->with('success', 'Product created successfully!');
    }

    
    public function edit($id)
     {
         // Récupérer le produit à éditer
         $product = Product::findOrFail($id);
         $categories = Category::all();
 
         return view('admin.products.edit', compact('product', 'categories'));
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validated();

        $categories = Category::all();

        try {
            // Trouver le produit à mettre à jour
            $product = Product::findOrFail($id);

            // Vérifier si une nouvelle image est téléchargée
            if ($request->hasFile('image')) {
                // Supprimer l'ancienne image si elle existe
                if (file_exists($product->image)) {
                    unlink($product->image);
                }

                // Télécharger la nouvelle image
                $file = $request->file('image');
                $file_extension = $file->getClientOriginalExtension();
                $file_name = time() . '.' . $file_extension;
                $path = 'images/';
                $file->move($path, $file_name);
                $validatedData['image'] = $path . $file_name;
            }

            // Mettre à jour les données du produit
            $product->update($validatedData);

            // Rediriger avec un message de succès
            return redirect()->route('admin.dashboard.admin.products.index')->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            // Gérer les erreurs
            return redirect()->back()->with('error', 'Failed to update product. Please try again.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        // Trouver et supprimer le produit spécifié
        $product = Product::findOrFail($id);

        $product->delete();

        // Rediriger avec un message de succès
        return redirect()->route('admin.dashboard.admin.products.index')->with('success', 'Product deleted successfully!');
    }
    
    public function search(Request $request)
    {
        // Récupérer la requête de recherche de la demande
        $query = $request->input('query');

        // Exécuter la recherche dans la base de données
        $products = Product::where('name', 'like', '%'.$query.'%')
                           ->orWhere('description', 'like', '%'.$query.'%')
                           ->paginate(10);

        // Retourner les résultats à la vue appropriée
        return view('admin.products.search_results', ['products' => $products]);
    }

    

    public function filter(Request $request)
    {
        $query = $request->input('query');
        $categoryId = $request->input('category');

        $products = Product::where('name', 'like', '%' . $query . '%')
            ->when($categoryId, function ($query) use ($categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->paginate(10); 

        $categories = Category::all();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function getProductStatistics()
    {
        $totalProducts = Product::count();

        $productsCreatedThisMonth = Product::whereMonth('created_at', Carbon::now()->month)->count();

        $productsCreatedLastWeek = Product::whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->count();

        $productsUpdatedToday = Product::whereDate('updated_at', Carbon::today())->count();

        $productsDeletedThisMonth = Product::onlyTrashed()->whereMonth('deleted_at', Carbon::now()->month)->count();

        return [
            'totalProducts' => $totalProducts,
            'productsCreatedThisMonth' => $productsCreatedThisMonth,
            'productsCreatedLastWeek' => $productsCreatedLastWeek,
            'productsUpdatedToday' => $productsUpdatedToday,
            'productsDeletedThisMonth' => $productsDeletedThisMonth,
        ];
    }

}
