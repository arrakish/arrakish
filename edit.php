<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Data Bahan Bakar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-image: url("../../gambar/rk.jpg"); /* Replace with your image URL */
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }
    .form-container {
      background: rgba(255, 255, 255, 0.7);
      padding: 20px;
      border-radius: 10px;
      margin-top: 50px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .form-group input {
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <h4 class="text-center text-white mt-4">Update Data Open Trip</h4>

  <div class="container d-flex justify-content-center">
    <?php
    require '../function.php';
    $judul = $_GET['judul'];
    $data = mysqli_query($koneksi, "SELECT * FROM buku WHERE judulbuku = '$judul'");
    while ($row = mysqli_fetch_array($data)) {
    ?>
    <div class="form-container">
      <form method="post">
        <input type="hidden" name="idbuku" value="<?php echo $row['idbuku']; ?>" class="form-control">

        <div class="form-group">
          <label for="judul">Tujuan Trip</label>
          <input type="text" id="judul" name="judul" value="<?php echo $row['judulbuku']; ?>" class="form-control">
        </div>

        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <input type="text" id="deskripsi" name="deskripsi" value="<?php echo $row['deskripsi']; ?>" class="form-control">
        </div>

        <div class="form-group">
          <label for="harga">Harga Per Orang</label>
          <input type="text" id="harga" name="harga" value="<?php echo $row['harga']; ?>" class="form-control">
        </div>

        <div class="form-group">
          <label for="stok">Kuota</label>
          <input type="text" id="stok" name="stok" value="<?php echo $row['stok']; ?>" class="form-control">
        </div>

        <div class="form-group text-center">
          <button type="submit" name="update" class="btn btn-primary">Update</button>
          <button type="reset" class="btn btn-info">Reset</button>
        </div>
      </form>
    </div>
    <?php
    }
    ?>
  </div>
</body>
</html>
