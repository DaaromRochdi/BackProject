<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CAPTCHA</title>
</head>
<body>

    <p><i>De code van deze oefening komt van:<br/>
            https://code.tutsplus.com/tutorials/build-your-own-captcha-and-contact-form-in-php--net-5362</i></p>
    <form method="post" action="verwerk.php">
        <div class="elen-group">
            <img src="captcha.php" alt="CAPTCHA" class="captcha-image">
            <span class="fas fa-redo refresh-captcha">refresh</span>
            <br/><br/>
            <label for="captcha">Vul de Captcha tekst in:</label><br/>
            <input type="text" id="captcha" name="captcha_challenge" pattern="[A-Z]{6}"><br/><br/>
            <input type="submit" name="submit" value="verstuur"><br/>
        </div>
    </form>
    <script>
        //Als je een nieuwe captcha wil dan kan je op 'refresh' klikken
        var refreshButton = document.querySelector(".refresh-captcha");
        refreshButton.onclick = function () {
            document.querySelector(".captcha-image").src = 'captcha.php?' + Date.now();
        }
    </script>
</body>
</html>