<?php
    include 'db_connection.php';

    $conn = open();

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $statement = $conn->prepare("SELECT * FROM Users WHERE ID='$id'");
        $statement->execute();

        $result = $statement->fetch();
        echo json_encode($result);
    }