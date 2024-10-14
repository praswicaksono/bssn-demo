<?php
declare(strict_types=1);

namespace App\Service\Booking\Eloquent;

use App\Service\Booking\BookingInterface;
use App\Service\Event\EventInterface;

final class EloquentBookingService implements BookingInterface
{
    public function __construct(public readonly EventInterface $event)
    {

    }

    public function acceptBooking(int $bookingId): void
    {
        $booking = Booking::findOrFail($bookingId);
        $booking->status = 'accepted';
        $booking->save();
    }

    public function bookEvent(int $eventId): void
    {
        if ($this->event->isQuotaFull($eventId)) {
            throw new \Exception("Event quota full");
        }

        $booking = new Booking();
        $booking->event_id = $eventId;
        $booking->save();

        $this->event->decreaseQuota($eventId);
    }

    public function cancelBooking(int $bookingId): void
    {
        $booking = Booking::findOrFail($bookingId);
        $booking->status = 'rejected';
        $booking->save();
    }
}
