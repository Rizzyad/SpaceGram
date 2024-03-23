<?php

function upload() {
    $status = 1;

    $nama_file = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];

    // jika tidak ada gambar yang diupload, akan dianggap error
    $error = $_FILES['foto']['error'];
    if ($error === 4) {
        $pesan = 'tidak ada yang diupload';
        $status = 0;
    }

    // mengecek ukuran
    $ukuran_file = $_FILES['foto']['size'];
    if ($ukuran_file > 500000) { // 500.000 Bytes = 0.5 MB
        $pesan = 'ukuran terlalu besar';
        $status = 0;
    }

    // mengecek ekstensi gambar yang diperbolehkan
    $ekstensi_valid = ["jpg","jpeg","png","gif"];
    // memisahkan nama file dengan ekstensinya,dengan pemisah tanda titik
    $ekstensi_gambar = explode('.', $nama_file);
    // mengambil ekstensi file-nya, mengubahnya jadi huruf kecil semua
    $ekstensi_gambar = strtolower(end($ekstensi_gambar));

    if (!in_array($ekstensi_gambar, $ekstensi_valid)) {
        $pesan = 'ekstensi tidak sesuai';
        $status = 0;
    }

    if ($status == 0) {
        echo "<script>alert('terjadi kesalahan : " . $pesan . " '); 
        document.location.href='index.php';</script>";
        exit();
    } else {
        $nama_file_baru = uniqid();
        $nama_file_baru .= '.'; 
        $nama_file_baru .= $ekstensi_gambar; 
        move_uploaded_file($tmp_name, 'images/' . $nama_file_baru);
        return $nama_file_baru;
    }
}
?>