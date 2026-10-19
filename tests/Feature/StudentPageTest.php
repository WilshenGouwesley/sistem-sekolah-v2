<?php

use App\Models\User;

test('student index page loads successfully', function () {
    $user = User::factory()->create([
        'role' => 'student',
    ]);

    $this->actingAs($user)
        ->get('/students')
        ->assertOk();
});
