<?php 

require_once 'db_connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM biglibrary WHERE id = $id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

// THIS (product.jpg) WILL NOT BE DELETED EVEN IF A PRODUCT WITH THE SAME IMAGE IS DELETED
if($product['image'] != "product.jpg"){ 
    unlink("pictures/{$product['image']}");
};

$sqlDelete = "DELETE FROM biglibrary WHERE id = $id"; 

// IF DELETED WILL BE CORRECT SHOW THIS MESSAGE
if(mysqli_query($conn, $sqlDelete)){  
    $class = "success";
    $message = "
    <div class='text-center text-success container-fluid'>
        <h1>Success! The {$product['title']} has been Deleted!</h1>
        <a class='btn btn-success' href='index.php'><i class='bi bi-chevron-double-left'></i>Back</a>
    </div>
    ";
}
 // OTHERWISE SHOW THIS MESSAGE
else { 
    $class = "danger";
    $message = "
    <div class='text-center text-success container-fluid'>
        <h1>Error! The {$product['title']} can't be Deleted!</h1>
        <a class='btn btn-danger' href='index.php'><i class='bi bi-chevron-double-left'></i>Back</a>
    </div>
    ";
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
    .alert{
        height: 100vh;
        
    }
</style>
<body>
    <!-- DELETE MESSAGE  -->
<div class="alert alert-<?= $class; ?>">
    <p><?= $message; ?></p>
    <!-- END  -->
</div>


</body>
</html>