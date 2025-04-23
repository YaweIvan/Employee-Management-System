<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'admin_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'admin_name' => 'required|string|max:255',
            'admin_email' => 'required|email|unique:profile,admin_email',
            'admin_phone' => 'nullable|string|max:20',
            'admin_role' => 'nullable|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('admin_image')) {
            $imagePath = $request->file('admin_image')->store('admin_images', 'public');
        }

        Profile::create([
            'admin_image' => $imagePath,
            'admin_name' => $request->admin_name,
            'admin_email' => $request->admin_email,
            'admin_phone' => $request->admin_phone,
            'admin_role' => $request->admin_role,
        ]);

        return back()->with('success', 'Profile saved successfully!');
    }
    public function show()
{
    return view('adminprofile'); // This will load resources/views/admin-profile.blade.php
}

}
