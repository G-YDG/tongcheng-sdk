<?php

declare(strict_types=1);

namespace Ydg\TCSdk;

use Ydg\FoudationSdk\ServiceContainer;

/**
 * @property ActivityOrder\ActivityOrder $activityOrder
 */
class TC extends ServiceContainer
{
    protected $providers = [
        ActivityOrder\ServiceProvider::class,
    ];
}
