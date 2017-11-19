<?php

namespace App\Controllers;

use Core\Controllers\AbstractController;

class MainController extends AbstractController {
    public function main() {
        $this->view->setView('index');
    }
}