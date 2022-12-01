<?php include "db.php";
$basename = basename($_SERVER['PHP_SELF']);
$domain = str_replace("$basename","",$_SERVER['PHP_SELF']);

// $query = "SELECT * FROM users";
// $result = mysqli_query($conn,$query);
$a = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $domain?>css/style.css">
    <base href="<?php echo $domain?>">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center m-3">
                <h1>Beginner Crud App</h1>
</div>  
                 <br><br><hr>
<?php

$id = $_GET['id'];


// $up_query = "SELECT * FROM users WHERE id='$id'";
// $result = mysqli_query($conn,$up_query);
// $row = mysqli_fetch_array($result);



$datas = $database->select ("users", "*",
[
    'id'=>"$id"
]
    );
    // echo '<pre>';
    // print_r($datas);
    // exit();
if (isset($_POST['send'])) {
    $task = $_POST['task'];
    $desc = $_POST['desc'];
    $update = $database->update('users', [
    'taskName'=>"$task", 
    'taskDesc' => "$desc"
],['id'=>"$id"]);
    if ($update) {
        header('location:../home');
    }
}

?>
        <form  method="POST">
            <div class="form-group mb-3">
                <label >task name</label>
                <input type="text" class="form-control" value="<?php echo $datas[0]['taskName'];?>" name="task" required>
                <label >task description</label>
                <input type="text" class="form-control" name="desc" value="<?php echo $datas[0]['taskDesc'];?>" required>
            </div>
            <input type="submit" name='send' class="btn btn-success mt-1" value="Update">

        </form>
        

        </div>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>