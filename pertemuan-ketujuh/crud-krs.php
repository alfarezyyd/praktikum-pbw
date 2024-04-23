<?php
  global $koneksi;
  include "koneksi.php";
  $mysqli_result_krs = mysqli_query($koneksi, "SELECT mahasiswa_npm, matakuliah_kodemk FROM krs");
  $mysqli_result_mahasiswa = mysqli_query($koneksi, "SELECT npm  FROM mahasiswa");
  $mysqli_result_matakuliah = mysqli_query($koneksi, "SELECT kodemk FROM matakuliah");
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <title>CRUD Data KRS</title>
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
<div class="container my-5">
  <div class="row">
    <div class="col-md-12">
      <div class="toast text-bg-primary mb-5" role="alert" aria-live="assertive" aria-atomic="true" id="toast">
        <div class="toast-header">
          <strong class="me-auto">Success</strong>
          <small class="text-body-secondary">Just now</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          <?= $_GET['message'] ?>
        </div>
      </div>
      <div class="card border-0">
        <div class="card-header">
          <div class="d-flex justify-content-center">
            <h1>Daftar KRS</h1>
          </div>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
            <tr>
              <th>NPM</th>
              <th>Kode MK</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_assoc($mysqli_result_krs)) { ?>
              <tr>
                <?php foreach ($row as $key => $val) { ?>
                  <td><?= "$val" ?></td>
                <?php } ?>
                <td>
                  <button type="submit" class="btn btn-danger">
                    <a href="delete-krs.php?npm=<?= $row['mahasiswa_npm'] ?>&kodemk=<?= $row['matakuliah_kodemk'] ?>"
                       class="text-decoration-none text-white">Delete</a>
                  </button>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<br>

<div class="container my-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card border-0">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <h1>Form</h1>
          </div>
        </div>
        <div class="card-body">
          <form action="add-krs.php" method="post" class="form" name="form">
            <div class="mb-4">
              <label for="npm" class="form-label">Mahasiswa</label>
              <select name="npm" id="npm" class="form-select">
                <?php while ($row = mysqli_fetch_assoc($mysqli_result_mahasiswa)) { ?>
                  <option value="<?= $row['npm'] ?>"><?= $row['npm'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="mb-4">
              <label for="kodemk" class="form-label">Kode MK</label>
              <select name="kodemk" id="kodemk" class="form-select">
                <?php while ($row = mysqli_fetch_assoc($mysqli_result_matakuliah)) { ?>
                  <option value="<?= $row['kodemk'] ?>"><?= $row['kodemk'] ?></option>
                <?php } ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  if (isset($_GET['message'])) {
    $message = $_GET['message'];

    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var toast = new bootstrap.Toast(document.getElementById('toast'));
                toast.show();
            });
         </script>";
  }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script>
  </body>
  </html>
