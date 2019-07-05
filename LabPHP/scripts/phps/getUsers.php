<?php

    include 'db_connection.php';

    $conn = openConnection();

    $name = "";
    $filter = "name";

    if ( isset($_GET["name"]) )
        $name = $_GET['name'];

    if ( isset($_GET["filter"]) && !empty($_GET["filter"]))
        $filter = $_GET["filter"];
        

    $res = $conn->query("SELECT * FROM users WHERE " .$filter. " LIKE '%" .$name. "%'") or die($conn->error);

    if ($res->num_rows != 0) {
        echo json_encode($res->fetch_all());
    }

?>