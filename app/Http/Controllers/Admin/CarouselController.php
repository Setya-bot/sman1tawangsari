<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::orderBy('order')->paginate(10);
        return view('admin.carousels.index', compact('carousels'));
    }

    public function create()
    {
        $nextOrder = (Carousel::max('order') ?? 0) + 1;
        return view('admin.carousels.create', compact('nextOrder'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'link' => 'nullable|url',
            'order' => 'nullable|integer|unique:carousels,order',
            'is_active' => 'nullable|boolean'
        ]);

        $imagePath = $request->file('image')->store('carousels', 'public');

        Carousel::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'link' => $request->link,
            'order' => $request->order ?? ((Carousel::max('order') ?? 0) + 1),
            'is_active' => $request->input('is_active')
        ]);

        return redirect()->route('carousels.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $carousel = Carousel::findOrFail($id);
        return view('admin.carousels.edit', compact('carousel'));
    }

    public function update(Request $request, $id)
    {
        $carousel = Carousel::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'link' => 'nullable|url',
            'order' => [
                'nullable',
                'integer',
                Rule::unique('carousels', 'order')->ignore($carousel->id)
            ],
            'is_active' => 'nullable|boolean'
        ]);

        if ($request->hasFile('image')) {
            if ($carousel->image) {
                Storage::disk('public')->delete($carousel->image);
            }

            $carousel->image = $request->file('image')->store('carousels', 'public');
        }

        $carousel->update([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'order' => $request->order ?? 0,
            'is_active' => $request->input('is_active')
        ]);

        return redirect()->route('carousels.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $carousel = Carousel::findOrFail($id);

        if ($carousel->image) {
            Storage::disk('public')->delete($carousel->image);
        }

        $carousel->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }

    // 🔍 SEARCH AJAX
    public function search(Request $request)
    {
        $search = $request->search;

        $data = Carousel::where('title', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->orderBy('order')
            ->get();

        return response()->json($data->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'description' => $item->description,
                'image_url' => $item->image_url,
                'link' => $item->link,
                'order' => $item->order,
                'is_active' => $item->is_active
            ];
        }));
    }
}