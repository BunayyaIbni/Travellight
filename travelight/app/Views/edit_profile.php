<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
    <title>Edit Profile</title>
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-md-center">
 
            <div class="col-6">
                <h1>Edit Profile</h1>
                <?php if(isset($validation)):?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif;?>
                <form action="<?= base_url('customer/update/' . $customer['idCustomer']) ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="InputForName" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="InputForName" value="<?= $customer['namaCustomer']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="InputForPhoneNum" class="form-label">Phone Number</label>
                        <input type="text" name="phone_num" class="form-control" id="InputForPhoneNum" value="<?= $customer['noHpCustomer'];  ?>">
                    </div>
                    <div class="mb-3">
                        <label for="InputForEmail" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= $customer['emailCustomer'];  ?>">
                    </div>
                    <div class="mb-3">
                        <label for="InputForAddress" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="InputForAddress" value="<?= $customer['alamatCustomer'];  ?>">
                    </div>
                    <div class="mb-3">
                        <label for="InputForUsername" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="InputForUsername" value="<?= $customer['username'];  ?>">
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