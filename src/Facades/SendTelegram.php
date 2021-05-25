<?php

namespace Gavan4eg\SendTelegram\Facades;

use Illuminate\Support\Facades\Facade;

class SendTelegram extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'sendtelegram';
    }
}
