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
$JmlEks = $_POST['teks'];
$Jenis = $_POST['tjenis'];

$lokasi_foto = $_FILES['tcover']['tmp_name'];
$nama_foto = $_FILES['tcover']['name'];
//tentukan folder untuk menyimpan file
$folderfoto = "FileGambar/$nama_foto";

//apabila file berhasil diupload
move_uploaded_file($lokasi_foto, $folderfoto);

	$query = "insert into tbbuku (KdBuku, NmBuku, Pengarang,
	Penerbit, ThnTerbit, Edisi, JmlHal, JmlEks, Jenis, Cover) values
	('$KdBuku', '$NmBuku', '$Pengarang', '$Penerbit', 
	'$ThnTerbit', '$Edisi', '$JmlHal', '$JmlEks', '$Jenis', '$nama_foto');";
	
mysqli_query($koneksi,$query); //eksekusi query, hubungkan ke database dan jalankan query
header('location: tampilbuku.php'); //tampilan selanjutnya

?>