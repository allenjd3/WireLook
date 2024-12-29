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
    $response = $this->get('wirelook?component=wirelookbase-component');
    $matches = [];
    preg_match('/wirelook\:\:base\-component/', $response->getContent(), $matches);
    $this->assertCount(1, $matches);
});

it('shows a component that doesn\'t have a variantDefault defined', function () {
    $response = $this->get('wirelook?component=wirelookbase-component');
    $matches = [];
    preg_match('/wirelook\:\:base\-component/', $response->getContent(), $matches);
    $this->assertCount(1, $matches);
});

it('does not show the component if there is no slug', function () {
    $response = $this->get('wirelook');
    $matches = [];
    preg_match('/wirelook\:\:base\-component/', $response->getContent(), $matches);
    $this->assertCount(0, $matches);
});

it('links the previews', function () {
    $this->get('wirelook')
        ->assertSee('wirelookbase-component');
});
