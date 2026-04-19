<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'name' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('ekskuls', 'public');
        }

        Ekskul::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return redirect()->route('ekskuls.index')
            ->with('success', 'Data berhasil ditambahkan');
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
            'name' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {

            // hapus gambar lama
            if ($ekskul->image && Storage::disk('public')->exists($ekskul->image)) {
                Storage::disk('public')->delete($ekskul->image);
            }

            $ekskul->image = $request->file('image')->store('ekskuls', 'public');
        }

        $ekskul->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $ekskul->image
        ]);

        return redirect()->route('ekskuls.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Ekskul $ekskul)
    {
        $ekskul->delete();

        return redirect()->route('ekskuls.index')
            ->with('success', 'Data berhasil dihapus');
    }
}