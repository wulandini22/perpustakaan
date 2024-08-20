<?php
//load file koneksi php
include "koneksi.php";
//baca lokasi file sementara
$KdBuku = $_POST['tkdbuku'];
$NmBuku = $_POST['tnmbuku'];
$Pengarang = $_POST['tpengarang'];
$Penerbit = $_POST['tpenerbit'];
$ThnTerbit = $_POST['ttahun'];
$Edisi = $_POST['tedisi'];
$JmlHal = $_POST['tjml'];
$Jenis = $_POST['tjenis'];

$lokasi_foto = $_FILES['tcover']['tmp_name'];
$nama_foto = $_FILES['tcover']['name'];
//tentukan folder untuk menyimpan file
$folderfoto = "FileGambar/$nama_foto";

//apabila file berhasil diupload
move_uploaded_file($lokasi_foto, $folderfoto);

	$query = "update tbbuku set NmBuku='$NmBuku', Pengarang='$Pengarang',
	Penerbit='$Penerbit', ThnTerbit='$ThnTerbit', Edisi='$Edisi',
	JmlHal='$JmlHal', Jenis='$Jenis', Cover='$nama_foto' WHERE KdBuku='$KdBuku'";
	
mysqli_query($koneksi,$query); //eksekusi query, hubungkan ke database dan jalankan query
header('location: tampilbuku.php'); //tampilan selanjutnya

?>