<?php
declare(strict_types=1);

namespace App\Service\Booking;

interface BookingInterface
{
    public function bookEvent(int $eventId): void;

    public function cancelBooking(int $bookingId): void;

    public function acceptBooking(int $bookingId): void;
}
