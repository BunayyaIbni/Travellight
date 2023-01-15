<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
    <title>Hasil Pencarian</title>
  </head>
  <body>
  <body style="background-image: url(https://cdn.discordapp.com/attachments/1045725173728419840/1059830576598745218/bg-awal.png); background-size: cover;">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white p-3">
        <div class="container-fluid">
          <a class="navbar-brand" href="http://localhost/travelight/public/dashboard">
            <img src="https://cdn.discordapp.com/attachments/1045725173728419840/1057811599928332439/image.png" alt="" style="height: 60px; width: 200px">
          </a>
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
                <h1>Hasil Pencarian</h1>

                <?php if(isset($validation)):?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif;?>
                <span>
                  <table style="width:100%; ">
                    <?php
                        foreach($hotel as $prod) { 
                          ?>
                      <tr>   
                        <td style="width:10%">
                          <a href="http://localhost/travelight/public/products/view/<?=$prod['idHotel'];?>">
                          <div class="card" style="width: 20rem;">
                            <img class="card-img-top" src="../../public/assets/imghotel/<?= $prod['urlGambarHotel']; ?>" alt="Card image cap">
                          </div>
                          </a>
                        </td>
                        <td>
                          <a class="link-secondary" style="text-decoration:none" href="http://localhost/travelight/public/products/view/<?=$prod['idHotel'];?>">
                          <div class="card-body">
                              <h5 class="card-title"><?= $prod['namaHotel']; ?></h5>
                              <!-- <p class="card-text"><?= $prod['deskripsiHotel']; ?></p> -->
                              <!-- <a class="btn btn-primary" href="http://localhost/travelight/public/products/view/<?=$prod['idHotel'];?>">View</a> -->
                          </div>
                          </a> 
                        </td>
                      </tr>
                      <?php } ?>
                  </table>
                </span>
                <br>
                <button class="btn btn-primary" onclick="location.href='http://localhost/travelight/public/dashboard';">Back</button>
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