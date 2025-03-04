<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property date $date
 * @property time $time_start
 * @property time $time_end
 */

class Cycle extends Model
{
    /** @use HasFactory<\Database\Factories\CycleFactory> */
    use HasFactory;

    protected $table = 'cycles';
    protected $fillable = [
        'date',
        'time_start',
        'time_end',
    ];
}
