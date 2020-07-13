<?php
include "fpdf.php";
require_once "../_config/config.php";

// $pdf = new FPDF();
// // Menambah halaman baru
// $pdf->AddPage();
// // Setting jenis font
// $pdf->SetFont('Arial','B',16);
// // Membuat string
// $pdf->Cell(190,7,'SEKOLAH DASAR ISLAM TERPADU',0,1,'C');
// $pdf->Cell(190,7,'JUMAPOLO',0,1,'C');
// $pdf->SetFont('Arial','B',9);
// $pdf->Cell(190,7,'Jl. Raya Jumapolo, Jumapolo Kabupaten/Kota: Karanganyar',0,1,'C');

// $pdf->Ln(3);
// $pdf->Cell(190,0.6,'','0','1','C',true);
// $pdf->Ln(5);
// Setting spasi kebawah supaya tidak rapat



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
$pdf->Cell(50,6,'NIS',1,0);
$pdf->Cell(35,6,'Nama Siswa',1,0);
$pdf->Cell(30,6,'Alamat',1,0);
 
$pdf->SetFont('Arial','',10);
$no=0;
$query =mysqli_query($con, "SELECT * FROM tb_siswa INNER JOIN tb_kelas ON tb_siswa.kelas_id=tb_kelas.kelas_id ORDER BY nis ASC");
while ($row = mysqli_fetch_array($query)){
    $no++;
    $pdf->Cell(10,6,$no.".",1,0,'C');
    $pdf->Cell(50,6,$row['nis'],1,0);
    $pdf->Cell(35,6,$row['nama_siswa'],1,0);
    $pdf->Cell(30,6,$row['nama_kelas'],1,0);
    $pdf->Cell(25,6,$row['alamat'],1,0);
}

$pdf->Output('I','daftar_siswa.pdf');
?>

