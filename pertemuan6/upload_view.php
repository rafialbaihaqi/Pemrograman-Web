<!DOCTYPE html>
<html>
<body>
    <!-- form dan ecntype sebagai syarat untuk query upload  -->
    <!-- data akan dikirim ke upload process dengan method post -->
    <form action="upload_process.php" method="post" enctype="multipart/form-data">
        Pilih Gambar:
        <!-- untuk memasukkan gambar -->
        <input type="file" name="gambar_contoh" id="gambar_contoh">
        <input type="submit" name="submit">
    </form>
</body>
</html>