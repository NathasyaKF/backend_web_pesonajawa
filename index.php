<!DOCTYPE html>
<html lang="en">

<?php
  include "admin/include/config.php";
  $kategori = mysqli_query($connection, "SELECT * from kategoriwisata");
  $hotel = mysqli_query($connection, "SELECT * from hotel");

  //buat sambungin dua tabel dengan menggunakan foreign key
  $destinasi = mysqli_query($connection,
    "SELECT * from destinasi, kategoriwisata 
    WHERE destinasi.kategoriKODE = kategoriwisata.kategoriKODE");

?>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width,
 initial-scale1.0">
 <title>  </title>
</head>
<body>
    <div class="container-fluid">
    <!--membuat menu-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>

                <!--bagian dropdowm-->
        <li class="nav-item dropdown">       
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kategori Wisata
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php

            //syarat jika kategori terdapat sesuatu
              if(mysqli_num_rows($kategori)>0){
                while ($row=mysqli_fetch_array($kategori)){
                  ?>

                  <!--ini html jadi harus diluar tag php-->
                  <li><a class="dropdown-item" href="#">
                      <?php echo $row["kategoriNAMA"]?></a></li>

                <!--membuka kembali php-->
                <?php
                }
              }
            ?>
            
          </ul>
        </li>
		
		
		<li class="nav-item dropdown">       
          <a class="nav-link dropdown-toggle" href="ADMIN/f-destinasi.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Destinasi Wisata
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php

            //syarat jika kategori terdapat sesuatu
              if(mysqli_num_rows($destinasi)>0){
                while ($row=mysqli_fetch_array($destinasi)){
                  ?>

                  <!--ini html jadi harus diluar tag php-->
                  <li><a class="dropdown-item" href="ADMIN/f-destinasi.php">
                      <?php echo $row["destinasiNAMA"]?></a></li>

                <!--membuka kembali php-->
                <?php
                }
              }
            ?>
            
          </ul>
        </li>
		
		<li class="nav-item dropdown">       
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hotel
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php

            //syarat jika kategori terdapat sesuatu
              if(mysqli_num_rows($hotel)>0){
                while ($row=mysqli_fetch_array($hotel)){
                  ?>

                  <!--ini html jadi harus diluar tag php-->
                  <li><a class="dropdown-item" href="#">
                      <?php echo $row["hotelNAMA"]?></a></li>

                <!--membuka kembali php-->
                <?php
                }
              }
            ?>
            
          </ul>
        </li>
		
		<li class="nav-item">
          <a class="nav-link" href="ADMIN/f-destinasi.php">Travel</a>
        </li>
		
		<li class="nav-item">
          <a class="nav-link" href="ADMIN/f-daftartransportasi">Transport</a>
        </li>
		
		<li class="nav-item">
          <a class="nav-link" href="#">Kuliner</a>
        </li>
		
		<li class="nav-item">
          <a class="nav-link" href="#">Buku</a>
        </li>
		
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    <!--membuat akhir menu-->

<!--membuat slide-->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <!--src buat masukin foto-->
      <img src="admin/imageslider/pantaibali.jpg" class="d-block w-100" alt="Gambar tidak ada">
      <div class="carousel-caption d-none d-md-block">
        <h5>Pantai Bali</h5>
        <p>Indahnya Pantai Bali</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="admin/imageslider/pantaijogja.jpg" class="d-block w-100" alt="Gambar Tidak ada">
      <div class="carousel-caption d-none d-md-block">
        <h5>Pantai Jogja</h5>
        <p>Indahnya Pantai Jogja</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="admin/imageslider/pantaianyer.jpg" class="d-block w-100" alt="Gambar tidak ada">
      <div class="carousel-caption d-none d-md-block">
        <h5>Pantai Anyer</h5>
        <p>Indahnya Pantai Anyer</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!--membuat berita-->

	<div class="container">
  <div class="row mt-4">
    <?php
    // Query untuk mengambil data dari tabel kategoriwisata
    $query = mysqli_query($connection, "SELECT * FROM kategoriwisata");

    // Loop untuk setiap data kategoriwisata
    while ($kategori = mysqli_fetch_array($query)) {
    ?>
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $kategori['kategoriNAMA']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">Kategori</h6>
            <p class="card-text"><?php echo $kategori['kategoriKET']; ?></p>
            <a href="#" class="card-link"><?php echo $kategori['kategoriREFERENCE']; ?></a>
          </div>
        </div>
      </div>

    <?php
    }
    ?>
  </div>
</div>

	
   <div class="container">
    <div class="row">

        <!-- Bagian kiri (Destinasi) -->
        <div class="col-sm-9">
            <?php 
            $destinasi = mysqli_query($connection, "SELECT * FROM destinasi, kategoriwisata WHERE destinasi.kategoriKODE = kategoriwisata.kategoriKODE");

            if (mysqli_num_rows($destinasi) > 0) {
                while ($row = mysqli_fetch_array($destinasi)) {
            ?>
                <div class="d-flex mt-3">
                    <div class="flex-shrink-0 me-2">
                        <img style="width:200px; height:200px;" src="admin/images/<?php echo $row["destinasiFILE"]; ?>" alt="Kosong">
                    </div>

                    <div class="flex-grow-1">
                        <h5><?php echo $row["destinasiNAMA"]; ?>
                            <small class="text-muted"><i><?php echo $row["kategoriNAMA"]; ?></i></small>
                        </h5>
                        <p><?php echo substr($row["destinasiKET"], 0, 250) ?> ....</p>
                        <a href="" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            <?php
                }
            }
            ?>
        </div>

        <!-- Bagian kanan (Kuliner) -->
        <div class="col-sm-3">
            <?php
            // Query untuk mengambil data dari tabel kuliner (sesuaikan dengan struktur tabel Anda)
            $query = mysqli_query($connection, "SELECT * FROM kuliner LIMIT 3");
            
            // Mulai loop untuk setiap data kuliner
            while ($kuliner = mysqli_fetch_array($query)) {
            ?>
                <div style="margin-top: 25px;" class="card" style="width: 18rem;">
                    <!-- Gunakan data dari database untuk mengisi atribut HTML -->
                    <img style="width: 100px; height: 100%" src="admin/images/<?php echo $kuliner['kulinerFILE']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $kuliner['kulinerNAMA']; ?></h5>
                        <p class="card-text"><?php echo $kuliner['kulinerALAMAT']; ?></p>
                        <a href="#" class="btn btn-primary">Kunjungi website</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

    </div>
</div>
<!--penutup container-->

<!--membuat akhir berita-->

<!--membuat galeri-->
    <!-- Carousel wrapper -->
<div
  id="carouselMultiItemExample"
  class="carousel slide carousel-dark text-center"
  data-mdb-ride="carousel"
>
  <!-- Controls -->
  
  <!-- Inner -->
  <div class="carousel-inner py-4">
    <!-- Single item -->
    <div class="carousel-item active">
      <div class="container">
        <div class="row">
          
		  <div class="row">
    <?php
    // Fetch data for hotels from the database
    $hotelQuery = mysqli_query($connection, "SELECT * FROM hotel LIMIT 3"); // Ambil tiga data pertama

    while ($hotelRow = mysqli_fetch_array($hotelQuery)) {
    ?>
        <div class="col-lg-4">
            <div class="card">
                <?php
                // Check if hotelFILE exists and is a file
                if (isset($hotelRow['hotelFILE']) && is_file("ADMIN/images/" . $hotelRow['hotelFILE'])) {
                ?>
                    <img style="width: 406px; height: 260px" src="ADMIN/images/<?php echo $hotelRow['hotelFILE']; ?>" class="card-img-top" alt="Hotel Image">
                <?php
                } else {
                ?>
                    <img src="ADMIN/images/noimage.png" class="card-img-top" alt="No Image">
                <?php
                }
                ?>

                <div class="card-body">
                    <h5 class="card-title"><?php echo $hotelRow['hotelNAMA']; ?></h5>
                    <p class="card-text"><?php echo $hotelRow['hotelALAMAT']; ?></p>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<div class="row mt-4">
<div class="card text-center">
    <?php
    // Query untuk mengambil data dari tabel kategortiberita (sesuaikan dengan struktur tabel Anda)
    $query = mysqli_query($connection, "SELECT * FROM kategortiberita");

    // Mulai loop untuk setiap data kategortiberita
    while ($kategortiberita = mysqli_fetch_assoc($query)) {
    ?>
        <div class="card-header">
            BERITA
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo $kategortiberita['kategoriberitaNAMA']; ?></h5>
            <p class="card-text"><?php echo $kategortiberita['kategoriberitaKET']; ?></p>
            <a href="#" class="btn btn-primary">Kunjungi website</a>
        </div>

        <!-- Pisahkan setiap card dengan garis horizontal -->
        <hr>
    <?php
    }
    
    // Handle jika tidak ada data
    if (mysqli_num_rows($query) === 0) {
        echo '<p>No kategortiberita data available</p>';
    }
    ?>
</div>
</div>

<h2>TRAVEL</h2>

 <div class="card-body">
    <div class="row">
        <?php
        // Query untuk mengambil 3 data pertama dari tabel travel (sesuaikan dengan struktur tabel Anda)
        $query = mysqli_query($connection, "SELECT * FROM travel LIMIT 3");

        // Mulai loop untuk setiap data travel
        while ($travel = mysqli_fetch_assoc($query)) {
        ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $travel['travelNAMA']; ?></h5>
                        <p class="card-text"><?php echo $travel['travelALAMAT']; ?></p>
                        <a href="#" class="btn btn-primary">Kunjungi website</a>
                    </div>
                </div>
            </div>

        <?php
        }
        
        // Handle jika tidak ada data
        if (mysqli_num_rows($query) === 0) {
            echo '<p>No travel data available</p>';
        }
        ?>
    </div>
</div>

<h2>TRANSPORTASI</h2>


<div class="row mt-4">
    <?php
    // Query untuk mengambil data dari tabel transportasi dengan menggabungkannya dengan data dari tabel travel
    $query = mysqli_query($connection, "SELECT transportasi.*, travel.travelNAMA
                                        FROM transportasi
                                        INNER JOIN travel ON transportasi.travelKODE = travel.travelKODE");

    // Mulai loop untuk setiap data transportasi
    while ($transportasi = mysqli_fetch_array($query)) {
    ?>
        <div class="col-md-3">
            <div class="card border-info mb-3" style="max-width: 18rem;">
                <div class="card-header"><?php echo $transportasi['travelNAMA']; ?></div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $transportasi['transportasiJENIS']; ?></h5>
                    <p class="card-text"><?php echo $transportasi['transportasiPLAT']; ?></p>
                </div>
            </div>
        </div>
    <?php
    }
    // Selesai loop
    ?>
</div>


<div class="card">
<div class="card-header">BUKU</div>
  <?php
  // Query untuk mengambil 3 data pertama dari tabel buku (sesuaikan dengan struktur tabel Anda)
  $query = mysqli_query($connection, "SELECT * FROM buku LIMIT 3");
  while ($buku = mysqli_fetch_assoc($query)) {
  ?>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <p><?php echo $buku['bukuJUDUL']; ?></p>
        <footer class="blockquote-footer">Harga Buku: <?php echo $buku['bukuHARGA']; ?></footer>
        <a href="#" class="btn btn-primary">Beli</a>
      </blockquote>
    </div>
  <?php
  }
  ?>
</div>





    <!-- Single item -->

  </div>
  <!-- Inner -->
</div>
<!-- Carousel wrapper -->

<!--membuat akhir galeri-->


</div> <!--penutup container-fluid-->

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>