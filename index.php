<?php

require_once __DIR__ . '/controllers/ToolController.php';

$controller = new ToolController();


/* =========================
   TOOL DETAILS
   ========================= */

if (
    isset($_GET['page'])
    && $_GET['page'] === 'tool'
) {

    $controller->tool();


/* =========================
   ADD TOOL
   ========================= */

} elseif (
    isset($_GET['page'])
    && $_GET['page'] === 'add-tool'
) {

    $controller->addTool();


/* =========================
   SEARCH
   ========================= */

} elseif (
    isset($_GET['page'])
    && $_GET['page'] === 'search'
) {

    $controller->search();


/* =========================
   CATEGORY FILTER
   ========================= */

} elseif (
    isset($_GET['page'])
    && $_GET['page'] === 'category'
) {

    $controller->category();


/* =========================
   ABOUT PAGE
   ========================= */

} elseif (
    isset($_GET['page'])
    && $_GET['page'] === 'about'
) {

    $controller->about();


/* =========================
   HOME PAGE
   ========================= */

} else {

    $controller->home();

}