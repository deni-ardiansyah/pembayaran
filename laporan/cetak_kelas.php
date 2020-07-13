<?php
include "fpdf.php";
require_once "../_config/config.php";

$pdf = new FPDF();
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','B',16);
// Membuat string
$pdf->Cell(190,7,'SEKOLAH DASAR ISLAM TERPADU',0,1,'C');
$pdf->Cell(190,7,'JUMAPOLO',0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(190,7,'Jl. Raya Jumapolo, Jumapolo Kabupaten/Kota: Karanganyar',0,1,'C');

$pdf->Ln(3);
$pdf->Cell(190,0.6,'','0','1','C',true);
$pdf->Ln(5);
// Setting spasi kebawah supaya tidak rapat

$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'Daftar Kelas',0,1,'C');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'No',1,0);
// $pdf->Cell(25,6,'ID Dosen',1,0);
$pdf->Cell(50,6,'ID Kelas',1,0);
$pdf->Cell(50,6,'Nama Kelas',1,0);

 
$pdf->SetFont('Arial','',10);

$no=0;
$query =mysqli_query($con, "SELECT * FROM tb_kelas ORDER BY nama_kelas ASC");
while ($data = mysqli_fetch_array($query)){
    $no++;
    $pdf->Cell(10,6,$no.".",1,0,'C');           
    $pdf->Cell(50,6,$data['kelas_id'],1,0);
    $pdf->Cell(50,6,$data['nama_kelas'],1,0);
}

$pdf->Output('I', 'daftar_kelas.pdf');
?>


