<?php

namespace App\Providers;

use App\Components\Notification;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    use Notification;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Nhận và truyền các thông báo đến view
         */
        view()->composer('notification', function ($view) {
            $notifcations = self::getNotifications();
            return $view->with('notifications', $notifcations);
        });   
    }
}
