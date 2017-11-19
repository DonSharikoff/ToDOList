<?php

namespace Core\Models\Actions;

class Add extends AbstractActions {

    private $addString;

    public function __construct(string $addString){
        parent::__construct();
        $this->addString = addslashes($addString);
    }

    function doWork() :bool {

        if(empty($this->addString))
            return false;
        $array = ['id' => $this->generateId(), 'status' => 'ndone', 'text' => $this->addString];
        $this->data[] = $array;
        return true;
    }

    private function generateId() :int {
        return max($this->data)['id'] + 1;
    }
}