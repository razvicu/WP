<?php
    include 'db_connection.php';
    $conn = open();
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        global $conn;
        $statement = $conn->prepare("SELECT id, Role FROM Users WHERE user = '$username' AND password = '$password'");
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_OBJ);

        if ($result > 0) {
            $_SESSION["username"] = $username;
            $_SESSION["creator"] = $result->Role;
            $_SESSION["id"] = $result->id;
            header('location: ../index.php');
        } else
            header('location: ../pages/login.php');
    }catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
