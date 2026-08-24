<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuoteController extends Controller
{
    public function index(): View
    {
        return view('admin.quotes.index', [
            'quotes' => Quote::query()->orderBy('sort_order')->orderBy('id')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'body' => ['required', 'string', 'max:1000'],
            'source' => ['required', 'string', 'max:100'],
        ]);

        Quote::query()->create([
            ...$validated,
            'sort_order' => (int) (Quote::query()->max('sort_order') ?? 0) + 1,
        ]);

        return redirect()->route('admin.quotes.index')->with('status', 'Quote berhasil ditambahkan.');
    }

    public function edit(Quote $quote): View
    {
        return view('admin.quotes.edit', [
            'quote' => $quote,
        ]);
    }

    public function update(Request $request, Quote $quote): RedirectResponse
    {
        $validated = $request->validate([
            'body' => ['required', 'string', 'max:1000'],
            'source' => ['required', 'string', 'max:100'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);

        $quote->fill($validated);
        $quote->save();

        return redirect()->route('admin.quotes.index')->with('status', 'Quote berhasil diperbarui.');
    }

    public function destroy(Quote $quote): RedirectResponse
    {
        $quote->delete();

        return redirect()->route('admin.quotes.index')->with('status', 'Quote berhasil dihapus.');
    }
}
