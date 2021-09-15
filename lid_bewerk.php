<?php
session_start();
require "session.inc.php";
require 'config.inc.php';
require_once "menu.php";

//haal het id uit de url
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
    //haal het lid uit het resultaat
    $rij = mysqli_fetch_array($resultaat);
    ?>
    <form name="form1" method="post"  action="lid_bewerk_verwerk.php">
        <table width="200" border="0">
            <tr>
                <td>id:</td>
                <td><input type="number" name="id" value="<?php echo $rij['id'] ?>" readonly></td>
            </tr>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="first_name" value="<?php echo $rij['first_name'] ?>"></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="last_name" value="<?php echo $rij['last_name'] ?>"></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td><input type="text" name="gender" value="<?php echo $rij['gender'] ?>"></td>
            </tr>
            <tr>
                <td>Birth Date:</td>
                <td><input type="date" name="birth_date" value="<?php echo $rij['birth_date'] ?>"></td>
            </tr>
            <tr>
                <td>Member Since:</td>
                <td><input type="date" name="member_since" value="<?php echo $rij['member_since'] ?>"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value="Opslaan"></td>
            </tr>
        </table>
    </form>
<?php
}
?>