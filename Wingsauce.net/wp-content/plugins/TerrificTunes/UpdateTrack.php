<?php
include_once('Track.php');

foreach(array_keys($_POST) as $key)
  echo "<p>" . $key . " => " . $_POST[$key] . "</p>";

$Track = new Track($_POST['name'], $_POST['artist']);
$Track->update("TT_Tracks", $_POST['id']);