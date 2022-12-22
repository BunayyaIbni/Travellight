<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <title>User</title>
</head>

<body>
   <div class="jumbotron">
      <h1 class="display-4">Hello, <?= session()->get('namaCustomer'); ?>!</h1>
      <span><a class="btn btn-danger" href="<?= base_url('/logout'); ?>" role="button">Logout</a>
         <a class="btn btn-primary" href="http://localhost/travelight/public/customer/edit/<?= session()->get('idCustomer'); ?>">Edit Profile</a>
         <a class="btn btn-primary" href="<?= base_url('/orders'); ?>">List Pesanan</a>
      </span>
      <hr class="my-4">
      <table>
      <form action="dashboard/cari" method="get">
         <tr>
            <td><input type="text" name="cari" class="form-control" id="InputForAmount" placeholder="Cari Hotel"></td>
            <td><button type="submit" class="btn btn-primary" value="Cari">Cari</button></td>
         </tr>
      </table>
   </br>
   </br>
      <?php
        foreach($product as $prod) {
      ?>
      <div class="card mb-3" style="max-width: 600px;">
         <img class="card-img-top" src="assets/img/<?= $prod['urlGambarHotel']; ?>" alt="Card image cap">
         <div class="card-body">
            <h5 class="card-title"><?= $prod['namaHotel']; ?></h5>
            <p class="card-text"><?= $prod['deskripsiHotel']; ?></p>
            <a class="btn btn-primary" href="http://localhost/travelight/public/products/view/<?=$prod['idHotel'];?>">View</a>
         </div>
      </div>
      <?php 
      }
      ?>
      <br></br>
      <span><a class="btn btn-danger" href="<?= base_url('/logout'); ?>" role="button">Logout</a>
         <a class="btn btn-primary" href="http://localhost/travelight/public/customer/edit/<?= session()->get('idCustomer'); ?>">Edit Profile</a>
      </span>
   </div>

   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>