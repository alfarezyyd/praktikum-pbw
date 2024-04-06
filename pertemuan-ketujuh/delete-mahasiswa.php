<?php
global $koneksi;
include "koneksi.php";
if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];
    $mysqli_result = mysqli_query($koneksi, "DELETE FROM mahasiswa  WHERE npm = '$npm'");
    if ($mysqli_result) {
        $message = urlencode("Data Berhasil Dihapus");
    } else {
        $message = urlencode("Data Gagal Dihapus");
    }
    header("Location: crud-mahasiswa.phtml?message={$message}");
}

