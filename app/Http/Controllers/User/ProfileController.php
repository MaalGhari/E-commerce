<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile');
    }

    public function editProfile()
    {
        return view('user.profile.edit')->with('user', auth()->user());
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

    // public function deleteProfile(DeleteProfileRequest $request)
    // {
    //     if (!Hash::check($request->password, auth()->user()->password)) {
    //         return redirect()->back()->with('error', 'Incorrect password. Please try again.');
    //     }

    //     try {
    //         $user = auth()->user();
    //         $user->delete();

    //         auth()->logout();

    //         return redirect()->route('login')->with('message', 'Your profile has been deleted. Please login again or goodbye!');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'An error occurred while deleting your profile.');
    //     }
    // }

}
