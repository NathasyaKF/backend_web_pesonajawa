</body<!DOCTYPE html>
<html lang="en">
    
    <!---BUAT MANGGIL HEAD.PHP-->
    <?php include "include/head.php";?>
    <body class="sb-nav-fixed">

        <?php include "include/menunav.php";?>

        <div id="layoutSidenav">

            <?php include "include/menu.php";?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Daftar kategori</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
						<?php
    include 'include/config.php'; //nyambungin data 

?>

<head>
    <title>TRAVEL</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
 

</head>
<body>

 

<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">

<form method="POST">
    <div class="form-group row mb-2">
        <label for="search1"class="col-sm-2">Nama travel</label>
        
        <!--untuk panjang box isi nya-->
        <div class="col-sm-6">
            <input type="text" name="search1" class="form-control" id="search1" 
            value="<?php if(isset($_POST["search1"]))
            {echo $_POST["search1"];}?>"placeholder="Cari nama travel">
        </div>
         <input type="submit" name="kirim1" value="Cari" class="col-sm-1 btn btn-primary">
    </div>
</form>

<form method="POST">
    <div class="form-group row mb-2">
        <label for="search2"class="col-sm-2">Alamat travel</label>
        
        <!--untuk panjang box isi nya-->
        <div class="col-sm-6">
            <input type="text" name="search2" class="form-control" id="search2" 
            value="<?php if(isset($_POST["search2"]))
            {echo $_POST["search2"];}?>"placeholder="Cari alamat travel">
        </div>
         <input type="submit" name="kirim2" value="Cari" class="col-sm-1 btn btn-primary">
    </div>
	
	
	
</form>

 

<table class="table table-hover table-primary">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode travel</th>
      <th scope="col">Nama travel</th>
      <th scope="col">Alamat travel</th>
    </tr>
  </thead>
  <tbody>
    <?php

    if(isset($_POST["kirim1"]))
	{
		$search1 = $_POST["search1"];
		$query = mysqli_query($connection, "select travel.* 
            from travel
            where travelNAMA like '%".$search1."%'");
    }elseif(isset($_POST["kirim2"]))
	{
		$search2 = $_POST["search2"];
		$query = mysqli_query($connection, "select travel.* 
            from travel
            where travelALAMAT like '%".$search2."%'");
	}
else
    {
		$query = mysqli_query($connection, "select travel.* from travel");
    }
                    
                 
        $nomor = 1;
        while($row = mysqli_fetch_array($query)) { //mengambil satu per satu record dari query
    ?>

            <tr>
                <td> <?php echo $nomor; ?> </td>
                <td> <?php echo $row['travelKODE']; ?> </td>
                <td> <?php echo $row['travelNAMA']; ?> </td>
                <td> <?php echo $row['travelALAMAT']; ?> </td>
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

        </div>
    </div>

    <script type="text/javascript" scr="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"> </script>

    <script>
        $(document).ready(function() {
            ('#kodekategori').select2( {
                closeOnSelect:true,
                allowClear:true,
                placeholder:'Pilih Kategori Wisata'
            } );
        } );
    </script>

</body>
                        

                    </div>
                </main>
                <?php include "include/footer.php";?>
            </div>
        </div>
        <?php include "include/jsscript.php";?>
    </body>
</html>


