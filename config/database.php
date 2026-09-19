<?php

$host = "localhost";
$username = "root";
$password = "Neeraj@2006";
$database = "toolnest";

$conn = new mysqli(
    $host,
    $username,
    $password,
    $database
);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}