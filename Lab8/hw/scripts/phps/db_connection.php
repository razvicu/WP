<?php 

function openConnection() {
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = 'enterprise';

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName) or 
            die ("Connection failed: %s\n". $conn->error);

    return $conn;
}

function closeConnection($conn) {
    $conn->close();
}
?>