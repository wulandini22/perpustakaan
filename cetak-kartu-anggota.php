<?php
include 'koneksi.php';
include 'fpdf/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage('P','A4');

$tgl=date('Y/m/d');
$pdf->Image('images/latar-kartu.png',5,5,100,56);
$pdf->Image('images/latar-kartu.png',106,5,100,56);
$pdf->Image('images/logo.png',10,9,10,10);
$pdf->Image('images/foto-default.jpg',80,29,20,25);
$pdf->setFont('Arial','B',12);
$pdf->Cell(90,5,'PERPUSTAKAAN SMAN XXX',0,0,'C');
$pdf->Cell(10,5,'',0,0,'C');
$pdf->setFont('Arial','B',10);
$pdf->Cell(90,5,'KETENTUAN',0,1,'C');
$pdf->setFont('Arial','B',8);
$pdf->Cell(90,5,'Jl. ABC No. 45 Bandung',0,0,'C');
$pdf->Cell(10,5,'',0,0,'C');
$pdf->setFont('Arial','',7);
$pdf->Cell(90,5,'- Ketentuan 1',0,1,'L');
$pdf->SetLineWidth(0.2);
$pdf->Line(10,20,100,20);
$pdf->setFont('Arial','B',10);
$pdf->Cell(90,5,'KARTU IDENTITAS ANGGOTA',0,0,'C');
$pdf->Cell(10,5,'',0,0,'C');
$pdf->setFont('Arial','',7);
$pdf->Cell(90,5,'- Ketentuan 2',0,1,'L');
$pdf->SetLineWidth(0.2);
$pdf->Line(10,25,100,25);
$pdf->Ln(6);

$no_anggota=$_GET['noanggota'];
$sql ="SELECT * FROM tbanggota WHERE NoAnggota='$no_anggota' ";
$q_anggota=mysqli_query($koneksi, $sql);
$r_anggota=mysqli_fetch_array($q_anggota);
$pdf->setFont('Arial','',10);
$pdf->Cell(20,5,'No. Anggota',0,0,'L');
$pdf->Cell(76,5,': '.$r_anggota['NoAnggota'],0,0,'L');
$pdf->Cell(10,5,'',0,1,'C');
$pdf->setFont('Arial','',10);
$pdf->Cell(20,5,'Nama',0,0,'L');
$pdf->Cell(36,5,': '.$r_anggota['NmAnggota'],0,1,'L');
$pdf->Cell(20,5,'Kelas',0,0,'L');
$pdf->Cell(36,5,': '.$r_anggota['Kelas'],0,1,'L');
$pdf->Ln(2);

$pdf->Output('cetak-kartu-anggota.pdf','I');
?>	