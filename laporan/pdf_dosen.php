<?php 
include "fpdf.php";
include "config.php";






// Setting halaman PDF
$pdf = new FPDF();
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','B',16);
// Membuat string
$pdf->Cell(190,7,'UNIVERSITAS SURAKARTA',0,1,'C');
$pdf->Cell(190,7,'FAKULTAS TEKNIK ELEKTRO DAN INFORMATIKA',0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(190,7,'Jl. Raya Palur Km.05, Telp.0271-825117',0,1,'C');
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'NO',1,0);
$pdf->Cell(50,6,'Nama Dosen',1,0);
$pdf->Cell(35,6,'Pendidikan Terakhir',1,0);
$pdf->Cell(30,6,'Alamat',1,0);
$pdf->Cell(25,6,'Email',1,0);
$pdf->Cell(25,6,'No.HP',1,1);
 
$pdf->SetFont('Arial','',10);
$no=0;
$query = mysqli_query($con, "SELECT * FROM tb_dosen");
while ($row = mysqli_fetch_array($query)){
	$no++;
	$pdf->Cell(10,6,$no.".",1,0,'C');

    // $pdf->Cell(10,6,$row[''],1,0);
    $pdf->Cell(50,6,$row['nama_dosen'],1,0);
    $pdf->Cell(35,6,$row['pendidikan_terakhir'],1,0);
    $pdf->Cell(30,6,$row['alamat'],1,0);
    $pdf->Cell(25,6,$row['email'],1,0);
    $pdf->Cell(25,6,$row['nomer_hp'],1,1);
}

$pdf->Output('I','daftar_dosen.pdf');
?>