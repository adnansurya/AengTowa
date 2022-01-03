<?php
session_start();  
include '../db_access.php';

if(($_SESSION['login_role'] == 'Admin')){    
  

    header('Content-Type: application/json');
    $input = filter_input_array(INPUT_POST);


    if ($input['action'] === 'edit') {    
        $sql = "UPDATE user SET nama='" . $input['nama'] . "', username='" . $input['username'] . "', email='" . $input['email'] . "', 
        password='" . $input['password'] . "', role='" . $input['role'] . "'
        WHERE id=" . $input['id_user'];
    } else if ($input['action'] === 'delete') {
        $sql = "DELETE from user WHERE id='" . $input['id'] . "'";
                
    } else{
        echo 'Action not Found';
    }

    if(!mysqli_query($conn, $sql)){
        echo "ERROR";
    }else{
        echo "BERHASIL";
        // header("location: ../permintaan.php");
        echo "<script> window.location.href = '../user_list.php'; </script>";
    }
    

}else{
    echo 'Akses ditolak';
}

?>