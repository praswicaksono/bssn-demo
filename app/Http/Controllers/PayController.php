<?php

namespace App\Http\Controllers;

use App\Service\Payment\PaymentInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function __construct(private readonly PaymentInterface $payment)
    {

    }
    public function __invoke(Request $request)
    {
        $json = $request->json();

        $this->payment->pay((int) $json->get('booking_id'), (int) $json->get('amount'));

        return new JsonResponse();
    }
}
