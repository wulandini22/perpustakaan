<?php
include "koneksi.php";
$noanggota = $_POST['tnoanggota'];
$nama = $_POST['tnmanggota'];
$nis = $_POST['tnis'];
$tmp = $_POST['ttmp'];
$tgl = $_POST['ttgl'];
$kls = $_POST['tkelas'];

	$query = "insert into tbanggota (NoAnggota, NmAnggota, NIS,
    Tmp_Lahir, Tgl_Lahir, Kelas) values
	('$noanggota', '$nama', '$nis', '$tmp', 
	'$tgl', '$kls');";
	
mysqli_query($koneksi,$query);
header('location: tampilanggota.php');

?>