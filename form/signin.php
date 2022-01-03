<?php
session_start();
if(isset($_POST['user']) && isset($_POST['pass'])) {
    // username and password sent from form 
    
     $myuser = $_POST['user'];
     $mypassword = $_POST['pass'];

     include '../db_access.php';
     $load = mysqli_query($conn, "SELECT * FROM user WHERE (email = '".$myuser."' OR username = '".$myuser."') AND password='".$mypassword."'" );  
     $row = mysqli_fetch_array($load,MYSQLI_ASSOC);

     $count = mysqli_num_rows($load);
     if($count == 1) {
  
        $_SESSION['login_user'] = $row['username'];
        $_SESSION['login_id'] = $row['id'];
        $_SESSION['login_role'] = $row['role'];
        echo 'login berhasil';
        
        echo "<script>window.location.href = '../index.php';</script>";
     }else {
        $error = "Your Login Name or Password is invalid";
        echo $error;
     }

  
 }else{
     echo 'Data tidak lengkap';
     echo "<script>window.location.href = '../login.php';</script>";
   //   header("location: ../login.php");
   //   die();
 }
?>

