<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationSlot extends Model
{
    /** @use HasFactory<\Database\Factories\ReservationSlotFactory> */
    use HasFactory;

    protected $table = 'reservation_slots';
    protected $fillable = [
        'cycle_id',
        'product_id',
        'equipment_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
};
