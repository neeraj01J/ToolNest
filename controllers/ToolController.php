<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Tool.php';

class ToolController
{
    public function home()
{
    $toolModel = new Tool($GLOBALS['conn']);

    $tools = $toolModel->getAllTools();

    require_once __DIR__ . '/../views/home.php';
}
    public function tool()
    {
        $id = $_GET['id'] ?? null;

        $toolModel = new Tool($GLOBALS['conn']);

        $tool = $toolModel->getToolById($id);

        require_once __DIR__ . '/../views/tool.php';
    }
}