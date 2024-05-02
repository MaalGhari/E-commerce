<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class UserCartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart;

        return view('user.cart.index', compact('cart'));
    }

    public function addProduct(Request $request)
    {
        // Valider la requête
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Récupérer le produit à ajouter
        $product = Product::findOrFail($request->product_id);

        // Vérifier si le produit est déjà dans le panier
        $cartItem = auth()->user()->cart->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            // Si le produit existe déjà dans le panier, augmenter la quantité
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Sinon, créer un nouvel élément dans le panier
            auth()->user()->cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        }

        // Rediriger l'utilisateur vers la page du panier avec un message de succès
        return redirect()->route('user.cart.index')->with('success', 'Le produit a été ajouté au panier avec succès.');
    }

    public function updateProduct(Request $request, $itemId)
    {
        // Valider la requête
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Trouver l'élément du panier à mettre à jour
        $cartItem = Cart::findOrFail($itemId);

        // Vérifier si l'utilisateur authentifié est le propriétaire de cet élément du panier
        if (auth()->user()->id !== $cartItem->cart->user_id) {
            return redirect()->route('user.cart.index')->with('error', "Vous n'êtes pas autorisé à modifier cet élément du panier.");
        }

        // Mettre à jour la quantité de l'élément du panier
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        // Rediriger l'utilisateur vers la page du panier avec un message de succès
        return redirect()->route('user.cart.index')->with('success', 'Le panier a été mis à jour avec succès.');
    }

    public function removeProduct($itemId)
    {
        $cartItem = Cart::findOrFail($itemId);

        // Vérifier si l'utilisateur authentifié est le propriétaire de cet élément du panier
        if (auth()->user()->id !== $cartItem->cart->user_id) {
            return redirect()->route('user.cart.index')->with('error', "Vous n'êtes pas autorisé à supprimer cet élément du panier.");
        }

        // Supprimer l'élément du panier
        $cartItem->delete();

        // Rediriger l'utilisateur vers la page du panier avec un message de succès
        return redirect()->route('user.cart.index')->with('success', 'Le produit a été supprimé du panier avec succès.');
    }
    
}
