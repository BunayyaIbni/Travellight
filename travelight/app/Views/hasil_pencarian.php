<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <title>Hasil Pencarian</title>
  </head>
  <body>
    <div class="container">
    <br>
    <h3>Hasil Pencarian</h3>
    <hr>
 
    
    
    <?php
        foreach($data as $prod) {
      ?>
      <div class="card" style="width: 18rem;">
         <img class="card-img-top" src="<?= $prod['urlGambarHotel']; ?>" alt="Card image cap">
         <div class="card-body">
            <h5 class="card-title"><?= $prod['namaHotel']; ?></h5>
            <p class="card-text"><?= $prod['deskripsiHotel']; ?></p>
            <a class="btn btn-primary" href="http://localhost/travelight/public/products/view/<?=$prod['idHotel'];?>">View</a>
         </div>
      </div>
      <?php 
      }
      ?>
 
 
    </div>
  </body>
</html>