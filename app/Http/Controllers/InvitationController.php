<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Gallery;
use App\Models\LoveGift;
use App\Models\Quote;
use App\Models\Wedding;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InvitationController extends Controller
{
    public function index(): View
    {
        $wedding = Wedding::query()->firstOrFail();
        $galleries = Gallery::query()->orderBy('sort_order')->orderBy('id')->get();
        $quotes = Quote::query()->orderBy('sort_order')->orderBy('id')->get();
        $gifts = LoveGift::query()->orderBy('sort_order')->orderBy('id')->get()->groupBy('type');
        $comments = Comment::query()->where('is_hidden', false)->latest()->limit(20)->get();

        return view('welcome', [
            'wedding' => $wedding,
            'galleries' => $galleries,
            'galleryChunks' => $galleries->chunk(6),
            'quotes' => $quotes,
            'transferGifts' => $gifts->get(LoveGift::TYPE_TRANSFER, collect()),
            'qrisGifts' => $gifts->get(LoveGift::TYPE_QRIS, collect()),
            'otherGifts' => $gifts->get(LoveGift::TYPE_GIFT, collect()),
            'comments' => $comments,
        ]);
    }

    public function storeComment(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'presence' => ['nullable', 'in:0,1,2'],
            'body' => ['required', 'string', 'min:1', 'max:1000'],
        ]);

        $comment = Comment::query()->create([
            'name' => $validated['name'],
            'presence' => (int) ($validated['presence'] ?? Comment::PRESENCE_UNCONFIRMED),
            'body' => $validated['body'],
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'comment' => [
                    'initial' => mb_strtoupper(mb_substr($comment->name, 0, 1)),
                    'name' => $comment->name,
                    'time' => 'Baru saja',
                    'presence' => $comment->presenceLabel(),
                    'body' => $comment->body,
                ],
            ], 201);
        }

        return back()->with('status', 'Ucapan dan doa berhasil dikirim. Terima kasih!');
    }
}
