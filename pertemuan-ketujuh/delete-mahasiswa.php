<?php
global $koneksi;
include "koneksi.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $mysqli_result = mysqli_query($koneksi, "DELETE FROM mahasiswa  WHERE id = '$id'");
    if ($mysqli_result) {
        $message = urlencode("Data Berhasil Dihapus");
    } else {
        $message = urlencode("Data Gagal Dihapus");
    }
    header("Location: crud-mahasiswa.php?message={$message}");
}

