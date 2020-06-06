<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ProfileService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ProfileService';
    }
}