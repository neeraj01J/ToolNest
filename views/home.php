<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        ToolNest - Digital Tool Directory
    </title>


    <!-- =========================
         GLOBAL CSS
         ========================= -->

    <link
        rel="stylesheet"
        href="/ToolNest/css/global.css"
    >


    <!-- =========================
         HOMEPAGE CSS
         ========================= -->

    <link
        rel="stylesheet"
        href="/ToolNest/css/home.css?v=2"
    >

</head>


<body>


    <!-- =========================
         NAVBAR
         ========================= -->

    <nav class="navbar">

        <!-- LOGO -->

        <div class="logo">
            ToolNest
        </div>


        <!-- NAVIGATION LINKS -->

        <div class="nav-links">

            <!-- HOME -->

            <a href="index.php">
                Home
            </a>


            <!-- TOOLS -->

            <a href="#tools">
                Tools
            </a>


            <!-- ABOUT -->

            <a href="#">
                About
            </a>


            <!-- LOGIN -->

            <a href="#">
                Login
            </a>

        </div>

    </nav>


    <!-- =========================
         SUCCESS TOAST
         ========================= -->

    <?php if (
        isset($_GET['success'])
        && $_GET['success'] == 1
    ): ?>

        <div
            class="success-toast"
            id="successToast"
        >

            <!-- Toast Icon -->

            <div class="toast-icon">
                ✓
            </div>


            <!-- Toast Content -->

            <div class="toast-content">

                <strong>
                    Tool added successfully!
                </strong>

                <span>
                    Your tool is now available in ToolNest.
                </span>

            </div>


            <!-- Close Button -->

            <button
                type="button"
                class="toast-close"
                onclick="closeToast()"
                aria-label="Close notification"
            >
                ×
            </button>


            <!-- Progress Bar -->

            <div class="toast-progress"></div>

        </div>

    <?php endif; ?>


    <!-- =========================
         HERO SECTION
         ========================= -->

    <section class="hero">

        <div class="hero-content">


            <!-- HERO TITLE -->

            <h1>
                Discover Useful Digital Tools
            </h1>


            <!-- HERO DESCRIPTION -->

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

                <!-- Tell controller this is a search -->

                <input
                    type="hidden"
                    name="page"
                    value="search"
                >


                <!-- Search Input -->

                <input
                    type="text"
                    name="q"
                    placeholder="Search for a tool..."
                    autocomplete="off"
                    value="<?php
                        echo isset($keyword)
                            ? htmlspecialchars(
                                $keyword,
                                ENT_QUOTES,
                                'UTF-8'
                            )
                            : '';
                    ?>"
                >


                <!-- Search Button -->

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

    <section
        class="tools-section"
        id="tools"
    >


        <!-- =========================
             SECTION HEADING
             ========================= -->

        <?php if (
            isset($isSearch)
            && $isSearch
        ): ?>

            <h2>

                Search Results for

                "<?php
                echo htmlspecialchars(
                    $keyword,
                    ENT_QUOTES,
                    'UTF-8'
                );
                ?>"

            </h2>


        <?php elseif (
            isset($isCategoryFilter)
            && $isCategoryFilter
        ): ?>

            <h2>

                <?php
                echo htmlspecialchars(
                    $category,
                    ENT_QUOTES,
                    'UTF-8'
                );
                ?>

                Tools

            </h2>


        <?php else: ?>

            <h2>
                Explore Tools
            </h2>

        <?php endif; ?>


        <!-- =========================
             CATEGORY DROPDOWN
             ========================= -->

        <div class="category-filter">


            <!-- CATEGORY BUTTON -->

            <button
                type="button"
                class="category-button"
                id="categoryButton"
            >

                Categories

                <span class="category-arrow">
                    ▼
                </span>

            </button>


            <!-- CATEGORY MENU -->

            <div
                class="category-menu"
                id="categoryMenu"
            >


                <!-- ALL TOOLS -->

                <a
                    href="index.php"
                    class="category-menu-item"
                >
                    All Tools
                </a>


                <!-- DATABASE CATEGORIES -->

                <?php foreach (
                    $categories
                    as $categoryItem
                ): ?>

                    <a
                        href="index.php?page=category&category=<?php
                            echo urlencode(
                                $categoryItem['category']
                            );
                        ?>"
                        class="category-menu-item"
                    >

                        <?php

                        echo htmlspecialchars(
                            $categoryItem['category'],
                            ENT_QUOTES,
                            'UTF-8'
                        );

                        ?>

                    </a>

                <?php endforeach; ?>


            </div>

        </div>


        <!-- =========================
             TOOL GRID
             ========================= -->

        <div class="tool-grid">


            <!-- =========================
                 NO TOOLS AVAILABLE
                 ========================= -->

            <?php if (
                empty($tools)
            ): ?>


                <!-- SEARCH RESULT EMPTY -->

                <?php if (
                    isset($isSearch)
                    && $isSearch
                ): ?>

                    <p>

                        No tools found for

                        "<?php
                        echo htmlspecialchars(
                            $keyword,
                            ENT_QUOTES,
                            'UTF-8'
                        );
                        ?>"

                    </p>


                <!-- CATEGORY RESULT EMPTY -->

                <?php elseif (
                    isset($isCategoryFilter)
                    && $isCategoryFilter
                ): ?>

                    <p>

                        No tools found in the

                        "<?php
                        echo htmlspecialchars(
                            $category,
                            ENT_QUOTES,
                            'UTF-8'
                        );
                        ?>"

                        category.

                    </p>


                <!-- GENERAL EMPTY -->

                <?php else: ?>

                    <p>
                        No tools available.
                    </p>

                <?php endif; ?>


            <!-- =========================
                 DISPLAY TOOLS
                 ========================= -->

            <?php else: ?>


                <?php foreach (
                    $tools
                    as $tool
                ): ?>


                    <!-- TOOL CARD -->

                    <div class="tool-card">


                        <!-- TOOL NAME -->

                        <h3>

                            <?php

                            echo htmlspecialchars(
                                $tool['name'],
                                ENT_QUOTES,
                                'UTF-8'
                            );

                            ?>

                        </h3>


                        <!-- TOOL CATEGORY -->

                        <span class="tool-category">

                            <?php

                            echo htmlspecialchars(
                                $tool['category'],
                                ENT_QUOTES,
                                'UTF-8'
                            );

                            ?>

                        </span>


                        <!-- TOOL DESCRIPTION -->

                        <p>

                            <?php

                            echo htmlspecialchars(
                                $tool['description'],
                                ENT_QUOTES,
                                'UTF-8'
                            );

                            ?>

                        </p>


                        <!-- VIEW DETAILS -->

                        <a
                            href="index.php?page=tool&id=<?php
                                echo $tool['id'];
                            ?>"
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


    <!-- =========================
         JAVASCRIPT
         ========================= -->

    <script src="/ToolNest/js/scripts.js"></script>


</body>

</html>