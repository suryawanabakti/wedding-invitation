<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoveGift;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoveGiftController extends Controller
{
    public function index(): View
    {
        return view('admin.gifts.index', [
            'gifts' => LoveGift::query()->orderBy('sort_order')->orderBy('id')->get(),
            'types' => LoveGift::types(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules());

        if ($request->hasFile('image_file')) {
            $validated['image'] = $request->file('image_file')->store('gifts', 'public');
        }

        LoveGift::query()->create([
            ...collect($validated)->except('image_file')->all(),
            'sort_order' => (int) (LoveGift::query()->max('sort_order') ?? 0) + 1,
        ]);

        return redirect()->route('admin.gifts.index')->with('status', 'Love gift berhasil ditambahkan.');
    }

    public function edit(LoveGift $gift): View
    {
        return view('admin.gifts.edit', [
            'gift' => $gift,
            'types' => LoveGift::types(),
        ]);
    }

    public function update(Request $request, LoveGift $gift): RedirectResponse
    {
        $validated = $request->validate($this->rules());

        if ($request->hasFile('image_file')) {
            $validated['image'] = $request->file('image_file')->store('gifts', 'public');
        }

        $gift->fill(collect($validated)->except('image_file')->all());
        $gift->save();

        return redirect()->route('admin.gifts.index')->with('status', 'Love gift berhasil diperbarui.');
    }

    public function destroy(LoveGift $gift): RedirectResponse
    {
        $gift->delete();

        return redirect()->route('admin.gifts.index')->with('status', 'Love gift berhasil dihapus.');
    }

    /**
     * @return array<string, array<int, string>>
     */
    private function rules(): array
    {
        return [
            'type' => ['required', 'in:transfer,qris,gift'],
            'holder_name' => ['required', 'string', 'max:100'],
            'bank_name' => ['nullable', 'string', 'max:100'],
            'account_number' => ['nullable', 'string', 'max:50'],
            'phone' => ['nullable', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:500'],
            'image_url' => ['nullable', 'url', 'max:500'],
            'image_file' => ['nullable', 'image', 'max:4096'],
        ];
    }
}
