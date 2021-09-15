<?php
session_start();
require "session.inc.php";
require_once('config.inc.php');

$id = $_POST ['id'];
$first_name = $_POST ['first_name'];
$last_name = $_POST ['last_name'];
$gender = $_POST ['gender'];
$birth_date = $_POST ['birth_date'];
$member_since = $_POST ['member_since'];



if (isset($_POST['submit'])) {

    $sql = "INSERT INTO `back2_leden`(`id`, `first_name`, `last_name`, `gender`, `birth_date`, `member_since`) VALUES (NULL ,'$first_name','$last_name','$gender','$birth_date','$member_since')";
    var_dump($sql);
    $resultaat = mysqli_query($mysqli, $sql);
    if ($resultaat) {
        header('Location: home.php');
    }
}
?>
