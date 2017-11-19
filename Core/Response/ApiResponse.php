<?php

namespace Core\Response;

class ApiResponse extends Response {

    public function sendResponse() {
        header('Content-type: application/json');

        echo $this->app->view->json;
    }
}