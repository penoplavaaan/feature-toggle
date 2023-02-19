<?php

declare(strict_types=1);

namespace App\FeatureToggle\Interface;

interface FeatureToggle
{
    public function configure(): void;

    public function isEnabled(string $feature): bool;

    public function isDisabled(string $feature): bool;
}
