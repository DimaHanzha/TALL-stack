<?php

namespace App\Providers;

use App\Livewire\Services\EmailNotification;
use App\Livewire\Services\Interfaces\Notification;
use App\Livewire\Services\Interfaces\Subscriber as SubscriberInterface;
use App\Livewire\Services\Subscriber as SubscriberService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Notification::class, EmailNotification::class);
        $this->app->bind(SubscriberInterface::class, SubscriberService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
