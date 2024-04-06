<?php
global $koneksi;
include "koneksi.php";
if (isset($_POST['submit'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $query = "INSERT INTO mahasiswa(npm, nama, jurusan, alamat) VALUES('$npm','$nama','$jurusan','$alamat') ";
    $mysqli_result = mysqli_query($koneksi, $query);
    if ($mysqli_result) {
        $message = urlencode("Data Berhasil Ditambahkan");
    } else {
        $message = urlencode("Data Gagal Ditambahkan");
    }
    header("Location: crud-mahasiswa.phtml?message={$message}");
}

