<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'booking_time',
        'services_name',
        'note',
        'booking_status'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function hairstylist()
    {
        return $this->belongsTo(Hairstylist::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
