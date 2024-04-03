<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;

class Evento extends Model
{
    use HasFactory;

    static $rules=[
        'title' => 'required',
        'start' => 'required',
        'end' => 'required',
        'fecha' => 'required',
        'hora' => 'required',
    ];

    protected $fillable = ['title','start','end'];//,'duration'];
    
    public function eventoable(): MorphTo { return $this->morphTo(); }

    public function getId(){ return $this->id; } 

    public function setTitle($title){
        $this->attributes['title'] = $title; } 
    
    public function setStart($fecha,$hora){
        $this->attributes['start'] = Carbon::parse($fecha." ".$hora)->format('Y-m-d H:i:s');
    }

    public function setEnd($fecha,$hora,$duration){ 
        $f = Carbon::parse($fecha." ".$hora);
        $f->addHours(explode(":",$duration)[0]);
        $f->addMinutes(explode(":",$duration)[1]);
        if($fecha!=$f->format("Y-m-d")) 
            $f = Carbon::parse($fecha." 23:59:59");
        $this->attributes['end'] = $f->format('Y-m-d H:i:s');
    }

    //public function setDuration($duration){ $this->attributes['duration'] = $duration; }

}
