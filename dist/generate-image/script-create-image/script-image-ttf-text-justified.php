<?php
function imagettftextjustified(&$image, $size, $angle, $left, $top, $color, $font, $text, $max_width, $minspacing=3,$linespacing=1)
{
 $wordwidth = array();
$linewidth = array();
$linewordcount = array();
 $largest_line_height = 0;
$lineno=0;
$words=explode(" ",$text);
$wln=0;
$linewidth[$lineno]=0;
$linewordcount[$lineno]=0;
foreach ($words as $word)
 {
 $dimensions = imagettfbbox($size, $angle, $font, $word);
 $line_width = $dimensions[2] - $dimensions[0];
 $line_height = $dimensions[1] - $dimensions[7];
 if ($line_height>$largest_line_height) $largest_line_height=$line_height;
 if (($linewidth[$lineno]+$line_width+$minspacing)>$max_width)
 {
$lineno++;
$linewidth[$lineno]=0;
$linewordcount[$lineno]=0;
$wln=0;
 }
  $linewidth[$lineno]+=$line_width+$minspacing;
 $wordwidth[$lineno][$wln]=$line_width;
 $wordtext[$lineno][$wln]=$word;
 $linewordcount[$lineno]++;
  $wln++;
 }
for ($ln=0;$ln<=$lineno;$ln++)
 {
$slack=$max_width-$linewidth[$ln];
if (($linewordcount[$ln]>1)&&($ln!=$lineno)) $spacing=($slack/($linewordcount[$ln]-1));
else $spacing=$minspacing;
$x=0;
for ($w=0;$w<$linewordcount[$ln];$w++)
 {
 imagettftext($image, $size, $angle, $left + intval($x), $top + $largest_line_height + ($largest_line_height * $ln * $linespacing), $color, $font, $wordtext[$ln][$w]);
 $x+=$wordwidth[$ln][$w]+$spacing+$minspacing;
 }
 }
 return true;
}
?>