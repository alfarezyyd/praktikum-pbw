<?php
  global $koneksi;
  include 'koneksi.php';
  $query = "SELECT m.nama as nama, mk.nama as nama_mata_kuliah, jumlah_sks FROM krs JOIN mahasiswa m on m.npm = krs.mahasiswa_npm JOIN matakuliah mk on mk.kodemk = krs.matakuliah_kodemk";
  $mysqli_result = mysqli_query($koneksi, $query);
  $count_row = 1;
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tugas Pertemuan Ketujuh</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="crud-mahasiswa.php">Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="crud-mata-kuliah.php">Mata Kuliah</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="crud-krs.php">KRS</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <h1 class="mt-5 mb-5">Mahasiswa & KRS</h1>
  <table class="table table-striped">
    <thead>
    <tr>
      <th>No</th>
      <th>Nama Lengkap</th>
      <th>Mata Kuliah</th>
      <th>Keterangan</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = mysqli_fetch_assoc($mysqli_result)) { ?>
      <tr>
        <td><?= $count_row ?></td>
        <?php foreach ($row as $key => $value) { ?>
          <td>
            <?php
              if ($key == "jumlah_sks") {
                echo "{$row["nama"]} Mengambil Mata Kuliah {$row["nama_mata_kuliah"]} ({$value} SKS)";
              } else {
                echo $value;
              }
            ?>
          </td>
        <?php } ?>
      </tr>
      <?php $count_row++ ?>
    <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

