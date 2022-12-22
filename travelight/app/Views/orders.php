<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>List Pesanan</title>
  </head>
  <body>
    <div class="jumbotron">
      <h2 class="text-center">List Pesanan</br>
      </h2>
      <div class="container">
        <?php
          foreach($order as $row) {
            if ($row['statusPesanan'] == 'ordered') {
        ?> 
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">ID Pesanan: <?= $row['idPesanan']?></h5>
                  <p class="card-text">Status: <?= $row['statusPesanan']?></p>
                  <p class="card-text">Total Pembayaran: <?= $row['totalHargaPesanan']?></p>
                  <p class="card-text">Tenggat Waktu Pembayaran: <?= $row['tenggatWaktuPesanan']?></p>
                  <a href="http://localhost/travelight/public/pay/<?=$row['idPesanan'];?>" class="btn btn-primary">Bayar</a>
                </div>
              </div>
          <?php } else { ?>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">ID Pesanan: <?= $row['idPesanan']?></h5>
                  <p class="card-text">Status: <?= $row['statusPesanan']?></p>
                  <p class="card-text">Total Pembayaran: <?= $row['totalHargaPesanan']?></p>
                  <p class="card-text">Tenggat Waktu Pembayaran: <?= $row['tenggatWaktuPesanan']?></p>
                </div>
              </div>
          <?php
            }
          }
        ?>
        </br>
        <button class="btn btn-primary" onclick="location.href='http://localhost/travelight/public/dashboard';">Back</button>
      </div>
      </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>