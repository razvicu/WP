<?php
    include 'db_connection.php';
    $conn = open();

    if (isset($_GET['id']))
        $id = $_GET['id'];
    else
        $id = 1;

    echo json_encode(getQuestions($id));

    function getQuestions($testid) {
        global $conn;
        try {
            $statement = $conn->prepare("SELECT * FROM Questions WHERE testId='$testid'");
            $statement->execute();

            $result = $statement->fetchAll();
            return $result;

        } catch (PDOException $e) {
            echo "Connection failed " . $e->getMessage();
        }
    }
