<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
    <title>Edit Product</title>
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-md-center">
 
            <div class="col-6">
                <h1>Edit Product</h1>
                <?php if(isset($validation)):?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif;?>
                <form action="<?= base_url('products/update/' . $product['idHotel']) ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="InputForName" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="InputForName" value="<?= $product['namaHotel']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="InputForLocation" class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" id="InputForLocation" value="<?= $product['lokasiHotel']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="InputForDesc" class="form-label">Description</label>
                        <input type="text" name="desc" class="form-control" id="InputForDesc" value="<?= $product['deskripsiHotel']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="InputForUrlGbr" class="form-label">Url Hotel Picture</label>
                        <input type="text" name="urlGambarHotel" class="form-control" id="InputForUrlGbr" value="<?= $product['urlGambarHotel']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
     
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  </body>
</html>