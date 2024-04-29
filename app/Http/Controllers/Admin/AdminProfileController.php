<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminProfileController extends Controller
{
    public function editProfile()
    {
        return view('admin.profile.edit')->with('user', auth()->user());
    } 

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        session()->flash('success', 'Profile updated successfully.');

        return redirect()->back();
    }

    // public function deleteProfile()
    // {
    //     $user = auth()->user();
    //     $user->delete();

    //     if (!auth()->check()) {
    //         auth()->logout();
    //         return redirect()->route('admin.dashboard.login')->with('message', 'Your profile has been deleted. Please login again or goodbye!');
    //     }

    //     return redirect()->route('admin.dashboard.home')->with('success', 'Your profile has been deleted.');
    // }

    public function getUserStatistics()
    {
        $totalUsers = User::count(); 

        return [
            'totalUsers' => $totalUsers,
        ];
    }

}
