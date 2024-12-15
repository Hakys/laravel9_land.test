<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        'updated_at',
    ];

    public function getPedido(){
        $created_at = Carbon::parse($this->created_at);
        return "00".$created_at->format('imsd');
    }

    public function getUpdatedAt(){ return $this->attributes['updated_at']; }
    public function setUpdatedAt($updatedAt){ $this->attributes['updated_at'] = $updatedAt; }
}
