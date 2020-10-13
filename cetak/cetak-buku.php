
<?php
include('../rekap/TCPDF/tcpdf.php');

$pdf = new TCPDF('P', 'mm', 'A4');
//  
$pdf->AddPage();

ob_end_clean();
$pdf->Output();
?>
