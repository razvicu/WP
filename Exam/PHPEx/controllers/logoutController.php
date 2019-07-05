<?php
    include 'db_connection.php';
    unset($_SESSION["username"]);
    header('location: ../pages/login.php');
