<?php
global $koneksi;
include "koneksi.php";
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $npm = $_POST['npm'];
  $nama = $_POST['nama'];
  $jurusan = $_POST['jurusan'];
  $alamat = $_POST['alamat'];
  $mysqli_result = mysqli_query($koneksi, "UPDATE mahasiswa SET npm='$npm', nama = '$nama', jurusan = '$jurusan', alamat = '$alamat' WHERE id = '$id'");
  if ($mysqli_result) {
    $message = urlencode("Data Berhasil Diubah");
  } else {
    $message = urlencode("Data Gagal Diubah");
  }
  header("Location: crud-mahasiswa.php?message={$message}");
}

