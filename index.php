<?php
require '../function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tabel Harga Booking Trip</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-image: url("../../gambar/rakis.jpg"); /* Replace with your image path */
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 300vh;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .container {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    button[type="submit"],
    button[type="reset"] {
      width: 100%;
      padding: 10px 20px;
      margin-top: 10px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    button[type="submit"] {
      background-color: #3498db; /* Adjust submit button color */
      color: white;
    }

    button[type="reset"] {
      background-color: #e74c3c; /* Adjust reset button color */
      color: white;
    }

    /* Optional styling for form elements */
    input[type="text"]:focus,
    input[type="password"]:focus {
      outline: none;
      border-color: #3498db; /* Adjust focus border color */
    }

    .valid-feedback,
    .invalid-feedback {
      display: none; /* Hide feedback by default */
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="text-center">Tabel Data Open Trip</h2>
    <table class="table table-striped">
      <thead class="text-center">
        <tr>
          <th>No</th>
          <th>Tujuan Trip</th>
          <th>Deskripsi</th>
          <th>Harga Per orang</th>
          <th>Kuota</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php
      $sql = "SELECT * FROM buku order by idbuku desc";
      $query = mysqli_query($koneksi, $sql);
      $no = 0;
      while ($data = mysqli_fetch_array($query)) {
        $no++;
      ?>
      <tbody class="text-center">
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $data['judulbuku']; ?></td>
          <td><?php echo $data['deskripsi']; ?></td>
          <td>Rp<?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
          <td><?php echo $data['stok']; ?></td>
          <td>
            <a href="edit.php?judul=<?php echo $data['judulbuku']; ?>" class="btn btn-info">Edit</a>
            <a href="hapus.php?judul=<?php echo $data['judulbuku']; ?>" 
            class="btn btn-danger" 
            onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus</a>
          </td>
        </tr>
      </tbody>
      <?php
      }
      ?>
    </table>
    <a class="btn btn-info" href="../index.php">Logout</a>
    <h4 class="text-center">Tambah Data Open Trip</h4>
    <form method="post">
      <div class="form-group">
        <input type="text" name="judul" placeholder="Tujuan Trip" class="form-control">
        <input type="text" name="deskripsi" placeholder="Deskripsi" class="form-control">
        <input type="number" name="harga" placeholder="Harga Per orang" class="form-control">
        <input type="text" name="stok" placeholder="Kuota" class="form-control">
        <br>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <button type="reset" name="reset" class="btn btn-info">Batal</button>
      </div>
    </form>
  </div>
</body>
</html>