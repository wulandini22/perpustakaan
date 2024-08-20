<?php
include 'koneksi.php';
$kode = $_GET['noanggota'];
$query = "SELECT * FROM tbanggota WHERE NoAnggota='$kode'";
$sql = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($sql);
$query2 = "DELETE FROM tbanggota WHERE NoAnggota='$kode'";
$sql2 = mysqli_query($koneksi,$query2);
if($sql2){ //pengecekan proses
	header("location: tampilanggota.php"); //jika sukses lgsg redirect ke halaman viewdata1.php
}else{
	echo "Data gagal dihapus. <a href='tampilanggota.php'><Kembali</a>";
}
?>