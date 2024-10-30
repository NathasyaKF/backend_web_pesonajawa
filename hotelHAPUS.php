<?php
    include 'include/config.php';
    if(isset($_GET['hapus']))
    {
        $hotelKODE = $_GET["hapus"];
        mysqli_query($connection, "DELETE FROM hotel WHERE hotelKODE = '$hotelKODE'");
        echo "<script> alert('DATA BERHASIL DIHAPUS');
        document.location='hotel.php'</script>";
    }
?>