<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <title>User</title>
</head>

<body>
   <div class="jumbotron">
      <h1 class="display-4">Data Customer</h1>
      <table class='table'>
        <tr>
            <th>ID</th>
            <th>username</th>
            <th>password</th>
            <th>foto profil</th>
            <th>nama</th>
            <th>no hp</th>
            <th>email</th>
            <th>alamat</th>
        </tr>
        <?php
        foreach($customer as $row) :
        ?>
         <tr>
               <td><?= $row['idCustomer']; ?></td>
               <td><?= $row['username']; ?></td>
               <td><?= $row['password']; ?></td>
               <td><?= $row['urlFotoProfil']; ?></td>
               <td><?= $row['namaCustomer']; ?></td>
               <td><?= $row['noHpCustomer']; ?></td>
               <td><?= $row['emailCustomer']; ?></td>
               <td><?= $row['alamatCustomer']; ?></td>
         </tr>
        <?php
         endforeach; 
        ?>
        </table>
   </div>

   

   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>