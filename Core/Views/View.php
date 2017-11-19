<?php

namespace Core\Views;

class View implements IView {

    public $pathToFile = '';
    public $baseDir = __DIR__.'/../../App/Views/';
    public $json = '';

    public function setView($name): void {
        if(!file_exists($path = $this->baseDir.$name.'.php'))
            throw new \Exception('Path to view is incorrect');
        $this->pathToFile = $path;
    }

    public function setJSON(array $var) {
        $this->json = json_encode($var);
    }
}