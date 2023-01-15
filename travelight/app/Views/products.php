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
  <body style="background-image: url(https://cdn.discordapp.com/attachments/1045725173728419840/1059830576598745218/bg-awal.png); background-size: cover;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white p-3">
      <div class="container-fluid">
        <a class="navbar-brand" href="http://localhost/travelight/public/products">
          <img src="https://cdn.discordapp.com/attachments/1045725173728419840/1057811599928332439/image.png" alt="" style="height: 60px; width: 200px">
        </a>
        <div class="navbar-collapse">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <p class="text-center text-white" style="font-size: xx-large;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
              Daftar Hotel
              </p>
            </li>
          </ul>
        </div>
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto ">
            <li class="nav-item dropdown">
              <a class="nav-link mx-2" href="http://localhost/travelight/public/products/add">Add Product </a>
            </li>
            <li>
              <a class="nav-link mx-2" href="<?= base_url('/ownerorders'); ?>">List Pesanan </a>
            </li>
            
            <li>
              <a class="nav-link mx-2" href="<?= base_url('/logout'); ?>">Logout </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="jumbotron">
      <div class="container text-center"></div>
      <br> 
      <?php
        foreach($product as $prod) {
      ?> 
      <br>
      <div class="row justify-content-md-center">
        <div class="col-9 mx-auto">
          <div class="card shadow border">
            <div class="card-body text-center d-flex flex-column">
              <center><img src="assets/imghotel/<?= $prod['urlGambarHotel']; ?>" height="350px" width="900px" class="rounded-start" alt="..."></center>
            </div>
            <div class="card-body">
              <h5 class="card-title"> <?= $prod['namaHotel']; ?> </h5>
              <p class="card-text">Lokasi: <?= $prod['lokasiHotel']; ?> </p>
              <p class="card-text">Deskripsi: <?= $prod['deskripsiHotel']; ?> </p>
              <br>
              <div class="card-body">
                <span>
                  <a class="btn btn-primary" href="http://localhost/travelight/public/products/edit/<?=$prod['idHotel'];?>">Edit </a>
                  <a class="btn btn-secondary" href='http://localhost/travelight/public/rooms/add/<?=$prod['idHotel'];?>'>Tambah Kamar</a>
                  <a class="btn btn-danger" href="http://localhost/travelight/public/products/delete/<?=$prod['idHotel'];?>" onclick="return confirm('Apakah Anda yakin menghapus hotel ini?')">Delete </a>
                </span>
              </div>
              <h5>Kamar:</h5>
              <table class='table table-bordered align-middle text-center'>
                <thread>
                  <tr>
                    <th>Jenis Kamar</th>
                    <th>Kamar Tersedia</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th colspan="2">aksi</th>
                  </tr>
                </thread>
                <tbody> 
                  <?php
                  foreach($room as $row) {
                     if ($row['idHotel'] == $prod['idHotel']) {
                  ?> 
                  <tr>
                    <td> <?= $row['jenisKamar']; ?> </td>
                    <td> <?= $row['stok']; ?> </td>
                    <td> <?= $row['harga']; ?> </td>
                    <td> <?= $row['status']; ?> </td>
                    <span>
                      <td>
                        <a class="btn btn-primary" href="http://localhost/travelight/public/rooms/edit/<?=$row['idKamar'];?>">Edit </a>
                      </td>
                      <td>
                        <a class="btn btn-danger" href="http://localhost/travelight/public/rooms/delete/<?=$row['idKamar'];?>" onclick="return confirm('Apakah Anda yakin menghapus kamar ini?')">Delete </a>
                      </td>
                    </span> <?php 
                           } 
                        } 
                     ?>
                  </tr>
                </tbody>
              </table>
              
            </div>
          </div>
        </div>
      </div>
    </div> 
    <?php
        }
    ?> 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>