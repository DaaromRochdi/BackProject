<?php
session_start();
require "session.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lid toevoegen</title>
</head>
<body>

<?php
include('menu.php');
?>

<h2>Voeg een Lid toe:</h2>

<form action="lid_nieuw_verwerk.php" method="post">
    <label for="first_name">First Name:</label><br>
    <input type="text" id="first_name" name="first_name" required><br>
    <label for="last_name">Last Name:</label><br>
    <input type="text" id="last_name" name="last_name" required><br>
    <label for="gender">Gender:</label><br>
    <input type="text" id="gender" name="gender" required><br>
    <label for="birth_date">Birth Date:</label><br>
    <input type="date" id="birth_date" name="birth_date" required><br>
    <label for="member_since">Member Since:</label><br>
    <input type="date" id="member_since" name="member_since" required><br>
    <input type="submit" name="submit" value="Toevoegen">
</form>
</body>
</html>