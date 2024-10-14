<?php
declare(strict_types=1);

namespace App\Service\Payment\Eloquent;

use App\Service\Booking\BookingInterface;
use App\Service\Payment\PaymentInterface;

final class EloquentPaymentService implements PaymentInterface
{
    public function __construct(private readonly BookingInterface $booking)
    {

    }
    public function pay(int $bookingId, int $amount)
    {
        $payment = new Payment();
        $payment->booking_id = $bookingId;
        $payment->amount = $amount;
        $payment->status = 'paid';
        $payment->save();

        $this->booking->acceptBooking($bookingId);
    }
}
