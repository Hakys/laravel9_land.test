<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tpv extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'concepto',
        'card_number',
        'card_holder',
        'expiration_date',
        'cvv',
        'amount',
        'pagado',
    ];
}
