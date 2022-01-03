<?php
session_start();  
include '../db_access.php';

if(($_SESSION['login_role'] == 'Admin')){    

    if(isset($_POST['nama']) && isset($_POST['email']) && isset($_POST['role'])
     && isset($_POST['username']) && isset($_POST['pass'])){
         
        $sql = "INSERT INTO user (username, password, nama,  email, role) 
        VALUES ('".$_POST['username']."','".$_POST['pass']."','".$_POST['nama']."',
        '".$_POST['email']."','".$_POST['role']."')";

       
        if(!mysqli_query($conn, $sql)){
            echo "ERROR";
        }else{
            echo "BERHASIL";
            // header("location: ../permintaan.php");
            echo "<script> window.location.href = '../user_list.php'; </script>";
        }       
     }

    

}else{
    echo 'Akses ditolak';
}
?>