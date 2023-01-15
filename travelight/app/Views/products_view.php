<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
    <title><?= $product['namaHotel']?></title>
  </head>
  <body style="background-image: url(https://cdn.discordapp.com/attachments/1045725173728419840/1059830576598745218/bg-awal.png); background-size: cover;">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white p-3">
        <div class="container-fluid">
          <a class="navbar-brand" href="http://localhost/travelight/public/dashboard">
            <img src="https://cdn.discordapp.com/attachments/1045725173728419840/1057811599928332439/image.png" alt="" style="height: 60px; width: 200px">
          </a>
          <div class="navbar-collapse">
          <ul class="navbar-nav ms-auto">
          </ul>
        </div>
          <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">
              <li class="nav-item dropdown">
                <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <?= session()->get('namaCustomer'); ?> </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li>
                    <a class="dropdown-item" href="http://localhost/travelight/public/customer/edit/<?= session()->get('idCustomer'); ?>">Edit Profile </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= base_url('/orders'); ?>">List Pesanan</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= base_url('/logout'); ?>">Logout</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    <div class="container">
      <br>
      <div class="row justify-content-md-center">
        <div class="col-11 mx-auto">
          <div class="card shadow border">
            <div class="card-body d-flex flex-column">
                <h1><?= $product['namaHotel']?></h1>
                <?php if(isset($validation)):?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif;?>
                <p><?= $product['lokasiHotel']?></p>
                <center><img src="../../assets/imghotel/<?= $product['urlGambarHotel']; ?>" alt="Card image cap" height="500px" width="800px"></center>
                <br></br>
                
                <h2>Fasilitas</h2>
                <br>
                <table>

                  <tr>
                    <td>
                      <div class="card-text">
                        <img src="../../assets/img/wifi.png" height="50px" width="50px">
                      </div>
                    </td>
                    <td>
                      <div class="card-text">
                        <img src="../../assets/img/coffee.png" height="40px" width="40px">
                      </div>
                    </td>
                    <td>
                      <div class="card-text">
                        <img src="../../assets/img/breakfast.png" height="50px" width="50px">
                      </div>
                    </td>
                    <td>
                      <div class="card-text">
                        <img src="../../assets/img/mosque.png" height="50px" width="50px">
                      </div>
                    </td>
                  </tr>

                  <div class="card-text">
                    <tr>
                      <td  style="font-size: 30px;"> Free Wi-Fi </td>
                      <td  style="font-size: 30px;"> Coffee Maker </td>
                      <td  style="font-size: 30px;"> Breakfast </td>
                      <td  style="font-size: 30px;"> Musholla </td>
                    </tr>
                  </div>
                </table>

                <br>
                <br>
                <br>

              <h2>Kamar Tersedia</h2>
              <table class="table table-border  table-hover">
               <thead>
                <tr>
                  <th>Jenis Kamar</th>
                  <th>Harga</th>
                  <th>Sisa Kamar</th>
                  <th colspan = "2"></th>
                </tr>
              </thead>
               <tbody>

                <?php
                  foreach($room as $row) {
                     if ($row['idHotel'] == $product['idHotel'] && $row['status'] == 'available') {
                ?> 

                  <tr>
                     <td> <?= $row['jenisKamar']; ?> </td>
                     <td> <?= $row['harga']; ?> </td>
                     <td> <?= $row['stok']; ?> </td>
                     <span>
                     <td>
                        <a class="btn btn-primary" href="http://localhost/travelight/public/book/<?=$row['idKamar'];?>">Pesan</a>
                     </td>
                     </span>
                     <?php 
                           } 
                        } 
                     ?>
                  </tr>
               </tbody>
              </table>
                <button class="btn btn-secondary" onclick="location.href='http://localhost/travelight/public/dashboard';">Back</button>
            </div>
          </div>
        </div>
      </div>
    </div>
     
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  </body>
</html>