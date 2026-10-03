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


        <!-- NAVIGATION -->

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

            <a href="index.php?page=about">
                About
            </a>


            <!-- =========================
                 AUTHENTICATION
                 ========================= -->

            <?php if (isset($_SESSION['user_id'])): ?>


                <!-- PROFILE -->

                <div class="profile-wrapper">


                    <button
                        type="button"
                        class="profile-button"
                        id="profileButton"
                        aria-label="Open profile menu"
                        aria-expanded="false"
                    >

                        <span class="profile-avatar">

                            <?php

                            echo strtoupper(
                                substr(
                                    $_SESSION['user_name'],
                                    0,
                                    1
                                )
                            );

                            ?>

                        </span>


                        <span class="profile-name">

                            <?php

                            echo htmlspecialchars(
                                $_SESSION['user_name'],
                                ENT_QUOTES,
                                'UTF-8'
                            );

                            ?>

                        </span>


                        <span class="profile-arrow">
                            ▾
                        </span>

                    </button>


                    <!-- PROFILE DROPDOWN -->

                    <div
                        class="profile-dropdown"
                        id="profileDropdown"
                    >


                        <!-- USER INFORMATION -->

                        <div class="profile-info">


                            <div class="dropdown-avatar">

                                <?php

                                echo strtoupper(
                                    substr(
                                        $_SESSION['user_name'],
                                        0,
                                        1
                                    )
                                );

                                ?>

                            </div>


                            <div>

                                <strong>

                                    <?php

                                    echo htmlspecialchars(
                                        $_SESSION['user_name'],
                                        ENT_QUOTES,
                                        'UTF-8'
                                    );

                                    ?>

                                </strong>


                                <span>

                                    <?php

                                    echo htmlspecialchars(
                                        $_SESSION['user_email'],
                                        ENT_QUOTES,
                                        'UTF-8'
                                    );

                                    ?>

                                </span>

                            </div>

                        </div>


                        <!-- DIVIDER -->

                        <div class="dropdown-divider"></div>


                        <!-- LOGOUT -->

                        <a
                            href="index.php?page=logout"
                            class="logout-link"
                        >

                            <span>
                                ↪
                            </span>

                            Logout

                        </a>

                    </div>

                </div>


            <?php else: ?>


                <!-- LOGIN -->

                <a href="index.php?page=login">
                    Login
                </a>


            <?php endif; ?>


        </div>

    </nav>


<!-- =========================
     SUCCESS TOAST
     ========================= -->

<?php

$showToolSuccess =
    isset($_GET['success']) &&
    $_GET['success'] == 1;

$showLogoutSuccess =
    isset($_GET['logout']) &&
    $_GET['logout'] === 'success';

?>

<?php if ($showToolSuccess || $showLogoutSuccess): ?>

    <div
        class="success-toast"
        id="successToast"
    >

        <div class="toast-icon">
            ✓
        </div>


        <div class="toast-content">

            <strong>

                <?php if ($showLogoutSuccess): ?>

                    Logged out successfully!

                <?php else: ?>

                    Tool added successfully!

                <?php endif; ?>

            </strong>


            <span>

                <?php if ($showLogoutSuccess): ?>

                    You have been safely logged out of ToolNest.

                <?php else: ?>

                    Your tool is now available in ToolNest.

                <?php endif; ?>

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
             CATEGORY FILTER
             ========================= -->

        <div class="category-filter">


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


            <?php if (
                empty($tools)
            ): ?>


                <!-- SEARCH EMPTY -->

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



                <!-- CATEGORY EMPTY -->

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


            <?php else: ?>


                <!-- =========================
                     TOOL CARDS
                     ========================= -->

                <?php foreach (
                    $tools
                    as $tool
                ): ?>


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