<?php
session_start();
require "session.inc.php";
require 'config.inc.php';

//haal de user-id uit de url
$id = $_GET['id'];

//maak de query
$query ="SELECT * FROM back2_leden WHERE id = " . $id;

//vang het resultaat op
$resultaat = mysqli_query($mysqli, $query);

//als het resultaat uit 0 bestaat
if (mysqli_num_rows($resultaat) == 0)
{
    echo "<P>Er is geen lid met id $id.</P>";
}
//als er wel rijen zijn gevonden:
else
{
    //haal de user uit het resultaat
    $rij = mysqli_fetch_array($resultaat);
    ?>
    <p>Wilt u het volgende lid verwijderen?</p>
    <form name="form1" method="post"  action="lid_verwijder_verwerk.php">
        <input type="hidden" name="id" value="<?php echo $rij['id'] ?>">
        <p>First name:
        <input type="text" name="first_name" value="<?php echo $rij['first_name'] ?>" disabled/></p>
        <p><input type="submit" name="submit" value="Verwijder"></p>
    </form>
    <p><a href="home.php">TERUG</a> naar overzicht.</p>
    <?php
}
?>
