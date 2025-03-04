<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentSlot extends Model
{
    /** @use HasFactory<\Database\Factories\EquipmentSlotFactory> */
    use HasFactory;

    protected $table = 'equipment_slots';
    protected $fillable = [
        'equipment_id',
        'slot_id',
    ];

    public function slot()
    {
        return $this->belongsTo(Slot::class);
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
};
