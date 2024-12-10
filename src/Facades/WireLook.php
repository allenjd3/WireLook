<?php

namespace Allenjd3\WireLook\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Allenjd3\WireLook\WireLook
 */
class WireLook extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Allenjd3\WireLook\WireLook::class;
    }
}
