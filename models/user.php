<?php

class User
{
    private $conn;


    /* =========================
       CONSTRUCTOR
       ========================= */

    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    /* =========================
       CHECK EMAIL EXISTS
       ========================= */

    public function emailExists($email)
    {
        $sql = "SELECT id
                FROM users
                WHERE email = ?
                LIMIT 1";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "s",
            $email
        );

        $stmt->execute();

        $result = $stmt->get_result();

        return $result->num_rows > 0;
    }


    /* =========================
       CREATE USER
       ========================= */

    public function createUser(
        $name,
        $email,
        $password
    ) {
        $sql = "INSERT INTO users
                (name, email, password)
                VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "sss",
            $name,
            $email,
            $password
        );

        return $stmt->execute();
    }


    /* =========================
       GET USER BY EMAIL
       ========================= */

    public function getUserByEmail($email)
    {
        $sql = "SELECT id, name, email, password
                FROM users
                WHERE email = ?
                LIMIT 1";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "s",
            $email
        );

        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }
}