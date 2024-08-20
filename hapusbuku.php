<?php
include 'koneksi.php';
$kode = $_GET['KdBuku'];
$query = "SELECT * FROM tbbuku WHERE KdBuku='$kode'";
$sql = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($sql);
$query2 = "DELETE FROM tbbuku WHERE KdBuku='$kode'";
$sql2 = mysqli_query($koneksi,$query2);
if($sql2){ //pengecekan proses
	header("location: tampilbuku.php"); //jika sukses lgsg redirect ke halaman viewdata1.php
}else{
	echo "Data gagal dihapus. <a href='tampilbuku.php'><Kembali</a>";
}
?>