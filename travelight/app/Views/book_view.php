<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
    <title>Pesan Kamar</title>
  </head>
  <body style="background-image: url(https://cdn.discordapp.com/attachments/1045725173728419840/1059830576598745218/bg-awal.png); background-size: cover;">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white p-3">
        <div class="container-fluid">
          <a class="navbar-brand" href="http://localhost/travelight/public/dashboard">
            <img src="https://cdn.discordapp.com/attachments/1045725173728419840/1057811599928332439/image.png" alt="" style="height: 60px; width: 200px">
          </a>
          <div class="navbar-collapse">
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
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-11 mx-auto">
                <div class="card shadow border">
                    <div class="card-body d-flex flex-column">
 
                        <div class="col-6">
                            <h1>Pesan Kamar</h1>
                            <?php if(isset($validation)):?>
                                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                            <?php endif;?>
                            <?php if(session()->getFlashdata('overbook')):?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('overbook') ?></div>
                            <?php endif;?>
                            <?php if(session()->getFlashdata('invaliddate')):?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('invaliddate') ?></div>
                            <?php endif;?>
                            <?php if(session()->getFlashdata('underbook')):?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('underbook') ?></div>
                            <?php endif;?>
                            <label for="">Tipe: <?= $room['jenisKamar'] ?></label></br>
                            <label for="">Harga: <?= $room['harga'] ?></label></br>
                            <label for="">Sisa Kamar: <?= $room['stok'] ?></label></br>

                            <form action="<?= base_url('book/save/' . $room['idKamar']) ?>" method="post">
                            
                                <div class="mb-3">
                                    <label for="InputForAmount" class="form-label">Banyaknya kamar yang ingin dipesan</label>
                                    <input type="number" name="banyak" id="banyak"  class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="InputForWktCheckIn" class="form-label">Waktu Check In</label>
                                    <input type="date" name="checkin">
                                </div>
                                <div class="mb-3">
                                    <label for="InputForWktCheckOut" class="form-label">Waktu Check Out</label>
                                    <input type="date" name="checkout">
                                </div>
                                </br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button class="btn btn-secondary" onclick="history.back()">Back</button>

                            </form>
                            <br></br>
                        </div>
                    </div>
                </di>
            </div>
        </div>
    </div>
     
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    
    <script>
    function sum() {
      var txtFirstNumberValue = document.getElementById('harga').value;
      var txtSecondNumberValue = document.getElementById('banyak').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('txt3').value = "Rp "+result;
      }
    }
</script>

  </body>
</html>