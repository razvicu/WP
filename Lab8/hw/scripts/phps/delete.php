<?php 
    include 'db_connection.php';

    $conn = openConnection();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $conn->query("DELETE FROM users WHERE id=$id") or die($conn->error());
    
        $_SESSION['message'] = "User has been deleted";
        $_SESSION['alert'] = "danger";

        header("location: ../../index2.php");
    }
?>