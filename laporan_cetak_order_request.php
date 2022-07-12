<?php
error_reporting(E_ALL ^ E_NOTICE);
require('check_session.php');
ob_start();
$content = include('laporan_order_request_pdf.php');
$content = ob_get_clean();
require_once('library/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('L', 'A4', 'en', array(mL, mT, mR, mB));
$html2pdf->setDefaultFont('Arial');
$html2pdf->WriteHTML($content);
$html2pdf->Output('Laporan Order Request.pdf');
?>