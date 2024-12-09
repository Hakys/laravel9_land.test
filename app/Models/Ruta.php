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
        'origen', 'destino',
    ];

    static $rules=[
        'distance_text' => 'required',
        'distance_value' => 'required',
        'duration_text' => 'required',
        'duration_value' => 'required',
        'origen' => 'required|exists:direccions,id',
        'destino' => 'required|exists:direccions,id'
    ];

    public function direccion(){ return $this->belongsTo(Direccion::class,'destino'); }
    public function getId(){ return $this->attributes['id']; }
    public function setId($id){ $this->attributes['id'] = $id; }
    public function getDistanceText(){ return $this->attributes['distance_text']; }
    public function getDurationText(){ return $this->attributes['duration_text']; }
    public function getCreatedAt(){ return $this->attributes['created_at']; }
    public function setCreatedAt($createdAt){ $this->attributes['created_at'] = $createdAt; }
    public function getUpdatedAt(){ return $this->attributes['updated_at']; }
    public function setUpdatedAt($updatedAt){ $this->attributes['updated_at'] = $updatedAt; }
}
