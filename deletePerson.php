<?php

require_once("includes/setup.php");

$id = $_GET['id'];

$query = "DELETE FROM person WHERE person_id = ".$id."";
$result = mysql_query($query) or die(mysql_error());

$query = "DELETE FROM involved_in WHERE person_id = ".$id."";
$result = mysql_query($query) or die(mysql_error());

$query = "DELETE FROM owns_prop WHERE person_id = ".$id."";
$result = mysql_query($query) or die(mysql_error());

header("Location: people.php");



?>