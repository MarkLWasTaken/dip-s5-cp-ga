<?php
$conn = new mysqli("localhost", "root", "", "e_waste_system");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>