<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\LoveGift;
use App\Models\Quote;
use App\Models\Wedding;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'wedding' => Wedding::query()->first(),
            'galleryCount' => Gallery::query()->count(),
            'quoteCount' => Quote::query()->count(),
            'giftCount' => LoveGift::query()->count(),
            'commentCount' => Comment::query()->count(),
        ]);
    }
}
