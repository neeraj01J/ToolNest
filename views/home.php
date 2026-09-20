<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToolNest - Digital Tool Directory</title>
 <link rel="stylesheet" href="/ToolNest/css/style.css">
</head>

<body>

<!-- Navbar -->
 <nav class="navbar">

    <div class="logo">
        ToolNest
    </div>

    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="#">Tools</a>
        <a href="#">About</a>
        <a href="#">Login</a>
    </div>

</nav>

        <!-- Hero Section -->

        <section class="hero">

    <div class="hero-content">

        <h1>Discover Useful Digital Tools</h1>

        <p>
            Find, explore and share useful digital tools
            all in one place.
        </p>

        <div class="search-box">

            <input
                type="text"
                placeholder="Search for a tool..."
            >

            <button>Search</button>

        </div>

        <a href="index.php?page=add-tool" class="share-button">
        + Share a Tool
        </a>

    </div>

</section>
        
        <!--Tools Section -->
     <section class="tools-section">

    <h2>Explore Tools</h2>

    <div class="tool-grid">

        <?php foreach ($tools as $tool): ?>

            <div class="tool-card">

                <h3>
                    <?php echo $tool['name']; ?>
                </h3>

                <span class="tool-category">
                    <?php echo $tool['category']; ?>
                </span>

                <p>
                    <?php echo $tool['description']; ?>
                </p>

                <a href="index.php?page=tool&id=<?php echo $tool['id']; ?>">
                    View Details →
                </a>

            </div>

        <?php endforeach; ?>

    </div>

</section>

     <!-- Footer -->
    <footer>

        <p>© 2026 ToolNest. All rights reserved.</p>

    </footer>


</body>
</html>