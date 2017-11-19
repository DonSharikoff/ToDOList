<?php

namespace Core\Models;

interface IModel {
    public function getAll() :array;
    public function update(array $change) :array ;
    public function add(string $str) :array;
    public function delete(int $id) :array ;
}