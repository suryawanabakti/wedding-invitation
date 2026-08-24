<?php

use App\Models\Comment;
use App\Models\Gallery;
use App\Models\LoveGift;
use App\Models\Quote;
use App\Models\Wedding;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Testing\File;

use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

beforeEach(function () {
    Wedding::factory()->create();
});

it('shows the admin dashboard without authentication', function () {
    get(route('admin.dashboard'))->assertSuccessful()->assertSee('Dashboard');
});

it('smoke tests all admin pages', function () {
    Gallery::factory()->create();
    LoveGift::factory()->transfer()->create();
    Quote::factory()->create();
    Comment::factory()->create();

    get(route('admin.settings.edit'))->assertSuccessful();
    get(route('admin.galleries.index'))->assertSuccessful();
    get(route('admin.gifts.index'))->assertSuccessful();
    get(route('admin.quotes.index'))->assertSuccessful();
    get(route('admin.comments.index'))->assertSuccessful();

    get(route('admin.galleries.edit', Gallery::first()))->assertSuccessful();
    get(route('admin.gifts.edit', LoveGift::first()))->assertSuccessful();
    get(route('admin.quotes.edit', Quote::first()))->assertSuccessful();
});

it('creates a gallery with images', function () {
    post(route('admin.galleries.store'), [
        'caption' => 'Foto 1',
        'images' => [File::image('photo.jpg')],
    ])->assertRedirect(route('admin.galleries.index'));

    expect(Gallery::query()->count())->toBe(1)
        ->and(Gallery::query()->first()->caption)->toBe('Foto 1');
});

it('toggles a comment visibility', function () {
    $comment = Comment::factory()->create(['is_hidden' => false]);

    patch(route('admin.comments.toggle', $comment))->assertRedirect();

    expect($comment->refresh()->is_hidden)->toBeTrue();

    delete(route('admin.comments.destroy', $comment))->assertRedirect();

    expect(Comment::query()->count())->toBe(0);
});
