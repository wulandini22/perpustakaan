<?php
include 'koneksi.php';

$NoAnggota = $_POST['tnoanggota'];
$KdBuku = $_POST['tkdbuku'];
$Pinjam = $_POST['tpinjam'];
$Kembali = $_POST['tkembali'];
$Jml = $_POST['tjml'];

    $query = "insert into tbtransaksi (NoAnggota, KdBuku,
    TglPinjam, TglKembali, Jml_Buku, Status) values
    ('$NoAnggota', '$KdBuku', '$Pinjam', 
    '$Kembali', '$Jml', 'dipinjam');";

mysqli_query($koneksi,$query); //eksekusi query, hubungkan ke database dan jalankan query
header('location: tampilpinjam.php'); //tampilan selanjutnya
?>