<?php

namespace App\Console\Commands;

use App\Repositories\Xml\Dreamlove;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImportFileTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ImportFile:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import DreamLove XML File';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $u=0;$c=0;
        $url_server = "https://store.dreamlove.es/dyndata/exportaciones/csvzip/catalog_1_50_125_2_eb10a792c0336bc695e2b0ec29d88402_xml_plain.xml";
        $url_local = "public/imports/dreamlove.xml";
        $xmlString = file_get_contents($url_server);      //  $this->info('Custom task executed successfully!');      
        if(Storage::put($url_local,$xmlString)){
            $products = new Dreamlove();
            [$u,$c] = $products->all();
        }
        Log::info(now()." ".$this->signature." C:".$c." U:".$u);
        return Command::SUCCESS;
        //else    
            //return Command::FAILURE;
    }
}
