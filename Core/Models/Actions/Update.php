<?php

namespace Core\Models\Actions;

class Update extends AbstractActions {

    private $change;

    public function __construct(array $change){
        parent::__construct();
        $this->change = $change;
    }

    function doWork(): bool {

        $array = [];

        for($i = 0; $i <= count($this->data); ++$i) {
            if((int)$this->change['id'] == $this->data[$i]['id']) {
                $array['id'] = $this->change['id'];
                $array['status'] = (isset($this->change['status'])) ? $this->setStatus($this->change['status']) : $this->data[$i]['status'];
                $array['text'] = $this->change['text'] ?? $this->data[$i]['text'];

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