<?php

namespace App\Services;

use App\Services\CacheService;
use App\Repositories\MovieRepository;


class InsertService
{
    protected $model;
    protected $json;
    protected $movie_id;
    protected $movieRepository;

    private $imageTypes = [ 'image/png' , 'image/jpg' , 'image/jpeg', 'image/jpe', 'image/gif', 'image/tif', 'image/tiff', 'image/svg', 'image/ico', 'image/icon', 'image/x-icon'];

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function insertJson($json)
    {
        $counter = 0;
        foreach($json as $row){
            $movie = $this->movieRepository->setInstance();
            if(!$this->movieRepository->checkIfMovieExists($row->id)){
                $counter++;
                foreach($row as $field=>$value){
                    if(is_array($value)){
                        $this->parseArrayItemsAndSave($row, $field, $value);
                    }elseif(is_object($value)){
                        $this->parseArrayItemsAndSave($row, $field, [$value]);
                    }else{
                        $this->addValueIfColumnExist($field, $value, $movie);
                    }
                }
                if(isset($row->genres)){
                    $movie->genres = $row->genres;
                }
                $movie->save();
            }
        }
        return '========== '.$counter.' ITEMS ADDED TO DB ==========';
    }

        /*
        Check if model class exist in App namespace
    */
    private function parseArrayItemsAndSave($row, $field, $value){
        $this->movie_id = $row->id;
        foreach($value as $items){
            $this->checkIfModelExist($field);
            foreach((array) $items as $key=>$item){
                $this->addValueIfColumnExist($key, $item, $this->model);
            }
            $this->model->movie_id = $row->id;
            $this->model->save();
        }
    }

    private function checkIfModelExist($modelName)
    {
        $fullClassName = 'App\\' . ucfirst($modelName) ;
        if(class_exists($fullClassName)){
           $this->model = new $fullClassName();
        }
    }

    private function addValueIfColumnExist($columnName, $value, $model)
    {
        if ($model->getConnection()->getSchemaBuilder()->hasColumn($model->getTable(), $columnName)) {
            if(is_array($value)){
                $value = serialize($value);
            }
            $model->$columnName = $value;
            //check if value is a valid url and a image
            $this->checkForUrlAndImageType($value);
        }
    }

    private function checkForUrlAndImageType($url){
        //check if url is valid
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            //get headers from url and check if content-type is a image
            if($this->urlExists($url)){

                $url_headers=get_headers($url, 1);
                if(isset($url_headers['Content-Type'])){
                    $type = strtolower($url_headers['Content-Type']);
                    if(in_array($type, $this->imageTypes)){

                        $imageNameMd5 = md5(pathinfo($url, PATHINFO_FILENAME));
                        CacheService::cacheImage($url, $imageNameMd5, $this->movie_id);
                        $this->model->image = $this->movie_id .'_'. $imageNameMd5;
                    }
                }

            }
        }
    }

    private function urlExists($url) {
        $handle = curl_init($url);
        curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

        $response = curl_exec($handle);
        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if($httpCode >= 200 && $httpCode <= 400) {
            return true;
        } else {
            return false;
        }

        curl_close($handle);
    }
}
