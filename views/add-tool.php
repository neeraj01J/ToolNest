<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Add a Tool - ToolNest</title>

    <link rel="stylesheet" href="css/global.css">

    <!-- v=2 forces browser to load latest CSS -->
    <link rel="stylesheet" href="css/add-tool.css?v=2">

</head>

<body>


    <!-- =========================
         NAVBAR
         ========================= -->

    <nav class="navbar">

        <div class="logo">
            ToolNest
        </div>

        <div class="nav-links">

            <a href="index.php">
                Home
            </a>

            <a href="index.php">
                Tools
            </a>

            <a href="#">
                About
            </a>

            <a href="#">
                Login
            </a>

        </div>

    </nav>


    <!-- =========================
         DUPLICATE ERROR TOAST
         ========================= -->

    <?php if (isset($error)): ?>

        <div
            class="error-toast"
            id="errorToast"
        >

            <!-- Toast Icon -->

            <div class="error-toast-icon">
                !
            </div>


            <!-- Toast Content -->

            <div class="error-toast-content">

                <strong>
                    Tool already exists
                </strong>

                <span>
                    <?php
                    echo htmlspecialchars(
                        $error,
                        ENT_QUOTES,
                        'UTF-8'
                    );
                    ?>
                </span>

            </div>


            <!-- Close Button -->

            <button
                type="button"
                class="error-toast-close"
                onclick="closeErrorToast()"
                aria-label="Close notification"
            >
                ×
            </button>


            <!-- Progress Bar -->

            <div class="error-toast-progress"></div>

        </div>

    <?php endif; ?>


    <!-- =========================
         ADD TOOL FORM
         ========================= -->

    <main class="add-tool-container">

        <h1>
            Share a Tool
        </h1>

        <p class="form-intro">
            Help others discover useful digital tools.
        </p>


        <form
            action="index.php?page=add-tool"
            method="POST"
        >


            <!-- =========================
                 TOOL NAME
                 ========================= -->

            <div class="form-group">

                <label for="name">
                    Tool Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Enter tool name"
                    value="<?php
                        echo htmlspecialchars(
                            $_POST['name'] ?? '',
                            ENT_QUOTES,
                            'UTF-8'
                        );
                    ?>"
                    required
                >

            </div>


            <!-- =========================
                 CATEGORY
                 ========================= -->

            <div class="form-group">

                <label for="category">
                    Category
                </label>

                <input
                    type="text"
                    id="category"
                    name="category"
                    placeholder="Example: AI, Design, Productivity"
                    value="<?php
                        echo htmlspecialchars(
                            $_POST['category'] ?? '',
                            ENT_QUOTES,
                            'UTF-8'
                        );
                    ?>"
                    required
                >

            </div>


            <!-- =========================
                 DESCRIPTION
                 ========================= -->

            <div class="form-group">

                <label for="description">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    placeholder="Describe what this tool does"
                    rows="5"
                    required
                ><?php
                    echo htmlspecialchars(
                        $_POST['description'] ?? '',
                        ENT_QUOTES,
                        'UTF-8'
                    );
                ?></textarea>

            </div>


            <!-- =========================
                 WEBSITE URL
                 ========================= -->

            <div class="form-group">

                <label for="url">
                    Website URL
                </label>

                <input
                    type="url"
                    id="url"
                    name="url"
                    placeholder="https://example.com"
                    value="<?php
                        echo htmlspecialchars(
                            $_POST['url'] ?? '',
                            ENT_QUOTES,
                            'UTF-8'
                        );
                    ?>"
                    required
                >

            </div>


            <!-- =========================
                 SUBMIT BUTTON
                 ========================= -->

            <button
                type="submit"
                class="submit-button"
            >
                Submit Tool
            </button>

        </form>

    </main>


    <!-- =========================
         TOAST JAVASCRIPT
         ========================= -->

    <script>

        /* -------------------------
           CLOSE ERROR TOAST
           ------------------------- */

        function closeErrorToast()
        {
            const toast =
                document.getElementById(
                    "errorToast"
                );


            if (!toast) {
                return;
            }


            toast.classList.add("hide");


            setTimeout(
                () => {

                    toast.remove();

                },
                350
            );
        }


        /* -------------------------
           AUTO CLOSE ERROR TOAST
           ------------------------- */

        document.addEventListener(
            "DOMContentLoaded",
            () => {

                const toast =
                    document.getElementById(
                        "errorToast"
                    );


                if (!toast) {
                    return;
                }


                setTimeout(
                    () => {

                        closeErrorToast();

                    },
                    4500
                );

            }
        );

    </script>

</body>

</html>