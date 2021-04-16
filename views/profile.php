<?php

include "../classes/users.php";

session_start();

$user = new User;
$user_photo = $user->getUserPhoto($_SESSION['user_id'])

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Title</title>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a href="dashboard.php" class="navbar-brand">
    <h1 class="h3">The Company</h1>
  </a>

  <div class="ml-auto">
    <ul class="navbar-nav">
      <li class="nav-item"> <a href="profile.php" class="nav-link"><?= $_SESSION['username'] ?></a></li>
      <li class="nav-item"> <a href="../actions/logout.php" class="nav-link text-danger">Logout</a></li>
    </ul>
  </div>
</nav>

<main class="card w-25 mx-auto my-5">
  <img src="../img/<?= $user_photo['photo'] ?>" alt="Profile Picture" class="card-img-top">
  <div class="card-body">
   <form enctype="multipart/form-data" action="../actions/uploadPhoto.php" method="post">
    <div class="custom-file mb-2">
      <label for="photo" class="custom-file-label">Choose Photo</label>
      <input type="file" name="photo" id="photo" class="custom-file-input">
    </div>
    <button type="submit" class="btn btn-outline-secondary btn-sm btn-block">Update</button>

  <!-- update the photo colum on the database -->
  <!-- move the photo inside thecompany img folder -->


   </form>
  </div>
</main>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>