<?php

it('visits homepage', function () {
    $page = visit('/welcome');
    $page->assertSee('Welcome!');
});