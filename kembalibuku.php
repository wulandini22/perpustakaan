<?php
include('koneksi.php');

// Ambil data dari formulir
$id = $_POST['tid_pinjam'];
$NoAnggota = $_POST['tnoanggota'];
$KdBuku = $_POST['tkdbuku'];
$Pinjam = $_POST['tpinjam'];
$Kembali = $_POST['tkembali'];
$tgl = $_POST['ttgl'];
$Jml = $_POST['tjml'];

$currentDate = date('Y-m-d');
$diffInDays = floor((strtotime($tgl) - strtotime($kembali))/(60*60*24));

$denda = ($diffInDays > 0) ? $diffInDays*1000 : 0;

// Perbarui data di database
$query1 = "UPDATE tbtransaksi SET TglHari='$tgl' WHERE id_pinjam='$id'";
if (mysqli_query($koneksi, $query1)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($koneksi);
}

// Redirect ke halaman denda.php
header('location: denda.php?id_pinjam=' . $id);
?>
