<?php

declare(strict_types=1);

namespace Penoplavaan\FeatureToggle;

use Illuminate\Support\Facades\Facade;

class FeatureToggleFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return FeatureToggle::class;
    }
}
