<?
include 'db_connection.php';

$conn = open();

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $uid = $_SESSION['id'];
    if ( $uid ) {
        $statement = $conn->prepare("DELETE FROM Content WHERE ID='$id' AND UserID='$uid'");
        $statement->execute();
    }
    header('location: ../index.php');
}