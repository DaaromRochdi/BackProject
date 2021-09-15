<?php
require_once 'config.inc.php';

$response = $_POST["g-recaptcha-response"];

$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
    'secret' => '6LcYGuIZAAAAAAZANTjBHlX6aLXOb2H3AjCGFQzr',
    'response' => $_POST["g-recaptcha-response"]
);
$options = array(
    'http' => array(
        'method' => 'POST',
        'content' => http_build_query($data)
    )
);
$context = stream_context_create($options);
$verify = file_get_contents($url, false, $context);
$captcha_success = json_decode($verify);

if ($captcha_success->success == false) {
    echo "<p>You are a bot! Go away!</p>";
} else if ($captcha_success->success == true) {


//lees formvert
    $username = $_POST['username'];
    $password = $_POST['password'];


//controleer of alles is ingevut
    if (strlen($username) > 0 && strlen($password) > 0){
        //versleutel het wachtwoord
        $password = sha1($password);

        //maak de controle-query
        $query = "SELECT * FROM back2_users
              WHERE username = '$username'
              AND password = '$password'";

        //voer de query uit
        $result = mysqli_query($mysqli, $query);

        //control of inlog goed was
        if (mysqli_num_rows($result) == 1){
            //login correct start de sessie
            session_start();

            //sla de username op in de sessie
            $_SESSION['username'] = $username;

            //stuur naar de home page
            header("Location:home.php");
        }else{
            //login niet goed terug naar de login
            header("Location:Index.php");
            exit;
        }
    }else{
        echo "niet alle velden zijn ingevuld!";
        exit;
    }

}


?>