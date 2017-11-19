<?php

namespace Core\Models\Actions;

interface IActions {

    function doWork();

    function save() :array ;

}