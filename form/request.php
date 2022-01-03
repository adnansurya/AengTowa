<?php

    include '../db_access.php';

    $last_id = $_GET['last'];
    $user_id = $_GET['user'];
    
    $waktu = $date->format('Y-m-d H:i:s');

    

    $sql = "INSERT into permintaan (last_report_id,user_id, status, petugas_id ,waktu) VALUES ('$last_id', '$user_id','BELUM SELESAI', 0 , '$waktu')";

    if(!mysqli_query($conn, $sql)){
        echo "ERROR";
    }else{
        echo "BERHASIL";
        // header("location: ../data.php");
        echo "<script> window.location.href = '../data.php'; </script>";
    }

?>