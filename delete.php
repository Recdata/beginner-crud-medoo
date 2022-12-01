<?php
include "db.php";
$id = $_GET['id'];
$del = $database->delete('users',[
    'id'=>"$id"
]);



//$query = "DELETE FROM users WHERE id='$id'";



if ($del) {
    header("location:home?message=delete");
} else {
    echo "Error deleting record: " . mysqli_error($conn,$query);
}

$conn->close();
?>