<?php
global $koneksi;
include "koneksi.php";
if (isset($_GET['kodemk'])) {
    $kodemk = $_GET['kodemk'];
    $mysqli_result = mysqli_query($koneksi, "DELETE FROM matakuliah  WHERE kodemk = '$kodemk'");
    if ($mysqli_result) {
        $message = urlencode("Data Berhasil Dihapus");
    } else {
        $message = urlencode("Data Gagal Dihapus");
    }
    header("Location: crud-mata-kuliah.php?message={$message}");
}

