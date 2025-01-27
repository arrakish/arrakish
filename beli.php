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
      background-image: url("../../gambar/mm.jpg");
      background-size: cover;
      background-attachment: fixed;
      background-position: center;
    }
    .form-container {
      background-color: rgba(255, 255, 255, 0.4);
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>
<body>

<h4 class="text-center mt-4">Pembelian Tiket Open Trip</h4>

<div class="container mt-4">
<?php
require '../function.php';

// Mengambil data dari parameter URL
$judul = isset($_GET['judul']) ? $_GET['judul'] : '';

// Menyiapkan query untuk mendapatkan data buku
$query = $koneksi->prepare("SELECT * FROM buku WHERE judulbuku = ?");
$query->bind_param('s', $judul);
$query->execute();
$result = $query->get_result();

// Mengecek apakah data ditemukan
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
?>

  <div class="form-container mx-auto" style="width: 50%;">
    <form method="post">
      <div class="form-group text-center">
        <input type="hidden" name="idbeli" class="form-control">
        <input type="hidden" name="idbuku" value="<?php echo htmlspecialchars($row['idbuku']); ?>" class="form-control">

        <label for="judul">Tujuan Trip</label>
        <input type="text" id="judul" name="judul" value="<?php echo htmlspecialchars($row['judulbuku']); ?>" class="form-control" readonly>

        <label for="deskripsi" class="mt-3">Deskripsi</label>
        <input type="text" id="deskripsi" name="deskripsi" value="<?php echo htmlspecialchars($row['deskripsi']); ?>" class="form-control" readonly>

        <label for="harga" class="mt-3">Harga Per Orang</label>
        <input type="text" id="harga" name="harga" value="<?php echo htmlspecialchars($row['harga']); ?>" class="form-control" readonly>

        <label for="jumlah" class="mt-3">Jumlah Pembelian</label>
        <input type="number" id="jumlah" name="jumlah" placeholder="Jumlah Pembelian" class="form-control" required>

        <div class="mt-4">
          <button type="submit" name="beli" class="btn btn-primary">Buy</button>
          <a href="index.php" class="btn btn-warning">Back</a>
        </div>
      </div>
    </form>
  </div>

<?php
} else {
  echo '<div class="alert alert-danger text-center">Data buku tidak ditemukan.</div>';
}

// Mengolah data jika tombol "Buy" ditekan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['beli'])) {
  $idbuku = $_POST['idbuku'];
  $jumlah = $_POST['jumlah'];

  // Validasi jumlah
  if ($jumlah > 0) {
    // Logika pembelian atau penyimpanan data ke database
    echo '<div class="alert alert-success text-center">Pembelian berhasil!</div>';
  } else {
    echo '<div class="alert alert-danger text-center">Jumlah pembelian harus lebih dari 0.</div>';
  }
}
?>
</div>

</body>
</html>
