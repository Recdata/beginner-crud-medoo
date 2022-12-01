<?php
use Medoo\Medoo;
include "vendor/autoload.php";

$conn = mysqli_connect('localhost','root','','travel_users');

 
// Connect the database.
$database = new Medoo([
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 'travel_users',
    'username' => 'root',
    'password' => ''
]);


    // echo '<pre>';
    // print_r($datas);
    // exit();
    
    
    
    
// $update = $database->update('users', [
//     'taskName'=>"$task", 'taskDesc' => "$desc"
// ],['id'=>"$id"]);

// $select = $database-> select('account',[
    
// ])

?>