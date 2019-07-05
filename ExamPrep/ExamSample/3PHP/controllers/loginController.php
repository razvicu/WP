<?php
    include 'db_connection.php';
    $conn = open();
    $username = $_POST['username'];
    $password = $_POST['password'];
    print_r($_SESSION["username"]);

    try {
        global $conn;
        $statement = $conn->prepare("SELECT id FROM Users WHERE user = '$username' AND password = '$password'");
        $statement->execute();

        if ($statement->fetchColumn() > 0) {
            $_SESSION["username"] = $username;
            header('location: ../index.php');
        } else
            header('location: ../pages/login.php');
    }catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
