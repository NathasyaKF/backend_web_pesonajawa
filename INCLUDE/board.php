<?php
    include "config.php";
    $sql = mysqli_query($connection,"SELECT * FROM destinasi");
    //untuk menghitung total jumlah rows nya
    $jumlahd = mysqli_num_rows($sql);
	$sql = mysqli_query($connection,"SELECT * FROM hotel");
    //untuk menghitung total jumlah rows nya
    $jumlahh = mysqli_num_rows($sql);
	$sql = mysqli_query($connection,"SELECT * FROM kuliner");
    //untuk menghitung total jumlah rows nya
    $jumlahk = mysqli_num_rows($sql);
	$sql = mysqli_query($connection,"SELECT * FROM transportasi");
    //untuk menghitung total jumlah rows nya
    $jumlaht = mysqli_num_rows($sql);
	$sql = mysqli_query($connection,"SELECT * FROM kategoriwisata");
    //untuk menghitung total jumlah rows nya
    $jumlahw = mysqli_num_rows($sql);
	$sql = mysqli_query($connection,"SELECT * FROM travel");
    //untuk menghitung total jumlah rows nya
    $jumlahv = mysqli_num_rows($sql);
	$sql = mysqli_query($connection,"SELECT * FROM kategortiberita");
    //untuk menghitung total jumlah rows nya
    $jumlahr = mysqli_num_rows($sql);
?>                        

                        <div class="row">

                        <!--ini untuk membuat tampilannya sehingga memunculkan total rows-->
                        <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Destinasi Wisata: 
                                        <?php echo $jumlahd; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="d-daftardestinasi.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
							
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Jumlah Transportasi: 
										<?php echo $jumlaht; ?>
									</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftartransportasi.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Jumlah Hotel: 
										<?php echo $jumlahh; ?>
									</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftarhotel.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Jumlah Kuliner: 
										<?php echo $jumlahk; ?>
									</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftarkuliner.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
							<div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Kategori Wisata: 
                                        <?php echo $jumlahw; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftarkategori.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
							
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Jumlah Travel: 
										<?php echo $jumlahv; ?>
									</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftartravel.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Jumlah Data Buku: 
										<?php echo $jumlahh; ?>
									</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftarbuku.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
							<div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Jumlah Data Berita: 
										<?php echo $jumlahr; ?>
									</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftarberita.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
							
                            