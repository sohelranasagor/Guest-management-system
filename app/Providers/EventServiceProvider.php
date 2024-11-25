<?php

namespace App\Providers;

use Symfony\Component\Mime\Message;
use Illuminate\Support\ServiceProvider;
use App\Listeners\SendMessegeNotification;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    protected $listen = [
        Message::class =>[
            SendEmailVerificationNotification::class,
            
        ],
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
