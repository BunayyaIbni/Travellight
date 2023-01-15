<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <title>Products</title>
</head>

<body>
   <div class="jumbotron">
      <h2 class="text-center">Daftar Kamar</h2>
      <br></br>
      <table class='table'>
        <tr>
            <th>ID</th>
            <th>Jenis Kamar</th>
            <th>Harga</th>
            <th>Waktu Mulai Tersedia</th>
            <th>Waktu Akhir Tersedia</th>
            <th>stok</th>
        </tr>
      <?php
        foreach($room as $row) {
      ?>
      <tr>
               <td><?= $row['idKamar']; ?></td>
               <td><?= $row['jenisKamar']; ?></td>
               <td><?= $row['harga']; ?></td>
               <td><?= $row['waktuMulaiTersedia']; ?></td>
               <td><?= $row['waktuAkhirTersedia']; ?></td>
               <td><?= $row['stok']; ?></td>
         </tr>
      <?php
        }
      ?>
      <button class="btn btn-primary" onclick="location.href='http://localhost/travelight/public/products/add';">Add Product</button>
      <br></br>
      <a class="btn btn-danger" href="<?= base_url('/logout'); ?>" role="button">Logout</a>
   </div>

   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>