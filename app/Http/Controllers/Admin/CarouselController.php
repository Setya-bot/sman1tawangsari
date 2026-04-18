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
        // Validasi dasar
        $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'link'          => 'nullable|url',
            'order'         => 'nullable|integer|unique:carousels,order',
            'is_active'     => 'nullable|boolean',
            'cropped_image' => 'nullable|string',
        ]);

        $imagePath = null;

        // === LOGIKA GAMBAR ===
        if ($request->filled('cropped_image')) {
            // Proses base64 dari cropper
            $base64 = $request->cropped_image;

            // Hapus prefix base64
            $base64 = preg_replace('/^data:image\/\w+;base64,/', '', $base64);
            $base64 = str_replace(' ', '+', $base64);

            $imageName = 'carousel_' . time() . '.jpg';

            Storage::disk('public')->put(
                'carousels/' . $imageName,
                base64_decode($base64)
            );

            $imagePath = 'carousels/' . $imageName;
        } 
        elseif ($request->hasFile('image')) {
            // Fallback jika user upload manual tanpa crop
            $imagePath = $request->file('image')->store('carousels', 'public');
        } 
        else {
            // Jika tidak ada cropped_image dan tidak ada file image
            return back()
                ->withErrors(['image' => 'Gambar wajib diisi'])
                ->withInput();
        }

        Carousel::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $imagePath,
            'link'        => $request->link,
            'order'       => $request->order ?? ((Carousel::max('order') ?? 0) + 1),
            'is_active'   => $request->boolean('is_active'),
        ]);

        return redirect()->route('carousels.index')
                        ->with('success', 'Carousel berhasil ditambahkan');
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

        if ($request->filled('cropped_image')) {
            if ($carousel->image) {
                Storage::disk('public')->delete($carousel->image);
            }

            $base64 = $request->cropped_image;
            $base64 = preg_replace('/^data:image\/\w+;base64,/', '', $base64);
            $base64 = str_replace(' ', '+', $base64);

            $imageName = 'carousel_' . time() . '.jpg';

            Storage::disk('public')->put('carousels/' . $imageName, base64_decode($base64));
            $carousel->image = 'carousels/' . $imageName;
        }
        elseif ($request->hasFile('image')) {
            if ($carousel->image) Storage::disk('public')->delete($carousel->image);
            $carousel->image = $request->file('image')->store('carousels', 'public');
        }

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
        $query = Carousel::query();

        // Filter berdasarkan Search (Judul atau Deskripsi)
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        // Filter berdasarkan Status
        // Perhatikan: $request->status bisa bernilai "0" (string), jadi gunakan filled() atau manual check
        if ($request->status !== null && $request->status !== '') {
            $query->where('is_active', $request->status);
        }

        $carousels = $query->latest()->get();

        // Pastikan mengembalikan JSON dengan image_url (sesuai kebutuhan JS Anda)
        return response()->json($carousels);
    }
}