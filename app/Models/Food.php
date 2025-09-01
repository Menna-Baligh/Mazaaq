<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Food extends Model
{
    protected $table = 'foods';

    protected $fillable = ['name', 'price', 'description', 'image', 'category', 'stock_quantity'];

    protected static function booted()
    {
        static::deleting(function ($food) {
            if ($food->image) {
                Storage::disk('public')->delete($food->image);
            }
        });
    }
}
