<?php

declare(strict_types=1);

namespace Penoplavaan\FeatureToggleWrapper\FeatureToggle;

use Penoplavaan\FeatureToggleWrapper\FeatureToggle\Interface\FeatureToggle;
use Unleash\Client\Unleash as UnleashClient;
use Unleash\Client\UnleashBuilder;

class Unleash implements FeatureToggle
{
    private UnleashClient $featureToggleClient;

    public function configure(): void
    {
        $this->featureToggleClient = UnleashBuilder::create()
            ->withAppName(env('UNLEASH_APP_NAME', 'local'))
            ->withAppUrl(env('UNLEASH_URL', 'https://gitlab.kt-team.de/api/v4/feature_flags/unleash/1245'))
            ->withInstanceId(env('UNLEASH_INSTANCEID', 'ygBQmy1Vy6A5zx6MhzsJ'))
            ->withCacheTimeToLive((int) env('UNLEASH_CACHE_TTL', 0))
            ->build();
    }

    public function isEnabled(string $feature): bool
    {
        return $this->featureToggleClient->isEnabled($feature);
    }

    public function isDisabled(string $feature): bool
    {
        return !$this->featureToggleClient->isEnabled($feature);
    }
}
