<?php
require 'function.php';

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo '<script>
                alert("Data berhasil ditambahkan");
              </script>';
    header("Location: Login.php");
    } else {
        echo mysqli_error($conn); 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

    <style>
      label {
        margin-left: 75px;
      }
    </style>
</head>
<body>
    <div class="container container-sm">
        
        <div class="row gx-1">
          <div class="col">
           <div class="p-3">
            <div id="carouselExampleIndicators" class="carousel slide mt-5" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="cd/../../image/item-1.jpg" class="d-block w-100 rounded" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="cd/../../image/item-2.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="cd/../../image/item-3.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
           </div>
          </div>

          <div class="col">
              <form action="" method="post" class="loginContainer p-3">
                <img src="traditional.png" class="w-50 d-flex mx-auto mt-5" alt="">
                <!-- Username-->
                  <div class="form-floating mb-3 mt-5">
                    <input type="text" class="form-control w-75 mx-auto" id="floatingInput" placeholder="name@example.com" name="username">
                    <label for="floatingInput">Username</label>
                  </div>
                <!-- Password-->
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control w-75 mx-auto" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                  </div>
                <!-- Confirm Password-->
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control w-75 mx-auto" id="floatingPassword" placeholder="Confirm Password" name="password2">
                    <label for="floatingPassword">Confirm Password</label>
                  </div>
                <!-- Chekbox-->
                <input type="checkbox" class="checkbox form-check-input mb-3"> Saya menyetujui  
                <a href="#">syarat dan ketentuan</a>

<!-- Button Container -->
                <button class="daftar d-grid btn btn-primary w-75 mx-auto mb-2 mt-4" type="submit" name="register">DAFTAR</button>
                <p>Sudah memiliki akun? <a href="cd/../login.php">Login sekarang</a> </p>
            </form>
          </div>
        </div>
      </div>
</body>
</html>