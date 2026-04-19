<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administrators = Administrator::latest()->paginate(15);
        return view('admin.administrators.index', compact('administrators'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $admins = Administrator::where('name', 'like', "%$search%")
                    ->orWhere('nip', 'like', "%$search%")
                    ->orWhere('keterangan', 'like', "%$search%")
                    ->get();

        return response()->json($admins);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.administrators.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'role'        => 'required|in:pengurus,guru,tendik',
            'keterangan'  => 'required|string|max:255',
            'nip'         => 'nullable|string|max:30|unique:administrators,nip',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active'   => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('administrators', 'public');
        }

        Administrator::create($validated);

        return redirect()->route('admin.administrators.index')
                         ->with('success', 'Data administrator berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrator $administrator)
    {
        return view('admin.administrators.edit', compact('administrator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administrator $administrator)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'role'        => 'required|in:pengurus,guru,tendik',
            'keterangan'  => 'required|string|max:255',
            'nip'         => 'nullable|string|max:30|unique:administrators,nip,' . $administrator->id,
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active'   => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($administrator->image) {
                Storage::disk('public')->delete($administrator->image);
            }
            $validated['image'] = $request->file('image')->store('administrators', 'public');
        }

        $administrator->update($validated);

        return redirect()->route('administrators.index')
                         ->with('success', 'Data administrator berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrator $administrator)
    {
        if ($administrator->image) {
            Storage::disk('public')->delete($administrator->image);
        }

        $administrator->delete();

        return redirect()->route('administrators.index')
                         ->with('success', 'Data administrator berhasil dihapus.');
    }
}