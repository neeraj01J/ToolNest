<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Tool.php';
require_once __DIR__ . '/../models/User.php';

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
        /* =========================
           CHECK LOGIN
           ========================= */

        if (!isset($_SESSION['user_id'])) {

            header("Location: index.php?page=login");

            exit;
        }


        /* =========================
           ADD TOOL
           ========================= */

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = trim($_POST['name'] ?? '');
            $category = trim($_POST['category'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $url = trim($_POST['url'] ?? '');


            /* -------------------------
               VALIDATE REQUIRED FIELDS
               ------------------------- */

            if (
                empty($name) ||
                empty($category) ||
                empty($description) ||
                empty($url)
            ) {

                $error = "All fields are required.";

                require_once __DIR__ . '/../views/add-tool.php';

                exit;
            }


            /* -------------------------
               CREATE MODEL
               ------------------------- */

            $toolModel = new Tool($GLOBALS['conn']);


            /* -------------------------
               CHECK DUPLICATE TOOL
               ------------------------- */

            if ($toolModel->toolExists($name, $category)) {

                $error = "This tool already exists in this category.";

                require_once __DIR__ . '/../views/add-tool.php';

                exit;
            }


            /* -------------------------
               ADD TOOL
               ------------------------- */

            $success = $toolModel->addTool(
                $name,
                $category,
                $description,
                $url
            );


            /* -------------------------
               RESULT
               ------------------------- */

            if ($success) {

                header("Location: index.php?success=1");

                exit;

            } else {

                $error = "Failed to add the tool.";

                require_once __DIR__ . '/../views/add-tool.php';

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


    /* =========================
       ABOUT PAGE
       ========================= */

    public function about()
    {
        require_once __DIR__ . '/../views/about.php';
    }


    /* =========================
       REGISTER
       ========================= */

    public function register()
    {
        /*
         * Show registration page
         * when the form has not
         * been submitted.
         */

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            require_once __DIR__ . '/../views/register.php';

            return;
        }


        /* -------------------------
           GET FORM DATA
           ------------------------- */

        $name = trim($_POST['name'] ?? '');

        $email = trim($_POST['email'] ?? '');

        $password = $_POST['password'] ?? '';


        /* -------------------------
           VALIDATE REQUIRED FIELDS
           ------------------------- */

        if (
            empty($name) ||
            empty($email) ||
            empty($password)
        ) {

            $error = "All fields are required.";

            require_once __DIR__ . '/../views/register.php';

            return;
        }


        /* -------------------------
           VALIDATE EMAIL
           ------------------------- */

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $error = "Please enter a valid email address.";

            require_once __DIR__ . '/../views/register.php';

            return;
        }


        /* -------------------------
           PASSWORD LENGTH
           ------------------------- */

        if (strlen($password) < 8) {

            $error = "Password must be at least 8 characters.";

            require_once __DIR__ . '/../views/register.php';

            return;
        }


        /* -------------------------
           CREATE USER MODEL
           ------------------------- */

        $userModel = new User($GLOBALS['conn']);


        /* -------------------------
           CHECK DUPLICATE EMAIL
           ------------------------- */

        if ($userModel->emailExists($email)) {

            $error = "An account with this email already exists.";

            require_once __DIR__ . '/../views/register.php';

            return;
        }


        /* -------------------------
           HASH PASSWORD
           ------------------------- */

        $hashedPassword = password_hash(
            $password,
            PASSWORD_DEFAULT
        );


        /* -------------------------
           CREATE USER
           ------------------------- */

        $success = $userModel->createUser(
            $name,
            $email,
            $hashedPassword
        );


        /* -------------------------
           RESULT
           ------------------------- */

        if ($success) {

            header(
                "Location: index.php?page=register&success=1"
            );

            exit;

        } else {

            $error = "Registration failed. Please try again.";

            require_once __DIR__ . '/../views/register.php';

            return;
        }
    }


    /* =========================
       LOGIN
       ========================= */

    public function login()
    {
        /*
         * Show login page
         * when the form has not
         * been submitted.
         */

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            require_once __DIR__ . '/../views/login.php';

            return;
        }


        /* -------------------------
           GET FORM DATA
           ------------------------- */

        $email = trim($_POST['email'] ?? '');

        $password = $_POST['password'] ?? '';


        /* -------------------------
           VALIDATE REQUIRED FIELDS
           ------------------------- */

        if (
            empty($email) ||
            empty($password)
        ) {

            $error = "Email and password are required.";

            require_once __DIR__ . '/../views/login.php';

            return;
        }


        /* -------------------------
           VALIDATE EMAIL
           ------------------------- */

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $error = "Please enter a valid email address.";

            require_once __DIR__ . '/../views/login.php';

            return;
        }


        /* -------------------------
           CREATE USER MODEL
           ------------------------- */

        $userModel = new User($GLOBALS['conn']);


        /* -------------------------
           FIND USER BY EMAIL
           ------------------------- */

        $user = $userModel->getUserByEmail($email);


        /* -------------------------
           CHECK USER
           ------------------------- */

        if (!$user) {

            $error = "Invalid email or password.";

            require_once __DIR__ . '/../views/login.php';

            return;
        }


        /* -------------------------
           VERIFY PASSWORD
           ------------------------- */

        if (!password_verify($password, $user['password'])) {

            $error = "Invalid email or password.";

            require_once __DIR__ . '/../views/login.php';

            return;
        }


        /* -------------------------
           STORE USER INFORMATION
           ------------------------- */

        $_SESSION['user_id'] = $user['id'];

        $_SESSION['user_name'] = $user['name'];

        $_SESSION['user_email'] = $user['email'];


        /* -------------------------
           LOGIN SUCCESS
           ------------------------- */

        header("Location: index.php");

        exit;
    }


    /* =========================
       LOGOUT
       ========================= */

    public function logout()
    {
        /*
         * Remove all session data
         */

        $_SESSION = array();


        /*
         * Destroy the session
         */

        session_destroy();


        /*
         * Redirect to home with
         * logout success message
         */

        header("Location: index.php?logout=success");

        exit;
    }
}