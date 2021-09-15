<?php
session_start();
echo "<h2>CHECK....</h2>";

if ($_POST['submit']) {
    echo "Formulier: " . $_POST['captcha_challenge'] . "<br/>";
    echo "Sessie: "     . $_SESSION['captcha_text']  . "<br/><br/>";
    if (isset($_POST['captcha_challenge']) && $_POST['captcha_challenge'] == $_SESSION['captcha_text']) {
        echo "<p>=> Juiste Captcha!</p>";
    } else {
        echo '<p>=> Verkeerde Captcha!!</p>';
    }
} else {
    echo '<p>Geen formulier??</p>';
}