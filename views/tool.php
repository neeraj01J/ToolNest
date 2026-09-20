<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="/ToolNest/css/global.css">
    <link rel="stylesheet" href="/ToolNest/css/tool.css">
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
               <?php echo htmlspecialchars($tool['name'], ENT_QUOTES, 'UTF-8'); ?>
            </h1>

            <span class="tool-category">
                <?php echo htmlspecialchars($tool['category'], ENT_QUOTES, 'UTF-8'); ?>
            </span>

            <p>
          <?php echo nl2br(htmlspecialchars($tool['description'], ENT_QUOTES, 'UTF-8')); ?>            </p>

           <a
    href="<?php echo htmlspecialchars($tool['url'], ENT_QUOTES, 'UTF-8'); ?>"
    target="_blank"
    rel="noopener noreferrer"
    class="share-button"
>
    Visit Website →
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

       <a href="index.php" class="back-to-tools">
    ← Back to Tools
      </a>

    </main>

</body>

</html>