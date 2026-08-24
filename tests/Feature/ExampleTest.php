<?php

use App\Models\Wedding;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('the application returns a successful response', function () {
    Wedding::factory()->create();

    $response = $this->get('/');

    $response->assertStatus(200);
});
