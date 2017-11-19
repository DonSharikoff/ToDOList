<?php

namespace Core\Controllers;

use Core\Views\View, Core\Models\Model;

abstract class AbstractController implements Controller {

    public $model;
    public $view;
    protected $params;

    public function __construct(array $params) {
        $this->params = $params;
        $this->model = new Model();
        $this->view = new View;
    }
}