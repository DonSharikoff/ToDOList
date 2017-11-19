<?php

namespace Core;

use Core\Controllers\Controller, Core\Response;

class App implements IApp {

    protected $request;
    protected $controller;
    protected $view;

    public function __construct() {
        $this->request = new Request;
    }

    public function initController() :void {
        $rules = $this->request->getRules();

        $this->controller = $this->getController($rules['controller']);

        call_user_func([$this->controller, $rules['action']]);
    }

    private function getController(string $nameController) : Controller {
        return new $nameController($this->request->requestParams);
    }

    public function initView() :void {
        $this->view = $this->controller->view;
    }

    public function  sendResponse() :void {
        if(empty($this->view->pathToFile))
            (new Response\ApiResponse($this))->sendResponse();
        else
            (new Response\HTMLResponse($this))->sendResponse();
    }

    public function __get($name) {
        return $this->$name;
    }
}