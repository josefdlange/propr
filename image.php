<?php

require_once("includes/setup.php");

// We have a photo. We need to deal with it.
$query = "SELECT * FROM photo WHERE `prop-id` = ".$_GET['prop_id']."";
$photo_result = mysql_query($query) or die(mysql_error());
if($photo_result) {
    $photo = mysql_fetch_assoc($photo_result); 
    header('Content-type: ' . $photo['photo-mime-type']);
    echo $photo['photo-blob'];
    }
    else { echo("WAT"); }

?>