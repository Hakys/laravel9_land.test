<?php

namespace App\Models;

use App\Repositories\Distance\Distancematrix;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    static $rules = [
        'contacto_id' => 'required|exists:contactos,id',
        'full_name' => 'required',
        'telefono' => 'required',                
        'ladireccion' => 'required',                
        'poblacion' => 'required',                
    ]; 

    /**
     * USER ATTRIBUTES
     * full_name telefono email nif direccion cp poblacion provincia pais
     * $this->attributes['id'] - int - contains the user primary key (id)
     * $this->attributes['full_name'] - string - contains the facturable name or 'Recoge'
     * $this->attributes['telefono'] - string - contains the facturable telephone
     * $this->attributes['email'] - string 
     * $this->attributes['nif'] - string
     * $this->attributes['direccion'] - string 'F. Simplificada, Sin Datos'
     * $this->attributes['cp'] - string
     * $this->attributes['poblacion'] - string 'Huelva'
     * $this->attributes['provincia'] - string
     * $this->attributes['pais'] - string
     * $this->attributes['created_at'] - timestamp - contains the user creation date
     * $this->attributes['updated_at'] - timestamp - contains the user update date
     */

     /**
     * The model's default values for attributes.
     *
     * @var array
     */
    /*
    protected $attributes = [
        'options' => '[]',
        'delayed' => false,
    ];
    */

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name', 'telefono', 'email', 'nif', 'direccion', 
        'cp', 'poblacion', 'provincia', 'pais', 'contacto_id',
        'distance_text','distance_value','duration_text','duration_value'
    ];

    public function contacto(){
        return $this->belongsTo(Contacto::class);
    }

    public function getContacto(){ return $this->contacto(); }

    public function getId(){ return $this->attributes['id']; }
    public function setId($id){ $this->attributes['id'] = $id; }
    
    public function getFull_name(){ return $this->attributes['full_name']; }
    public function setFull_name($full_name){ $this->attributes['full_name'] = $full_name; }
    
    public function getTelefono(){ return $this->attributes['telefono']; }
    public function setTelefono($telefono){ $this->attributes['telefono'] = $telefono; }
    
    public function getEmail(){ return $this->attributes['email']; }
    public function setEmail($email){ $this->attributes['email'] = $email; }

    public function getNif(){ return $this->attributes['nif']; }
    public function setNif($nif){ $this->attributes['nif'] = $nif; }

    public function getDireccion(){ return $this->attributes['direccion']; }
    public function setDireccion($direccion){ $this->attributes['direccion'] = $direccion; }

    public function getCp(){ return $this->attributes['cp']; }
    public function setCp($cp){ $this->attributes['cp'] = $cp; }

    public function getPoblacion(){ return $this->attributes['poblacion']; }
    public function setPoblacion($poblacion){ $this->attributes['poblacion'] = $poblacion; }

    public function getProvincia(){ return $this->attributes['provincia']; }
    public function setProvincia($provincia){ $this->attributes['provincia'] = $provincia; }

    public function getPais(){ return $this->attributes['pais']; }
    public function setPais($pais){ $this->attributes['pais'] = $pais; }

    public function getDistance_text(){ return $this->attributes['distance_text']; }
    public function getDistance_value(){ return $this->attributes['distance_value']; }   
    public function getDuration_text(){ return $this->attributes['duration_text']; }
    public function getDuration_value(){ return $this->attributes['duration_value']; }
    public function setMatrix(){ 
        $matrix = new Distancematrix();
        $m = $matrix->desdeCasa(
            $this->attributes['direccion'].", ".
            $this->attributes['poblacion'].", ".
            $this->attributes['provincia'].", ".
            $this->attributes['pais']
        );       
        $this->attributes['distance_text'] = $m->distance->text; 
        $this->attributes['distance_value'] = $m->distance->value; 
        $this->attributes['duration_text'] = $m->duration->text; 
        $this->attributes['duration_value'] = $m->duration->value; 
    }

    public function getCreatedAt(){ return $this->attributes['created_at']; }
    public function setCreatedAt($createdAt){ $this->attributes['created_at'] = $createdAt; }

    public function getUpdatedAt(){ return $this->attributes['updated_at']; }
    public function setUpdatedAt($updatedAt){ $this->attributes['updated_at'] = $updatedAt; }
}
