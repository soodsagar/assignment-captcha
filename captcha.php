<?php
session_start() ;


//SET ENVIROMENT VARIABLE FOR GD [WIDELY USED GRAPHICS LIBRARY]
putenv('GDFONTPATH=' . realpath('.') );




//TO ACCESS SUBDIRECTORY OF FONT FILES
//putenv('GDFONTPATH=' . realpath('.') . '/fonts');



if (isset($_SESSION["select_font_session"])){
	$get_font = $_SESSION["select_font_session"];
	$font = "fonts/" . $get_font . ".ttf";
}
elseif (isset($_COOKIE['FONTCOOKIE'])){
    $get_font = $_COOKIE['FONTCOOKIE'];
    $font = "fonts/" . $get_font . ".ttf";
}

else{
    $font = "fonts/fast99.ttf";
}



//SET content-type header FOR OUTPUT IMAGE
//SENT BEFORE ANY OTHER OUTPUT

header('Content-Type: image/png');


//CREATE IMAGE RECTANGLE DIMENSION
$im = imagecreatefrompng('cb.png');

//CREATE SOME COLORS
$white 		= imagecolorallocate($im, 255, 255, 255);
$greyish 	= ImageColorAllocateAlpha($im, 255, 255, 255, 127);
$random_text_color 	= imagecolorallocate($im, rand(0,150), rand(0,150), rand(0,150));



imagefilledrectangle($im, 3, 3, 215, 75);


//GENERATE RANDOM STRING+NUMBERS
function generateRandomString($length = 4) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $characters = str_shuffle($characters);
    return substr($characters, 0, $length);
}

$rand_s = generateRandomString();
$rand_i = rand(1001, 9999);

$text 	= $rand_i . $rand_s;

//SESSION VARIABLE SHARED WITH FORM SCRIPT
$_SESSION["captcha"] = $text;



//ADD THE TEXT [OVERLAYS THE ABOVE 'SHADOW' TEXT!]
if ($get_font == "bubblebath"){
	//ADD SHADOW TO TEXT
	imagettftext( $im, 19, 0, 17, 47, $white, $font, $text );
	imagettftext( $im, 20, 0, 15, 50, $random_text_color, $font, $text );
}
else{
	//ADD SHADOW TO TEXT
	imagettftext( $im, 35, 0, 17, 47, $white, $font, $text );
	imagettftext( $im, 36, 0, 15, 50, $random_text_color, $font, $text );
}
//TRANSMIT IMAGE TO BROWSER.
//USING IMAGEPNG() RESULTS IN CLEARER TEXT COMPARED WITH IMAGEJPEG()

imagepng($im);

//DESTROY SERVER-SIDE STORAGE FOR IMAGE

imagedestroy($im);


?>
