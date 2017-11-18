<?php

/**
 * Template method
 */

abstract class Action {

    public $data;

    public function __construct() {
        $this->data = json_decode(file_get_contents('data.json'), true);
    }

    function doWork() :bool {}

    function save() {
        sort($this->data);
        return file_put_contents( 'data.json',json_encode($this->data));
    }

    function sendResponse() {
        echo json_encode($this->data);
    }
}

class view extends Action {}

class add extends Action {
    function doWork() :bool {
        if($_GET['text']) {
            $array = ['id' => $this->generateId(), 'status' => 'ndone', 'text' => $_GET['text']];
            $this->data[] = $array;
            return true;
        }
        else
            return false;
}

    private function generateId() :int {
        return max($this->data)['id'] + 1;
    }
}

class delete extends Action {

    function doWork() :bool {
        for($i = 0; $i <= count($this->data); ++$i) {
            if((int)$_GET['id'] == $this->data[$i]['id']) {
                unset($this->data[$i]);
                return true;
            }
        }
        return false;
    }
}

class update extends Action {

    function doWork(): bool {

        if(!$_GET['change'])
            return false;

        $request = $_GET['change'];
        $array = [];



        for($i = 0; $i <= count($this->data); ++$i) {
            if((int)$request['id'] == $this->data[$i]['id']) {
                $array['id'] = $request['id'];
                $array['status'] = (isset($request['status'])) ? $this->setStatus($request['status']) : $this->data[$i]['status'];
                $array['text'] = $request['text'] ?? $this->data[$i]['text'];

                $this->data[$i] = $array;

                return true;
            }
        }
        return false;
    }

    private function setStatus(string $status) {
        switch ($status) {
            case 'done' :
                return 'ndone';
            case 'ndone':
                return 'done';
        }
    }
}