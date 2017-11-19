<?php

namespace Core;

interface IApp {

    public function initController() :void;
    public function initView() :void;
    public function sendResponse() :void;
}