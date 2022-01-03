<?php

    include 'db_access.php';

    $lembab = $_GET['hum'];
    $berat = $_GET['weight'];
    $pompa = $_GET['pompa'];
    $waktu = $date->format('Y-m-d H:i:s');

    echo 'Kelembaban : '.$lembab.' %'. PHP_EOL;
    echo 'Berat : '.$berat. ' kg'. PHP_EOL;
    echo 'Pompa : '.$pompa. PHP_EOL;
    echo 'Waktu : '.$waktu; 

    $sql = "INSERT into data_sampah (kelembaban,berat,waktu, pompa) VALUES ('$lembab', '$berat', '$waktu', '$pompa')";

    if(!mysqli_query($conn, $sql)){
        echo "ERROR";
    }else{
        echo "BERHASIL";
    }

?>