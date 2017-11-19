<?php

namespace Core\Response;

use Core\IApp;

abstract Class Response implements IResponse{

    protected $app;

    public function __construct(IApp $app) {
        $this->app = $app;
    }
}