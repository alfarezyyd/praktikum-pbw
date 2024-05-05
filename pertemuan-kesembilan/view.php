<?php
include 'index.php';
$message = null;
$book = null;
if (isset($_POST['submit'])) {
    try {
        $book = new Book($_POST['code_book'], $_POST['name'], $_POST['qty']);
    } catch (Exception $e) {
        $message = $e->getMessage();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP OOP</title>
</head>
<body>
<?php if ($message != null) { ?>
    <h3>
        <?= $message ?>
    </h3>
<?php } ?>
<table>
    <form action="view.php" method="post">
        <tr>
            <td><label for="code_book">Code Book</label></td>
            <td><input type="text" name="code_book" id="code_book"></td>
        </tr>
        <tr>
            <td><label for="name">Name</label></td>
            <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td><label for="qty">Quantity</label></td>
            <td><input type="number" name="qty" id="qty"></td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="submit">Submit</button>
            </td>
        </tr>
    </form>
</table>
<?php if ($book != null && $book->getCodeBook()) { ?>
    <table>
        <tr>
            <td>Code Book: <?= $book->getCodeBook() ?></td>
        </tr>
        <tr>
            <td>Name: <?= $book->name ?></td>
        </tr>
        <tr>
            <td>Quantity: <?= $book->getQty() ?></td>
        </tr>
    </table>
<?php } ?>

</body>
</html>