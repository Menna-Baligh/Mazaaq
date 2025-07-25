<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'reservation_date',
        'people_count',
        'special_request',
        'status'
    ];
}
