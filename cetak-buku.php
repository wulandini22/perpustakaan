<?php
include 'koneksi.php';
include 'fpdf/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage('P','A4');

$tgl=date('d/m/Y');
$pdf->setFont('Arial','B',12);
$pdf->Image('images/logo.png',10,8,20,19);
$pdf->Cell(187,6,'PERPUSTAKAAN SMAN XXX',0,1,'C');
$pdf->setFont('Arial','B',8);
$pdf->Cell(187,6,'Jl. Sukasuka No.1234 Bandung',0,1,'C');
$pdf->SetLineWidth(0.3);
$pdf->Line(10,28,200,28);
$pdf->setFont('Arial','B',10);
$pdf->Cell(187,6,'Laporan Data Buku',0,1,'C');
$pdf->Ln(1);	
$pdf->setFont('Arial','B',8);
$pdf->Cell(187,4,'Tanggal Cetak '.$tgl,0,1,'C');

$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(192,192,192);
$pdf->Cell(8,6,'No',1,0,'C',1);
$pdf->Cell(20,6,'Kode Buku',1,0,'C',1);
$pdf->Cell(60,6,'Nama Buku',1,0,'C',1);
$pdf->Cell(40,6,'Pengarang',1,0,'C',1);
$pdf->Cell(45,6,'Penerbit',1,0,'C',1);
$pdf->Cell(15,6,'Thn Terbit',1,1,'C',1);

$nomor=0;
$sql ="SELECT * FROM tbbuku ";
$result=mysqli_query($koneksi, $sql);

while($data=mysqli_fetch_array($result)){
	$nomor++;
	$pdf->Ln(0);
	$pdf->setFont('Arial','',7);
	$pdf->Cell(8,4,$nomor,1,0,'L');
	$pdf->Cell(20,4,$data['KdBuku'],1,0,'L');
	$pdf->Cell(60,4,$data['NmBuku'],1,0,'L');
	$pdf->Cell(40,4,$data['Pengarang'],1,0,'L');
	$pdf->Cell(45,4,$data['Penerbit'],1,0,'L');
	$pdf->Cell(15,4,$data['ThnTerbit'],1,1,'L');
}
$pdf->Output('cetak-buku.pdf','I');
?>			