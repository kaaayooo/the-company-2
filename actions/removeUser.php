<?php

include "../classes/users.php";

$user = new User;
$user->deleteUser($_GET['user_id']);



?>