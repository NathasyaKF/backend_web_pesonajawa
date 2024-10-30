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
                        <h1 class="mt-4">Kuliner</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
						<?php
						include "include/config.php";
						if(isset($_GET['hapus']))
						{
							$kulinerKODE = $_GET['hapus'];
							mysqli_query($connection, "DELETE FROM kuliner
								WHERE kulinerKODE = '$kulinerKODE'");
							echo "<script>alert('DATA BERHASIL DIHAPUS');
								document.location='kuliner.php'</script>";
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

