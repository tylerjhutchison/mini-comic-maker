<?php
date_default_timezone_set('America/Los_Angeles');
ini_set("memory_limit","200M");

$numberOfPages = 8;
$projectDir = "TestPDF";
$pageName = "Page";
$dpi = 300;


for($i = 0; $i < $numberOfPages/2; $i++)
{
    echo "Processing spread number: $i \n";
    $a = sprintf("%04d", $i+1);
    $b = sprintf("%04d", $numberOfPages-$i);
    
    echo "$a and $b \n";
    
    $pageLow = "$projectDir/$pageName".$a.".png";
    $pageHigh = "$projectDir/$pageName".$b.".png";
    
    //For even pages
    if(($i+1)%2 == 0){
        $leftImage = imagecreatefrompng($pageLow);
        $leftImageInfo = getimagesize($pageLow);
        $rightImage = imagecreatefrompng($pageHigh);
        $rightImageInfo = getimagesize($pageHigh);
    }
    else //odd pages
    {
        $leftImage = imagecreatefrompng($pageHigh);
        $leftImageInfo = getimagesize($pageHigh);
        $rightImage = imagecreatefrompng($pageLow);
        $rightImageInfo = getimagesize($pageLow);
    }
    
    $finalWidth = $leftImageInfo[0] + $rightImageInfo[0];
    $finalHeight = $leftImageInfo[1];
    $finalImage = imagecreate($finalWidth, $finalHeight);

    //top row
    imagecopy($finalImage,$leftImage, 0,0,0,0,$leftImageInfo[0],$leftImageInfo[1]);
    imagecopy($finalImage,$rightImage, $leftImageInfo[0],0,0,0,$rightImageInfo[0], $rightImageInfo[1]);
    //bottom row This is only used if you are double stacking your files.
    //imagecopy($finalImage,$leftImage, 0,$leftImageInfo[1],0,0,$leftImageInfo[0],$leftImageInfo[1]);
    //imagecopy($finalImage,$rightImage, $leftImageInfo[0],$rightImageInfo[1],0,0,$rightImageInfo[0], $rightImageInfo[1]);
    
    //Where the files will be placed
    $target_path = "$projectDir/spreads";
    if(!is_dir($target_path))
    {
        mkdir($target_path, 0775, true);
    }
    
    imagepng($finalImage, "$target_path/spread$a.png");
    imagedestroy($leftImage);
    imagedestroy($rightImage);
    imagedestroy($finalImage);
}


// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF("L", "mm", 'USLETTER', true, 'UTF-8', false);
//Prevent default header settings.
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
// set margins
$pdf->SetMargins(0, 0, 0);
// set image scale factor
$pdf->setImageScale(1);
// ---------------------------------------------------------

$numberOfSpreads = $numberOfPages/2;
for($i=1; $i<=$numberOfSpreads; $i++){
    $spreadNum = sprintf("%04d", $i);
    // Add a page
    $pdf->AddPage();
    //Center the image vertically.
    $yHeight = $pdf->getPageHeight();
    $yCenter = 0;
    $image_info = getimagesize("$projectDir/spreads/spread$spreadNum.png");
    $image_height_pixels = $image_info[1];
    $image_height_inch = $image_height_pixels/$dpi;
    $image_height_mm = $image_height_inch*25.4;
    $image_margin = $yHeight - $image_height_mm;
    $yCenter = $image_margin/2;

    $pdf->Image("$projectDir/spreads/spread$spreadNum.png", '0', $yCenter, 279.4, 0, 'PNG', '', '', true, $dpi, 'C');
    //$pdf->setPageMark();
    // ---------------------------------------------------------
}
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output("$projectDir/finished.pdf", 'F');

?>
