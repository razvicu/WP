<?php

    include 'db_connection.php';

    $conn = openConnection();

    $id = $_GET['id'];

    $res = $conn->query("SELECT * FROM users WHERE id=$id") or die($conn->error);

    if ($res->num_rows != 0) {
        echo json_encode($res->fetch_array());
    }

?>