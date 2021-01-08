<?php
require('fpdf.php');
$pdf = new FPDF('P', 'mm','Letter');
$pdf->AddPage();

$pdf->SetFont('Times','B',16);

$pdf->Cell(0,7,'DAFTAR PELANGGAN ',0,1,'C');

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(30,6,'NAME',1,0,'C');
$pdf->Cell(40,6,'ID',1,0,'C');
$pdf->Cell(30,6,'Gender',1,0,'C');
$pdf->Cell(30,6,'Lemari',1,0,'C');
$pdf->Cell(30,6,'Mobile',1,0,'C');
$pdf->Cell(20,6,'Berat cucian',1,1,'C');
$pdf->SetFont('Times','',10);


//Membuat Koneksi ke database u5365604_elaundry
$host="localhost";
$user="u5365604_elaundry";
$password="database123_elaundry";
$db="u5365604_elaundry";
$kon = mysqli_connect($host,$user,$password,$db);


$no=1;
$jk='';
//Query untuk menambil data table_nodemcu_rfidrc522_mysql pada tabel table_nodemcu_rfidrc522_mysql
$hasil = mysqli_query($kon, "select * from table_nodemcu_rfidrc522_mysql order by id asc");
while ($data = mysqli_fetch_array($hasil)){
    
    $pdf->Cell(8,6,$no,1,0);
    $pdf->Cell(30,6,$data['name'        ],1,0);
    $pdf->Cell(40,6,$data['id'          ],1,0);
    $pdf->Cell(30,6,$data['gender'      ],1,0);
    $pdf->Cell(30,6,$data['email'       ],1,0);
    $pdf->Cell(30,6,$data['mobile'      ],1,0);
    $pdf->Cell(20,6,$data['berat_cucian'],1,1);
    $no++;
}

$pdf->Output();
?>