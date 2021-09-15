<?php

if (!isset($_SESSION['username'])) {
    header("location:Index.php");

} else {
    echo "<p>Welkom, " . $_SESSION['username'] . "</p>";

    if ($_SESSION['Level'] > 10) {
        echo "<p>U heeft geen rechten om deze pagina te bekijken.</p>";
        echo "<p><a href='../Index.php'>Ga terug</p>";
        exit();
    }
}