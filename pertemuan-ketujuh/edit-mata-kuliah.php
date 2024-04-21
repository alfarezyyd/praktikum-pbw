<?php
global $koneksi;
include "koneksi.php";
if (isset($_POST['submit'])) {
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['nama'];
    $jumlahsks = $_POST['jumlahsks'];
    $query = "UPDATE matakuliah SET kodemk='$kodemk', nama='$nama', jumlah_sks='$jumlahsks'";
    $mysqli_result = mysqli_query($koneksi, $query);
    if ($mysqli_result) {
        $message = urlencode("Data Berhasil Diubah");
    } else {
        $message = urlencode("Data Gagal Diubah");
    }
    header("Location: crud-mata-kuliah.php?message={$message}");
}

