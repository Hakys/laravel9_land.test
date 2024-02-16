<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;
use SimpleXMLElement;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('GuzzleHttp\Client', function(){
            return new Client([
                'base_uri' => 'https://diablaroja.es',
                'timeout'  => 2.0,
                'query' => [
                    'ws_key' => 'HJMMJQ2VPPVYP9L422JLTAB1FCR123DM',
                    'output_format' => 'JSON'
                ],
            ]);
        });
/*
        $this->app->singleton('SimpleXMLElement', function(){
            $to = storage_path("app/public/imports/dreamlove.xml");
            $xml = new SimpleXMLElement($to,LIBXML_NOCDATA,true);
            $xml->asXML($to);
            return $xml->product;
        });
*/
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
