<?php

it('Reģistrē jaunu lietotāju', function () {
    $email = 'test'.time().'@example.com';

    $page = visit('/register');

    $page
        ->fill('input[name="firstname"]', 'Arnolds')
        ->fill('input[name="lastname"]', 'Bex')
        ->fill('input[name="email"]', $email)
        ->fill('input[name="password"]', 'password1234')
        ->click('[data-test="register-button"]')
        ->assertSee('Welcome, Arnolds'); // adjust to what your app actually shows
});