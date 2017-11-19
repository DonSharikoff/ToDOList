<?php

namespace Core\Models\Actions;

abstract class AbstractActions implements IActions {

    protected $file;
    protected $data;

    public function __construct() {
        if(!file_exists($path = __DIR__.'/../../data.json'))
            throw new \Exception('Don\'t find data file');

        $this->data = json_decode(file_get_contents($path), true);
        $this->file = $path;
    }

    function save() :array {
        sort($this->data);
        file_put_contents( $this->file,json_encode($this->data));
        return $this->data;
    }
}