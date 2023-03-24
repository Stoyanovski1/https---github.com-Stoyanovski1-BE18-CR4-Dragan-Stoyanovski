<?php

require_once 'db_connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM biglibrary WHERE id = $id";

$result = mysqli_query($conn, $sql);

$table = "";

if(mysqli_num_rows($result) > 0){ # WILL BE SHOWN ALL INFORMATIONS ABOUTH THE PRODUCT
    $product = mysqli_fetch_assoc($result);
        $table .= "
        <tr>
        <td class='td'><img class='img' src='pictures/{$product['image']}'></td>
        <td class='td'><p>{$product['title']}</p></td>
        <td class='td'><p>{$product['ISBN']}</p></td>
        <td class='td'><p>{$product['short_description']}</p></td>
        <td class='td'><p>{$product['type']}</p></td>
        <td class='td'><p>{$product['author_name']}</p></td>
        <td class='td'><p>{$product['publisher_name']}</p></td>
        <td class='td'><p>{$product['publisher_address']}</p></td>
        <td class='td'><p>{$product['publish_date']}</p></td>
        <td class='td'>
            <p>
            <a href='update.php?id={$product['id']}' class='btn btn-white text-warning'><i class='bi bi-pencil-square'></i></a>
            <a href='delete.php?id={$product['id']}' class='btn btn-white text-danger'><i class='bi bi-trash3'></i></a>
            </p>
            </td>
        </tr>
        ";
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    .img{
    width: 100px;
    height: 150px;
    border: 1.5px solid black;
    padding: 2px;
}
.btn{
    margin: 0;
    padding: 0 auto;
    text-align: center;
}
.td{
    border: 2px solid white;
    vertical-align: middle;
}
.td, p{
text-align: center;
}
</style>
<body>
    
<h1 class="text-center m-5">Details about <?= $product['title']; ?></h1>
<!-- DETAILS  -->
<div class="container-fluid">
<table class="table">
  <thead>
    <tr>
      <th scope="col" class="text-center">Image</th>
      <th scope="col" class="text-center">Title</th>
      <th scope="col" class="text-center">ISBN</th>
      <th scope="col" class="text-center">Description</th>
      <th scope="col" class="text-center">Type</th>
      <th scope="col" class="text-center">Author</th>
      <th scope="col" class="text-center">Publisher Name</th>
      <th scope="col" class="text-center">Publisher Address</th>
      <th scope="col" class="text-center">Publish Date</th>
    </tr>
  </thead>
  <tbody>
    <?= $table; ?>
  </tbody>
</table>
<a class="btn btn-success" href="index.php"><i class="bi bi-chevron-double-left"></i>Back</a>
</div>
<!-- END  -->
</body>
</html>