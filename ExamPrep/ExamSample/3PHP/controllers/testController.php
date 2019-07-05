<?php
    include 'db_connection.php';
    $conn = open();

    if (isset($_GET["level"]))
        $level = $_GET["level"];
    else
        $level = 1;

    echo json_encode(getTestsByLevel($level));

    function getTestsByLevel($level = 1)
    {
        global $conn;
        try {
            $statement = $conn->prepare("SELECT * FROM Tests WHERE level='$level'");
            $statement->execute();

            $result = $statement->fetchAll();
            return $result;

        } catch (PDOException $e) {
            echo "Connection failed " . $e->getMessage();
        }
    }
