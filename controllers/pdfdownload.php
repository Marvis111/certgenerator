<?php
require('fpdf.php');

if (isset($_POST['downloadcertpdf'])) {
header('content-type:application/pdf');
$image= imagecreatefromjpeg('../controllers/certificate.jpg');

$color = imagecolorallocate($image, 0, 0, 0);

$dir= dirname(realpath(__FILE__));
$sep=DIRECTORY_SEPARATOR;   
$font =$dir.$sep.'OpenSans-Regular.ttf';
//name
$name = $_SESSION['username'];
imagettftext($image, 40, 0, 125, 300, $color, $font, $name);
//header('content-type:image/jpeg');

$vp = 'Okeke Johnpaul';
imagettftext($image,20 , 0, 500, 460, $color, $font, $vp);
imagejpeg($image,$name.'.jpg',);
$pdf = new FPDF('L','in',[11.7,8.27]);
$pdf->AddPage();
$pdf->Image($name.'.jpg',0,0,11.7,8.27);
$pdf->Output($name.".pdf",'D');
}