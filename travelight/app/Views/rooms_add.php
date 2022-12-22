<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
    <title>Tambah Kamar</title>
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-md-center">
 
            <div class="col-6">
                <h1>Tambah Kamar</h1>
                <?php if(isset($validation)):?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif;?>

                <form action="<?= base_url('rooms/add/save/' . $room['idHotel']) ?>" method="post">
                
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="InputForJenisKmr" class="form-label">Jenis Kamar</label>
                        <input type="text" name="jenisKmr" class="form-control" id="InputForJenisKmr">
                    </div>
                    <div class="mb-3">
                        <label for="InputForHarga" class="form-label">Harga</label>
                        <input type="text" name="harga" class="form-control" id="InputForHarga">
                    </div>
                    <div class="mb-3">
                        <label for="InputForStok" class="form-label">Stok</label>
                        <input type="text" name="stok" class="form-control" id="InputForStok">
                    </div>
                    <div class="mb-3">
                        <label for="InputForStok" class="form-label">Status</label>
                        <input type="text" name="status" class="form-control" id="InputForStatus">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
     
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  </body>
</html>