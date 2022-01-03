<?php

    include '../db_access.php';

    $angkut_id = $_GET['id'];
    $petugas_id = $_GET['petugas'];
  

    $sql = "UPDATE permintaan SET petugas_id=".$petugas_id.", status='SELESAI' WHERE id=".$angkut_id ;

    if(!mysqli_query($conn, $sql)){
        echo "ERROR";
    }else{
        echo "BERHASIL";
        // header("location: ../permintaan.php");
        echo "<script> window.location.href = '../permintaan.php'; </script>";
    }

?>