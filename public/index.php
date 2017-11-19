<?php

error_reporting (E_ALL);

include_once __DIR__.'/../Core/Autoloader.php';

$app = new Core\App();
$app->initController();
$app->initView();
$app->sendResponse();
