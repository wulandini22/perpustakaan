<?php
include "koneksi.php";
$nama = $_POST['tnama'];
$role = $_POST['trole'];
$nip = $_POST['tnip'];
$email = $_POST['temail'];
$pass = MD5($_POST['tpass']);

	$query = "insert into tbuser (NmUser, role, NIP, email, password) values
	('$nama', '$role', '$nip', '$email', '$pass');";
	
mysqli_query($koneksi,$query);
header('location: login.html');

?>