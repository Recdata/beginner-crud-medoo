<?php include "db.php";
// $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
// echo $uriSegments[1]; 
// echo $uriSegments[2];


$basename = basename($_SERVER['PHP_SELF']);
$domain = str_replace("$basename","",$_SERVER['PHP_SELF']);
$limit = 3;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$offset = ($page - 1) * $limit;


$lim = $database->select('users','*',[
    "LIMIT"=>["$offset","$limit"]
]);



// $query = "SELECT * FROM users LIMIT $offset,$limit";
// $result = mysqli_query($conn, $query);
//$a = 0;



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
            <div class="col-md-10">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Task</button>
                <!-- <button class="btn btn-default float-end">Print</button> -->
            </div> <br><br>
            <hr>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="add" method="POST">
                                <div class="form-group mb-3">
                                    <label>task name</label>
                                    <input type="text" class="form-control" name="task" required>
                                    <label>task description</label>
                                    <input type="text" class="form-control" name="desc" required>
                                </div>
                                <input type="submit" name='send' class="btn btn-success mt-1" value="Save">

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- table -->
            <div class="col-md-10 col-md-offset-1  m-3">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Task Name</th>
                            <th scope="col">Task Description</th>
                            <th colspan="2">OPERATIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            foreach($lim as $row) {

                            ?>
                                <th scope="row"><?php echo $row['id'] ?></th>
                                <td><?php echo $row['taskName'] ?></td>
                                <td class="col-md-10"><?php echo $row['taskDesc'] ?></td>
                                <td><a href="update/<?php echo $row['id'] ?>" class=" btn btn-primary">edit</a></td>
                                <td><a href="delete?id=<?php echo $row['id'] ?>" class="btn btn-danger">delete</a></td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
                <?php
                $sel = $database->select('users',"*",[]);



                // $sql = "SELECT * FROM users";
                // $result1 = mysqli_query($conn, $sql) or die('query failed');


                if ($sel) {


                    //$total_records = mysqli_num_rows($result1);


                    
                    $total_records = $database->count("users");

                    $total_pages = ceil($total_records / $limit); ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">

                            <?php for ($i = 1; $i <= $total_pages; $i++) {
                                if ($i == $page) {
                                    $active = 'active';
                                } else {
                                    $active = '';
                                }
                            ?>
                                <li class="page-item <?php echo $active ?>"> <a class="page-link" href="home/page/<?php echo $i; ?>"><?php echo $i; ?></a> </li> <?php
                                                                                                                                                                } ?>
                        </ul>
                    </nav>
                <?php
                }

                ?>
            </div>
        </div>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>