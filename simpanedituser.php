<?php
include "koneksi.php";
$nip = $_POST['tnip'];
$NmUser = $_POST['tnmuser'];
$email = $_POST['temail'];
$pass = MD5($_POST['tpass']);
$role = $_POST['trole'];

	$query = "update tbuser set NmUser='$NmUser', email='$email',
	password='$pass', role='$role' WHERE NIP='$nip'";
	
mysqli_query($koneksi,$query); 
header('location: tampiluser.php'); 

?>