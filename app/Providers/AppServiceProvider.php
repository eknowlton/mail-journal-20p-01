<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Entry;
use App\Reminder;
use App\Observers\EntryObserver;
use App\Observers\ReminderObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Entry::observe(EntryObserver::class);
        Reminder::observe(ReminderObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
