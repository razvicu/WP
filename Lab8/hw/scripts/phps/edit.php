<?php 
    include 'db_connection.php';

    $conn = openConnection();

    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $age = $_POST['age'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $webpage = $_POST['webpage'];

        $conn->query("UPDATE users SET name = '$name', username = '$username',
        password = '$password', age = '$age', role = '$role',
        email = '$email', webpage = '$webpage' WHERE id='$id'") 
        or die($conn->error());

        $_SESSION['message'] = "User has been updated";
        $_SESSION['alert'] = 'warning';

        header('location: ../../index2.php');
    }

?>