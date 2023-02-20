<?php

declare(strict_types=1);

namespace Penoplavaan\FeatureToggle;

use Penoplavaan\FeatureToggle\Interface\FeatureToggle as FeatureToggleInterface;

class FeatureToggle
{
    private FeatureToggleInterface $featureToggleClient;

    public function __construct()
    {
        /**
         * Place where concrete realization
         * of feature toggle service is being chosen.
         *
         * atm Gitlab is using Unleash, so
         * we use Unleash :)
         */

        /** @var Unleash $featureToggleClient */
        $featureToggleClient = app(Unleash::class);

        $this->featureToggleClient = $featureToggleClient;
        $this->featureToggleClient->configure();
    }

    public function isEnabled(string $feature): bool
    {
        return $this->featureToggleClient->isEnabled($feature);
    }

    public function isDisabled(string $feature): bool
    {
        return $this->featureToggleClient->isDisabled($feature);
    }
}
