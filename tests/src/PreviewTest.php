<?php

use Allenjd3\WireLook\Tests\stubs\TestPreview;

it('can load all the variants', function () {
    $preview = new TestPreview;

    $this->assertEquals([
        'default',
        'blue',
        'red',
    ], $preview->getVariants());
});

it('can get the params', function () {
    $preview = new TestPreview;

    $this->assertEquals(['name' => 'example'], $preview->getParams('default'));
});
