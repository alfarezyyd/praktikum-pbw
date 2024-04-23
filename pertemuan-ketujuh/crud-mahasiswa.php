<?php
  global $koneksi;
  include "koneksi.php";
  $mysqli_result = mysqli_query($koneksi, " SELECT * FROM mahasiswa");
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <title>CRUD Data Mahasiswa</title>
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
            <h2 class="font-weight-bolder">Daftar Mahasiswa</h2>
          </div>
        </div>
        <div class="card-body">
          <table class="table">
            <thead class="text-center">
            <tr>
              <th>No</th>
              <th>NPM</th>
              <th>Nama</th>
              <th>Jurusan</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            <?php while ($row = mysqli_fetch_assoc($mysqli_result)) { ?>
              <tr>
                <td class="text-center"><?= $i ?></td>
                <td><?= $row['npm'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['jurusan'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td class="text-center">
                  <button class="btn btn-primary" name="edit" value="<?= $row['id'] ?>" data-npm="<?= $row['npm'] ?>"
                          data-nama="<?= $row['nama'] ?>"
                          data-jurusan="<?= $row['jurusan'] ?>" data-alamat="<?= $row['alamat'] ?>">Edit
                  </button>
                  <button class="btn btn-danger"><a href="delete-mahasiswa.php?id=<?= $row['id'] ?>"
                                                    class="text-decoration-none text-white">Delete</a></button>
                </td>
              </tr>
              <?php $i++;
            } ?>
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
          <div class="d-flex justify-content-center">
            <h1 class="formTitle">Form Tambah Mahasiswa</h1>
          </div>
        </div>
        <div class="card-body">
          <form action="add-mahasiswa.php" method="post" class="formMahasiswa" name="form">
            <div class="mb-4">
              <input type="hidden" name="id" id="id">
              <label for="npm" class="form-label">NPM</label>
              <input type="text" name="npm" id="npm" class="form-control">
            </div>
            <div class="mb-4">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control"></input>
            </div>
            <div class="mb-4">
              <label for="jurusan" class="form-label">Jurusan</label>
              <select name="jurusan" id="jurusan" class="form-select">
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
              </select>
            </div>
            <div class="mb-4">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name='alamat'>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>
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
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script>
  document.querySelectorAll("button[name='submit']").forEach(function (button) {
    button.addEventListener("click", function () {
      document.querySelector(".formTitle").reset();

    })
  });

  document.querySelectorAll("button[name='edit']").forEach(function (button) {
    button.addEventListener("click", function (e) {
        let form = document.querySelector(".formMahasiswa");
        let id = e.target.value;
        let npm = e.target.dataset.npm;
        let nama = e.target.dataset.nama;
        let jurusan = e.target.dataset.jurusan;
        let alamat = e.target.dataset.alamat;

        document.forms['form']['id'].value = id;
        document.forms['form']['npm'].value = npm;
        document.forms['form']['nama'].value = nama;
        document.forms['form']['jurusan'].value = jurusan;
        document.forms['form']['alamat'].value = alamat;
        form.setAttribute("action", "edit-mahasiswa.php")
        let htmlHeadingElement = document.querySelector(".formTitle");
        htmlHeadingElement.innerText = "Form Edit Mahasiswa";
      }
    )

  })

  document.querySelectorAll("button[name='delete']").forEach(function (button) {
    button.addEventListener("click", function (e) {
        let form = document.querySelector(".formMahasiswa");
        document.forms['form']['id'].value = e.target.value;
        form.setAttribute("action", "delete-mahasiswa.php")
        form.requestSubmit();
      }
    )
  })
</script>
</body>
</html>
