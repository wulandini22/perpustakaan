<?php
session_start();
	
	include"koneksi.php";
	$email = $_POST['tuser'];
	$password = MD5($_POST['tpass']);

	$sql = "SELECT * FROM tbuser WHERE Email='$email' 
			AND password='$password'";
	$query = mysqli_query($koneksi, $sql);
	$rows = mysqli_num_rows($query);
	if($rows == 1){
	//menunjukkan variabel apa yang digunakan untuk session
		$_SESSION['Email']=$email;
	//redirect setelah session di atas berhasil berjalan
		header('location: index.php');
		
	}else{
			echo ("<script LANGUAGE='Javascript'>
					window.alert('Log In Gagal Username dan Password Anda SALAH...Silakan Log In Kembali');
					window.location.href='login.html';
				</script>");
		}
?>