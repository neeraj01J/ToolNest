
<!DOCTYPE html>
<html>

<head>

    <title>Add a Tool - ToolNest</title>

    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/add-tool.css">
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


    <main class="add-tool-container">

        <h1>Share a Tool</h1>

        <p class="form-intro">
            Help others discover useful digital tools.
        </p>


        <form action="index.php?page=add-tool" method="POST">

            <div class="form-group">

                <label for="name">
                    Tool Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Enter tool name"
                    required
                >

            </div>


            <div class="form-group">

                <label for="category">
                    Category
                </label>

                <input
                    type="text"
                    id="category"
                    name="category"
                    placeholder="Example: AI, Design, Productivity"
                    required
                >

            </div>


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
                ></textarea>

            </div>


            <div class="form-group">

                <label for="url">
                    Website URL
                </label>

                <input
                    type="url"
                    id="url"
                    name="url"
                    placeholder="https://example.com"
                    required
                >

            </div>


            <button type="submit" class="submit-button">
                Submit Tool
            </button>

        </form>

    </main>

</body>

</html>