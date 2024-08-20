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
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">.: Daftar Koleksi Buku :.</h2>
                        <a href="cetak-buku.php"><button class="btn btn-danger">Cetak</button><a>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Buku</th>
                                            <th>Nama Buku</th>
                                            <th>Pengarang</th>
                                            <th>Penerbit</th>
                                            <th>Tahun Terbit</th>
                                            <th>Edisi</th>
                                            <th>Jumlah Halaman</th>
                                            <th>Jumlah Eksamplar</th>
                                            <th>Jenis</th>
                                            <th>Cover</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                                $sql = "SELECT * FROM tbbuku Order by KdBuku Asc";
                                                $query = mysqli_query($koneksi, $sql);

                                                $x=0;
                                                while ($row = mysqli_fetch_array($query)){
                                                        $kdbuku = $row["KdBuku"];
                                                        $nmbuku = $row["NmBuku"];
                                                        $pengarang = $row["Pengarang"];
                                                        $penerbit = $row["Penerbit"];
                                                        $thn = $row["ThnTerbit"];
                                                        $edisi = $row["Edisi"];
                                                        $jmlhal = $row["JmlHal"];
                                                        $jmleks = $row["JmlEks"];
                                                        $jenis = $row["Jenis"];
                                                        $cover = $row["Cover"];
                                                ?>
                                                <tr>
                                                    <td><?php print($x+1); ?></td>
                                                    <td><?php print($kdbuku);?></td>
                                                    <td><?php print($nmbuku);?></td>
                                                    <td><?php print($pengarang);?></td>
                                                    <td><?php print($penerbit);?></td>
                                                    <td><?php print($thn);?></td>
                                                    <td><?php print($edisi);?></td>
                                                    <td><?php print($jmlhal);?></td>
                                                    <td><?php print($jmleks);?></td>
                                                    <td><?php print($jenis);?></td>
                                                    <td><img src="FileGambar/<?php print($cover); ?>"
                                                    class="img-fluid" alt="Cover Buku" height="50" width="50"></td>
                                                </tr>
                                                <?php
                                                    $x++;
                                                    }
                                                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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