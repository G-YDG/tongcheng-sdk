<?php

declare(strict_types=1);

namespace Ydg\TCSdk;

use Ydg\FoudationSdk\ServiceContainer;

/**
 * @property Ticket\Ticket $ticket
 * @property Trip\Trip $trip
 * @property Hotel\Hotel $hotel
 * @property HotelActivity\HotelActivity $hotelActivity
 * @property ExternalActivityOrder\ExternalActivityOrder $externalActivityOrder
 */
class TC extends ServiceContainer
{
    protected $providers = [
        Ticket\ServiceProvider::class,
        Trip\ServiceProvider::class,
        Hotel\ServiceProvider::class,
        HotelActivity\ServiceProvider::class,
        ExternalActivityOrder\ServiceProvider::class,
    ];
}
