<?php

namespace App\Repositories\Xml;

use SimpleXMLElement;
use DateTime;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class Dreamlove{

    public $url_server;
    public $url_local;
    
    protected $products;
    protected $lastUploadunix;

    public function __construct() {
        $this->url_server = "https://store.dreamlove.es/dyndata/exportaciones/csvzip/catalog_1_50_125_2_eb10a792c0336bc695e2b0ec29d88402_xml_plain.xml";
        $this->url_local = storage_path("app/public/imports/dreamlove.xml");        
    }

    public function status(){
        return gmdate("d-m-Y H:i:s",$this->lastUploadunix);
    }

    public function importFile(){    
        $xmlString = file_get_contents($this->url_server); 
        return Storage::put("public/imports/dreamlove.xml",$xmlString);           
    }

    public function loadFile(){
        $xml = new SimpleXMLElement($this->url_local,LIBXML_NOCDATA,true);
        //dd($xml->xpath("product/public_id[.='D-219194']/parent::*"));
        return $xml;
    }

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
            $this->log(" CREATE PRODUCT DL ".(string)$product->public_id." NO FOTO");
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
            $this->log(" UPDATE PRODUCT DL ".(string)$product->public_id." NO FOTO");
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
                        $this->log(" UPDATE PRODUCT DL ".(string)$product->public_id);
                    } catch (QueryException $e) {
                        //echo now()." ref. ".$product->public_id." ERROR: ".$e->getCode()."<br/>";
                        $this->log(" ref. ".$product->public_id." ERROR UPDATE PRODUCT DL: ".$e);
                    } 
                }
            }else{                
                try {
                    Product::create($this->create_array($product));
                    $this->log(" CREATE PRODUCT DL ".(string)$product->public_id);
                    $c++;
                } catch (QueryException $e) {
                    //echo now()." ref. ".$product->public_id." ERROR: ".$e->getCode()."<br/>";
                    $this->log(" ref. ".$product->public_id." ERROR CREATE PRODUCT DL: ".$e);
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
    public function log($txt){
        Log::channel('importxml')->info("Dremalove: ".$txt);
    }
    
}