<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contacto extends Model
{
    use HasFactory;

    static $rules=[
        'apodo' => 'required|unique:contactos',
        'telefono' => 'required|unique:contactos',
    ];

    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the user primary key (id)
     * $this->attributes['apodo'] - string - contains the facturable name
     * $this->attributes['telefono'] - string - contains the facturable telephone
     * $this->attributes['created_at'] - timestamp - contains the user creation date
     * $this->attributes['updated_at'] - timestamp - contains the user update date
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id', 'apodo', 'telefono' ];

    public static function getDatalist(){
        return DB::table('contactos as c')
        ->selectRaw('c.id')
        ->selectRaw('CONCAT(c.apodo," (",c.telefono,")") AS apodo')
        ->get();
    }

    public function direccions(){
        return $this->hasMany(Direccion::class);
    }

    public function getFullApodoAttribute(){
        return "{$this->apodo} {$this->telefono}";
    }

    public function getId(){ return $this->attributes['id']; }
    public function setId($id){ $this->attributes['id'] = $id; }

    public function getApodo(){ return strtoupper($this->attributes['apodo']); }
    public function setApodo($apodo){ $this->attributes['apodo'] = $apodo; }
    
    public function getTelefono()
    {
        return $this->attributes['telefono'];
    }
    public function setTelefono($telefono)
    {
        $this->attributes['telefono'] = $telefono;
    }
    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }
    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }
    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }
    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }
}
