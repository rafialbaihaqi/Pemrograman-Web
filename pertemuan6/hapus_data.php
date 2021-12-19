<?php
// untuk mengkoneksikan ke database 
    include "koneksi.php";
    include "create_message.php";
    //untuk mengahapus data yang datanya dari database mahasiswa_id
    $sql = "DELETE from data where id=".$_GET['mahasiswa_id'];
    
    //memvalidasi jika berhasil dihapus dan sebaliknya
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        create_message('Hapus data berhasil','success','check');
        header("location:index.php");
        exit();
    } else {    
        $conn->close();
        create_message("Error: " . $sql . "<br>" . $conn->error,"danger","warning");
        header("location:index.php");
        exit();
    }
?>