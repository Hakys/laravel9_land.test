<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Reunion extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha','poblacion','provincia','chicas','prepago','n_personas',
        'p_entrada','t_entradas','direccion_id','estado'
    ];

    public static function getEstados(){ 
        return ['solicitada','reservada','confirmada','realizada','cancelada']; 
    }

    static function formatFecha($fecha){
        $f = new Carbon($fecha);
        $f->parse();
        return ucwords($f->dayName.", ".$f->day)." de ".ucwords($f->monthName)." de ".$f->year;        
        //return date("l, j ",strtotime($this->fecha))." de ".date("F",strtotime($this->fecha));
    }

    public function fechaDia(){
        return $this->formatFecha($this->fecha);
    }

    public function IdfechaDia(){
        return  Str::slug($this->formatFecha($this->fecha));
    }

    public function duracion($horas){
        $f = new Carbon($this->getFecha());
        return $f->format("H:i")." - ".$f->addHours($horas)->format("H:i");
    }

    public function direccion(){
        return $this->belongsTo(Direccion::class);
    }

    public function getEstado(){ return $this->attributes['estado']; }
    
    public function setEstado($value){
        if(in_array($value,$this->estados)) $this->attributes['estado'] = $value; }

    public function getId(){ return $this->attributes['id']; }
    public function setId($id){ $this->attributes['id'] = $id; }
    
    public function getFecha(){ return $this->attributes['fecha']; }
    public function setFecha($value){ $this->attributes['fecha'] = $value; }

    public function getChicas(){ return $this->attributes['chicas']; }
    public function setChicas($value){ $this->attributes['chicas'] = $value; }

    public function getPrepago(){ return $this->attributes['prepago']; }
    public function setPrepago($value){ $this->attributes['prepagp'] = $value; }
    
    public function getN_personas(){ return $this->attributes['n_personas']; }
    public function setN_personas($value){ $this->attributes['n_personas'] = $value; }

    public function getP_entradas(){ return $this->attributes['p_entradas']; }
    public function setP_entradas($value){ $this->attributes['p_entradas'] = $value; }

    public function getT_entradas(){ return $this->attributes['t_entradas']; }
    public function setT_entradas($value){ $this->attributes['t_entradas'] = $value; }

    public function getPoblacion(){ return $this->attributes['poblacion']; }
    public function setPoblacion($poblacion){ $this->attributes['poblacion'] = $poblacion; }

    public function getProvincia(){ return $this->attributes['provincia']; }
    public function setProvincia($provincia){ $this->attributes['provincia'] = $provincia; }

    public function getCreatedAt(){ return $this->attributes['created_at']; }
    public function setCreatedAt($createdAt){ $this->attributes['created_at'] = $createdAt; }

    public function getUpdatedAt(){ return $this->attributes['updated_at']; }
    public function setUpdatedAt($updatedAt){ $this->attributes['updated_at'] = $updatedAt; }


      //'fecha''poblacion''provincia''chicas''prepago''n_personas'
    //'p_entrada''t_entradas''direccion_id''estado'
}
