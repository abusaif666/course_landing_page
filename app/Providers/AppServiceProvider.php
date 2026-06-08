<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use App\Models\User;
use App\Models\WebsiteSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }


    public function boot(): void
{
    Paginator::useBootstrap();

    if (app()->runningInConsole()) {
        return;
    }

    try {

        if (
            Schema::hasTable('website_settings') &&
            Schema::hasTable('general_settings')
        ) {
            View::share('websiteSetting', WebsiteSetting::first());
            View::share('generalSetting', GeneralSetting::first());
        }

    } catch (\Throwable $e) {
        //
    }

    Gate::define('user-update', function (User $user, $id) {
        return $user->id === (int) $id;
    });
}
}
