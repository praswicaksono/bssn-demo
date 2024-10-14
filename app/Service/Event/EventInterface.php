<?php
declare(strict_types=1);

namespace App\Service\Event;

interface EventInterface
{
    public function isQuotaFull(int $eventId): bool;

    public function increaseQuota(int $eventId): void;

    public function decreaseQuota(int $eventId): void;
}
