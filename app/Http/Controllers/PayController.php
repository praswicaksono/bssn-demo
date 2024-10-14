<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function __invoke(Request $request)
    {
        $json = $request->json();

        $booking = Booking::findOrFail($json->get('booking_id'));

        $payment = new Payment();
        $payment->booking_id = $json->get('booking_id');
        $payment->amount = $json->get('amount');
        $payment->status = 'paid';
        $payment->save();

        $booking->status = 'accepted';
        $booking->save();

        return new JsonResponse();
    }
}
