<?php
// untuk menunjukkan ke directory file yang digunakan untuk menyimpan gambar yang ingin di uploads
    $target_dir = "uploads/";
    // menggunakan session file sesuai dengan inputan pada upload_view
    $target_file = $target_dir . basename($_FILES["gambar_contoh"]["name"]);
    //  untuk penyimpanan sementara ketika terjadi kesalahan
    $error = false;
    // strlower untuk mengecilkan ukuran file pathinfo extension untuk mengambil ekstensi dari file
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // untuk memvalidasi apakah variabel $_POST[‘submit’] sudah ada atau belum
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["gambar_contoh"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . "."; 
            $error = false; 
        } else {
            echo "File is not an image."; 
            $error = false; 
        } 
    }
    // untuk memvalidasi apakah sudah terdapat file dengan nama yang sama atau tidak di folder uploads
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $error = true; 
    }
    // untuk memvalidasi apakah ukuran file lebih dari 500kb
    if ($_FILES["gambar_contoh"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $error = true; 
    }
    // untuk memvalidasi ekstensi file yang akan diupload bukan jpg/png/jpeg/gif 
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $error = true; 
    }
    // validasi untuk memastikan apakah upload berhasil, jika ya maka munculkan pesan upload berhasil juga sebaliknya
    if ($error == true) {
        echo "Sorry, your file was not uploaded."; 
    } else {
        if (move_uploaded_file($_FILES["gambar_contoh"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["gambar_contoh"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file."; 
        } 
    }
?>