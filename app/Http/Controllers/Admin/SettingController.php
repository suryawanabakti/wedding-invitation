<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wedding;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(): View
    {
        return view('admin.settings.edit', [
            'wedding' => Wedding::query()->firstOrFail(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $wedding = Wedding::query()->firstOrFail();

        $validated = $request->validate([
            'groom_short_name' => ['required', 'string', 'max:50'],
            'groom_full_name' => ['required', 'string', 'max:100'],
            'groom_title' => ['required', 'string', 'max:50'],
            'groom_father' => ['required', 'string', 'max:100'],
            'groom_mother' => ['required', 'string', 'max:100'],
            'bride_short_name' => ['required', 'string', 'max:50'],
            'bride_full_name' => ['required', 'string', 'max:100'],
            'bride_title' => ['required', 'string', 'max:50'],
            'bride_father' => ['required', 'string', 'max:100'],
            'bride_mother' => ['required', 'string', 'max:100'],
            'wedding_at' => ['required', 'date'],
            'akad_time' => ['required', 'string', 'max:100'],
            'resepsi_time' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:500'],
            'maps_url' => ['nullable', 'url', 'max:500'],
            'cover_photo_file' => ['nullable', 'image', 'max:4096'],
            'background_image_file' => ['nullable', 'image', 'max:4096'],
            'groom_photo_file' => ['nullable', 'image', 'max:4096'],
            'bride_photo_file' => ['nullable', 'image', 'max:4096'],
        ]);

        foreach (['cover_photo', 'background_image', 'groom_photo', 'bride_photo'] as $field) {
            if ($request->hasFile($field.'_file')) {
                $validated[$field] = $request->file($field.'_file')->store('weddings', 'public');
            }
        }

        $wedding->fill(collect($validated)->except(['cover_photo_file', 'background_image_file', 'groom_photo_file', 'bride_photo_file'])->all());
        $wedding->save();

        return redirect()->route('admin.settings.edit')->with('status', 'Pengaturan berhasil disimpan.');
    }
}
