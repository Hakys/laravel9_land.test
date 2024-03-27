<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Evento extends Model
{
    use HasFactory;

    static $rules=[
        'title'=>'required',
        'start'=>'required',
        'end'=>'required',
        //'duration' => 'required',
    ];

    protected $fillable = ['title','start','end'];//,'duration'];
    
    public function eventoable(){ return $this->morphTo(); }

    public function getId(){ return $this->id; } 

    public function setTitle($title){
        $this->attributes['title'] = $title; } 
    
    public function setStart($fecha,$hora){
        $this->attributes['start'] = Carbon::parse($fecha." ".$hora)->format('Y-m-d H:i:s');
    }

    public function setEnd($fecha,$hora){ 
        if($hora=="23:30") $duration = 29; else $duration = 120;
        $this->attributes['end'] = Carbon::parse($fecha." ".$hora)
            ->addMinutes($duration)->format('Y-m-d H:i:s');
    }

    //public function setDuration($duration){ $this->attributes['duration'] = $duration; }

}
