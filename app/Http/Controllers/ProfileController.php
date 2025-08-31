<?php

namespace App\Http\Controllers;

use App\Models\Ngo;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function Profile(){
          $ngo = Ngo::first();
        return view('ngo.profile.profile', compact('ngo'));
    }
    public function StoreProfile(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'phone'     => 'nullable|string|max:20',
            'email'     => 'nullable|email|max:255',
            'address'   => 'nullable|string',
            'logo'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'website'   => 'nullable|url|max:255',
        ]);

        if (Ngo::count() > 0) {
            return redirect()->back()->with('error', 'NGO profile already exists. You can only update it.');
        }

        $data = $request->except('logo');

        if ($request->hasFile('logo')) {
            $filename = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('images/'), $filename);
            $data['logo'] = 'images/' . $filename;
        }

        Ngo::create($data);

        return redirect()->route('profile')->with('success', 'NGO profile created successfully.');
    }

    // Edit form
    public function edit()
    {
        $ngo = Ngo::firstOrFail();
        return view('admin.ngo.edit', compact('ngo'));
    }

    // Update profile
    public function UpdateProfile(Request $request, $id)
    {
        $ngo = Ngo::findOrFail($id);

        $request->validate([
            'title'     => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'phone'     => 'nullable|string|max:20',
            'email'     => 'nullable|email|max:255',
            'address'   => 'nullable|string',
            'logo'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'website'   => 'nullable|url|max:255',
        ]);

        $data = $request->except('logo');

        if ($request->hasFile('logo')) {
            $filename = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('images/'), $filename);
            $data['logo'] = 'images/' . $filename;
        }

        $ngo->update($data);

        return redirect()->route('ngo.index')->with('success', 'NGO profile updated successfully.');
    }

    public function ChangePassword()
    {
        return view('ngo.profile.change-password');
    }

    public function UpdatePass(Request $request)
    {
        $validated = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed'
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'The old password is incorrect. ']);
        }

        $user->password = Hash::make($request->new_password);
        return back()->with('success', 'Password changed successfully. ');
    }
}
