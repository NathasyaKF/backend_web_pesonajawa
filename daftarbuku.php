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
                        <h1 class="mt-4">Daftar Buku</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
						<?php
    include 'include/config.php'; //nyambungin data 

?>

<head>
  <title>BUKU</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>
<body>

<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">


<form method="post">
    <div class="form-group row mb-2 mt-2">
      <label for="search" class="col-sm-2">Nama Buku</label>
      <div class="col-sm-6">
        <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST["search"]))
        {echo $_POST["search"];}?>" placeholder="cari nama buku">
      </div>
      <input type="submit" name="kirim" value="cari" class="col-sm-1 btn btn-primary">
    </div>
</form>

<table class="table table-hover table-primary">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kode Buku</th>
      <th scope="col">Nama Buku</th>
      <th scope="col">Harga Buku</th>
    </tr>
  </thead>
  <tbody>

  <?php 

if (isset($_POST["kirim"]))
{
  $search = $_POST["search"];
  $query = mysqli_query($connection, " select buku.*from buku
      where bukuJUDUL like '%".$search."%'");}
    else{
      $query = mysqli_query($connection, "select buku.* from buku");}
      $nomor = 1;
      while($row = mysqli_fetch_array($query))
      {    
      ?>
    <tr>
      <th><?php echo $nomor;?></th>
      <td><?php echo $row['bukuKODE'];?></td>
      <td><?php echo $row['bukuJUDUL'];?></td>
      <td><?php echo $row['bukuHARGA'];?></td>
      
    <?php $nomor = $nomor + 1; ?>
    <?php } ?>
  </tbody>
</table>
</div><!-- penutup class=col-sm-11-->
</div> <!--penutup class=row-->

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


