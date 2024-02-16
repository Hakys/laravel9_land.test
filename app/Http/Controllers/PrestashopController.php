<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Repositories\Prestashop\Products;

class PrestashopController extends Controller
{

    protected $products;

    public function __construct(Products $products) {
        $this->products = $products;
    }

    //https://diablaroja.es/api/products/10386?ws_key=HJMMJQ2VPPVYP9L422JLTAB1FCR123DM&output_format=JSON
    public function index(){
        $items = $this->products->all();
        return view('prestashop.product.index',compact('items'));
    }

    public function show($id){
        $item = $this->products->find($id);
        return view('prestashop.product.show',compact('item'));
    }
}
/*
{
"id": 10386,
"id_manufacturer": "148",
"id_supplier": "3",
"id_category_default": "3",
"new": null,
"cache_default_attribute": "0",
"id_default_image": "41316",
"id_default_combination": 0,
"id_tax_rules_group": "3",
"position_in_category": "136",
"manufacturer_name": "PASANTE",
"quantity": "0",
"type": "simple",
"id_shop_default": "1",
"reference": "D-236438",
"supplier_reference": "",
"location": "",
"width": "24.000000",
"height": "16.000000",
"depth": "6.000000",
"weight": "0.448000",
"quantity_discount": "0",
"ean13": "5060359485106",
"isbn": "",
"upc": "",
"mpn": "",
"cache_is_pack": "0",
"cache_has_attachments": "0",
"is_virtual": "0",
"state": "1",
"additional_delivery_times": "1",
"delivery_in_stock": "",
"delivery_out_stock": "",
"product_type": "",
"on_sale": "0",
"online_only": "0",
"ecotax": "0.000000",
"minimal_quantity": "1",
"low_stock_threshold": null,
"low_stock_alert": "0",
"price": "26.428200",
"wholesale_price": "25.910000",
"unity": "",
"unit_price_ratio": "0.000000",
"additional_shipping_cost": "0.000000",
"customizable": "0",
"text_fields": "0",
"uploadable_files": "0",
"active": "1",
"redirect_type": "404",
"id_type_redirected": "0",
"available_for_order": "1",
"available_date": "0000-00-00",
"show_condition": "0",
"condition": "new",
"show_price": "1",
"indexed": "1",
"visibility": "both",
"advanced_stock_management": "0",
"date_add": "2023-11-29 13:26:01",
"date_upd": "2024-02-01 21:30:33",
"pack_stock_type": "3",
"meta_description": "PASANTEPASANTE - PRESERVATIVO SMILEY BOLSA 144 UNIDADESD-236438",
"meta_keywords": "",
"meta_title": "PASANTEPASANTE - PRESERVATIVO SMILEY BOLSA 144 UNIDADES-D-236438",
"link_rewrite": "pasante-preservativo-smiley-bolsa-144-unidades-d-236438",
"name": "PASANTE - PRESERVATIVO SMILEY BOLSA 144 UNIDADES - D-236438",
"description": "<p></p><p>Los condones estándar de Pasante. Fiable y seguro en todo momento. Preservativos de látex envasados ??individualmente, testados electrónicamente, humedecidos y con depósito. El plus para todos aquellos que no pueden hacer nada con la forma cilíndrica estándar: la forma cómoda y espaciada con un ancho nominal de 54 mm en el eje.<br /><br /><strong>Preservativo smiley</strong> de la marca Pasante ofrecen simplicidad en las formas: comodidad y sensación.  Contiene 4 diseños de láminas diferentes, de aproximadamente 36 piezas cada uno.  Preservativos con 4 caras divertidas tipo Smiley, ideales para repartir en fiestas o despedidas de soltero o soltera.</p><p>En el año 2016, la Firma Pasante Healthcare fue adquirida por Karex Bhd, el fabricante de preservativos más grande del mundo, siendo un ajuste estratégico para ambas compañías ya que permitirá su crecimiento y la inversión en Pasante y sus marcas subsidiarias. Pasante ofrece la mayor selección de condones en el mundo, todos fabricados con los más altos estándares de calidad. Todos los condones de látex Pasante llevan tanto el kitemark como la marca CE, mientras que los preservativos que no son de látex llevan la marca CE.</p><p><u><strong>Características:</strong></u></p><ul><li>Sabor: Neutro.</li><li>Lubricante: Hidrata.</li><li>Color: Transparente.</li><li>Textura: Liso.</li><li>Ancho nominal: 54mm.</li><li>Cantidad: Bolsa de 144 Uds.</li><li>Material: Látex 100% natural.</li><li>Sexo: Vaginal, anal y oral.</li><li>Marca: Pasante.</li><li>Largo: 190mm.</li></ul><p>En principio, todo preservativo es apto para el contacto vaginal, oral y anal, siempre que el ajuste sea bueno y se utilice suficiente lubricante, en especial en el sexo anal.</p>",
"description_short": "",
"available_now": "",
"available_later": "",
"associations": {
"categories": [
{
"id": "3"
},
{
"id": "51"
},
{
"id": "52"
},
{
"id": "53"
}
],
"images": [
{
"id": "41316"
},
{
"id": "41317"
},
{
"id": "41318"
}
],
"tags": [
{
"id": "128"
}
],
"stock_availables": [
{
"id": "10386",
"id_product_attribute": "0"
}
]
}
}
*/


/*
Route::get('/api_client_0', function () {
    $server = "https://www.diablaroja.es";
    $apiUri = '/api';
    $uri = '/products';
    $id = '/10386';
    $queryParams = [
        'ws_key' => 'HJMMJQ2VPPVYP9L422JLTAB1FCR123DM',
    ]; 
    $url = $server.$apiUri.$uri.$id.'?'.http_build_query($queryParams);
    $laresponse = Http::get($url);
    $envelope = $laresponse->getBody()->getContents();
    $xml= new SimpleXMLElement($envelope);
    $product = xmlToArray($xml);
    //$product = $xml->children()->product;
    //dd($product->id)->value();
    return view('api_client',compact('product'));
});

Route::get('/api_client_1', function () {
    $client = new Client([
        'base_uri' => 'https://jsonplaceholder.typicode.com',
        'timeout'  => 2.0,
    ]);
    $response = $client->request('GET', '/users');
    return json_decode($response->getBody()->getContents());
    return view('welcome');
});

Route::get('/api_client_2', function () {
    $client = new Client([
        'base_uri' => 'https://www.diablaroja.es',
        'timeout'  => 12.0,
    ]);
    $response = $client->request('GET', '/api/products?ws_key=HJMMJQ2VPPVYP9L422JLTAB1FCR123DM&output_format=JSON');
    $product = $response->getBody()->getContents();
    return view('api_client',compact('product'));
});
Route::get('/api_client_3', function () {
    $server = "https://www.diablaroja.es";
    $apiUri = '/api';
    $uri = '/products';
    $id = '/10386';
    $token ='?ws_key=HJMMJQ2VPPVYP9L422JLTAB1FCR123DM&output_format=JSON';

    $url = $server.$apiUri.$uri.$id.$token;
    dd($url);
    $respuesta = Http::get($url);
    $product = $respuesta->body();
    //$envelope = new SimpleXMLElement($product);
    //dd($envelope->products);
    //return Http::dd()->asJson()->withToken($token)->get($url);
    return $product;
    return view('api_client',compact('product'));
});

Route::get('/api_client', function () {
    $client = new Client([
        'base_uri' => 'https://diablaroja.es',
        'page' => '/api',
        'timeout'  => 2.0,
        'query' => [
            'ws_key' => 'HJMMJQ2VPPVYP9L422JLTAB1FCR123DM',
            'output_format' => 'JSON'
        ],
    ]);
    $response = $client->request('GET', 'api/products');
    //return json_decode($response->getBody()->getContents());
    $preitems = json_decode($response->getBody()->getContents());
    $items= $preitems->products;
    //
    return view('api_client',compact('items'));
});

*/