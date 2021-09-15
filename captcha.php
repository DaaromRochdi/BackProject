<?php
//https://code.tutsplus.com/tutorials/build-your-own-captcha-and-contact-form-in-php--net-5362
session_start();
//De karakters die in de captcha gebruikt worden
$permittend_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

/** Maak een functie om random een string te maken **/
//$input: welke karkaters mogen er gebruikt worden?
//$strength: hoe lang wordt de string?
function generate_string($input, $strength = 10) {
    $input_length = strlen($input);
    $random_string = '';
    for ($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}

/** Gebruik de gd-library van PHP om een afbeelding te maken **/
//200px bij 50px
$image = imagecreatetruecolor(200, 50);
//"zet anti-alias aan"
imageantialias($image, true);
//Maak een array voor de kleuren
$colors = [];
//Bepaal de rood- groen- en blauw-tinten
$red = rand(125, 175);
$green = rand(125, 175);
$blue = rand(125, 175);
//Zet 5 verschillende kleuren in de array
for ($i = 0; $i < 5; $i++) {
    $colors[] = imagecolorallocate($image, $red - 20*$i, $green - 20*$i, $blue - 20*$i);
}
//Gebruik de eerste kleur als achtergrond
imagefill($image, 0, 0, $colors[0]);
//Vul de achtergrond met 10 verschillende rechthoeken
for ($i = 0; $i < 10; $i++) {
    imagesetthickness($image, rand(2, 10));
    $line_color = $colors[rand(1, 4)];
    imagerectangle($image, rand(-10, 190), rand(-10, 10), rand(-10, 190), rand(40,60), $line_color);
}
//De letters worden zwart of wit
$black = imagecolorallocate($image, 0, 0, 0);
$white = imagecolorallocate($image, 255, 255, 255);
$textcolors = [$black, $white];
//Er worden verschillende fonts gebruikt
//LET OP: die moeten in de map 'fonts' staan!
$fonts = [dirname(__FILE__). '/fonts/Acme.ttf', dirname(__FILE__).'/fonts/Ubuntu.ttf', dirname(__FILE__)
    .'/fonts/Merriweather.ttf', dirname(__FILE__).'/fonts/PlayfairDIsplay.ttf'];
//De captcha-string wordt 6 karakters lang
$string_length = 6;
//Roep de functie aan om de random string te maken
$captcha_string = generate_string($permittend_chars, $string_length);
//Zet de string (OOK!) in een sessie.
//Die hebben we later nodig voor de controle
$_SESSION['captcha_text'] = $captcha_string;
//Zet de letters in de afbeelding, een beetje verplaats en verdraaid en met diverse font-style
for ($i = 0; $i < $string_length; $i++) {
    $letter_space = 170/$string_length;
    $initial = 15;
    imagettftext($image, 24, rand(-15, 15), $initial + $i*$letter_space, rand(25, 45), $textcolors[rand(0, 1)],
    $fonts[array_rand($fonts)], $captcha_string[$i]);
}
//Deze hele pagina wordt als image/png behandeld
header('Content-type: image/png');
//Toon de afbeelding
imagepng($image);
//Gooi de (geconstrueerde) afbeelding weg
imagedestroy($image);
?>