<?php

require_once("includes/setup.php");

$id = $_GET['id'];

$query = "DELETE FROM prop WHERE prop_id = ".$id."";
$result = mysql_query($query) or die(mysql_error());

$query = "DELETE FROM photo WHERE prop_id = ".$id."";
$result = mysql_query($query) or die(mysql_error());

$query = "DELETE FROM owns_prop WHERE prop_id = ".$id."";
$result = mysql_query($query) or die(mysql_error());

$query = "DELETE FROM in_production WHERE prop_id = ".$id."";
$result = mysql_query($query) or die(mysql_error());

$query = "DELETE FROM in_category WHERE prop_id = ".$id."";
$result = mysql_query($query) or die(mysql_error());


header("Location: props.php");



?>