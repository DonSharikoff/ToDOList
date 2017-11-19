<?php

namespace Core;

class Request implements IRequest {

    public $httpMethod;
    public $requestParams;
    public $requestURI;
    public $queryString;
    private $listOfRouts;

    public function __construct() {
        $this->httpMethod = $_SERVER['REQUEST_METHOD'];
        $this->requestParams = ($this->httpMethod == 'GET') ? $_GET : $_POST;
        $this->requestURI = explode('?',$_SERVER['REQUEST_URI'])[0];
        $this->queryString = $_SERVER['QUERY_STRING'];
        $this->listOfRouts = include __DIR__.'/routes.php';
    }

    public function getRules() :array {
        if(array_key_exists($this->requestURI,$this->listOfRouts))
            return $this->listOfRouts[$this->requestURI];
        throw new \Exception('Bad request');
    }
}