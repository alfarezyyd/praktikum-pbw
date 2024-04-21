<?php
global $koneksi;
include "koneksi.php";
$mysqli_result = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CRUD Data Mahasiswa</title>
  <style>
    .tableMahasiswa, .tableMahasiswa th, .tableMahasiswa td {
      width: 100%;
      table-layout: fixed;
      border: black 1px solid;
      border-collapse: collapse;
    }
  </style>
</head>
<body onload="hideMessage()">
<?php if (isset($_GET['message'])) { ?>
  <h1 class="message"><?= $_GET['message'] ?></h1>
<?php } ?>

<h1>Daftar Mahasiswa</h1>
<table class="tableMahasiswa">
  <thead>
  <tr>
    <th>NPM</th>
    <th>Nama</th>
    <th>Jurusan</th>
    <th>Alamat</th>
    <th>Aksi</th>
  </tr>
  </thead>
  <tbody>
  <?php while ($row = mysqli_fetch_assoc($mysqli_result)) { ?>
    <tr>
      <td><?= $row['npm'] ?></td>
      <td><?= $row['nama'] ?></td>
      <td><?= $row['jurusan'] ?></td>
      <td><?= $row['alamat'] ?></td>
      <td>
        <button name="edit" value="<?= $row['id'] ?>" data-npm="<?= $row['npm'] ?>" data-nama="<?= $row['nama'] ?>"
                data-jurusan="<?= $row['jurusan'] ?>" data-alamat="<?= $row['alamat'] ?>">Edit
        </button>
        <button><a href=" delete-mahasiswa.php?npm=<?= $row['npm'] ?>">Delete</a></button>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
<br>
<br>
<br>
<div>
  <h1 class=" formTitle
      ">Form Tambah Mahasiswa</h1>
  <table>
    <form action="add-mahasiswa.php" method="post" class="formMahasiswa" name="form">
      <input type="hidden" name="id" id="id">
      <tr>
        <td><label for="npm">NPM</label></td>
        <td><input type="text" name="npm" id="npm"></td>
      </tr>
      <tr>
        <td><label for="nama">Nama</label></td>
        <td><input type="text" name="nama" id="nama"></td>
      </tr>
      <tr>
        <td><label for="jurusan">Jurusan</label></td>
        <td>
          <select name="jurusan" id="jurusan">
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
          </select>
        </td>
      </tr>
      <tr>
        <td><label for="alamat">Alamat</label></td>
        <td><input type="text" name="alamat" id="alamat"></td>
      </tr>
      <tr>
        <td>
          <button type="submit" name="submit">Submit</button>
        </td>
      </tr>
    </form>
  </table>
</div>
<script>
  document.querySelectorAll("button[name='submit']").forEach(function (button) {
    button.addEventListener("click", function () {
      document.querySelector(".formTitle").reset();

    })
  });

  document.querySelectorAll("button[name='edit']").forEach(function (button) {
    button.addEventListener("click", function (e) {
        let form = document.querySelector(".formMahasiswa");
        let npm = e.target.dataset.npm;
        let nama = e.target.dataset.nama;
        let jurusan = e.target.dataset.jurusan;
        let alamat = e.target.dataset.alamat;

        // Set nilai input pada form dengan data yang diambil
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

  function hideMessage() {
    let messageElement = document.querySelector(".message");
    if (messageElement != null) {
      setTimeout(function (e) {
        messageElement.innerHTML = ""
      }, 2000)
    }
  }
</script>
</body>
</html>
