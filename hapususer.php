<?php
include 'koneksi.php';
$kode = $_GET['nip'];
$query = "SELECT * FROM tbuser WHERE NIP='$kode'";
$sql = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($sql);
$query2 = "DELETE FROM tbuser WHERE NIP='$kode'";
$sql2 = mysqli_query($koneksi,$query2);
if($sql2){ //pengecekan proses
	header("location: tampiluser.php"); //jika sukses lgsg redirect ke halaman viewdata1.php
}else{
	echo "Data gagal dihapus. <a href='tampiluser.php'><Kembali</a>";
}
?>