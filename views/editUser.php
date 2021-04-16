<?php

include "../classes/users.php";

$user = new User;
$user_detail = $user->getUser($_GET['user_id']);

session_start();

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
<title>Edit User</title>
</head>
<body>

<!-- nav -->
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

<main class="container" style="padding-top:80px">
  <div class="card w-50 mx-auto border-0">
    <h2 class="text-center">Edit User</h2>
  </div>

  <div class="card-body">
  <form action="../actions/editUser.php" method="post">
        <input type="hidden" name="user_id" value="<?=$user_detail['id']  ?>">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control mb-2" value="<?=$user_detail['first_name']  ?>" required autofocus>

            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control mb-2" value="<?=$user_detail['last_name']  ?>" required>

            <label for="username"
             class="font-weight-bold">User Name</label>
            <input type="text" name="username" id="username" class="form-control mb-5 font-weight-bold" maxlength="15"  value="<?=$user_detail['username']  ?>" required>

            <div class="text-right">
              <button type="submit" class="btn btn-warning btn-sm btn-sm px-5">Save</button>
              <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
            </div>
  </form>
        </div>  
  </div>
</main>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>