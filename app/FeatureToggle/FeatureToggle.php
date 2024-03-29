<?php

declare(strict_types=1);

namespace Penoplavaan\FeatureToggleWrapper\FeatureToggle;

class FeatureToggle
{
    private FeatureToggleInterface $featureToggleClient;

    public function __construct()
    {
        $readyToUseFeatureToggle = env('FEATURE_TOGGLE_SUPPORT', false);

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

        if ($readyToUseFeatureToggle) {
            $this->featureToggleClient->configure();
        }
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
