<?php

namespace App\Repositories\Xml;

use SimpleXMLElement;
use DateTime;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class Lovecherry{

    public $url_server;
    public $url_local;
    
    public $headers;
    /*
    $headers = [
        'idProducto','idCombinacion','reference','ean13','fabricante','nombre',
        'Descripcion','Descripcion Larga','PVD','PVPR','PVPR Externo','precioDescuento',
        'combinacion','tax','active','stock','peso','categorias','caracteristicas',
        'imagenes'];
    */

    protected $products;
    protected $lastUploadunix;

    public function __construct() {
        $this->url_server = "https://www.lovecherry.es/modules/imaxexportcsv/export/product_es_MjM0.csv";
        $this->url_local = storage_path("app/public/imports/lovecherry.csv");        
    }

    public function status(){
        return gmdate("d-m-Y H:i:s",$this->lastUploadunix);
    }

    public function log($txt){
        Log::channel('importxml')->info("Lovecherry: ".$txt);
    }
    
    public function importFile(){    
        $xmlString = file_get_contents($this->url_server); 
        return Storage::put("public/imports/lovecherry.csv",$xmlString);           
    } 
    
    public function loadFile(){
        $csv = fopen($this->url_local,"r"); 
        $this->headers = array_flip(fgetcsv($csv, null, ";"));
        //$xml = new SimpleXMLElement($this->url_local,LIBXML_NOCDATA,true);
        //dd($xml->xpath("product/public_id[.='D-219194']/parent::*"));
        return $csv;
    }

    public function create_array($product){ 
        $url = "https://www.lovecherry.es/es/#/dfclassic/query_name=match_and&query=";
        $list=explode(',',$product[$this->headers['imagenes']]);
        return [
            'referencia' => (string) $product[$this->headers['reference']],
            'stock' => (integer) $product[$this->headers['stock']],
            'coste' => (float) $product[$this->headers['precioDescuento']],
            'price' => (float) $product[$this->headers['PVPR Externo']],
            'vat' => (float) $product[$this->headers['tax']],
            'title' => (string) mb_convert_encoding($product[$this->headers['nombre']],'UTF-8'),
            'slug' => (string) Str::slug(((string) mb_convert_encoding($product[$this->headers['nombre']],'UTF-8'))
                ."-".((string) $product[$this->headers['reference']])),
            'new' => 1,
            'available' => (integer) $product[$this->headers['active']],
            'url' => (string) $url.$product[$this->headers['reference']],
            'release_at' => today(),
            'updated_at' => today(),
            'html_description' => (string) mb_convert_encoding($product[$this->headers['Descripcion Larga']],'UTF-8'),
            'url_image' => (string) $list[0],
        ];  
    }

    public function all($limit=300){
        $csv = $this->loadFile(); 
        $u=0;$c=0;
        $all = Product::all();
        while (($product = fgetcsv($csv, null, ";")) !== FALSE) {
            $p=$all->firstWhere('referencia',(string)$product[2]);
            if($p){

            }else{
                try {
                    Product::create($this->create_array($product));
                    $this->log(" CREATE PRODUCT LCH ".(string)$product[2]);
                    $c++;
                } catch (QueryException $e) {
                    //echo now()." ref. ".$product->public_id." ERROR: ".$e->getCode()."<br/>";
                    $this->log(" ref. ".$product[2]." ERROR CREATE PRODUCT LCH: ".$e);
                }
            }
            if($u+$c==$limit) break;
        }
        fclose($csv);
        return [$u,$c];
    }
}
    
/*
   

    public function create_array($product){   
        if($product->images){
            $url_image = (string) $product->images[0]->image[0]->src;        
            foreach($product->images[0]->image as $img){                
                if($img['preferred']=="1"){                
                    $url_image = (string) $img->src;
                } 
            }
        }else{
            $url_image= "/storage/nofoto.png";
            $this->log(" CREATE PRODUCT ".(string)$product->public_id." NO FOTO");
        }
        $producto_array = [];
        $producto_array = [
            //'proveedor_id' => (integer) $proveedor->id,
            'referencia' => (string) $product->public_id,
            'stock' => (integer) $product->stock->location,
            'coste' => (float) $product->cost_price,
            'price' => (float) $product->price,
            'vat' => (float) $product->vat,
            'title' => (string) $product->title,
            'slug' => Str::slug(((string) $product->title)."-".((string) $product->public_id)),
            'new' => (integer) $product->new,
            'available' => (integer) $product->available,
            'url' => (string) $product->product_url,
            'released_at' => new Datetime($product->release_date),
            'updated_server' => (string)$product->updated,
            'html_description' => (string) $product->html_description,
            'url_image' => (string) $url_image,
            //'direccion' => (integer) 7,
        ];
        return $producto_array;
    }

    public function update_array($product){ 
        $log=" NO FOTO";
        if($product->images){
            $url_image = (string) $product->images[0]->image[0]->src;        
            foreach($product->images[0]->image as $img){                
                if($img['preferred']=="1"){                
                    $url_image = (string) $img->src;
                } 
            }
        }else{
            $url_image = "/storage/nofoto.png";
            $this->log(" UPDATE PRODUCT ".(string)$product->public_id." NO FOTO");
        }
        $producto_array = [
            //'proveedor_id' => (integer) $proveedor->id,
            //'referencia' => (string) $product->public_id,
            'stock' => (integer) $product->stock->location,
            'coste' => (float) $product->cost_price,
            'price' => (float) $product->price,
            'vat' => (float) $product->vat,
            'title' => (string) $product->title,
            'slug' => Str::slug(((string) $product->title)."-".((string) $product->public_id)),
            'new' => (integer) $product->new,
            'available' => (integer) $product->available,
            'url' => $product->product_url,
            'released_at' => new Datetime((string)$product->release_date),
            'updated_server' => new Datetime((string)$product->updated),
            'html_description' => (string) $product->html_description,
            'url_image' => (string) $url_image,
            //'direccion' => (integer) 7,
        ];
        return $producto_array;
    }

    public function all($limit=300){
        $this->products = $this->loadFile()->product;
        $u=0;$c=0;
        $all = Product::all();
        foreach($this->products as $product){            
            $p=$all->firstWhere('referencia',(string)$product->public_id);   
            if($p){
                if($p->updated_server!=(string)$product->updated){              
                    try {
                        $p->update($this->update_array($product));
                        $u++;
                        $this->log(" UPDATE PRODUCT ".(string)$product->public_id);
                    } catch (QueryException $e) {
                        //echo now()." ref. ".$product->public_id." ERROR: ".$e->getCode()."<br/>";
                        $this->log(" ref. ".$product->public_id." ERROR UPDATE PRODUCT: ".$e);
                    } 
                }
            }else{                
                try {
                    Product::create($this->create_array($product));
                    $this->log(" CREATE PRODUCT ".(string)$product->public_id);
                    $c++;
                } catch (QueryException $e) {
                    //echo now()." ref. ".$product->public_id." ERROR: ".$e->getCode()."<br/>";
                    $this->log(" ref. ".$product->public_id." ERROR CREATE PRODUCT: ".$e);
                }
            }
            if($u+$c==$limit) break;
        }
        return [$u,$c];
    }
    
    public function find($referencia){        
        $f = $this->loadFile()->xpath("product/public_id[.='".$referencia."']/parent::*"); 
        if($f){
            $f = $f[0];
            $p = Product::firstWhere('referencia',$referencia);
            if($p){
                if($p->updated_server!=$f->updated){              
                    try {
                        $p->whereDate('updated_server', '!=', (string)$f->updated)
                            ->update($this->update_array($f));
                            $this->log(" UPDATE PRODUCT ".(string)$f->public_id);
                    } catch (QueryException $e) {
                        //echo now()." ref. ".$product->public_id." ERROR: ".$e->getCode()."<br/>";
                        $this->log(" ref. ".$f->public_id." ERROR UPDATE PRODUCT: ".$e);
                    } 
                }
            }else{                
                try {
                    $p = Product::create($this->create_array($f));
                    $this->log(" CREATE PRODUCT ".(string)$f->public_id);
                } catch (QueryException $e) {
                    //echo now()." ref. ".$product->public_id." ERROR: ".$e->getCode()."<br/>";
                    $this->log(" ref. ".$f->public_id." ERROR CREATE PRODUCT: ".$e);
                }
            }
            return $p;
        }else{
            $this->log("ERROR PRODUCT NOT FOUND Referencia ".$referencia);
            return null;
        }
    }
    
    
}
*/