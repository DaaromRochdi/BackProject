<?php
session_start();
require "session.inc.php";
if (isset($_POST['submit']))
{
    require 'config.inc.php';

//Lees het formulier
    $id = $_POST['id'];
    $first_name = $_POST ['first_name'];

//Maak de query
    $query = "DELETE FROM back2_leden WHERE id = $id";
    $resultaat = mysqli_query($mysqli, $query);
    if ($resultaat) {
        header('Location: home.php');
    }

//Als het werkt:
    if (mysqli_query($mysqli, $query))
    {
        echo "<p>Lid $first_name is verwijderd!.</p>";
    }
    else
    {
        echo "<p>FOUT bij verwijderen van $first_name.</p>";
        echo mysqli_error($mysqli);          //TIJDELIJKE
    }
}
else
{
    echo "<p>Geen gegevens ontvangen...</p>";
}

echo "<p><a href='home.php'>TERUG</a> naar overzicht</p>";
?>