<?php

class Tool
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getToolById($id)
    {
        $sql = "SELECT * FROM tools WHERE id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }
    public function getAllTools()
{
    $sql = "SELECT * FROM tools ORDER BY id DESC";

    $result = $this->conn->query($sql);

    return $result->fetch_all(MYSQLI_ASSOC);
}
}