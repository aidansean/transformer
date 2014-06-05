<?php
$url    = 'bridge.jpg' ;
$url    = 'grid_before.png' ;
$type   = 'png' ;
$scale  = 1 ;
$radius = 0 ;
$debug  = 0 ;
$crop   = false ;
$bkg = 'black' ;
if(isset($_GET['url'   ])) $url    = $_GET['url'   ] ;
if(isset($_GET['bkg'   ])) $bkg    = $_GET['bkg'   ] ;
if(isset($_GET['type'  ])) $type   = $_GET['type'  ] ;
if(isset($_GET['scale' ])) $scale  = $_GET['scale' ] ;
if(isset($_GET['radius'])) $radius = $_GET['radius'] ;
if(isset($_GET['crop'  ])) $crop   = true ;

if(!is_numeric($scale)) $scale = 1 ;
if(strtolower(substr($url,-4,4))=='jpeg') $source = imagecreatefromjpeg($url) ;
if(strtolower(substr($url,-3,3))=='jpg')  $source = imagecreatefromjpeg($url) ;
if(strtolower(substr($url,-3,3))=='png')  $source = imagecreatefrompng( $url) ;
if(strtolower(substr($url,-3,3))=='gif')  $source = imagecreatefromgif( $url) ;
if(!imagesx($source)){
  echo 'Not a valid image.' ;
  exit() ;
}
$w = imagesx($source) ;
$h = imagesy($source) ;
$l = sqrt(2)*$h ;
if($crop) $l = $l/sqrt(2) ;
if($radius>0) $l = $radius ;
$image = imagecreatetruecolor($l,$l) ;
$color = imagecolorallocate($image, 0, 0, 0) ;
if($bkg=='white') $color = imagecolorallocate($image, 255, 255, 255) ;
imagefilledrectangle($image,0,0,$l,$l,$color) ;

$step = 1 ;
$format      = '%5d' ;
$formatFloat = '%5f' ;
for($y=0 ; $y<$l ; $y+=$step){
  for($x=0 ; $x<$l ; $x+=$step){
    $u = $scale*($x-0.5*$l) ;
    $v = $scale*($y-0.5*$l) ;
    if($crop){
      $u = $u/sqrt(2) ;
      $v = $v/sqrt(2) ;
    }
    $r = 1-2*sqrt($u*$u+$v*$v)/$l ;
    $t = (atan2($u,-$v)+pi())/(2*1.01*pi()) ;
    $X = round($t*$w) ;
    $Y = round($r*$h) ;
    if($X<0  ) continue ;
    if($Y<0  ) continue ;
    if($X>=$w) continue ;
    if($Y>=$h) continue ;
    $color = imagecolorat($source,$X,$Y) ;
    $rgb   = imagecolorsforindex($source,$color) ;
    $color = imagecolorexact($image,$rgb['red'],$rgb['green'],$rgb['blue']) ;
    if($color==-1){
      $color = imagecolorallocate($image,$rgb['red'],$rgb['green'],$rgb['blue']);
      if($color == -1){
        $color = imagecolorclosest($image,$rgb['red'],$rgb['green'],$rgb['blue']);
      }
    }
    imagesetpixel($image,$x,$y,$color) ;
  }
}

switch($type){
  case 'jpeg':
  case 'jpg':
    header("Content-type: image/jpeg") ;
    imagejpeg($image) ;
    break ;
  case 'png':
    header("Content-type: image/png") ;
    imagepng($image) ;
    break ;
  case 'gif':
    header("Content-type: image/gif") ;
    imagegif($image) ;
    break ;
}

imagedestroy($image)  ;
imagedestroy($source) ;

?>