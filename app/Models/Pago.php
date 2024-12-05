<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Utilities\MiCarbon;

class Pago extends Model
{
    use HasFactory;

    static $rules=[
        'concepto' => 'required',
        'importe' => 'required',
        'fecha' => 'required',
        'metodo' => 'required',
        'contacto_id' => 'required|exists:contactos,id',
        'reunion_id' => 'required|exists:reunions,id',
    ];

    public static function getConceptos(){ return ['entrada','venta','reserva']; }
    public static function getMetodos(){ return ['TPV','Bizum','Efectivo','Contrarrembolso']; }

    public function contacto(){ return $this->belongsTo(Contacto::class); }

    public function reunion(){ return $this->belongsTo(Reunion::class); }

    //public function pagoable(): MorphTo { return $this->morphTo(); }

    public function getId(){ return $this->id; }

    public function getConcepto(){ return $this->attributes['concepto']; }
    public function setConcepto($value){
        if(in_array($value,$self->getConceptos())) $this->attributes['concepto'] = $value; }

    public function getImporte(){ return $this->attributes['importe']; }
    public function setimporte($value){ $this->attributes['importe'] = $value; }

    public function fechaDia(){ return MiCarbon::formatFecha($this->getFecha()); }
    public function fechaDiaTabla(){ return miCarbon::formatFechaTabla($this->getFecha()); }

    public function getFecha(){ return $this->attributes['fecha']; }
    public function setFecha($value){ $this->attributes['fecha'] = $value; }

    public function getMetodo(){ return $this->attributes['metodo']; }
    public function setMetodo($value){
        if(in_array($value,$self->getMetodos())) $this->attributes['metodo'] = $value; }

    public function getCreatedAt(){ return $this->attributes['created_at']; }
    public function setCreatedAt($createdAt){ $this->attributes['created_at'] = $createdAt; }

    public function getUpdatedAt(){ return $this->attributes['updated_at']; }
    public function setUpdatedAt($updatedAt){ $this->attributes['updated_at'] = $updatedAt; }


}
