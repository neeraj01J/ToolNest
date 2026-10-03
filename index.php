
<?php

require_once __DIR__ . '/controllers/ToolController.php';

$controller = new ToolController();

if (isset($_GET['page']) && $_GET['page'] === 'tool') {

    $controller->tool();

} elseif (isset($_GET['page']) && $_GET['page'] === 'add-tool') {

    $controller->addTool();

} else {

    $controller->home();

}