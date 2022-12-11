<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <title>Products</title>
</head>

<body>
   
      <h1 class="display-4">Hello, <?= session()->get('username'); ?>!</h1>
      <hr class="my-4">
      <h2 class="text-center">Daftar Produk</h2>
      <br></br>
      <?php
        foreach($product as $prod) {
      ?>
      <img src="<?= $prod['urlGambarHotel']; ?>" class="img-fluid rounded-start" alt="...">
            
               <h5 class="card-title"><?= $prod['namaHotel']; ?></h5>
               <p class="card-text">Lokasi: <?= $prod['lokasiHotel']; ?></p>
               <p class="card-text">Deskripsi: <?= $prod['deskripsiHotel']; ?></p>
               <div class="card-body">
                  <span><a class="btn btn-primary" href="http://localhost/travelight/public/products/edit/<?=$prod['idHotel'];?>">Edit</a>
                  <a class="btn btn-danger" href="http://localhost/travelight/public/products/delete/<?=$prod['idHotel'];?>" onclick="return confirm('Apakah Anda yakin menghapus hotel ini?')">Delete</a> </span>
               </div>
               <p class="card-text">Kamar:</p>
               <br></br>
               <p> halo ges </p>
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
                  if ($row['idHotel'] == $prod['idHotel']) {
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
               }
               ?>
               <div class="card-body">
                  <span><button class="btn btn-primary" onclick="location.href='http://localhost/travelight/public/rooms/add/<?=$prod['idHotel'];?>'">Add</button> <button class="btn btn-primary">Edit</button></span>
               </div>
               </div>
            </div>
         </div>
      </div>
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