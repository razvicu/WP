<?php
include 'db_connection.php';
$conn = open();

$statement = $conn->prepare("SELECT * FROM Content ORDER BY Date DESC LIMIT 4");
$statement->execute();

$result = $statement->fetchAll();
echo json_encode($result);