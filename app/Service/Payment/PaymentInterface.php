<?php
declare(strict_types=1);

namespace App\Service\Payment;

interface PaymentInterface
{
    public function pay(int $bookingId, int $amount);
}
