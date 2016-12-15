<?php
include_once('Album.php');

foreach(array_keys($_POST) as $key)
  echo "<p>" . $key . " => " . $_POST[$key] . "</p>";

$Album = new Album($_POST['name']);
$Album->update("TT_Albums", $_POST['id']);