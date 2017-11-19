<?php

namespace Core\Response;



class HTMLResponse extends Response {

    public function sendResponse() {
        http_response_code(202);
        header("X-Sample-Test: foo");
        header('Content-type: text/html');

        include $this->app->view->pathToFile;
    }
}