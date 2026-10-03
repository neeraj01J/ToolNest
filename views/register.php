<?php

$nameValue = $_POST['name'] ?? '';
$emailValue = $_POST['email'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Create Account - ToolNest
    </title>


    <!-- =========================
         GLOBAL CSS
         ========================= -->

    <link
        rel="stylesheet"
        href="/ToolNest/css/global.css"
    >


    <!-- =========================
         AUTH CSS
         ========================= -->

    <link
        rel="stylesheet"
        href="/ToolNest/css/auth.css"
    >

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

            <a href="index.php#tools">
                Tools
            </a>

            <a href="index.php?page=about">
                About
            </a>

            <a href="index.php?page=login">
                Login
            </a>

        </div>

    </nav>


    <!-- =========================
         SUCCESS MESSAGE
         ========================= -->

    <?php if (
        isset($_GET['success'])
        && $_GET['success'] == 1
    ): ?>

        <div
            class="auth-message auth-success"
            id="successMessage"
        >

            <div class="message-icon">
                ✓
            </div>


            <div class="message-content">

                <strong>
                    Account created successfully!
                </strong>

                <span>
                    Your ToolNest account is ready.
                </span>

            </div>


            <button
                type="button"
                class="message-close"
                onclick="closeMessage('successMessage')"
                aria-label="Close notification"
            >
                ×
            </button>

        </div>

    <?php endif; ?>


    <!-- =========================
         ERROR MESSAGE
         ========================= -->

    <?php if (isset($error)): ?>

        <div
            class="auth-message auth-error"
            id="errorMessage"
        >

            <div class="message-icon">
                !
            </div>


            <div class="message-content">

                <strong>
                    Registration failed
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


            <button
                type="button"
                class="message-close"
                onclick="closeMessage('errorMessage')"
                aria-label="Close notification"
            >
                ×
            </button>

        </div>

    <?php endif; ?>


    <!-- =========================
         REGISTER CONTAINER
         ========================= -->

    <main class="auth-container">


        <!-- =========================
             REGISTER CARD
             ========================= -->

        <div class="auth-card">


            <!-- =========================
                 HEADER
                 ========================= -->

            <div class="auth-header">

                <span class="auth-label">
                    TOOLNEST
                </span>


                <h1>
                    Create an account
                </h1>


                <p>
                    Join ToolNest and start discovering
                    useful digital tools.
                </p>

            </div>


            <!-- =========================
                 REGISTER FORM
                 ========================= -->

            <form
                action="index.php?page=register"
                method="POST"
                class="auth-form"
            >


                <!-- =========================
                     NAME
                     ========================= -->

                <div class="form-group">

                    <label for="name">
                        Full Name
                    </label>


                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Enter your name"
                        autocomplete="name"
                        value="<?php
                            echo htmlspecialchars(
                                $nameValue,
                                ENT_QUOTES,
                                'UTF-8'
                            );
                        ?>"
                        required
                    >

                </div>


                <!-- =========================
                     EMAIL
                     ========================= -->

                <div class="form-group">

                    <label for="email">
                        Email Address
                    </label>


                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Enter your email"
                        autocomplete="email"
                        value="<?php
                            echo htmlspecialchars(
                                $emailValue,
                                ENT_QUOTES,
                                'UTF-8'
                            );
                        ?>"
                        required
                    >

                </div>


                <!-- =========================
                     PASSWORD
                     ========================= -->

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>


                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Create a password"
                        autocomplete="new-password"
                        required
                    >

                </div>


                <!-- =========================
                     SUBMIT
                     ========================= -->

                <button
                    type="submit"
                    class="auth-button"
                >
                    Create Account
                </button>

            </form>


            <!-- =========================
                 LOGIN LINK
                 ========================= -->

            <p class="auth-switch">

                Already have an account?

                <a href="index.php?page=login">
                    Login
                </a>

            </p>


        </div>

    </main>


    <!-- =========================
         FOOTER
         ========================= -->

    <footer>

        <p>
            © 2026 ToolNest. All rights reserved.
        </p>

    </footer>


    <!-- =========================
         MESSAGE JAVASCRIPT
         ========================= -->

    <script>

        function closeMessage(messageId)
        {
            const message =
                document.getElementById(messageId);


            if (!message) {
                return;
            }


            message.classList.add("hide");


            setTimeout(
                () => {

                    message.remove();

                },
                300
            );
        }


        /* -------------------------
           AUTO CLOSE
           ------------------------- */

        document.addEventListener(
            "DOMContentLoaded",
            () => {

                const successMessage =
                    document.getElementById(
                        "successMessage"
                    );


                const errorMessage =
                    document.getElementById(
                        "errorMessage"
                    );


                if (successMessage) {

                    setTimeout(
                        () => {

                            closeMessage(
                                "successMessage"
                            );

                        },
                        4500
                    );

                }


                if (errorMessage) {

                    setTimeout(
                        () => {

                            closeMessage(
                                "errorMessage"
                            );

                        },
                        5000
                    );

                }

            }
        );

    </script>


</body>

</html>