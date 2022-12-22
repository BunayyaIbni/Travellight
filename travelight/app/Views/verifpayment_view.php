<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
    <title>Verifikasi Pembayaran</title>
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <h1>Verifikasi Pembayaran</h1>
                <table class='table table-bordered align-middle text-center'>
               <thread>
                <tr>
                  <th>ID Pembayaran</th>
                  <th>ID Pesanan</th>
                  <th>URL Bukti Pembayaran</th>
                  <th>Status Pembayaran</th>
                  <th colspan = "2">aksi</th>
                </tr>
               </thread> 
               <tbody>

                <?php
                  foreach($payment as $row) {
                     if ($row['statusPembayaran'] == 'paid') {
                ?> 
                  <tr>
                     <td> <?= $row['idPembayaran']; ?> </td>
                     <td> <?= $row['idPesanan']; ?> </td>
                     <td> <?= $row['urlGambarPembayaran']; ?> </td>
                     <td> <?= $row['statusPembayaran']; ?> </td>
                     <span>
                     <td>
                        <a class="btn btn-primary" href="http://localhost/travelight/public/verifpembayaran/<?=$row['idPembayaran'];?>">Verifikasi</a>
                     </td>
                     </span>
                     </tr>
                     <?php 
                           } else { ?>
                    <tr>
                     <td> <?= $row['idPembayaran']; ?> </td>
                     <td> <?= $row['idPesanan']; ?> </td>
                     <td> <?= $row['urlGambarPembayaran']; ?> </td>
                     <td> <?= $row['statusPembayaran']; ?> </td>
                     </tr>
                      <?php
                           }
                        } 
                     ?>
                  
               </tbody>
              </table>
              <a class="btn btn-secondary" href="<?= base_url('/logout'); ?>" role="button">Logout</a>
            </div>
        </div>
    </div>
     
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  </body>
</html>