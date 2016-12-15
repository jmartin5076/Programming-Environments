<?php
include_once('Track.php');

foreach(array_keys($_POST) as $key)
    echo "<p>" . $key . " => " . $_POST[$key] . "</p>";

$Track = new Track($_POST['Name'], $_POST['Artist']);
$Track->insert('TT_Tracks');
?>