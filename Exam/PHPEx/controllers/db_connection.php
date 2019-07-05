<?php
    session_start();
    $serverName = "127.0.0.1"; // can't use 'localhost' on Unix
    $username = "root";
    $password = "";

    function open()
    {
        global $serverName, $username, $password;
        try {
            global $conn;
            $conn = new PDO("mysql:host=$serverName;dbname=examdb", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }