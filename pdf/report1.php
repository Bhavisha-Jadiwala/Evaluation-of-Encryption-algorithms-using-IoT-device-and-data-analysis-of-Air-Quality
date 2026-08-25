<?php
include '../model.php';
require('fpdf.php');




$pdf = new FPDF('P','mm','A4');
$pdf->SetAutoPageBreak(true);
$pdf->SetMargins(5,5);
$pdf -> AddPage();

$pdf->SetFont('Arial','B',19);
$pdf->SetTextColor(0);
$today=date('Y-m-d');
$prv=date('Y-m-d',strtotime(date('Y-m-d').'-30 days'));
$pdf->Cell(189,10,'Report From '.$prv.' to '.$today,0,1,'C');
$pdf->SetFont('','B',15);
$pdf->Cell(189,10,$_GET['pn'],0,1,'C');

$pdf->SetFont('','B',11);

$pdf->Line(0,25,210,25);

$pdf->Ln(10);

$pdf->SetFont('','B',11);
$pdf->Cell(30,6,'Date',1,0,'C');
$pdf->Cell(30,6,'Time',1,0,'C');
$pdf->Cell(40,6,'TEMPERATURE',1,0,'C');
$pdf->Cell(40,6,'HUMIDITY',1,0,'C');
$pdf->Cell(30,6,'PM25',1,0,'C');
$pdf->Cell(30,6,'PM10',1,1,'C');


$pdf->SetFont('','',11);

$db=new model();

for($i=0;$i<30;$i++)
{
    $date=date('Y-m-d',strtotime(date('Y-m-d').'-'.$i.' days'));
    $sql1="SELECT * FROM `datav` WHERE DATE(`Timestamp`)='$date' AND `Lat`='".$_GET['lat']."' AND `Long`='".$_GET['long']."' ORDER BY time DESC";
    $q1=mysqli_query($db->model(),$sql1);    

    if (mysqli_num_rows($q1)>0) {
        while($dd=mysqli_fetch_assoc($q1))
        {
            $pdf->Cell(30,6,date('Y-m-d',strtotime($dd['Timestamp'])),1,0,'C');
            $pdf->Cell(30,6,date('H:i:s',strtotime($dd['Timestamp'])),1,0,'C');
            $pdf->Cell(40,6,$dd['temperature'],1,0,'C');
            $pdf->Cell(40,6,$dd['hummidity'],1,0,'C');
            $pdf->Cell(30,6,$dd['pm25'],1,0,'C');
            $pdf->Cell(30,6,$dd['pm10'],1,1,'C');
        }
    }
}





$pdf->Output('D');
?>