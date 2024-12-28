<?php

namespace Allenjd3\WireLook\Tests\stubs;

use Allenjd3\WireLook\Preview;

class TestPreview extends Preview
{
    public string $componentName = 'wirelook::base-component';

    public function variantDefault(): array
    {
        return ['name' => 'example'];
    }

    public function variantBlue(): array
    {
        return [];
    }

    public function variantRed(): array
    {
        return [];
    }
}
