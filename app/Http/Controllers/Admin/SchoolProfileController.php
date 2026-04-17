<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolProfileController extends Controller
{
    public function index()
    {
        $profile = SchoolProfile::first();
        return view('admin.school_profile.index', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'school_name' => 'required|max:255',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $profile = SchoolProfile::first();

        if (!$profile) {
            $profile = new SchoolProfile();
        }

        $data = $request->except('logo');

        if ($request->hasFile('logo')) {
            if ($profile->logo) {
                Storage::disk('public')->delete($profile->logo);
            }

            $data['logo'] = $request->file('logo')->store('school', 'public');
        }

        $profile->updateOrCreate(['id' => $profile->id ?? null], $data);

        return redirect()->back()->with('success', 'Profil sekolah berhasil diperbarui');
    }
}