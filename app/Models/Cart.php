<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'food_id', 'price', 'quantity'];
    public function food()
    {
        return $this->belongsTo(Food::class);
    }

}
