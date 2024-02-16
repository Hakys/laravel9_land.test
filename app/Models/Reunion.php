<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Reunion extends Model
{
    use HasFactory;

    //'fecha''poblacion''provincia''chicas''prepago''n_personas'
    //'p_entrada''t_entradas''direccion_id''estado'

    // 
    protected $casts = [
        
    ];



    public function fechaDia(){
        $f = new Carbon($this->fecha);
        $f->parse();
        return ucwords($f->dayName.", ".$f->day)." de ".ucwords($f->monthName)." de ".$f->year;
        //return date("l, j ",strtotime($this->fecha))." de ".date("F",strtotime($this->fecha));
    }

    public function duracion($horas){
        $f = new Carbon();
        $f->parse($this->fecha);
        return $f->format("H:m")." - ".$f->addHours($horas)->format("H:m");
    }
}
