<?php
require '../function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pembelian Tiket Open Trip</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-image: url("../../gambar/raki.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 130vh;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .container {
      background-color: rgba(255, 255, 255, 0.3);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(250, 117, 0, 0.1);
      margin-bottom: 30px;
      width: 80%;
      max-width: 1000px;
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      font-size: 1.8rem;
    }

    .table {
      margin-top: 20px;
    }

    th, td {
      text-align: center;
      vertical-align: middle;
    }

    .btn {
      font-size: 0.9rem;
    }

    .logout-btn {
      position: fixed;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      padding: 10px 20px;
      background-color: #dc3545;
      color: white;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    .logout-btn:hover {
      background-color:rgb(0, 238, 255);
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Pembelian Tiket Open Trip</h2>
    <table class="table table-striped table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>No</th>
          <th>Tujuan Trip</th>
          <th>Deskripsi</th>
          <th>Harga Per Orang</th>
          <th>Kuota</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM buku ORDER BY idbuku DESC";
        $query = mysqli_query($koneksi, $sql);
        $no = 0;
        while ($data = mysqli_fetch_array($query)) {
            $no++;
        ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo htmlspecialchars($data['judulbuku']); ?></td>
          <td><?php echo htmlspecialchars($data['deskripsi']); ?></td>
          <td>Rp<?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
          <td><?php echo $data['stok']; ?></td>
          <td>
            <a href="beli.php?judul=<?php echo urlencode($data['judulbuku']); ?>" class="btn btn-info">Buy</a>
          </td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <div class="container">
    <h2>Riwayat Pembelian Tiket Open Trip</h2>
    <table class="table table-striped table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>No</th>
          <th>ID Pembelian</th>
          <th>Kuota</th>
          <th>Tujuan Trip</th>
          <th>Deskripsi</th>
          <th>Harga per Orang</th>
          <th>Jumlah Booking</th>
          <th>Total Harga</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM beli ORDER BY idbeli ASC";
        $query = mysqli_query($koneksi, $sql);
        $no = 0;
        while ($data = mysqli_fetch_array($query)) {
            $no++;
        ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo htmlspecialchars($data['idbeli']); ?></td>
          <td><?php echo htmlspecialchars($data['idbuku']); ?></td>
          <td><?php echo htmlspecialchars($data['judulbuku']); ?></td>
          <td><?php echo htmlspecialchars($data['deskripsi']); ?></td>
          <td>Rp<?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
          <td><?php echo $data['jumlah']; ?></td>
          <td>Rp<?php echo number_format($data['harga'] * $data['jumlah'], 0, ',', '.'); ?></td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <a class="logout-btn" href="../index.php">Logout</a>
</body>
</html>
