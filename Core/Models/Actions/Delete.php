<?php

namespace Core\Models\Actions;

class Delete extends AbstractActions {

    private $id;

    public function __construct(int $id){
        parent::__construct();
        $this->id = (int) $id;
    }

    function doWork() :bool {
        if($this->id < 0)
            return false;
        for($i = 0; $i <= count($this->data); ++$i) {
            if($this->id == $this->data[$i]['id']) {
                unset($this->data[$i]);
                break;
            }
        }
        return true;
    }
}