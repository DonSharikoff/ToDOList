<?php

namespace Core\Models;

use Core\Models\Actions;

class Model implements IModel {

    public function getAll() :array {
        $action = new Actions\Get();
        return $action->doWork();
    }

    public function update(array $change) :array {
        $action = new Actions\Update($change);
        if ($action->doWork())
            return $action->save();
        else
            throw new \Exception('empty value');
    }

    public function add(string $str) :array {
        $action = new Actions\Add($str);
        if($action->doWork())
            return $action->save();
        else
            throw new \Exception('empty value');
    }

    public function delete(int $id) :array {
        $action = new Actions\Delete($id);
        if ($action->doWork())
            return $action->save();
        else
            throw new \Exception('empty value');
    }
}