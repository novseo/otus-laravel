<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{
    /** @use HasFactory<\Database\Factories\OrderTypeFactory> */
    use HasFactory;

    protected $table = 'order_types';
    protected $fillable = [
        'name',
    ];
};
