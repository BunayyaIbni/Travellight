<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
    <title>Sign Up</title>
  </head>
  <body>
    <div class="bg-image" style="background-image: url('../../public/assets/img/bg-awal.png');">
        <div class="container">
            <img class="rounded float-left mt-4 mb-5" src="../../public/assets/img/logo-tvl.png" alt="" style="height: 60px; width: 200px">
            <div class="row justify-content-md-center">
                <div class="col-6 mx-auto">
                    <div class="card shadow border">
                        <div class="card-body d-flex flex-column">
                            <h2 class="mb-3">Sign Up as Customer</h2>
                            <?php if(session()->getFlashdata('msg')):?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                            <?php endif;?>
                            <form action="customer/save" method="post">
                                <div class="mb-3">
                                    <label for="InputForName" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="InputForName" value="<?= set_value('name') ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="InputForPhoneNum" class="form-label">Phone Number</label>
                                    <input type="text" name="phone_num" class="form-control" id="InputForPhoneNum" value="<?= set_value('phone_num') ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="InputForEmail" class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email') ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="InputForAddress" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" id="InputForAddress" value="<?= set_value('address') ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="InputForEmail" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="InputForUsername" value="<?= set_value('username') ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="InputForPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="InputForPassword">
                                </div>
                                <div class="mb-3">
                                    <label for="InputForConfPassword" class="form-label">Confirm Password</label>
                                    <input type="password" name="confpassword" class="form-control" id="InputForConfPassword">
                                </div>
                                <button type="submit" class="btn btn-primary">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  </body>
</html>
