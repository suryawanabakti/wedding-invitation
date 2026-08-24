<?php

use App\Models\Comment;
use App\Models\Gallery;
use App\Models\LoveGift;
use App\Models\Quote;
use App\Models\Wedding;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    Wedding::factory()->create([
        'groom_short_name' => 'Surya',
        'bride_short_name' => 'Ade',
        'address' => 'Jl. Contoh No. 1',
    ]);
});

it('renders the invitation with dynamic wedding data', function () {
    Gallery::factory()->count(6)->create();
    Quote::factory()->count(2)->create();
    LoveGift::factory()->transfer()->create();

    $response = $this->get('/');

    $response->assertSuccessful()
        ->assertSee('Surya & Ade')
        ->assertSee('Jl. Contoh No. 1')
        ->assertSee('data-time', false);
});

it('shows visible comments on the invitation', function () {
    Comment::factory()->create(['name' => 'Tamu Undangan', 'body' => 'Selamat menempuh hidup baru']);
    Comment::factory()->create(['is_hidden' => true, 'body' => 'komentar tersembunyi']);

    $this->get('/')
        ->assertSuccessful()
        ->assertSee('Tamu Undangan')
        ->assertDontSee('komentar tersembunyi');
});

it('stores a guest comment via the api', function () {
    $this->postJson(route('ucapan.store'), [
        'name' => 'Rina',
        'presence' => 1,
        'body' => 'Lancar sampai hari H',
    ])->assertCreated()
        ->assertJsonPath('comment.name', 'Rina');

    expect(Comment::query()->where('name', 'Rina')->exists())->toBeTrue();
});

it('rejects an invalid guest comment', function () {
    $this->postJson(route('ucapan.store'), ['name' => 'A'])
        ->assertUnprocessable();
});
