<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExtracurricularController extends Controller
{
    public function index()
    {
        $extras = Extracurricular::latest()->paginate(10);
        return view('admin.extras.index', compact('extras'));
    }

    public function search(Request $request)
    {
        $query = Extracurricular::query();

        if ($request->search) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }

        return response()->json($query->latest()->get());
    }

    public function create()
    {
        return view('admin.extras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('extras', 'public');
        }

        Extracurricular::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return redirect()->route('extras.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $extra = Extracurricular::findOrFail($id);
        return view('admin.extras.edit', compact('extra'));
    }

    public function update(Request $request, $id)
    {
        $extra = Extracurricular::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {

            // hapus gambar lama
            if ($extra->image && Storage::disk('public')->exists($extra->image)) {
                Storage::disk('public')->delete($extra->image);
            }

            $extra->image = $request->file('image')->store('extras', 'public');
        }

        $extra->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $extra->image
        ]);

        return redirect()->route('extras.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Extracurricular $extra)
    {
        $extra->delete();

        return redirect()->route('extras.index')
            ->with('success', 'Data berhasil dihapus');
    }
}