<!DOCTYPE html>
<html lang="en">
   <?php include "include/head.php";?></include>
    <body class="sb-nav-fixed">
        <?php include "include/menunav.php";?>
        <div id="layoutSidenav">
            <?php include "include/menu.php";?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">BUKU</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <?php
  include "include/config.php";
if(isset($_POST["Simpan"]))
{
    $bukuKODE = $_POST['kodebuku'];
    $bukuJUDUL = $_POST['namabuku'];
    $bukuHARGA = $_POST['hargabuku'];
    mysqli_query($connection, "insert into buku values ('$bukuKODE', '$bukuJUDUL', '$bukuHARGA')");
    
  }
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

<form method="POST">

  <div class="mb-3 row">
    <label for="kodebuku" class="col-sm-2 col-form-label">Kode Buku</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name= "kodebuku" id="kodebuku">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="namabuku" class="col-sm-2 col-form-label">Nama Buku</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name= "namabuku" id="namabuku">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="hargabuku" class="col-sm-2 col-form-label">Harga Buku</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name= "hargabuku" id="hargabuku">
    </div>
  </div>

  <div class="form-group row">
      <div class="col-sm-2">
      </div>
      <div class="col-sm-10">
    <input type="submit" name="Simpan" value="Simpan" class="btn btn-secondary">
    <input type="button" class="btn btn-success" value="Batal" name="Batal">
  </div>
  </div>
</form>
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
      <th colspan="2" style="text-align: center">Aksi</th>
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
      <td width="5px">
        <a href="bukuEDIT.php?ubah=<?php echo $row["bukuKODE"]?>"
          class="btn btn-success btn-sm" title="EDIT">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
      </td>
      <td>        <a href="bukuHAPUS.php?hapus=<?php echo $row["bukuKODE"]?>"
          class="btn btn-danger btn-sm" title="HAPUS">

          <i class="bi bi-trash"></i></td>
    </tr>
    <?php $nomor = $nomor + 1; ?>
    <?php } ?>
  </tbody>
</table>
</div><!-- penutup class=col-sm-11-->
</div> <!--penutup class=row-->

</body>
                        
                        
                    </div>
                </main>
                <?php include "include/footer.php";?>
            </div>
        </div>
        <?php include "include/jsscript.php";?>
    </body>
</html>
