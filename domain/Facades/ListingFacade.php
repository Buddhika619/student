<?php

namespace domain\Facades;

use domain\Services\ListingService;
use Illuminate\Support\Facades\Facade;

class ListingFacade extends Facade{
    protected static function getFacadeAccessor()
    {
        return ListingService::class;
    }
}
