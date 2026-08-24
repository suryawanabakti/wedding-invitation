<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        return view('admin.galleries.index', [
            'galleries' => Gallery::query()->orderBy('sort_order')->orderBy('id')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'images' => ['required', 'array', 'min:1'],
            'images.*' => ['image', 'max:4096'],
            'caption' => ['nullable', 'string', 'max:255'],
        ]);

        $sortOrder = (int) (Gallery::query()->max('sort_order') ?? 0);

        foreach ($request->file('images') as $image) {
            $sortOrder++;

            Gallery::query()->create([
                'image' => $image->store('galleries', 'public'),
                'caption' => $validated['caption'] ?? null,
                'sort_order' => $sortOrder,
            ]);
        }

        return redirect()->route('admin.galleries.index')->with('status', 'Foto galeri berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery): View
    {
        return view('admin.galleries.edit', [
            'gallery' => $gallery,
        ]);
    }

    public function update(Request $request, Gallery $gallery): RedirectResponse
    {
        $validated = $request->validate([
            'image_file' => ['nullable', 'image', 'max:4096'],
            'caption' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);

        if ($request->hasFile('image_file')) {
            $validated['image'] = $request->file('image_file')->store('galleries', 'public');
        }

        $gallery->fill(collect($validated)->except('image_file')->all());
        $gallery->save();

        return redirect()->route('admin.galleries.index')->with('status', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('status', 'Foto galeri berhasil dihapus.');
    }
}
