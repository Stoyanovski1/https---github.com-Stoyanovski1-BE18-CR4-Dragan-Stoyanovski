<?php 

require_once 'db_connect.php';

$sql = "SELECT * FROM biglibrary";

$result = mysqli_query($conn, $sql);

$table = "";

if(mysqli_num_rows($result) > 0){ # IF YOU HAVE A RESULTS SHOW THIS MESSAGE
    while($product = mysqli_fetch_assoc($result)){
        $table .= "
        <tr>
            <td class='td'><img class='img' src='pictures/{$product["image"]}'></td>
            <td class='td'><p>{$product['title']}</p></td>
            <td class='td'><p>{$product['ISBN']}</p></td>
            <td class='td'><p>{$product['short_description']}</p></td>
            <td class='td'><p>{$product['type']}</p></td>
            <td class='td'><p>{$product['author_name']}</p></td>
            <td class='td'>
            <p>
            <a href='details.php?id={$product['id']}' class='btn btn-white text-success'><i class='bi bi-eye-fill'></i></a>
            <a href='update.php?id={$product['id']}' class='btn btn-white text-warning'><i class='bi bi-pencil-square'></i></a>
            <a href='delete.php?id={$product['id']}' class='btn btn-white text-danger'><i class='bi bi-trash3'></i></a>
            </p>
            </td>
            
        </tr>";
    } 
} else { # OTHERWISE SHOW THIS MESSAGE
    $table .= "<tr><td colspan='10' style='text-align:center;'><h1>No products available!</h1></td></tr>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Big Library</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
.logo{
    width: 50px;
    height: 50px;
    margin:0px 50px 0px 0px;
}
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
.icons{
  justify-content: center;
}
footer{
  background-color: black;
  color: white;
}
</style>
<body>
    
<!-- NAV  -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img class="logo" src="pictures/logo.jpg" alt="logo">
    <a class="navbar-brand" href="index.php">Big Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link active" href="create.php">Create</a>
      </div>
    </div>
  </div>
</nav>
<!-- END  -->



<!-- TABLE  -->
<div class="container mt-5">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col" class="text-center">Image</th>
      <th scope="col" class="text-center">Title</th>
      <th scope="col" class="text-center">ISBN</th>
      <th scope="col" class="text-center">Descripton</th>
      <th scope="col" class="text-center">Type</th>
      <th scope="col" class="text-center">Author</th>
      <!-- <th scope="col" class="text-center">Publisher Name</th>
      <th scope="col" class="text-center">Publisher Address</th>
      <th scope="col" class="text-center">Publish Date</th> -->
      <!-- <th scope="col">Details</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th> -->
    </tr>
  </thead>
  <tbody>
    <?= $table; ?>
  </tbody>
</table>
</div>
<!-- END  -->

<!-- Footer  -->
<footer>
  <!-- Icons  -->
  <div class="icons d-flex pt-2">

  <p class="mx-2"><i class="bi bi-instagram"></i></p>
  <p class="mx-2"><i class="bi bi-facebook"></i></p>
  <p class="mx-2"><i class="bi bi-github"></i></p>
  <p class="mx-2"><i class="bi bi-youtube"></i></p>
  <p class="mx-2"><i class="bi bi-linkedin"></i></p>

  <!-- End  -->
  </div>

  <!-- Form  -->
  <div class="form text-center">

    <label for="email">Sign in?</label>
    <input type="email" name="email" id="email">
    <button class="btn btn-primary mb-1">Subscreibe</button>

  </div>
  <!-- End  -->

  <!-- Copyright  -->
  <div>

  <p class="mb-0 pb-2">&copy Copyright by Dragan Stoyanovski</p>

  </div>
  <!-- End  -->

</footer>
<!-- End  -->
</body>
</html>