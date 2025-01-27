<?php
$koneksi = mysqli_connect("localhost","root","","multi_level");

//Login
if (isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST['psw'];
    $query = mysqli_query($koneksi,"SELECT * FROM user 
    WHERE username = '$username' AND password = '$password'");
    $cek = mysqli_num_rows($query);
    if ($cek > 0) {
        //kalau data ditemukan
        $ambildatarole= mysqli_fetch_array($query);
        $role = $ambildatarole['role'];
        if ($role == 'admin') {
            //kalau role admin
            $_SESSION['log'] = 'Logged';
            $_SESSION['role'] = 'Admin';
            header('location:admin');
        }else{
            //kalau bukan admin
            $_SESSION['log'] = 'Logged';
            $_SESSION['role'] = 'User';
            header('location:user');
        }
    }else{
        //kalau data tidak ditemukan
        echo "data tidak ditemukan";
    }
}
//perintah tambah buku
    if(isset($_POST['simpan'])){
        $judul = $_POST['judul'];
        $desc = $_POST['deskripsi'];
        $harga = $_POST['harga'];
        $stok =$_POST['stok'];
        $query = mysqli_query($koneksi,"INSERT INTO buku (judulbuku,deskripsi,harga,stok)
        values ('$judul','$desc','$harga','$stok')");
        if ($query){
                header ('location:../admin');
            }else{
                header ('location:../admin');
            }
    }
//perintah update buku
if(isset($_POST['update'])){
    $idbuku = $_POST['idbuku'];
    $judul = $_POST['judul'];
    $desc = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $update = mysqli_query($koneksi," UPDATE buku set judulbuku='$judul',
    deskripsi ='$desc', harga ='$harga', stok='$stok' WHERE idbuku ='$idbuku'");
    if ($update){
        header('location:../admin');
    }else{
        echo "Gagal Update";
    }
}
//perintah beli buku
if(isset($_POST['beli'])){
    //$idbeli =$_POST['idbeli'];
    $idbuku = $_POST['idbuku'];
    $judul = $_POST['judul'];
    $desc = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $beli = mysqli_query($koneksi,"INSERT INTO beli (idbuku,judulbuku,deskripsi,harga,jumlah)
    values ('$idbuku','$judul','$desc','$harga','$jumlah')");
    if ($beli){
        header('location:../user');
    }else{
        echo "Gagal Beli";
    }
}
?>