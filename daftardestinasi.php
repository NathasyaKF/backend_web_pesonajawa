<!doctype html>
<html>

<?php
    include 'include/config.php'; //nyambungin data 

?>

<head>
    <title> DESTINASI 1 </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- stylesheet untuk memanggil file dengan tipe text/css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    
    <!--ini buat manggil svg nya-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>

<body>
    <div class="row"> <!-- total kolom adalah 12 -->
    
        <div class="col-sm-10">

<div class="jumbotron mt-5">
    <h2 class="display-5">Hasil entri data destinasi wisata</h2>
</div>

<form method="POST">
    <div class="form-group row mb-2">
        <label for="search"class="col-sm-2">Nama Destinasi</label>
        
        <!--untuk panjang box isi nya-->
        <div class="col-sm-6">
            <input type="text" name="search" class="form-control" id="search" 
            value="<?php if(isset($_POST["search"]))
            {echo $_POST["search"];}?>"placeholder="Cari nama destinasi">
        </div>
         <input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
    </div>
</form>


            <table class="table table-hover table-primary">
                <thead>
                    <tr>
                    <th scope="col"> No </th>
                    <th scope="col"> Kode Destinasi </th>
                    <th scope="col"> Nama Destinasi </th>
                    <th scope="col"> Nama Kategori </th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php

                    if (isset($_POST["kirim"]))
{
  $search = $_POST["search"];
  $query = mysqli_query($connection, " select destinasi.*from destinasi
      where destinasiNAMA like '%".$search."%'");}
    else{
      $query = mysqli_query($connection, "select destinasi.* from destinasi");}
      $nomor = 1;
      while($row = mysqli_fetch_array($query))
      {    
      ?>
    <tr>
      <th><?php echo $nomor;?></th>
      <td><?php echo $row['destinasiKODE'];?></td>
      <td><?php echo $row['destinasiNAMA'];?></td>
      <td><?php echo $row['kategoriKODE'];?></td>
    </tr>
    <?php $nomor = $nomor + 1; ?>
    <?php } ?>
  </tbody>
</table>
</div><!-- penutup class=col-sm-11-->
</div> <!--penutup class=row-->

</body>

</html>