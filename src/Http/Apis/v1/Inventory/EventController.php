<?php

namespace Stevebauman\Maintenance\Http\Apis\v1\Inventory;

use Illuminate\Support\Facades\App;
use Stevebauman\Maintenance\Repositories\Inventory\Repository as InventoryRepository;
use Stevebauman\Maintenance\Http\Apis\v1\EventableController;

class EventController extends EventableController
{
    /**
     * @var array
     */
    protected $routes = [
        'show' => 'maintenance.inventory.events.show',
    ];

    /**
     * @return InventoryRepository
     */
    protected function getEventableRepository()
    {
        return App::make(InventoryRepository::class);
    }

    /**
     * @return string
     */
    protected function getEventableCalendarId()
    {
        return config('maintenance.site.calendars.inventories');
    }
}
