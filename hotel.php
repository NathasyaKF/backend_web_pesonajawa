<!DOCTYPE html>
<html>

 

<?php
    include 'include/config.php';
    if(isset($_POST['Simpan']))
    {
        $hotelKODE = $_POST['hotelKODE'];
        $hotelNAMA = $_POST['hotelNAMA'];
        $hotelALAMAT = $_POST['hotelALAMAT'];

 

        mysqli_query($connection, "insert into hotel values ('$hotelKODE', '$hotelNAMA', '$hotelALAMAT')");
        header("location:hotel.php");

 

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

 

<form method="POST">

  <div class="mb-3 row">
    <label for="hotelKODE" class="col-sm-2 col-form-label">Kode Hotel</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="hotelKODE" id="hotelKODE">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="hotelNAMA" class="col-sm-2 col-form-label">Nama Hotel</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="hotelNAMA" id="hotelNAMA">
    </div>
  </div>  

  <div class="mb-3 row">
    <label for="hotelALAMAT" class="col-sm-2 col-form-label">Alamat Hotel</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="hotelALAMAT" id="hotelALAMAT">
    </div>
  </div>  

  <div class="form-group row">
  <div class="mb-3 row">
  <div class="col-sm-2">
  </div>
  <div class="col-sm-10">
      <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
      <input type="reset" class="btn btn-warning" value="Batal" name="Batal">
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
                                
                <td width="5px">

                </td>
                <td width="5px">
                <a href="hotelHAPUS.php?hapus=<?php echo $row["hotelKODE"]?>" 
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
</div> <!-- penutup clas=row -->

 

<script type="text/javascript" scr="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"> </script>

    <script>
        $(document).ready(function() {
            ('#hotelKODE').select2( {
                closeOnSelect:true,
                allowClear:true,
                placeholder:'Pilih Kategori Wisata'
	</script>

</body>
</html>