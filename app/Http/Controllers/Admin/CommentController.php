<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function index(): View
    {
        return view('admin.comments.index', [
            'comments' => Comment::query()->latest()->paginate(20),
        ]);
    }

    public function toggle(Comment $comment): RedirectResponse
    {
        $comment->is_hidden = ! $comment->is_hidden;
        $comment->save();

        return redirect()->route('admin.comments.index')->with('status', $comment->is_hidden ? 'Komentar disembunyikan.' : 'Komentar ditampilkan kembali.');
    }

    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();

        return redirect()->route('admin.comments.index')->with('status', 'Komentar berhasil dihapus.');
    }
}
