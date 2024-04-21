<?php
global $koneksi;
include "koneksi.php";
$mysqli_result = mysqli_query($koneksi, "SELECT * FROM matakuliah");
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CRUD Data Mata Kuliah</title>
  <style>
    .tableMataKuliah, .tableMataKuliah th, .tableMataKuliah td {
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

<h1>Daftar Mata Kuliah</h1>
<table class="tableMataKuliah">
  <thead>
  <tr>
    <th>Kode MK</th>
    <th>Nama</th>
    <th>Jumlah SKS</th>
    <th>Aksi</th>
  </tr>
  </thead>
  <tbody>
  <?php while ($row = mysqli_fetch_assoc($mysqli_result)) { ?>
    <tr>
      <?php foreach ($row as $key => $val) { ?>
        <td><?= "$val" ?></td>
      <?php } ?>
      <td>
        <button name="edit" value="<?= $row['kodemk'] ?>">Edit</button>
        <button><a href="delete-mata-kuliah.php?kodemk=<?= $row['kodemk'] ?>">Delete</a></button>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
<br>
<br>
<br>
<div>
  <h1 class="formTitle">Form Tambah Mata Kuliah</h1>
  <table>
    <form action="add-mata-kuliah.php" method="post" class="formMataKuliah" name="form">
      <tr>
        <td><label for="kodemk">Kode MK</label></td>
        <td><input type="text" name="kodemk" id="kodemk"></td>
      </tr>
      <tr>
        <td><label for="nama">Nama</label></td>
        <td><input type="text" name="nama" id="nama"></td>
      </tr>
      <tr>
        <td><label for="jumlahsks">Jumlah SKS</label></td>
        <td><input type="number" name="jumlahsks" id="jumlahsks"></td>
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
        let form = document.querySelector(".formMataKuliah");
        document.forms['form']['kodemk'].value = e.target.value;
        form.setAttribute("action", "edit-mata-kuliah.php")
        form.requestSubmit();
      }
    )
  })

  document.querySelectorAll("button[name='delete']").forEach(function (button) {
    button.addEventListener("click", function (e) {
        e.preventDefault()
        let form = document.querySelector(".formMataKuliah");
        document.forms['form']['kodemk'].value = e.target.value;
        form.setAttribute("action", "delete-mata-kuliah.php")
        form.requestSubmit();
        document.querySelector(".formTitle").innerText("Form Edit Mata Kuliah");
      }
    )
  })

  function hideMessage() {
    let messageElement = document.querySelector(".message");
    if (messageElement.innerText != null) {
      setTimeout(function (e) {
        messageElement.innerHTML = ""
      }, 2000)
    }
  }
</script>
</body>
</html>
