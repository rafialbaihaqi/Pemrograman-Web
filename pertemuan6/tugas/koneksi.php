<?php
// fungsi koneksi untuk menghubungkan php dengan mysql
//sehingga dapat mengakses database 
    $host = "localhost";
    $user = "root";
    $pass = "";
    // sesuai dengan nama database yang dibuat 
    $dbname = "php_crud";
    //koneksi dengan parameter
    $conn = new mysqli($host,$user,$pass,$dbname);
    
    // kondisi untuk mengatasi koneksi gagal
    if ($conn->connect_error){
        die('Koneksi Gagal : '. $conn->connect_error);
    }
?>
