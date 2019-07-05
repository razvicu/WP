<?php
include 'db_connection.php';
$conn = open();
$username = $_SESSION["username"];
$date = time();

try {
    global $conn;
    $statement = $conn->prepare("SELECT id FROM Users WHERE user = '$username' ");
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_OBJ);
    if ($result > 0) {
        $id = $result->id;
        $array = $_POST['array'];

        print_r($array);

        for ($i = 0; $i < count($array[0]); ++$i) {
            $title = $array[0][$i];
            $description = $array[1][$i];
            $url = $array[2][$i];
            $statement = $conn->prepare("INSERT INTO Content(Date, Title, Description, URL, UserID) VALUES 
            (?, ?, ?, ?, ?)");
            $statement->execute([$date, $title, $description, $url, $id]);

        }

        header('location: ../index.php');
    }



}catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
