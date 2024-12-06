<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    protected $fillable = [
        'distance_text','distance_value',
        'duration_text','duration_value',
        'origen' => 'required|exists:direccions,id',
        'destino' => 'required|exists:direccions,id',
    ];
}
