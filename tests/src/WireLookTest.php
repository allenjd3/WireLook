<?php

use Allenjd3\WireLook\Tests\stubs\TestPreview;
use Allenjd3\WireLook\WireLook;

it('can load previews', function () {
    $wireLook = new WireLook;
    $previews = $wireLook->loadPreviews();
    expect($previews[0])->toBeInstanceOf(TestPreview::class);
});