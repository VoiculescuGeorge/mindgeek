<?php

namespace App\Services;

use App\Services\InsertService;

class ScannerService
{
    protected $url;
    protected $json;
    private $sanitizeRegExr = '/[\x00-\x1F\x80-\xFF]/';

    public function __construct($url)
    {
        $this->url = $url;
        $this->sanitizeJson();
    }

    public function saveJson()
    {
        //Start to insert json data into db
        $insertService = resolve(InsertService::class);
        //$insertService = $this->app->makeWith(InsertService::class, [ $this->json ]);
        return $insertService->insertJson($this->json);
    }

    public function getJsonSize(){
        return count($this->json);
    }

    private function sanitizeJson(){
        $contents = file_get_contents($this->url);
        $this->json = json_decode(preg_replace($this->sanitizeRegExr, '', $contents));
    }


}
