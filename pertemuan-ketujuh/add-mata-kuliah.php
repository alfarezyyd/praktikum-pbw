<?php
global $koneksi;
include "koneksi.php";
if (isset($_POST['submit'])) {
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['nama'];
    $jumlahsks = $_POST['jumlahsks'];
    $query = "INSERT INTO matakuliah(kodemk, nama, jumlah_sks) VALUES('$kodemk','$nama','$jumlahsks') ";
    $mysqli_result = mysqli_query($koneksi, $query);
    if ($mysqli_result) {
        $message = urlencode("Data Berhasil Ditambahkan");
    } else {
        $message = urlencode("Data Gagal Ditambahkan");
    }
    header("Location: crud-mata-kuliah.phtml?message={$message}");
}

