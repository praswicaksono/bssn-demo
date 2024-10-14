<?php

namespace App\Service\Event\Eloquent;

use App\Service\Booking\Eloquent\Booking;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}