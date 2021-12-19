<?php 
    include "koneksi.php";
    include "create_message.php";
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    // untuk mempost data foto
    $foto = $_POST['foto'];

    // data mahasiswa id di cek terlebih dahulu
    if(isset($_POST['mahasiswa_id'])) {
        $sql = "UPDATE data
            SET nama='$nama', kelas='$kelas', alamat='$alamat', foto='$foto'
            WHERE id=".$_POST['mahasiswa_id'];
        $edit = $conn->query($sql);
        // if else untuk mengedit data 
        if($edit) {
            $conn->close();
            create_message('Ubah data berhasil', 'success', 'check');
            header("location:".$_SERVER['HTTP_REFERER']);
            exit();
        } else {
            $conn->close();
            create_message("Error: " . $sql . "<br>" . $conn->error,"danger","warning");
            header("location:".$_SERVER['HTTP_REFERER']);
            exit();
            }
        } else {
            $sql = "INSERT into data(nama, kelas, alamat, foto)
                    VALUES('$nama','$kelas','$alamat', '$foto')";
            $add = $conn->query($sql);
            
            if ($add){
                $conn->close();
                create_message('Simpan data berhasil','success','check');
                header("location:".$_SERVER['HTTP_REFERER']);
                exit();
            }else {
                $conn->close();
                create_message("Error: " . $sql . "<br>" . $conn->error,"danger","warning");
                header("location:".$_SERVER['HTTP_REFERER']);
                exit();
        }
    }
?>