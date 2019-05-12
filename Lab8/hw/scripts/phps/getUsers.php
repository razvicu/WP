<?php

    include 'db_connection.php';

    $conn = openConnection();

    if ( isset($_GET["name"]))
        $name = $_GET['name'];
    else 
        $name = "";

    $res = $conn->query("SELECT * FROM users WHERE name LIKE '%$name%'") or die($conn->error);

    if ($res->num_rows != 0) {
        echo json_encode($res->fetch_all());
    }

?>