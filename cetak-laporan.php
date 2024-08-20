<?php
include 'koneksi.php';
include 'fpdf/fpdf.php';
$pdf = new FPDF();
$pdf->AddPage('p', array(300, 270));  // Custom page size

$tgl = date('d/m/Y');
$pdf->setFont('Arial', 'B', 12);
$pdf->Image('images/logo.png', 10, 8, 20, 19);
$pdf->Cell(257, 6, 'PERPUSTAKAAN SMAN XXX', 0, 1, 'C');  // Adjusted width
$pdf->setFont('Arial', 'B', 8);
$pdf->Cell(257, 6, 'Jl. Sukasuka No.1234 Bandung', 0, 1, 'C');  // Adjusted width
$pdf->SetLineWidth(0.3);
$pdf->Line(10, 28, 250, 28);  // Adjusted width
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(257, 6, 'Laporan Data Buku', 0, 1, 'C');  // Adjusted width
$pdf->Ln(1);

$pdf->setFont('Arial', 'B', 8);
$pdf->Cell(257, 4, 'Tanggal Cetak ' . $tgl, 0, 1, 'C');  // Adjusted width

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetFillColor(192, 192, 192);

$pdf->Cell(8, 6, 'No', 1, 0, 'C', 1);
$pdf->Cell(15, 6, 'ID Pinjam', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'No Anggota', 1, 0, 'C', 1); // Adjusted width
$pdf->Cell(20, 6, 'Kode Buku', 1, 0, 'C', 1); // Adjusted width
$pdf->Cell(31, 6, 'Tanggal Peminjaman', 1, 0, 'C', 1); // Adjusted width
$pdf->Cell(32, 6, 'Tanggal Pengembalian', 1, 0, 'C', 1); // Adjusted width
$pdf->Cell(32, 6, 'Tanggal Dikembalikan', 1, 0, 'C', 1); // Adjusted width
$pdf->Cell(20, 6, 'Jumlah Buku', 1, 0, 'C', 1);
$pdf->Cell(12, 6, 'Denda', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Metode Pembayaran', 1, 0, 'C', 1); // Adjusted width
$pdf->Cell(32, 6, 'Status', 1, 0, 'C', 1); // Adjusted width


$nomor=0;
$sql ="SELECT * FROM tbtransaksi ";
$result=mysqli_query($koneksi, $sql);

while($data=mysqli_fetch_array($result)){
	$nomor++;
    $pdf->Ln();
	$pdf->setFont('Arial','',7);
	$pdf->Cell(8,6,$nomor,1,0,'L');
	$pdf->Cell(15,6,$data['id_pinjam'],1,0,'L');
	$pdf->Cell(20,6,$data['NoAnggota'],1,0,'L');
	$pdf->Cell(20,6,$data['KdBuku'],1,0,'L');
	$pdf->Cell(31,6,$data['TglPinjam'],1,0,'L');
	$pdf->Cell(32,6,$data['TglKembali'],1,0,'L');
    $pdf->Cell(32,6,$data['TglHari'],1,0,'L');
    $pdf->Cell(20,6,$data['Jml_Buku'],1,0,'L');
    $pdf->Cell(12,6,$data['Denda'],1,0,'L');
    $pdf->Cell(30,6,$data['Metode'],1,0,'L');
    $pdf->Cell(32,6,$data['Status'],1,0,'L');
}
$pdf->Output('cetak-buku.pdf','I');
?>			