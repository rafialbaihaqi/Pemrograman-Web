<?php 
//untuk menghubungkan ke database yang sudah disetting di koneksi.php
    include "koneksi.php";
    session_start();
    //array untuk pilihan kelas 
    $kelas = ['SE03A', 'SE03B'];
    $sql = "SELECT * FROM data";
    //koneksi ke database dengan query sql
    $data = $conn->query($sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- untuk preview image -->
    <script type="text/javascript">
        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
    <style>
        img {
            width: 250px
        }
    </style>
    
    <title>CRUD PHP</title>
  </head>
  <body>
   

    <div class="container">
        <h1 class="text-center mt-5 mb-5">Form Mahasiswa</h1>
        <div class="row"> 
            <div class="col-lg-6 mb-5">
                <h4>Input Data</h4>
                <?php include "read_message.php" ?></div>
                <!-- action untuk tujuan untuk menyimpan form setelah submit -->
                <form action="simpan.php" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" placeholder="Nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select name="kelas" class="form-control" required>
                            <option value="">Pilih</option>
                            <!-- perulangan for each untuk php -->
                            <?php foreach ($kelas as $kl):?> 
                                <option value="<?=$kl; ?>"><?=$kl;?></option>
                                <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" placeholder="Alamat" class="form-control" required>
                    </div>
                    <!-- untuk upload foto -->
                    <!-- form dan ecntype sebagai syarat untuk query upload  -->
                    <!-- data akan dikirim ke upload process dengan method post -->
                    <!-- form input gambar -->
                    <form action="simpan.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Foto</label>
                            <input type="file" name="foto" class="form-control-file" 
                            id="exampleFormControlFile1" accept="image/*" onchange="showPreview(event);" required>
                            <br><br>
                            <!-- untuk preview image-->
                            <div class="preview">
                                <img id="file-preview">
                            </div>
                        </div>
                    </form>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>  
                </form>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Data Mahasiswa</span>
                        </h4>
                    </div>
                    <!-- menghitung total data mahasiswa  -->
                    <div class="col-lg-6" style="text-align: right;">
                        <button type="button" class="btn btn-primary position-relative">
                            Total Data :
                                <?php
                                    if ($result = mysqli_query($conn, $sql)) {
                                        $rowcount = mysqli_num_rows($result);
                                        echo $rowcount;
                                    }
                                ?>
                        </button>
                    </div>
                </div>
            </div>
                
                <!-- menampilkan data melalui query sql  -->
            <?php foreach($data as $dt) : ?>
            <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                            
                                <h4><?=$dt ['nama'];?></h4>
                            </div>
                            <div class="col-md-6">
                                <!-- menambahkan hapus data dengan library font awesome -->
                                <a class="float-right ml-3 text-danger" href="hapus_data.php?mahasiswa_id=<?php 
                                echo $dt['id'] ?>" type="button" class="close">
                                    <span class="fa fa-trash"></span>
                                </a>
                                <!-- menambahkan edit data dengan library font awesome -->
                                <a class="float-right ml-3 text-success" href="update_form.php?mahasiswa_id=<?php echo
                                $dt['id']?>" type="button" class="close">
                                  <span class="fa fa-edit"></span>  
                                </a>

                                <p class="text-right"><?=$dt ['kelas']?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><?=$dt ['alamat'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

