<?php
session_start();
require "session.inc.php";
if (isset($_POST['submit']))
{
    require 'config.inc.php';

//Lees het formulier
    $id = $_POST ['id'];
    $first_name = $_POST ['first_name'];
    $last_name = $_POST ['last_name'];
    $gender = $_POST ['gender'];
    $birth_date = $_POST ['birth_date'];
    $member_since = $_POST ['member_since'];

//Maak de query
    $query = "UPDATE back2_leden
          SET first_name = '$first_name', last_name = '$last_name',
              gender = '$gender', birth_date = '$birth_date',
              member_since = '$member_since'
          WHERE id = $id";
    $resultaat = mysqli_query($mysqli, $query);
    if ($resultaat) {
        header('Location: home.php');
    }

//Als het werkt:
    if (mysqli_query($mysqli, $query))
    {
        echo "<p>Lid $first_name is aangepast!.</p>";
    }
    else
    {
        echo "<p>FOUT bij aanpassen lid met id $id.</p>";
        echo mysqli_error($mysqli);          //TIJDELIJKE
    }
}
else
{
    echo "<p>Geen gegevens ontvangen...</p>";
}

echo "<p><a href='home.php'>TERUG</a> naar overzicht</p>";
?>
