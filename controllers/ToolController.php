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
   public function addTool()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $name = trim($_POST['name'] ?? '');
        $category = trim($_POST['category'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $url = trim($_POST['url'] ?? '');

        if (
            empty($name) ||
            empty($category) ||
            empty($description) ||
            empty($url)
        ) {
            echo "All fields are required.";
            exit;
        }

        $toolModel = new Tool($GLOBALS['conn']);

        $success = $toolModel->addTool(
            $name,
            $category,
            $description,
            $url
        );

        if ($success) {

            header("Location: index.php");
            exit;

        } else {

            echo "Failed to add the tool.";
            exit;

        }
    }

    require_once __DIR__ . '/../views/add-tool.php';
}
}