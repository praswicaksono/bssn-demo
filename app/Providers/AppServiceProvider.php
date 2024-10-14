<?php

namespace App\Providers;

use App\Service\Booking\BookingInterface;
use App\Service\Booking\Eloquent\EloquentBookingService;
use App\Service\Event\Eloquent\EloquentEventService;
use App\Service\Event\EventInterface;
use App\Service\Payment\Eloquent\EloquentPaymentService;
use App\Service\Payment\PaymentInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BookingInterface::class, function ($app) {
           return new EloquentBookingService(
               $this->app->make(EventInterface::class),
           );
        });

        $this->app->bind(EventInterface::class, function ($app) {
            return new EloquentEventService();
        });

        $this->app->bind(PaymentInterface::class, function ($app) {
           return new EloquentPaymentService(
               $this->app->make(BookingInterface::class),
           );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
