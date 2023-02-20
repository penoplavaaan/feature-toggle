<?php

declare(strict_types=1);

namespace Penoplavaan\FeatureToggleWrapper\FeatureToggle;

use Penoplavaan\FeatureToggleWrapper\FeatureToggle\Interface\FeatureToggleInterface;
use Unleash\Client\Unleash as UnleashClient;
use Unleash\Client\UnleashBuilder;

class Unleash implements FeatureToggleInterface
{
    public function __construct()
    {
    }

    private UnleashClient $featureToggleClient;

    public function configure(): void
    {
        $this->featureToggleClient = UnleashBuilder::create()
            ->withAppName(env('UNLEASH_APP_NAME', 'local'))
            ->withAppUrl(env('UNLEASH_URL'))
            ->withInstanceId(env('UNLEASH_INSTANCEID'))
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
