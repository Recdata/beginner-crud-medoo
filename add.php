<?php
include "db.php";


if (isset($_POST['send'])) {
    
    $taskName = $_POST['task'];
    $taskDesc = $_POST['desc'];
    $add = $database->insert('users',[
        'taskName'=> "$taskName",
        'taskDesc'=> "$taskDesc",

    ]);



// $query1 = "INSERT INTO users (taskName,taskDesc) VALUE ('$taskName','$taskDesc')";
// $result1 = mysqli_query($conn,$query1);


if ($add) {
    header('location:home');
}
}
mysqli_close($conn);
?>