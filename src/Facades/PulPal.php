<?php

namespace Kubpro\PulPal\Facades;

use Illuminate\Support\Facades\Facade;

/**
 *
 */
class PulPal extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'pulpal';
    }
}
