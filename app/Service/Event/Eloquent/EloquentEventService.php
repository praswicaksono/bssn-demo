<?php
declare(strict_types=1);

namespace App\Service\Event\Eloquent;

use App\Service\Event\EventInterface;

final class EloquentEventService implements EventInterface
{
    public function decreaseQuota(int $eventId): void
    {
        $event = Event::findOrFail($eventId);
        $event->quota--;
        $event->save();
    }

    public function increaseQuota(int $eventId): void
    {
        $event = Event::findOrFail($eventId);
        $event->quota++;
        $event->save();
    }

    public function isQuotaFull(int $eventId): bool
    {
        $event = Event::findOrFail($eventId);

        return $event->quota <= 0;

    }
}
