<?php 

require_once 'db_connect.php';
require_once 'file_upload.php';

if($_POST){
    $image = file_upload($_FILES['image']);
    $title = $_POST['title'];
    $ISBN = $_POST['ISBN'];
    $short_description = $_POST['short_description'];
    $type = $_POST['type'];
    $author_name = $_POST['author_name'];
    $publisher_name = $_POST['publisher_name'];
    $publisher_address = $_POST['publisher_address'];
    $publish_date = $_POST['publish_date'];

    // INSERT TO THE SQL 
    $sql = "INSERT INTO `biglibrary`(`image`, `title`, `ISBN`, `short_description`, `type`, `author_name`, `publisher_name`, `publisher_address`, `publish_date`) VALUES 
    ('$image->fileName', '$title', '$ISBN', '$short_description', '$type', '$author_name', '$publisher_name', '$publisher_address', '$publish_date')";
    // END 

    if(mysqli_query($conn, $sql)){ # IF IS TRUE, SHOW THIS MESSAGE
        $class = "success";
        $message = 
        "<div class='text-center'>
        
        <h1 class='text-success'>Success</h1>
        <a href='index.php' class='btn btn-success'>Back to Library</a>

        </div>"; 
    } else { # IF IS FALSE SHOW THIS MESSAGE
        $class = "danger";
        $message = 
        "<div class='text-center'>
        
        <h1 class='text-danger'>Error</h1>
        <a href='index.php' class='btn btn-danger'>Back to Library</a>

        </div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
.cont{
height: 100vh;

}
</style>
<body>
    <!-- ALERT  -->
    <div class="cont container-fluid alert alert-<?= $class; ?>">
        <p><?= $message; ?></p>
    </div>
    <!-- END  -->
</body>
</html>