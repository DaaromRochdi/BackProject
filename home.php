<?php
session_start();
require "session.inc.php";
require 'config.inc.php';

//maak de query
$query = "SELECT * FROM back2_leden";

//vang het resultaat op
$resultaat = mysqli_query($mysqli, $query);

include('menu.php');

//als het resultaat uit 0 rijen bestaat
if (mysqli_num_rows($resultaat) ==0)
{
    echo "<p>Er zijn geen resultaten gevonden.</p>";
}
//Als er wel rijen zijn
else
{
    //maak een tabel buiten de while_lus
    echo "<table border='0'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>Gender</th>";
    echo "<th>Birth Date</th>";
    echo "<th>Member Since</th>";
    echo "<th>edit</th>";
    echo "<th>delete</th>";
    echo "</tr>";
    echo "</thead>";

    //via een while worden alle rijen uitgelezen en getoond
    while ($rij = mysqli_fetch_array($resultaat))
    {
        echo "<tr>";
        echo "<td>" . $rij['id'] . "</td>";
        echo "<td>" . $rij['first_name'] . "</td>";
        echo "<td>" . $rij['last_name'] . "</td>";
        echo "<td>" . $rij['gender'] . "</td>";
        echo "<td>" . $rij['birth_date'] . "</td>";
        echo "<td>" . $rij['member_since'] . "</td>";
        echo "<td> <a href='lid_bewerk.php?id=".$rij['id']."'>✍️</a></td>";
        echo "<td> <a href='lid_verwijder.php?id=".$rij['id']."'>⚠️</a></td>";
        echo "<td> <a href='foto.php?id=".$rij['id']."'>🖼️</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<button><a href=\"lid_nieuw.php\">lid toevoegen</a></button>";
}
?>
