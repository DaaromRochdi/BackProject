<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Login</title>
</head>

<body>
<h2>LOGIN</h2>
<form method="post" action="Login.php" enctype="multipart/form-data">
<table border="0">
    <tr>
        <td>Username</td>
        <td><input type="text" name="username" required></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="password" name="password" required></td>
    </tr>
    <tr>
        <td class="captcha_wrapper">
            <td class="g-recaptcha" data-sitekey="6LcYGuIZAAAAANs1dEeDamJU0ANDuN2SSRfdE0Zi"></td><br><br>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="Login" value="LOGIN"></td>
    </tr>
</table>
</form>
</body>
</html>