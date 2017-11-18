<?php

include_once 'Todo.php';

switch (mb_strtolower ($_GET['action'])) {
    case 'view' :
        $action = new view();
        $action->sendResponse();
        break;
    case 'add' :
        $action = new add();
        if ($action->doWork())
            $action->save();
        $action->sendResponse();
        break;
    case 'delete' :
        $action = new delete();
        if ($action->doWork())
            $action->save();
        $action->sendResponse();
        break;
    case 'update' :
        $action = new update();
        if ($action->doWork())
            $action->save();
        $action->sendResponse();
        break;
}
