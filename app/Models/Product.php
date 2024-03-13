<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use Livewire\WithPagination;

class Product extends Model
{
    use WithPagination;

    //use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['description'] - string - contains the product description
     * $this->attributes['image'] - string - contains the product image
     * $this->attributes['price'] - int - contains the product price
     * $this->items - Item[] - contains the associated items
     * $this->attributes['created_at'] - timestamp - contains the product creation date
     * $this->attributes['updated_at'] - timestamp - contains the product update date
     */

    /*
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];
*/     
    protected $fillable = [
        'referencia','stock','coste','price','vat','title',
        'slug','new','available','url','released_at',
        'html_description','url_image','updated_server'
    ];

    //URL Amigable
    public function getRouteKeyName(){
        return 'referencia';
    }

    public static function validate($request)
    {
        $request->validate([
            "title" => "required|max:255",
            "html_description" => "required",
            "price" => "required|numeric|gt:0",
            'url_image' => 'image',
        ]);
    }

    public static function sumPricesByQuantities($products, $productsInSession)
    {
        $total = 0;
        foreach ($products as $product) {
            $total = $total + ($product->getPrice() * $productsInSession[$product->getId()]);
        }
        return $total;
    }

    public function getId(){ return $this->attributes['id']; }
    public function setId($id){ $this->attributes['id'] = $id; }
    public function getReferencia(){ return $this->attributes['referencia']; }
    public function setReferencia($referencia){ $this->attributes['referencia']=$referencia; }
    public function getStock(){ return $this->attributes['stock']; }
    public function setStock($stock){ $this->attributes['stock']=$stock; }
    public function getPrice(){ return $this->attributes['price']; }
    public function setPrice($price){ $this->attributes['price'] = $price; }
    public function getVat(){ return $this->attributes['vat']; }
    public function setVat($vat){ $this->attributes['vat']=$vat; }
    public function getTitle(){ return $this->attributes['title']; }
    public function setTitle($title){ $this->attributes['title'] = $title; }
    public function getSlug(){ return $this->attributes['slug']; }
    public function setSlug($slug){ $this->attributes['slug']=$slug; }
    public function getHtml_description(){ return $this->attributes['html_description']; }
    public function setHtml_description($html_description){ $this->attributes['html_description'] = $html_description; }
    public function getNew(){ return $this->attributes['new']; }
    public function setNew($new){ $this->attributes['new']=$new; }
    public function getAvailable(){ return $this->attributes['available']; }
    public function setAvailable($available){ $this->attributes['available']=$available; }
    public function getUrl(){ return $this->attributes['Url']; }
    public function setUrl($url){ $this->attributes['url']=$url; }
    public function getUrl_image(){ return $this->attributes['url_image']; }
    public function setUrl_image($url_image){ $this->attributes['url_image'] = $url_image; }
    public function getResealedAt(){ return $this->attributes['released_at']; }
    public function setReleasedAt($releasedAt){ $this->attributes['released_at'] = $releasedAt; }
    public function getCreatedAt(){ return $this->attributes['created_at']; }
    public function setCreatedAt($createdAt){ $this->attributes['created_at'] = $createdAt; }
    public function getUpdatedAt(){ return $this->attributes['updated_at']; }
    public function setUpdatedAt($updatedAt) { $this->attributes['updated_at'] = $updatedAt; }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
    public function getItems()
    {
        return $this->items;
    }
    public function setItems($items)
    {
        $this->items = $items;
    }
    
}
