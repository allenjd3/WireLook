<?php

it('can show the component', function () {
    $this->get('/wirelook')
        ->assertOk();
});

it('aborts if app is in production', function () {
    $this->app['env'] = 'production';

    $this->get('/wirelook')
        ->assertForbidden();
});

it('shows the component', function () {
    $this->get('wirelook')
        ->assertOk();
        //->dump();
        //->assertSee('Hello');
});
