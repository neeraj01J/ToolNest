<!DOCTYPE html>
<html>

<head>

    <title>Tool Details - ToolNest</title>

<link rel="stylesheet" href="css/style.css">
</head>

<body>

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


    <main class="tool-details">

        <?php if ($tool): ?>

            <h1>
                <?php echo $tool['name']; ?>
            </h1>

            <span class="tool-category">
                <?php echo $tool['category']; ?>
            </span>

            <p>
                <?php echo $tool['description']; ?>
            </p>

            <a
                href="<?php echo $tool['url']; ?>"
                target="_blank"
                class="share-button"
            >
                Open Tool →
            </a>

        <?php else: ?>

            <h1>
                Tool Not Found
            </h1>

            <p>
                The requested tool does not exist.
            </p>

        <?php endif; ?>

        <br><br>

        <a href="index.php">
            ← Back to Tools
        </a>

    </main>

</body>

</html>