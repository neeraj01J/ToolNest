<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Tool.php';

class ToolController
{
    /* =========================
       HOME PAGE
       ========================= */

    public function home()
    {
        $toolModel = new Tool($GLOBALS['conn']);

        $tools = $toolModel->getAllTools();

        $categories = $toolModel->getCategories();

        require_once __DIR__ . '/../views/home.php';
    }


    /* =========================
       TOOL DETAILS
       ========================= */

    public function tool()
    {
        $id = $_GET['id'] ?? null;

        $toolModel = new Tool($GLOBALS['conn']);

        $tool = $toolModel->getToolById($id);

        require_once __DIR__ . '/../views/tool.php';
    }


    /* =========================
       ADD TOOL
       ========================= */

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

                header("Location: index.php?success=1");
                exit;

            } else {

                echo "Failed to add the tool.";
                exit;

            }
        }

        require_once __DIR__ . '/../views/add-tool.php';
    }


    /* =========================
       SEARCH TOOLS
       ========================= */

    public function search()
    {
        $keyword = trim($_GET['q'] ?? '');

        $toolModel = new Tool($GLOBALS['conn']);

        $tools = $toolModel->searchTools($keyword);

        $categories = $toolModel->getCategories();

        $isSearch = true;

        require_once __DIR__ . '/../views/home.php';
    }


    /* =========================
       FILTER BY CATEGORY
       ========================= */

    public function category()
    {
        $category = trim($_GET['category'] ?? '');

        $toolModel = new Tool($GLOBALS['conn']);

        $tools = $toolModel->getToolsByCategory($category);

        $categories = $toolModel->getCategories();

        $isCategoryFilter = true;

        require_once __DIR__ . '/../views/home.php';
    }
}