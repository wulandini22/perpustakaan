<?php
include('koneksi.php');

$id = $_POST['tid_pinjam'];
$NoAnggota = $_POST['tnoanggota'];
$KdBuku = $_POST['tkdbuku'];
$Pinjam = $_POST['tpinjam'];
$Kembali = $_POST['tkembali'];
$Tgl = $_POST['ttgl'];
$Jml = $_POST['tjml'];
$Denda = $_POST['tdenda'];
$Metode = $_POST['tmetode'];

$query1 = "UPDATE tbtransaksi SET Denda='$Denda', Metode='$Metode', Status='dikembalikan' WHERE id_pinjam='$id'";
mysqli_query($koneksi, $query1);
header('location:tampilpinjam.php');
?>
