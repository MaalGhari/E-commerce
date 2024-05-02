<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::paginate(10);
        $categories = Category::all();

        return view('user.products.index', compact('products', 'categories'));
    }

    public function details($id)
    {
        try {
            $product = Product::findOrFail($id);
            // dd($product);

            return view('user.products.details', compact('product'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            // Handle the case where the product is not found
            return redirect()->route('user.products.index')->with('error', 'Product not found!');
        }
    }
    
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $productRates = $product->users()->withPivot('comment')->get();

        return view('user.products.details', compact('product', 'productRates'));
    }

    public function storeComment(StoreCommentRequest $request, $id)
    {
         Rate::create([
             'user_id' => Auth::user()->id,
             'product_id' => $id,
             'comment' => $request->comment
         ]);
 
         return redirect()->back()->with('success', 'your comment added successfully');
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
        return view('user.products.search_results', ['products' => $products]);
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

        return view('user.products.index', compact('products', 'categories'));
    }

    public function cart()
    {
        $cart = session()->get('cart', []);

        return view('user.cart.index', compact('cart'));
    }
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
  
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "product_name" => $product->name,
                "image" => $product->image,
                "price" => $product->price,
                "quantity" => 1
            ];
        }
  
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }
  
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
  
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

}
