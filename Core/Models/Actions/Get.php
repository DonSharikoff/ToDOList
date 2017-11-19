<?php

namespace Core\Models\Actions;

class Get extends AbstractActions {

    function doWork() {
        return $this->data;
    }
}