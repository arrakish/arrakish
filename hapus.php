<?php
require '../function.php';
//perintah hapus data
$judul = $_GET['judul'];
$hapus = mysqli_query($koneksi, "DELETE FROM buku WHERE judulbuku = '$judul'");
if ($hapus) {
    header ('location:../admin');
}else{
    echo "Gagal Hapus Data";
}
?>