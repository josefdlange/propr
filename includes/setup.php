<?php

session_start();

$loggedIn = false;

$debug_messages = "<!-- DEBUG INFORMATION: ";

$database_address = "localhost";
$database_name = "propr";
$database_user = "root";
$database_pass = "root";

$database_connection = mysql_connect($database_address, $database_user, $database_pass);

if($database_connection) {
    
    $database = mysql_select_db($database_name, $database_connection);
    
    if($database) {
        
        // Correctly got the database table grabbed.
        $debug_messages = $debug_messages . "\n            ### SUCCESSFULLY CONNECTED TO DATABASE \n";
        
        
    } else {
        
        // Could not get the database table.
        echo("ERROR TABLE");
        
    } 
    
} else {
        
    // Could not connect to database.
    echo("ERROR CONNECTION");
        
}



function most_recent_props() {
    $query = "SELECT * FROM prop ORDER BY `prop-id` DESC LIMIT 2";
    $result = mysql_query($query) or die(mysql_error());
    $html = "";
    
    
    while($row=mysql_fetch_assoc($result)) {
        
        if($row['photo-id']!=null) {
            $photo_string = '<img src="image.php?prop_id='.$row['photo-id'].'" />';
        } else {
            $photo_string = '<img src="images/questionmark.png" />';
        }
        
        $html = $html . '<div class="four columns tile"><div><a href="prop.php?prop_id='.$row['prop-id'].'"><h4>'.$row['title'].'</h4>'.$photo_string.'<br /><span>'.$row['description'].'</span></a></div></div>';
        
    }
    
    return $html;
}

// Truncates a given string to a certain number of words, with the option
// to leave an ellipsis.
function truncateString($theString, $numberOfWords, $addEllipsis) {
    
}

//logout function
function logout(){
    session_destroy();
    header("Location: index.php");
}


// Check if we're logged in.
if(isset($_SESSION['loggedIn'])) {
    $loggedIn = $_SESSION['loggedIn'];    
}

$debug_messages = $debug_messages . "\n     -->";

?>