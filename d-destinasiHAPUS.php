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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
						<?php
						include "include/config.php";
						if(isset($_GET['hapus']))
						{
							$kodedestinasi = $_GET['hapus'];
							mysqli_query($connection, "DELETE FROM destinasi
								WHERE destinasiKODE = '$kodedestinasi'");
							echo "<script>alert('DATA BERHASIL DIHAPUS');
								document.location='d-destinasi.php'</script>";
						}

						?>
						</div>
                </main>
                <?php include "include/footer.php";?>
            </div>
        </div>
        <?php include "include/jsscript.php";?>
    </body>
</html>

