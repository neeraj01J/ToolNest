<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ToolNest - Digital Tool Directory</title>

    <!-- Global CSS -->
    <link rel="stylesheet" href="/ToolNest/css/global.css">

    <!-- Homepage CSS -->
    <link rel="stylesheet" href="/ToolNest/css/home.css?v=2">

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

            <a href="#">
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
         SUCCESS TOAST
         ========================= -->

    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>

        <div class="success-toast" id="successToast">

            <div class="toast-icon">
                ✓
            </div>

            <div class="toast-content">

                <strong>
                    Tool added successfully!
                </strong>

                <span>
                    Your tool is now available in ToolNest.
                </span>

            </div>

            <button
                type="button"
                class="toast-close"
                onclick="closeToast()"
                aria-label="Close notification"
            >
                ×
            </button>

            <div class="toast-progress"></div>

        </div>

    <?php endif; ?>


    <!-- =========================
         HERO SECTION
         ========================= -->

    <section class="hero">

        <div class="hero-content">

            <h1>
                Discover Useful Digital Tools
            </h1>

            <p>
                Find, explore and share useful digital tools
                all in one place.
            </p>


            <!-- =========================
                 SEARCH
                 ========================= -->

            <form
                action="index.php"
                method="GET"
                class="search-box"
            >

                <input
                    type="hidden"
                    name="page"
                    value="search"
                >

                <input
                    type="text"
                    name="q"
                    placeholder="Search for a tool..."
                    autocomplete="off"
                    value="<?php echo isset($keyword) ? htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8') : ''; ?>"
                >

                <button type="submit">
                    Search
                </button>

            </form>


            <!-- =========================
                 SHARE TOOL
                 ========================= -->

            <a
                href="index.php?page=add-tool"
                class="share-button"
            >
                + Share a Tool
            </a>

        </div>

    </section>


    <!-- =========================
         TOOLS SECTION
         ========================= -->

    <section class="tools-section">

        <?php if (isset($isSearch) && $isSearch): ?>

            <h2>
                Search Results for
                "<?php echo htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8'); ?>"
            </h2>

        <?php else: ?>

            <h2>
                Explore Tools
            </h2>

        <?php endif; ?>


        <!-- =========================
             TOOL GRID
             ========================= -->

        <div class="tool-grid">

            <?php if (empty($tools)): ?>

                <p>
                    No tools found for
                    "<?php echo htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8'); ?>"
                </p>

            <?php else: ?>

                <?php foreach ($tools as $tool): ?>

                    <div class="tool-card">

                        <h3>

                            <?php
                            echo htmlspecialchars(
                                $tool['name'],
                                ENT_QUOTES,
                                'UTF-8'
                            );
                            ?>

                        </h3>


                        <span class="tool-category">

                            <?php
                            echo htmlspecialchars(
                                $tool['category'],
                                ENT_QUOTES,
                                'UTF-8'
                            );
                            ?>

                        </span>


                        <p>

                            <?php
                            echo htmlspecialchars(
                                $tool['description'],
                                ENT_QUOTES,
                                'UTF-8'
                            );
                            ?>

                        </p>


                        <a
                            href="index.php?page=tool&id=<?php echo $tool['id']; ?>"
                        >
                            View Details →
                        </a>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

    </section>


    <!-- =========================
         FOOTER
         ========================= -->

    <footer>

        <p>
            © 2026 ToolNest. All rights reserved.
        </p>

    </footer>


    <!-- JavaScript -->

    <script src="/ToolNest/js/scripts.js"></script>

</body>

</html>