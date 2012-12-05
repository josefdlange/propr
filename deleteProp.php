<?php

require_once("includes/setup.php");

$id = $_GET['id'];

$query = "DELETE FROM prop WHERE `prop-id` = ".$id."";
$result = mysql_query($query) or die(mysql_error());

$query = "DELETE FROM photo WHERE `prop-id` = ".$id."";
$result = mysql_query($query) or die(mysql_error());


header("Location: props.php");



?>