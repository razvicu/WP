<?php 
    include 'db_connection.php';

    $conn = openConnection();

    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $age = $_POST['age'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $webpage = $_POST['webpage'];

        $conn->query("INSERT INTO users(name, username, password,
                                        age, role, email, webpage) 
                      VALUES ('$name', '$username', '$password', 
                      '$age', '$role', '$email', '$webpage')") 
                      or die ($conn->error);

        $_SESSION['message'] = "User has been saved";
        $_SESSION['alert'] = "success";

        header("location: ../../index.php");
    }



?>