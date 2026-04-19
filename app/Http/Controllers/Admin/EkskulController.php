<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EkskulController extends Controller
{
    public function index()
    {
        $ekskuls = Ekskul::latest()->paginate(10);
        return view('admin.ekskuls.index', compact('ekskuls'));
    }

    public function search(Request $request)
    {
        $query = Ekskul::query();

        if ($request->search) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }

        return response()->json($query->latest()->get());
    }

    public function create()
    {
        return view('admin.ekskuls.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|max:100',
            'image'     => 'nullable|image|max:2048',
            'pembina'   => 'nullable|max:100',
            'instagram' => 'nullable'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('ekskuls', 'public');
        }

        Ekskul::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name), // Generate slug otomatis
            'description' => $request->description,
            'pembina'     => $request->pembina,
            'instagram'   => $request->instagram,
            'image'       => $imagePath
        ]);

        return redirect()->route('ekskuls.index')
            ->with('success', 'Data ekskul berhasil ditambahkan');
    }

    public function edit($id)
    {
        $ekskul = Ekskul::findOrFail($id);
        return view('admin.ekskuls.edit', compact('ekskul'));
    }

    public function update(Request $request, $id)
    {
        $ekskul = Ekskul::findOrFail($id);

        $request->validate([
            'name'      => 'required|max:100',
            'image'     => 'nullable|image|max:2048',
            'pembina'   => 'nullable|max:100',
            'instagram' => 'nullable'
        ]);

        $imagePath = $ekskul->image; // Gunakan gambar lama secara default

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($ekskul->image && Storage::disk('public')->exists($ekskul->image)) {
                Storage::disk('public')->delete($ekskul->image);
            }
            $imagePath = $request->file('image')->store('ekskuls', 'public');
        }

        $ekskul->update([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name), // Update slug jika nama berubah
            'description' => $request->description,
            'pembina'     => $request->pembina,
            'instagram'   => $request->instagram,
            'image'       => $imagePath
        ]);

        return redirect()->route('ekskuls.index')
            ->with('success', 'Data ekskul berhasil diupdate');
    }

    public function destroy(Ekskul $ekskul)
    {
        // Hapus file gambar dari storage sebelum hapus data
        if ($ekskul->image && Storage::disk('public')->exists($ekskul->image)) {
            Storage::disk('public')->delete($ekskul->image);
        }

        $ekskul->delete();

        return redirect()->route('ekskuls.index')
            ->with('success', 'Data ekskul berhasil dihapus');
    }
}