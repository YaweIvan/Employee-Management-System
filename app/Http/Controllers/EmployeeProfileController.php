<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('partials.profile', compact('user'))->with('section', 'profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'image' => 'nullable|image|max:2048',
            'current_password' => 'nullable|string',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('profile_images', 'public');
            $user->profile_image = 'storage/' . $path;
        }

        if ($request->filled('current_password') && Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->route('employee.profile.basic')->with('success', 'Profile updated successfully!');
    }
}
