<?php

class Tool
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    /* =========================
       GET TOOL BY ID
       ========================= */

    public function getToolById($id)
    {
        $sql = "SELECT * FROM tools WHERE id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }


    /* =========================
       GET ALL TOOLS
       ========================= */

    public function getAllTools()
    {
        $sql = "SELECT * FROM tools ORDER BY id DESC";

        $result = $this->conn->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    /* =========================
       GET CATEGORIES
       ========================= */

    public function getCategories()
    {
        $sql = "SELECT DISTINCT category
                FROM tools
                WHERE category != ''
                ORDER BY category ASC";

        $result = $this->conn->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    /* =========================
       ADD TOOL
       ========================= */

    public function addTool($name, $category, $description, $url)
    {
        $sql = "INSERT INTO tools (name, category, description, url)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "ssss",
            $name,
            $category,
            $description,
            $url
        );

        return $stmt->execute();
    }


    /* =========================
       SEARCH TOOLS
       ========================= */

    public function searchTools($keyword)
    {
        $sql = "SELECT * FROM tools
                WHERE name LIKE ?
                   OR category LIKE ?
                   OR description LIKE ?
                ORDER BY id DESC";

        $stmt = $this->conn->prepare($sql);

        $searchKeyword = "%" . $keyword . "%";

        $stmt->bind_param(
            "sss",
            $searchKeyword,
            $searchKeyword,
            $searchKeyword
        );

        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    /* =========================
       FILTER TOOLS BY CATEGORY
       ========================= */

    public function getToolsByCategory($category)
    {
        $sql = "SELECT * FROM tools
                WHERE category = ?
                ORDER BY id DESC";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "s",
            $category
        );

        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}