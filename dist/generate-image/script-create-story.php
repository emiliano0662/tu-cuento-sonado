<?php require('/fpdf/fpdf.php');

class PDF_TextBox extends FPDF
{
    /**
     * Draws text within a box defined by width = w, height = h, and aligns
     * the text vertically within the box ($valign = M/B/T for middle, bottom, or top)
     * Also, aligns the text horizontally ($align = L/C/R/J for left, centered, right or justified)
     * drawTextBox uses drawRows
     *
     * This function is provided by TUFaT.com
     */
    function drawTextBox($strText, $w, $h, $align='L', $valign='T', $border=true)
    {
        $xi=$this->GetX();
        $yi=$this->GetY();
        
        $hrow=$this->FontSize;
        $textrows=$this->drawRows($w,$hrow,$strText,0,$align,0,0,0);
        $maxrows=floor($h/$this->FontSize);
        $rows=min($textrows,$maxrows);

        $dy=0;
        if (strtoupper($valign)=='M')
            $dy=($h-$rows*$this->FontSize)/2;
        if (strtoupper($valign)=='B')
            $dy=$h-$rows*$this->FontSize;

        $this->SetY($yi+$dy);
        $this->SetX($xi);

        $this->drawRows($w,$hrow,$strText,0,$align,false,$rows,1);

        if ($border)
            $this->Rect($xi,$yi,$w,$h);
    }

    function drawRows($w, $h, $txt, $border=0, $align='J', $fill=false, $maxline=0, $prn=0)
    {   
        $h=5;
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 && $s[$nb-1]=="\n")
            $nb--;
        $b=0;
        if($border)
        {
            if($border==1)
            {
                $border='LTRB';
                $b='LRT';
                $b2='LR';
            }
            else
            {
                $b2='';
                if(is_int(strpos($border,'L')))
                    $b2.='L';
                if(is_int(strpos($border,'R')))
                    $b2.='R';
                $b=is_int(strpos($border,'T')) ? $b2.'T' : $b2;
            }
        }
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $ns=0;
        $nl=1;
        while($i<$nb)
        {
            //Get next character
            $c=$s[$i];
            if($c=="\n")
            {
                //Explicit line break
                if($this->ws>0)
                {
                    $this->ws=0;
                    if ($prn==1) $this->_out('0 Tw');
                }
                if ($prn==1) {
                    $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
                }
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $ns=0;
                $nl++;
                if($border && $nl==2)
                    $b=$b2;
                if ( $maxline && $nl > $maxline )
                    return substr($s,$i);
                continue;
            }
            if($c==' ')
            {
                $sep=$i;
                $ls=$l;
                $ns++;
            }
            $l+=$cw[$c];
            if($l>$wmax)
            {
                //Automatic line break
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                    if($this->ws>0)
                    {
                        $this->ws=0;
                        if ($prn==1) $this->_out('0 Tw');
                    }
                    if ($prn==1) {
                        $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
                    }
                }
                else
                {
                    if($align=='J')
                    {
                        $this->ws=($ns>1) ? ($wmax-$ls)/1000*$this->FontSize/($ns-1) : 0;
                        if ($prn==1) $this->_out(sprintf('%.3F Tw',$this->ws*$this->k));
                    }
                    if ($prn==1){
                        $this->Cell($w,$h,substr($s,$j,$sep-$j),$b,2,$align,$fill);
                    }
                    $i=$sep+1;
                }
                $sep=-1;
                $j=$i;
                $l=0;
                $ns=0;
                $nl++;
                if($border && $nl==2)
                    $b=$b2;
                if ( $maxline && $nl > $maxline )
                    return substr($s,$i);
            }
            else
                $i++;
        }
        //Last chunk
        if($this->ws>0)
        {
            $this->ws=0;
            if ($prn==1) $this->_out('0 Tw');
        }
        if($border && is_int(strpos($border,'B')))
            $b.='B';
        if ($prn==1) {
            $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
        }
        $this->x=$this->lMargin;
        return $nl;
    }
}

$get_skin = (empty($_POST['skin']))? '1' : $_POST['skin'];
$get_eyes = (empty($_POST['eyes']))? '1' : $_POST['eyes'];
$get_hair = (empty($_POST['hair']))? '1' : $_POST['hair'];

$get_gender = (empty($_POST['gender']))? 'girl' : $_POST['gender'];

$get_name = (empty($_POST['name']))? '' : strtoupper($_POST['name']);
$get_typography = (empty($_POST['typography']))? '1' : $_POST['typography'];
$get_dedication = (empty($_POST['dedication']))? '' : $_POST['dedication'];

$img_user = (empty($_POST['hidden_croppie_img_file']))? NULL : $_POST['hidden_croppie_img_file'];

if (!empty($img_user))  {

    list($type, $img_user) = explode(';', $img_user);
    list(, $img_user)      = explode(',', $img_user);

    $img_user = base64_decode($img_user);

    $imageName = rand(0, 1000).date("YmdHis").".png";
    
    $destinationPath = dirname(__FILE__).'/assistant/imguser/';

    file_put_contents($destinationPath.$imageName, $img_user);

    $img_user = $imageName;
}

$code_image = rand(0, 1000).date("YmdHis");

$image_create = imagecreatetruecolor(850,425);

imagealphablending($image_create, true);
imagesavealpha($image_create, true);


// Imagen Fondo Uno
$imagecreatefrompng = imagecreatefrompng("./images/background/1.png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Piel
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-1/skin/".$get_skin.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Ojos
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-1/eyes/".$get_eyes.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Cabello
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-1/hair/".$get_hair.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

imagepng($image_create, "./assistant/imgfinal/".$code_image."-page-1.png");

imagedestroy($imagecreatefrompng);


// Imagen Fondo Dos
$imagecreatefrompng = imagecreatefrompng("./images/background/2.png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Piel
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-2/skin/".$get_skin.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Ojos
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-2/eyes/".$get_eyes.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Cabello
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-2/hair/".$get_hair.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

imagepng($image_create, "./assistant/imgfinal/".$code_image."-page-2.png");

imagedestroy($imagecreatefrompng);


// Imagen Fondo Tres
$imagecreatefrompng = imagecreatefrompng("./images/background/3.png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Piel
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-3/skin/".$get_skin.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Ojos
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-3/eyes/".$get_eyes.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Cabello
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-3/hair/".$get_hair.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

imagepng($image_create, "./assistant/imgfinal/".$code_image."-page-3.png");

imagedestroy($imagecreatefrompng);


// Imagen Fondo Cuatro
$imagecreatefrompng = imagecreatefrompng("./images/background/4.png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Piel
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-4/skin/".$get_skin.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Ojos
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-4/eyes/".$get_eyes.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Orejas
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-4/ear/".$get_skin.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Cabello
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-4/hair/".$get_hair.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

imagepng($image_create, "./assistant/imgfinal/".$code_image."-page-4.png");

imagedestroy($imagecreatefrompng);


// Imagen Fondo Cinco
$imagecreatefrompng = imagecreatefrompng("./images/background/5.png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Piel
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-5/skin/".$get_skin.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Ojos
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-5/eyes/".$get_eyes.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Cabello
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-5/hair/".$get_hair.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

imagepng($image_create, "./assistant/imgfinal/".$code_image."-page-5.png");

imagedestroy($imagecreatefrompng);


// Imagen Fondo Seis
$imagecreatefrompng = imagecreatefrompng("./images/background/6.png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Piel
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-6/skin/".$get_skin.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Ojos
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-6/eyes/".$get_eyes.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

// Imagen Cabello
$imagecreatefrompng = imagecreatefrompng("./images/".$get_gender."/page-6/hair/".$get_hair.".png");
imagecopy($image_create,$imagecreatefrompng,0,0,0,0,850,425);

imagepng($image_create, "./assistant/imgfinal/".$code_image."-page-6.png");

imagedestroy($imagecreatefrompng);


/*$pdf = new PDF_TextBox();
$pdf->AddFont('Nunito-regular', '', 'Nunito-regular.php');
$pdf->SetFont('Nunito-regular','',8);

$pdf->AddPage('L',array(112,225),0);
$pdf->Image("./assistant/imgfinal/".$code_image."-page-1.png",0,0,0,0,'PNG',false);

$pdf->AddPage('L',array(112,225),0);
$pdf->Image("./assistant/imgfinal/".$code_image."-page-2.png",0,0,0,0,'PNG',false);
$pdf->SetXY(29,70);
$pdf->drawTextBox(utf8_decode("En un bosque cerca de un hermoso lago, había una gran casa de madera, donde vivía una persona muy especial que se llamaba ".$get_name.", junto a su familia y su gran amigo Dinky, un pequeño perrito con quien jugaba y se divertían todo el día"), 90, 0,'J','M',false);

$pdf->AddPage('L',array(112,225),0);
$pdf->Image("./assistant/imgfinal/".$code_image."-page-3.png",0,0,0,0,'PNG',false);

$pdf->AddPage('L',array(112,225),0);
$pdf->Image("./assistant/imgfinal/".$code_image."-page-4.png",0,0,0,0,'PNG',false);

$pdf->AddPage('L',array(112,225),0);
$pdf->Image("./assistant/imgfinal/".$code_image."-page-5.png",0,0,0,0,'PNG',false);

$pdf->AddPage('L',array(112,225),0);
$pdf->Image("./assistant/imgfinal/".$code_image."-page-6.png",0,0,0,0,'PNG',false);

//$pdf->Output("F","./pdf/".$code_image.".pdf",false);
$pdf->Output();*/


/*if (file_exists("./assistant/imgfinal/".$code_image."-page-1.png")) { unlink("./assistant/imgfinal/".$code_image."-page-1.png"); }
if (file_exists("./assistant/imgfinal/".$code_image."-page-2.png")) { unlink("./assistant/imgfinal/".$code_image."-page-2.png"); }
if (file_exists("./assistant/imgfinal/".$code_image."-page-3.png")) { unlink("./assistant/imgfinal/".$code_image."-page-3.png"); }
if (file_exists("./assistant/imgfinal/".$code_image."-page-4.png")) { unlink("./assistant/imgfinal/".$code_image."-page-4.png"); }
if (file_exists("./assistant/imgfinal/".$code_image."-page-5.png")) { unlink("./assistant/imgfinal/".$code_image."-page-5.png"); }
if (file_exists("./assistant/imgfinal/".$code_image."-page-6.png")) { unlink("./assistant/imgfinal/".$code_image."-page-6.png"); }*/

/*if (!empty($img_user)) { unlink("./assistant/imguser/".$img_user); }

echo "http://localhost/tu-cuento-sonado/dist/generate-image/pdf/".$code_image.".pdf";*/

?>