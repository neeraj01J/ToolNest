<?php

require_once __DIR__ . '/controllers/ToolController.php';

$controller = new ToolController();

if (isset($_GET['page']) && $_GET['page'] === 'tool') {

    $controller->tool();

} else {

    $controller->home();

}