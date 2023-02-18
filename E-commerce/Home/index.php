<?php
session_start();
require "cd/../../Register & Login/function.php";

$result = mysqli_query($conn, "select * from barang");

if ( !isset($_SESSION["login"]) ) {
     header("location: cd/../../Register & Login/login.php");
     exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
    <nav class="w-100 position-fixed pt-2 pb-3">
        <ul class="w-100 md-auto nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Belanja</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About us</a>
            </li>
          
             <button type="submit" class="btn masuk">
              <a href="cd/../../Register & Login/login.php">Masuk</a></button>
             <button type="submit" class="btn" >
              <a href="cd/../../Register & Login/register.php">Sign In</a>
             </button>
          </ul>
    </nav>

<!-- SLIDER -->
    <div class="heroContainer  w-100">
        <div class="col">
            <div class="p-1">
             <div id="carouselExampleIndicators" class="sliderContainer carousel slide w-75 mx-auto" data-bs-ride="carousel">
                 <div class="carousel-inner border border-5k">
                    <div class="carousel-item active">
                      <!-- Kotak Promosi perempuan -->
                     <div class="kotakPromosi carousel-caption d-none d-md-block">
                           <h1 class="bg-warning">KOLEKSI 2023</h1>
                           <p>PEREMPUAN</p>
                           <button type="submit" class="btn-primary p-3 rounded fw-bolder">BELANJA SEKARANG !</button>
                        </div>
                        <img src="item-4.jpg" class="d-block w-100 rounded" alt="...">
                   </div>
                   <div class="carousel-item">
                    <!-- Kotak Promosi Pria -->
                    <div class="kotakPromosi carousel-caption d-none d-md-block">
                        <h1 class="bg-warning">KOLEKSI 2023</h1>
                        <p style="font-size: 6rem;">PRIA</p>
                        <button type="submit" class="btn-primary p-3 rounded fw-bolder">BELANJA SEKARANG !</button>
                     </div>
                     <img src="item-3.jpg" class="d-block w-100" alt="...">
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
    </div>

<!-- POPULER ITEM -->
    <div class="containerMain w-50 mx-auto possition-abolute">
      <p style="margin-left: 16rem; font-size: 50px;">POPULER ITEMS!</p>
      
      <!-- CARD CONTAINER -->
      <div class="scrollTinggi row row-cols-1 row-cols-md-3 g-4">
        <div class="col">

          <?php while ( $row = mysqli_fetch_assoc($result) ) : ?>
           <div class="card">
               <img src="<?php echo $row['gambar'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h1 class="card-title"><?= $row['nama_barang']; ?></h1>
              <p class="card-text">RP.<?= $row['harga']; ?></p>
              <p class="card-text"><?= $row['deskripsi']; ?></p>
            </div>

            <div class="edit">
              <a href="">Tambah</a> |
              <a href="">Edit</a> |
              <a href="">Hapus</a>
            </div>
           </div>


          <?php endwhile; ?>
       
        </div>
      </div>
    </div>

    <div class="informasi w-100 bg-primary"></div>

<!-- FOOTER -->
    <footer class="bg-dark w-100">
  
    </footer>

</body>
</html>