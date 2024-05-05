<?php
  include 'Book.php';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h1>Form Input Buku</h1>
    <div class="toast text-bg-danger mb-5" role="alert" aria-live="assertive" aria-atomic="true" id="toast">
        <div class="toast-header">
            <strong class="me-auto">Failed</strong>
            <small class="text-body-secondary">Just now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          <?= $message ?>
        </div>
    </div>

    <table>
        <form action="index.php" method="post">
            <tr>
                <td>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="code_book" placeholder="AA23" name="code_book"
                               required>
                        <label for="code_book">Kode Buku</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" placeholder="Beauty & The Beast"
                               name="name"
                               required>
                        <label for="name">Nama</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="qty" placeholder="Beauty & The Beast"
                               name="qty"
                               required>
                        <label for="qty">Kuantitas</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </td>
            </tr>
        </form>
    </table>
  <?php if ($book != null) { ?>
      <table class="table table-hover mt-5">
          <thead>
          <th>Parameter</th>
          <th>Nilai</th>
          </thead>
          <tbody>
          <tr>
              <td>Kode Buku</td>
              <td><?= $book->getCodeBook() ?></td>
          </tr>
          <tr>
              <td>Nama</td>
              <td><?= $book->name ?></td>
          </tr>
          <tr>
              <td>Kuantitas</td>
              <td><?= $book->getQty() ?></td>
          </tr>
          </tbody>
      </table>
  <?php } ?>
</div>

<?php
  if (isset($message)) {
    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var toast = new bootstrap.Toast(document.getElementById('toast'));
                toast.show();
            });
         </script>";
  }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>