<?php
global $koneksi;
include "koneksi.php";
$mysqli_result_krs = mysqli_query($koneksi, "SELECT mahasiswa_npm, matakuliah_kodemk FROM krs");
$mysqli_result_mahasiswa = mysqli_query($koneksi, "SELECT npm as mahasiswa_npm FROM mahasiswa");
$mysqli_result_matakuliah = mysqli_query($koneksi, "SELECT kodemk FROM matakuliah");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Data KRS</title>
    <style>
        .tableKRS, .tableKRS th, .tableKRS td {
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

<h1>Daftar KRS</h1>
<table class="tableKRS">
    <thead>
    <tr>
        <th>NPM</th>
        <th>Kode MK</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = mysqli_fetch_assoc($mysqli_result_krs)) { ?>
        <tr>
            <?php foreach ($row as $key => $val) { ?>
                <td><?= "$val" ?></td>
            <?php } ?>
            <td>
                <button>
                    <a href="delete-krs.php?npm=<?= $row['mahasiswa_npm'] ?>&kodemk=<?= $row['matakuliah_kodemk'] ?>">Delete</a>
                </button>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<br>
<br>
<br>
<div>
    <h1>Form</h1>
    <table>
        <form action="add-krs.php" method="post" class="form" name="form">
            <tr>
                <td><label for="npm">NPM</label></td>
                <td>
                    <select name="npm" id="npm">
                        <?php while ($row = mysqli_fetch_assoc($mysqli_result_mahasiswa)) { ?>
                            <?php foreach ($row as $key => $value) { ?>
                                <option value="<?= $value ?>"><?= $value ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="kodemk">Kode MK</label></td>
                <td>
                    <select name="kodemk" id="kodemk">
                        <?php while ($row = mysqli_fetch_assoc($mysqli_result_matakuliah)) { ?>
                            <?php foreach ($row as $key => $value) { ?>
                                <option value="<?= $value ?>"><?= $value ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </td>
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
