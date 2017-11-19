<?php

namespace App\Controllers;

use Core\Controllers\AbstractController;

class ApiController extends AbstractController {

    public function getList() {
        $this->view->setJSON($this->model->getAll());
    }
    public function add() {
        $finishArr = $this->model->add($this->params['text']);
        $this->view->setJSON($finishArr);
    }
    public function delete() {
        $finishArr = $this->model->delete($this->params['id']);
        $this->view->setJSON($finishArr);
    }
    public function update() {
        $finishArr = $this->model->update($this->params['change']);
        $this->view->setJSON($finishArr);
    }
}