<?php

declare(strict_types=1);

namespace Ydg\TCSdk\ActivityOrder;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     */
    public function register(Container $pimple)
    {
        $pimple['activityOrder'] = function ($pimple) {
            return new ActivityOrder(isset($pimple['config']) ? $pimple['config']->toArray() : []);
        };
    }
}
