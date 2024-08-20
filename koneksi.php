<?php
$host='localhost';
$user='root';
$pwd='';
$db='dblib';

$koneksi = mysqli_connect($host,$user,$pwd,$db);
//Cek Koneksi
//mysqli_connect adalah function untuk koneks
if ($koneksi) {
}
	else
	{
	echo "Koneksi Database Gagal";
	}
?>