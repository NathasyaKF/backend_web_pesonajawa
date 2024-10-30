<!doctype html>

<?php
include "include/config.php";
if(isset($_POST["Simpan"]))
{
    $hotelKODE = $_POST['hotelKODE'];
    $hotelNAMA = $_POST['hotelNAMA'];
    $hotelALAMAT = $_POST['hotelALAMAT'];


    mysqli_query($connection, "insert into hotel values ('$hotelKODE', 
    '$hotelNAMA', '$hotelALAMAT')");
    
    header("location:hotel.php");
}

?>

<head>
    <title> HOTEL </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">


</head>
<body>

<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">


<form method="POST">

<div class="mb-3 row">
    <label for="hotelKODE" class="col-sm-2 col-form-label"> Kode Hotel </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="hotelKODE" 
      id="hotelKODE">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="hotelNAMA" class="col-sm-2 col-form-label"> Nama Hotel </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="hotelNAMA" 
      id="hotelNAMA">
    </div>
  </div>


  <div class="mb-3 row">
    <label for="hotelALAMAT" class="col-sm-2 col-form-label"> Alamat Hotel </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="hotelALAMAT" 
      id="hotelALAMAT">
    </div>
  </div>
  
  <div class="form-group row">
  <div class="mb-3 row">
  <div class="col-sm-2"></div>
  <div class="col-sm-10">
    <input type="submit" name="Simpan" values="Simpan" class="btn btn-info">
    <input type="reset" class="btn btn-success" value="Batal" name="Batal"> 
  </div>
  </div>

</form>

<form method="POST">
    <div class="form-group row mb-2">
        <label for="search"class="col-sm-2"> Nama Hotel </label>
        
        <!--untuk panjang box isi nya-->
        <div class="col-sm-6">
            <input type="text" name="search" class="form-control" id="search" 
            value="<?php if(isset($_POST["searchsatu"]))
            {echo $_POST["searchsatu"];}?>"placeholder="Cari nama hotel">
        </div>
         <input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
    </div>
    <form method="POST">
    <div class="form-group row mb-2">
        <label for="search"class="col-sm-2"> Alamat Hotel </label>
        
        <!--untuk panjang box isi nya-->
        <div class="col-sm-6">
            <input type="text" name="search" class="form-control" id="search" 
            value="<?php if(isset($_POST["searchdua"]))
            {echo $_POST["searchdua"];}?>"placeholder="Cari alamat hotel">
        </div>
         <input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
    </div>
</form>


        <table class="table table-hover table-dark">
            <thead>
            <tr>
            <th scope="col"> No </th>
            <th scope="col"> Kode Hotel </th>
            <th scope="col"> Nama Hotel </th>
            <th scope="col"> Alamat Hotel </th>
            <th colspan="2" style="text-align: center"> Aksi </th>
            </tr>
            </thead>
                <tbody>
                    <?php

                    if(isset($_POST["kirim"]))
                    {
                        //untuk menerima isi dari search yang ada di atas '$search'
                        $search = $_POST["search"];
                        $query = mysqli_query($connection, "select hotel.* 
                            from hotel
                            where hotelNAMA like '%".$search."%'");
                    }else

                    {
                        $query = mysqli_query($connection, "select hotel.* from hotel");
                    }
                    
                    //      $query = mysqli_query($connection, "select destinasi.* from destinasi");
                    
                        //untuk menampilkan tampilan isi database
                        //$query = mysqli_query($connection, "select destinasi.* from destinasi"); //destinasi. itu kalo misalnya ada atribut yang sama biar tidak bentrok
                        $nomor = 1;
                        while($row = mysqli_fetch_array($query)) { //mengambil satu per satu record dari query
                    ?>

                            <tr>
                                <td> <?php echo $nomor; ?> </td>
                                <td> <?php echo $row['hotelKODE']; ?> </td>
                                <td> <?php echo $row['hotelNAMA']; ?> </td>
                                <td> <?php echo $row['hotelALAMAT']; ?> </td>
                                
                                <td width="5px">

                                <!--variabel 'ubah' untuk menunjukkan ke variabel yang ada di php yang bagian echo $row["destinasiKODE"]-->
                                <a href="hotelEDIT.php?ubah=<?php echo $row["hotelKODE"]?>" 
                                class="btn btn-success btn-sm" title="EDIT">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>

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

        </div>
    </div>

    <script type="text/javascript" scr="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"> </script>

</body>

</html>