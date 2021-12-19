<?php
//untuk menagkap data yang sudah dikirim dari session read
    session_start();
    if(isset($_GET['process'])){
        if($_GET['process']=='hapus_semua_session'){
        session_start();
        //untuk mengaous seluruh data dari session
        session_destroy();
        //anchor link untuk redirect kesession 
        header("location:session_read.php");
        }
        elseif($_GET['process']=='hapus_session1'){
        session_start();
        // unset untuk mengahapus beberapa data dari session
        unset($_SESSION['session_tersimpan1']);
        header("location:session_read.php");
        }
        elseif($_GET['process']=='hapus_session2'){
        session_start();
        unset($_SESSION['session_tersimpan2']);
        header("location:session_read.php");
        } 
    } elseif(isset($_POST)){
        session_start();
        $_SESSION['session_tersimpan1'] = $_POST['kolom_input_session1'];
        $_SESSION['session_tersimpan2'] = $_POST['kolom_input_session2'];
        header("location:session_read.php");
    }
?>
