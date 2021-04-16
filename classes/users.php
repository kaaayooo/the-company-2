<?php

require_once "database.php";

class User extends Database {
  public function createUser($first_name,$last_name,$username,$password){
    $sql = "INSERT INTO `users` (`first_name`,`last_name`,`username`,`password`) VALUES ('$first_name','$last_name','$username','$password')";



    // execution 
    if($this->conn->query($sql)){
      header("location:../views");  //go to index.php of views folder
      exit;  //=die

    }else{
      die("error creating user: ".$this->conn->error);
      // error is a more generic error
      // connect_error is error in connection only

    }
  }
  

  public function getUsers(){
    $sql = "SELECT id,first_name,last_name,username FROM users";
    //  using SELECT always the RESULT

    if($result = $this->conn->query($sql)){
      return $result;
    }else{
      die("error retry users: ".$this->conn->error);
    }
  }

  public function getUser($user_id){
    $sql = "SELECT id,first_name,last_name,username FROM users WHERE id = $user_id";

    if($result = $this->conn->query($sql)){
      return $result->fetch_assoc();

      // expecting 1 row only
      // return an associative arry

    }else{
      die("error creating users: ".$this->conn->error);
    }
  }

      //homework
    public function login($username,$password){
      $sql = "SELECT id,username,`password` FROM users WHERE username='$username'";
      
      $result = $this->conn->query($sql);
      if($result->num_rows == 1){
        // ユーザーネイムがあるかチェック 
        $user_details = $result->fetch_assoc();
        
        if(password_verify($password, $user_details['password'])){

          // create session
          session_start();

          $_SESSION['user_id'] = $user_details['id'];
          $_SESSION['username'] = $user_details['username'];

          header("location: ../views/dashboard.php");
          exit;

          // echo "Correct username and password";
        }else{
          die ("password is incorrect");
        }

      }else{
        die("Username not found");
      }
    }


    public function updateUser($user_id,$first_name,$last_name,$username){
      $sql = "UPDATE users SET first_name = '$first_name',  last_name = '$last_name',username = '$username' WHERE id = '$user_id' ";

      if($this->conn->query($sql)){
        header("location: ../views/dashboard.php");
        exit;
      }else{
        die("error updating users: ".$this->conn->error);
      }
    } 
    
    public function deleteUser($user_id){
      $sql = "DELETE FROM users WHERE id = '$user_id'";

    if($this->conn->query($sql)){
      header("location: ../views/dashboard.php");
      exit;
    }else{
      die("error deleting users: ".$this->conn->error);
    }
    } 
    
    public function uploadPhoto($user_id,$image_name,$tmp_name){
      $sql = "UPDATE users SET photo = '$image_name' WHERE id = $user_id";

      if($this->conn->query($sql)){
        $destination = "../img/".basename($image_name);

        if(move_uploaded_file($tmp_name,$destination)){
          header("location: ../views/profile.php");
          exit;
        }

      }else{
        die("error uploading photo: ".$this->conn->error);
      }
    }

    public function getUserPhoto($user_id){
      $sql = "SELECT photo FROM users WHERE id = $user_id";

      if($result = $this->conn->query($sql)){
        return $result->fetch_assoc();
      }else{
        die("error retieving photo: ".$this->conn->error);
      }
    }
    

}



?>