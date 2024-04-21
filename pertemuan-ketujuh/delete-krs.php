<?php
global $koneksi;
include "koneksi.php";
if (isset($_GET['npm']) && $kodemk = $_GET['kodemk']) {
    $query = "DELETE FROM krs WHERE mahasiswa_npm = '$_GET[npm]' AND matakuliah_kodemk = '$_GET[kodemk]'";
    $mysqli_result = mysqli_query($koneksi, $query);
    if ($mysqli_result) {
        $message = urlencode("Data Berhasil Dihapus");
    } else {
        $message = urlencode("Data Gagal Dihapus");
    }
    header("Location: crud-krs.php?message={$message}");
}

