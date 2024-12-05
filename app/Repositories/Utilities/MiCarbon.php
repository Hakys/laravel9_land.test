<?php

namespace App\Repositories\Utilities;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class MiCarbon {
    public function __construct(){

    }

    static function formatFecha($fecha){
        $f = new Carbon($fecha);
        $f->parse();
        return ucwords($f->dayName.", ".$f->day)." de ".ucwords($f->monthName);//." de ".$f->year;
        //return date("l, j ",strtotime($this->fecha))." de ".date("F",strtotime($this->fecha));
    }

    static function formatFechaTabla($fecha){
        $f = new Carbon($fecha);
        $f->parse();
        return ucwords($f->shortDayName.", ".$f->day)."/".ucwords($f->shortMonthName);//." de ".$f->year;
        //return ucwords($f->dayName.", ".$f->day)."/".ucwords($f->shortMonthName);//." de ".$f->year;
        //return date("l, j ",strtotime($this->fecha))." de ".date("F",strtotime($this->fecha));
    }
}
