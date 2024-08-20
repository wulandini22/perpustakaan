<?php
//load file koneksi php
include "koneksi.php";
//baca lokasi file sementara
$noanggota = $_POST['tnoanggota'];
$NmAnggota = $_POST['tnmanggota'];
$NIS = $_POST['tnis'];
$Tmp_Lahir = $_POST['ttmp'];
$Tgl_Lahir = $_POST['ttgl'];
$Kls = $_POST['tkelas'];

	$query = "update tbanggota set NmAnggota='$NmAnggota',
	NIS='$NIS', Tmp_Lahir='$Tmp_Lahir', Tgl_Lahir='$Tgl_Lahir',
	Kelas='$Kls' WHERE NoAnggota='$noanggota'";
	
mysqli_query($koneksi,$query); //eksekusi query, hubungkan ke database dan jalankan query
header('location: tampilanggota.php'); //tampilan selanjutnya

?>