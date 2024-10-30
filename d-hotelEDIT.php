<!DOCTYPE html>
<html lang="en">
    <?php include "include/head.php";?>
    <body class="sb-nav-fixed">
        <?php include "include/menunav.php";?>
        <div id="layoutSidenav">
            <?php include "include/menu.php";?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Hotel</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <?php
include 'include/config.php';

// Menerima data dari file hotel yang akan diedit 
$hotelKODE = $_GET["ubah"];
$edithotel = mysqli_query($connection, "select * from hotel where hotelKODE = '$hotelKODE'");
$rowedit = mysqli_fetch_array($edithotel);

if (isset($_POST['edit'])) {
    $hotelKODE = $_POST['hotelKODE'];
    $hotelNAMA = $_POST['hotelNAMA'];
    $hotelALAMAT = $_POST['hotelALAMAT'];

    // Mengambil informasi file yang diunggah
    $namafile = $_FILES['file']['name'];
    $file_tmp = $_FILES["file"]["tmp_name"];

    $ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

    // PERIKSA EKSTENSI FILE HARUS JPG ATAU jpg
    if (($ekstensifile == "jpg") or ($ekstensifile == "JPG")) {
        move_uploaded_file($file_tmp, 'images/' . $namafile); // unggah file ke folder images

        // Gunakan pernyataan UPDATE untuk mengedit data yang sudah ada
        mysqli_query($connection, "UPDATE hotel SET hotelNAMA='$hotelNAMA', hotelALAMAT='$hotelALAMAT', hotelFILE='$namafile' WHERE hotelKODE='$hotelKODE'");

        echo "<script>alert('DATA BERHASIL DIEDIT'); document.location='d-hotel.php'</script>";
    }
}
?>


<head>
    <title>HOTEL</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
 

</head>
<body>

 

<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">

 

<form method="POST" enctype="multipart/form-data">

  <div class="mb-3 row">
    <label for="hotelKODE" class="col-sm-2 col-form-label">Kode Hotel</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="hotelKODE" id="hotelKODE" value="<?php echo $rowedit["hotelKODE"]?>">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="hotelNAMA" class="col-sm-2 col-form-label">Nama Hotel</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="hotelNAMA" id="hotelNAMA" value="<?php echo $rowedit["hotelNAMA"]?>">
    </div>
  </div>  

  <div class="mb-3 row">
    <label for="hotelALAMAT" class="col-sm-2 col-form-label">Alamat Hotel</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="hotelALAMAT" id="hotelALAMAT" value="<?php echo $rowedit["hotelALAMAT"]?>">
    </div>
  </div>  
  
  <div class="form-group row">
	<label for="file" class="col-sm-2 col-form-label">Photo Hotel</label>
	<div class="col-sm-10">
		<input type="file" id="file" name="file">
		<p class="help-block">Field ini digunakan untuk unggah file</p>
	</div>
  </div>

  <div class="form-group row">
  <div class="mb-3 row">
  <div class="col-sm-2">
  </div>
  <div class="col-sm-10">
      <input type="submit" name="edit" value="EDIT" class="btn btn-secondary">
    <input type="button" value="Batal" class="btn btn-success" name="batal" onclick="batalRedirect()">
	<script>
	function batalRedirect() {
		window.location.href = 'travel.php';
	}
	</script>
  </div>
  </div>

</form>

<form method="POST">
    <div class="form-group row mb-2">
        <label for="search1"class="col-sm-2">Nama Hotel</label>
        
        <!--untuk panjang box isi nya-->
        <div class="col-sm-6">
            <input type="text" name="search1" class="form-control" id="search1" 
            value="<?php if(isset($_POST["search1"]))
            {echo $_POST["search1"];}?>"placeholder="Cari nama hotel">
        </div>
         <input type="submit" name="kirim1" value="Cari" class="col-sm-1 btn btn-primary">
    </div>
</form>

<form method="POST">
    <div class="form-group row mb-2">
        <label for="search2"class="col-sm-2">Alamat Hotel</label>
        
        <!--untuk panjang box isi nya-->
        <div class="col-sm-6">
            <input type="text" name="search2" class="form-control" id="search2" 
            value="<?php if(isset($_POST["search2"]))
            {echo $_POST["search2"];}?>"placeholder="Cari alamat hotel">
        </div>
         <input type="submit" name="kirim2" value="Cari" class="col-sm-1 btn btn-primary">
    </div>
	
	
	
</form>

 

<table class="table table-hover table-primary">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Hotel</th>
      <th scope="col">Nama Hotel</th>
      <th scope="col">Alamat Hotel</th>
	  <th scope="col">Gambar Hotel</th>
	  <th colspan="2" style="text-align: center">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php

    if(isset($_POST["kirim1"]))
	{
		$search1 = $_POST["search1"];
		$query = mysqli_query($connection, "select hotel.* 
            from hotel
            where hotelNAMA like '%".$search1."%'");
    }elseif(isset($_POST["kirim2"]))
	{
		$search2 = $_POST["search2"];
		$query = mysqli_query($connection, "select hotel.* 
            from hotel
            where hotelALAMAT like '%".$search2."%'");
	}
else
    {
		$query = mysqli_query($connection, "select hotel.* from hotel");
    }
                    
                 
        $nomor = 1;
        while($row = mysqli_fetch_array($query)) { //mengambil satu per satu record dari query
    ?>

            <tr>
                <td> <?php echo $nomor; ?> </td>
                <td> <?php echo $row['hotelKODE']; ?> </td>
                <td> <?php echo $row['hotelNAMA']; ?> </td>
                <td> <?php echo $row['hotelALAMAT']; ?> </td>
				<td>
					<?php if(is_file("images/".$row['hotelFILE']))
					{ ?>
						<img src="images/<?php echo $row['hotelFILE']?>" width="80">
					<?php } else
						echo "<img src='images/noimage.png' width='80'>"
					?>
				</td>
                                
                <td width="5px">
        <a href="d-hotelEDIT.php?ubah=<?php echo $row["hotelKODE"]?>"
          class="btn btn-success btn-sm" title="EDIT">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
      </td>
      <td>        <a href="d-hotelHAPUS.php?hapus=<?php echo $row["hotelKODE"]?>"
          class="btn btn-danger btn-sm" title="HAPUS">

          <i class="bi bi-trash"></i>
	  </td>
            </tr>
                    
    <?php $nomor = $nomor + 1; ?>

    <?php    
        }
    ?>
    </tbody>
</table>

 

</div> <!-- penutup clas=col-sm-10 -->
<div class="col-sm-1"></div>
</div> <!-- penutup clas=row -->


</body>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

                        
                    </div>
                </main>
                <?php include "include/footer.php";?>
            </div>
        </div>
        <?php include "include/jsscript.php";?>
    </body>
</html>
