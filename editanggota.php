<?php
session_start();

include 'koneksi.php';
$iduser = $_SESSION['Email'];
if ($iduser == ''){
    header('location: login.html');
}else{
    $sqlUser = "SELECT * FROM tbuser WHERE Email = '$iduser'";
    $queryUser = mysqli_query($koneksi, $sqlUser);
    $userData = mysqli_fetch_object($queryUser);
    $namaUser = $userData->NmUser;
    $role = $userData->role;


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Admin</title>
        <script type="text/javascript" src="js/Chart.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i 
            class="fas fa-bars"></i></button>
            <a class="navbar-brand ps-3" href="index.php">Perpustakaan SMAN 18 Bandung</a> 
            <!-- Navbar Search-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="setting.php">Setting</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <a class="nav-link" href="index.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                                <?php
                                // Role Admin dapat mengakses semua menu
                                if ($role == 'admin') {
                                    echo '
                                    <a class="nav-link" href="tampiluser.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                        Users
                                    </a>
                                    <a class="nav-link" href="anggota.php">
                                        <div class="sb-nav-link-icon"><i class="fa-regular fa-keyboard"></i></div>
                                        Input Anggota
                                    </a>
                                    <a class="nav-link" href="tampilanggota.php">
                                        <div class="sb-nav-link-icon"><i class="fa-solid fa-school"></i></div>
                                        Daftar Anggota
                                    </a>
                                    <a class="nav-link" href="buku.php">
                                        <div class="sb-nav-link-icon"><i class="fa-regular fa-keyboard"></i></div>
                                        Input Buku
                                    </a>
                                    <a class="nav-link" href="tampilbuku.php">
                                        <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                                        Daftar Buku
                                    </a>
                                    <a class="nav-link" href="pinjam.php">
                                        <div class="sb-nav-link-icon"><i class="fa-regular fa-keyboard"></i></div>
                                        Input Peminjaman
                                    </a>
                                    <a class="nav-link" href="tampilpinjam.php">
                                        <div class="sb-nav-link-icon"><i class="fa-solid fa-book-open-reader"></i></div>
                                        Daftar Peminjaman
                                    </a>';
                                } elseif ($role == 'input buku') {
                                    // Role Input Buku hanya dapat mengakses menu tertentu
                                    echo '
                                    <a class="nav-link" href="buku.php">
                                        <div class="sb-nav-link-icon"><i class="fa-regular fa-keyboard"></i></div>
                                        Input Buku
                                    </a>
                                    <a class="nav-link" href="tampilbuku.php">
                                        <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                                        Daftar Buku
                                    </a>';
                                } elseif ($role == 'input anggota') {
                                    // Role Input Anggota hanya dapat mengakses menu tertentu
                                    echo '
                                    <a class="nav-link" href="anggota.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                        Anggota
                                    </a>
                                    <a class="nav-link" href="tampilanggota.php">
                                        <div class="sb-nav-link-icon"><i class="fa-regular fa-keyboard"></i></div>
                                        Daftar Anggota
                                    </a>';
                                } elseif ($role == 'transaksi') {
                                    // Role Transaksi hanya dapat mengakses menu tertentu
                                    echo '
                                    <a class="nav-link" href="tampilbuku-ts.php">
                                        <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                                        Daftar Buku
                                    </a>
                                    <a class="nav-link" href="pinjam.php">
                                        <div class="sb-nav-link-icon"><i class="fa-regular fa-keyboard"></i></div>
                                        Input Peminjaman
                                    </a>
                                    <a class="nav-link" href="tampilpinjam.php">
                                        <div class="sb-nav-link-icon"><i class="fa-solid fa-book-open-reader"></i></div>
                                        Daftar Peminjaman
                                    </a>';
                                }
                                ?>
                            </div>
                        </div>
                    </nav>
                </div>
            <?php
		    include('koneksi.php');
		    $kode = $_GET['noanggota'];
		    $query = "SELECT * FROM tbanggota WHERE NoAnggota='".$kode."'";
		    $hasil = mysqli_query($koneksi,$query);
		    $data = mysqli_fetch_array($hasil);
		    $nama = $data['NmAnggota'];
		    $nis = $data['NIS'];
		    $tmp = $data['Tmp_Lahir'];
		    $tgl = $data['Tgl_Lahir'];
		    $kls = $data['Kelas'];
	        ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">.: Form Edit Anggota :.</h2> <BR>
                        <form role="form" enctype="multipart/form-data" method="post" action="simpaneditanggota.php">
                            <div class="mb-3">
                              <label for="formGroupExampleInput2" class="form-label">No Anggota</label>
                              <input type="text" class="form-control" name="tnoanggota" value="<?php echo $kode; ?>" readonly>
                            </div>
                            <div class="mb-3">
                              <label for="formGroupExampleInput2" class="form-label">Nama Anggota</label>
                              <input type="text" class="form-control" name="tnmanggota" value="<?php echo $nama; ?>" required>
                            </div>
                            <div class="mb-3">
                              <label for="formGroupExampleInput2" class="form-label">NIS</label>
                              <input type="text" class="form-control" name="tnis" value="<?php echo $nis; ?>" required>
                            </div>
                            <div class="mb-3">
                              <label for="formGroupExampleInput2" class="form-label">Tempat Lahir</label>
                              <input type="text" class="form-control" name="ttmp" value="<?php echo $tmp; ?>" required>
                            </div>
                            <div class="mb-3">
                              <label for="formGroupExampleInput2" class="form-label">Tanggal Lahir</label>
                             <input type="text" class="form-control" name="ttgl" value="<?php echo $tgl; ?>" required>
                            </div>
                            <div class="mb-3">
                              <label for="exampleFormControlTextarea1" class="form-label">Kelas</label>
                                <select class="select2 form-control" name="tkelas">
                                    <option value="">Pilih Kelas</option>
                                    <option value="X-IPA-1">X-IPA-1</option>
                                    <option value="X-IPA-2">X-IPA-2</option>
                                    <option value="X-IPA-3">X-IPA-3</option>
                                    <option value="X-IPS-1">X-IPS-1</option>
                                    <option value="X-IPS-2">X-IPS-2</option>
                                    <option value="X-IPS-3">X-IPS-3</option>
                                    <option value="XI-IPA-1">XI-IPA-1</option>
                                    <option value="XI-IPA-2">XI-IPA-2</option>
                                    <option value="XI-IPA-3">XI-IPA-3</option>
                                    <option value="XI-IPS-1">XI-IPS-1</option>
                                    <option value="XI-IPS-2">XI-IPS-2</option>
                                    <option value="XI-IPS-3">XI-IPS-3</option>
                                    <option value="XII-IPA-1">XII-IPA-1</option>
                                    <option value="XII-IPA-2">XII-IPA-2</option>
                                    <option value="XII-IPA-3">XII-IPA-3</option>
                                    <option value="XII-IPS-1">XII-IPS-1</option>
                                    <option value="XII-IPS-2">XII-IPS-2</option>
                                    <option value="XII-IPS-3">XII-IPS-3</option>
                                </select>
                            </div>
                            <br>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <button class="btn btn-danger" type="reset">Reset</button>
                        </form>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; PSI Widyatama 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php  
}
?>