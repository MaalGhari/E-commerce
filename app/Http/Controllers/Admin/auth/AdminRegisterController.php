<?php

namespace App\Http\Controllers\Admin\auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{
    public function register()
    {
        return view('admin.auth.register');
    }

    // public function store(Request $request)
    // {
    //     $adminKey = "adminKey1";

    //     if ($request->adminKey == $adminKey) {
    //         $request->validate([
    //             "name" => ["required", "string"],
    //             "email" => ["required", "string"],
    //             "admin_key" => ["required", "string"],
    //             "password" => ["required", "string", "confirmed"],
    //             "password_confirmation" => ["required", "string"],
    //         ]);
    //         dd($request->except(['password_confirmation', '_token', 'admin_key']));

    //     } else {
    //         return redirect()->back()->with('errorResponse', 'Something went wrong');
    //     }
    // }

    public function store(Request $request)
    {
        $adminKey = "KeyP@ssw0rd";

        if ($request->admin_key == $adminKey) {
            $request->validate([
                "name" => ["required", "string"],
                "admin_key" => ["required", "string"],
                "email" => ["required", "string", "email"],
                "password" => ["required", "string", "confirmed"],
                "password_confirmation" => ["required", "string"],
            ]);

            // dd($request->except(['password_confirmation', '_token', 'admin_key']));
            $data = $request->except(['password_confirmation', '_token', 'admin_key']);

            $data['password'] = Hash::make($request->password);

            // dd($data);
            Admin::create($data);

            return redirect()->route('admin.dashboard.login');
        } else {
            return redirect()->back()->with('errorResponse', 'Something went wrong');
        }
    }
}
