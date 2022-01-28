<?php
include '../include/conn/config.php';
require('../assets/fpdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../assets/images/transform.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'PT. MUSIM MAS KIM 2',0,'L');
$pdf->SetX(4);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(19.5,0.5,'Telpon : (061) 6944524',0,'L');    
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JLN. SRIWIJAYA NO.12, PERISA HULU, KEC. MEDAN BARU, KOTA MEDAN, SUMATERA UTARA 20152',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'email : mas@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Times','B',14);
$pdf->Cell(25.5,0.7,"Laporan Hasil Penilaian Penerimaan SBA",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,1,'Hasil Penilaian :',0,6,'L');
$pdf->SetFont('Times','B',10);
$pdf->SetFont('Times','B',10);
$pdf->Cell(2, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Nama Lengkap', 1, 0, 'C');
$pdf->Cell(9, 0.8, 'Alamat', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Nilai Pelamar', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Peringkat Pelamar', 1, 1, 'C');
$pdf->SetFont('Times','',10);
$no=1;
$query=mysql_query("select * from tbl_pelamar order by rangking_pelamar asc");
while($lihat=mysql_fetch_array($query)){
	$pdf->Cell(2, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(7, 0.8, $lihat['nama'], 1, 0,'C');
	$pdf->Cell(9, 0.8, $lihat['alamat'], 1, 0,'C');
	$pdf->Cell(3, 0.8, number_format($lihat['nilai_pelamar'],3), 1, 0,'C');
	$pdf->Cell(4, 0.8, $lihat['rangking_pelamar'], 1, 1,'C');
	$no++;
}


$pdf->SetFont('Times','',12);
$pdf->SetX(2); 
$pdf->Cell(0,2,'Dikeluar di  		   : Medan',0,0,'L');
$pdf->SetX(2); 
$pdf->Cell(0,3,"Pada Tanggal 		: ".date("D-d/m/Y"),0,0,'L');
$pdf->SetFont('Times','B',10);
$pdf->SetX(2); 
$pdf->Cell(0,4,'Pimpinan',0,0,'L');
$pdf->SetX(2); 
$pdf->Cell(0,7,'...................................................',0,0,'L');


$pdf->Output("laporan_buku.pdf","I");

?>

