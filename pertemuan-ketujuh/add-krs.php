<?php
global $koneksi;
include "koneksi.php";
if (isset($_POST['submit'])) {
    $npm = $_POST['npm'];
    $kodemk = $_POST['kodemk'];
    $query = "INSERT INTO krs(mahasiswa_npm, matakuliah_kodemk) VALUES('$npm','$kodemk') ";
    $mysqli_result = mysqli_query($koneksi, $query);
    if ($mysqli_result) {
        $message = urlencode("Data Berhasil Ditambahkan");
    } else {
        $message = urlencode("Data Gagal Ditambahkan");
    }
    header("Location: crud-krs.phtml?message={$message}");
}


