<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
    <title>Verifikasi Pembayaran</title>
  </head>
  <body style="background-image: url(https://cdn.discordapp.com/attachments/1045725173728419840/1059830576598745218/bg-awal.png); background-size: cover;">
    <br>
    <br>
    <br>
        <div class="row justify-content-md-center">
            <div class="col-7 mx-auto">
                <div class="card shadow border">
                    <div class="card-body d-flex flex-column">
                <h1>Informasi Pembayaran</h1>
                <?php if(isset($validation)):?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif;?>
                <table>
                <tr>
                <td> <img src="../assets/images/<?= $payment['urlGambarPembayaran']; ?>" alt="Bukti Pembayaran" width="200px" height="200px"> </td>
                <td> <p class="card-text">ID Pembayaran: <?= $payment['idPembayaran'] ?></p> </td>
                <td> <p class="card-text">ID Pesanan: <?= $payment['idPesanan'] ?></p> </td>
                </tr>
                <tr class="text-center">
                <form action="<?= base_url('verifpembayaran/save/' . $payment['idPembayaran']) ?>" method="post">
                  <td colspan="3"><button type="submit" class="btn btn-primary">Verifikasi Pembayaran</button></td>
                </form>
                </tr>
                </table>
            </div>
        </div>
    </div>
</div>
     
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  </body>
</html>