<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>User</title>
  </head>
  <body style="background-image: url(https://cdn.discordapp.com/attachments/1045725173728419840/1059830576598745218/bg-awal.png); background-size: cover;">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white p-3">
        <div class="container-fluid">
          <a class="navbar-brand" href="http://localhost/travelight/public/dashboard">
            <img src="https://cdn.discordapp.com/attachments/1045725173728419840/1057811599928332439/image.png" alt="" style="height: 60px; width: 200px">
          </a>
          <div class="navbar-collapse">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <p class="text-center text-white" style="font-size: xx-large;">Selamat Datang!</p>
            </li>
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

      <br>

      <div class="row justify-content-md-center">
        <div class="col-11 mx-auto">
          <div class="card shadow border">
            <div class="card-body d-flex flex-column">

              <div class="col-11 mx-auto">
                <div class="card card-header shadow border">
                  <div class="card-body d-flex flex-column">
                    <table> 

                      <?php if(session()->getFlashdata('invaliddate')):?> 
                        <div class="alert alert-danger"> <?= session()->getFlashdata('invaliddate') ?> </div> 
                      <?php endif;?> 
                      <?php if(session()->getFlashdata('underbook')):?> 
                        <div class="alert alert-danger"> <?= session()->getFlashdata('underbook') ?> </div> 
                      <?php endif;?> 

                      <form action="<?= base_url('dashboard/search') ?>" method="post">
                        <div class="mb-3">
                          <tr>                          
                              <td colspan="6">
                                <input type="text" class="form-control" name="lokasi" placeholder="Pergi Kemana Nih?">
                              </td>
                              <td rowspan="2">
                                <button type="submit" class="btn btn-primary" style="height: 50px;">Search</button>
                              </td>
                          </tr>
                          <tr>
                            <td>
                              <label for="InputForWktCheckIn" class="form-label">Waktu Check In</label>
                            </td>
                            <td>
                              <input type="date" name="checkin">
                            </td>
                          <td>
                            <label for="InputForWktCheckOut" class="form-label">Waktu Check Out</label>
                          </td>
                          <td>
                            <input type="date" name="checkout">
                          </td>
                          <td>
                            <label for="InputForAmount" class="form-label">Banyaknya kamar</label>
                          </td>
                          <td>
                            <input type="number" name="banyak" id="banyak" class="form-control">
                          </td>
                          <td></td>
                        </tr>
                        </div>
                      </form>
                    </table>
                  </div>
                </div>
              </div>
            <span>
              <br>
              <br>
              <p>Hotel Rekomendasi:</p>
              <table style="width:100%; ">
                <?php
                  foreach($product as $prod) {                  
                ?>
                  <th>
                  <td>
                    <a href="http://localhost/travelight/public/products/view/<?=$prod['idHotel'];?>" style="text-decoration:none" class="link-secondary">
                    <div class="card mb-3" style="max-width: 400px; max-height: 500px;">
                    <img class="card-img-top" src="../public/assets/imghotel/<?= $prod['urlGambarHotel']; ?>" alt="Card image cap"  height="300px">
                      <div class="card-body">
                        <h5 class="card-title"> <?= $prod['namaHotel']; ?> </h5>
                        <p class="card-text"> <?= $prod['deskripsiHotel']; ?> </p>
                      </div>
                    </div>
                  </a>
                  </td> 
                <?php 
                  }
                ?> 
              </table>
            </span>
          </div>
        </div>
      </div>
  </body>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>