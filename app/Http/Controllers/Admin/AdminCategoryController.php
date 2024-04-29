<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
// use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        // Récupérer toutes les catégories
        $categories = Category::orderBy('updated_at', 'desc')->get();

        // Retourner la vue avec les données des catégories
        return view('admin.categories.index', compact('categories'));
    }

    // public function create(CategoryRequest $request)
    // {
    //     // Valider les données entrées par l'utilisateur
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //     ]);

    //     // Créer une nouvelle catégorie
    //     Category::create([
    //         'name' => $validatedData['name'],
    //         'description' => $validatedData['description'],
    //     ]);

    //     // Rediriger vers la page d'index avec un message de succès
    //     return redirect()->route('admin.dashboard.categories.index')->with('success', 'Category created successfully');
    // }

    // // Méthode pour mettre à jour une catégorie existante
    // public function update(CategoryRequest $request, $id)
    // {
    //     // Valider les données entrées par l'utilisateur
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //     ]);

    //     // Rechercher la catégorie à mettre à jour
    //     $category = Category::findOrFail($id);

    //     // Mettre à jour les champs de la catégorie
    //     $category->name = $validatedData['name'];
    //     $category->description = $validatedData['description'];
    //     $category->save();

    //     // Rediriger vers la page d'index avec un message de succès
    //     return redirect()->route('admin.dashboard.categories.index')->with('success', 'Category updated successfully');
    // }

    public function create()
    {
        return view('admin.categories.create');
    }

    // Méthode pour créer une nouvelle catégorie
    public function store(CategoryRequest $request)
    {
        $validatedData = $request->validated();
        Category::create($validatedData);

        return redirect()->route('admin.dashboard.categories.index')->with('success', 'Category created successfully');
    }

    // Méthode pour afficher le formulaire de modification de catégorie
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    // Méthode pour mettre à jour une catégorie existante
    public function update(CategoryRequest $request, $id)
    {
        $validatedData = $request->validated();
        $category = Category::findOrFail($id);
        $category->update($validatedData);

        return redirect()->route('admin.dashboard.categories.index')->with('success', 'Category updated successfully');
    }

    // Méthode pour supprimer une catégorie
    public function delete($id)
    {
        // Rechercher la catégorie à supprimer
        $category = Category::findOrFail($id);

        // Supprimer la catégorie
        $category->delete();

        // Rediriger vers la page d'index avec un message de succès
        return redirect()->route('admin.dashboard.categories.index')->with('success', 'Category deleted successfully');
    }

    public function getCategoryStatistics()
    {
        $totalCategories = Category::count();


        return [
            'totalCategories' => $totalCategories,
        ];

        // return view('dashboard', [
        //     'categoryStats' => [
        //         'totalCategories' => $totalCategories,
        //     ],
        // ]);
    }

}
