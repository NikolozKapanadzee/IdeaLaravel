<?php

use Illuminate\Support\Facades\Artisan;

beforeEach(function () {
    Artisan::call('migrate:fresh');
});

test('registers a user', function () {
    visit('/register')
        ->fill("name", "John Doe")
        ->fill("email", "john@example.com")
        ->fill("password", "password123!@#")
        ->click("Create Account")
        ->assertPathIs("/");

    $this->assertAuthenticated();
});
