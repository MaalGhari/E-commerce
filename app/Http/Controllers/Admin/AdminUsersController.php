<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;

class AdminUsersController extends Controller
{ 
    public function listUsers()
    {
        // Récupérer tous les utilisateurs, y compris ceux qui ont été supprimés logiquement
        $users = User::withTrashed()->get();
        
        // Récupérer tous les administrateurs
        $admins = Admin::all();

        return view('admin.list_users', compact('users', 'admins'));
    }

    // Désactive un utilisateur
    public function disableUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); // Soft delete de l'utilisateur

        return redirect()->route('admin.dashboard.users.list')->with('success', 'User disabled successfully');
    }

    // Active un utilisateur
    public function enableUser($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore(); // Restaure l'utilisateur

        return redirect()->route('admin.dashboard.users.list')->with('success', 'User enabled successfully');
    }

    // Désactive un administrateur
    public function disableAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete(); // Soft delete de l'administrateur

        return redirect()->route('admin.dashboard.users.list')->with('success', 'Admin disabled successfully');
    }

    // Active un administrateur
    public function enableAdmin($id)
    {
        $admin = Admin::withTrashed()->findOrFail($id);
        $admin->restore(); // Restaure l'administrateur

        return redirect()->route('admin.dashboard.users.list')->with('success', 'Admin enabled successfully');
    }
}
