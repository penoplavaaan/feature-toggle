<?php

declare(strict_types=1);

namespace Penoplavaan\FeatureToggleWrapper\FeatureToggle;

interface FeatureToggleInterface
{
    public function configure(): void;

    public function isEnabled(string $feature): bool;

    public function isDisabled(string $feature): bool;
}
