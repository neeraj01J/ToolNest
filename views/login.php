<?php

$emailValue = $_POST['email'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - ToolNest</title>

    <link rel="stylesheet" href="/ToolNest/css/global.css">
    <link rel="stylesheet" href="/ToolNest/css/auth.css">

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

            <a href="index.php?page=register">
                Register
            </a>

        </div>

    </nav>


    <!-- =========================
         ERROR MESSAGE
         ========================= -->

    <?php if (isset($error)): ?>

        <div class="auth-message auth-error" id="errorMessage">

            <div class="message-icon">
                ✕
            </div>

            <div class="message-content">
                <?php echo htmlspecialchars($error); ?>
            </div>

            <button
                type="button"
                class="message-close"
                onclick="closeMessage('errorMessage')"
            >
                ×
            </button>

        </div>

    <?php endif; ?>


    <!-- =========================
         LOGIN FORM
         ========================= -->

    <main class="auth-container">

        <div class="auth-card">

            <div class="auth-header">

                <span class="auth-label">
                    TOOLNEST
                </span>

                <h1>
                    Welcome back
                </h1>

                <p>
                    Login to your ToolNest account and continue exploring useful digital tools.
                </p>

            </div>


            <form
                action="index.php?page=login"
                method="POST"
                class="auth-form"
            >

                <!-- Email -->

                <div class="form-group">

                    <label for="email">
                        Email Address
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Enter your email"
                        value="<?php echo htmlspecialchars($emailValue, ENT_QUOTES, 'UTF-8'); ?>"
                        required
                    >

                </div>


                <!-- Password -->

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        required
                    >

                </div>


                <!-- Login Button -->

                <button
                    type="submit"
                    class="auth-button"
                >
                    Login
                </button>

            </form>


            <!-- Register Link -->

            <p class="auth-switch">

                Don't have an account?

                <a href="index.php?page=register">
                    Create Account
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
         MESSAGE SCRIPT
         ========================= -->

    <script>

        function closeMessage(messageId) {

            const message = document.getElementById(messageId);

            if (message) {
                message.classList.add("hide");

                setTimeout(() => {
                    message.remove();
                }, 300);
            }

        }


        document.addEventListener("DOMContentLoaded", () => {

            const messages = document.querySelectorAll(".auth-message");

            messages.forEach(message => {

                setTimeout(() => {

                    message.classList.add("hide");

                    setTimeout(() => {
                        message.remove();
                    }, 300);

                }, 5000);

            });

        });

    </script>

</body>
</html>