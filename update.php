<?php


require_once 'db_connect.php';
require_once 'file_upload.php';


$id = $_GET['id'];
$sql = "SELECT * FROM biglibrary WHERE id = $id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    $image = file_upload($_FILES['image']);
    $title = $_POST['title'];
    $ISBN = $_POST['ISBN'];
    $short_description = $_POST['short_description'];
    $type = $_POST['type'];
    $author_name = $_POST['author_name'];
    $publisher_name = $_POST['publisher_name'];
    $publisher_address = $_POST['publisher_address'];
    $publish_date = $_POST['publish_date'];

    if($image->error == 0){ 
        $sqlUpdate = "UPDATE `biglibrary` SET `image`='$image->fileName',`title`='$title',`ISBN`='$ISBN',`short_description`='$short_description',`type`='$type',`author_name`='$author_name',`publisher_name`='$publisher_name',`publisher_address`='$publisher_address',`publish_date`='$publish_date' WHERE id = $id";

        if($product['image'] == "product.jpg"){
            unlink("pictures/{$product['image']}");
        }
    } else {
        $sqlUpdate = "UPDATE `biglibrary` SET `title`='$title',`ISBN`='$ISBN',`short_description`='$short_description',`type`='$type',`author_name`='$author_name',`publisher_name`='$publisher_name',`publisher_address`='$publisher_address',`publish_date`='$publish_date' WHERE id = $id";
    }
    if(mysqli_query($conn, $sqlUpdate)){
        header("Location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <!-- FORM  -->
    <div class="container">

    <h1 class="text-center my-5">Update <?= $product['title']; ?></h1>

    <form method="POST" class="form-group" enctype="multipart/form-data">

    <label for="image">Image</label>
    <input type="file" name="image" class="form-control" id="image">

    <label for="title">Title</label>
    <input value="<?= $product['title']; ?>" type="text" name="title" class="form-control" placeholder="Name of Product" id="title">

    <label for="ISBN">ISBN</label>
    <input value="<?= $product['ISBN']; ?>" type="text" name="ISBN" class="form-control" placeholder="ISBN of Product" id="ISBN">

    <label for="short_description">Description</label>
    <input value="<?= $product['short_description']; ?>" type="text" name="short_description" class="form-control" placeholder="Description of Product" id="short_description">

    <label for="type">Type</label>
    <input value="<?= $product['type']; ?>" type="text" name="type" class="form-control" placeholder="Type of Product" id="type">

    <label for="author_name">Author</label>
    <input value="<?= $product['author_name']; ?>" type="text" name="author_name" class="form-control" placeholder="Author Name" id="author_name">

    <label for="publisher_name">Publisher Name</label>
    <input value="<?= $product['publisher_name']; ?>" type="text" name="publisher_name" class="form-control" placeholder="Publisher Name" id="publisher_name">

    <label for="publisher_address">Publisher Address</label>
    <input value="<?= $product['publisher_address']; ?>" type="text" name="publisher_address" class="form-control" placeholder="Publisher Address" id="publisher_address">

    <label for="publish_date">Publisher Date</label>
    <input value="<?= $product['publish_date']; ?>" type="date" name="publish_date" class="form-control" placeholder="Publish Date" id="publish_date">


    <input type="submit" value="Update Product" name="submit" class="btn btn-success">
    <a class="btn btn-primary" href="index.php"><i class="bi bi-chevron-double-left"></i>Back</a>
    </form>
    </div>
    <!-- END  -->
</body>
</html>