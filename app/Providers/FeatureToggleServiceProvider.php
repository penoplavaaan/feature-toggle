<?php

declare(strict_types=1);

namespace Penoplavaan\FeatureToggleWrapper\Providers;

use Penoplavaan\FeatureToggleWrapper\FeatureToggle\FeatureToggle;
use Illuminate\Support\ServiceProvider;

class FeatureToggleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FeatureToggle::class, function () {
            return new FeatureToggle();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
