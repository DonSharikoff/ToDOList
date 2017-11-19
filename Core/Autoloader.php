<?php

namespace Core;

class Autoloader {

    private $name;

    public function __construct($name) {
        $this->name = $arr = explode('\\', $name);;
    }

    private function getBaseDir() :string {

        $base = explode('\\',__DIR__);

        array_pop($base);

        return implode('/',$base);
    }

    private function getDirName() :string {
        $dirs = $this->name;

        array_pop($dirs);

        return implode('/',$dirs);
    }

    private function getFileName() :string {
        $name = $this->name;
        return array_pop($name).'.php';
    }

    public function __toString() :string {
        return $this->getBaseDir().'/'.$this->getDirName().'/'.$this->getFileName();
    }
}

spl_autoload_register(function ($name) {
    $nc = new Autoloader($name);
    if(file_exists($m = $nc))
        include $m;
    else
        throw new \Exception('Class not found');
});