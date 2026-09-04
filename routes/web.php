<?php

use App\Http\Controllers\Admin\AlumniController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\LoveGiftController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\InvitationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InvitationController::class, 'index'])->name('home');
Route::post('/ucapan', [InvitationController::class, 'storeComment'])->name('ucapan.store');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

    Route::resource('galleries', GalleryController::class)->except(['show', 'create']);
    Route::resource('gifts', LoveGiftController::class)->except(['show', 'create']);
    Route::resource('quotes', QuoteController::class)->except(['show', 'create']);

    Route::resource('alumni', AlumniController::class)->except(['show', 'create']);
    Route::get('alumni/{alumni}/share', [AlumniController::class, 'shareWhatsApp'])->name('alumni.share');
    Route::get('alumni-share-all', [AlumniController::class, 'shareAllWhatsApp'])->name('alumni.share-all');

    Route::get('comments', [CommentController::class, 'index'])->name('comments.index');
    Route::patch('comments/{comment}/toggle', [CommentController::class, 'toggle'])->name('comments.toggle');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});
