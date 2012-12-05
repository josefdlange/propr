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
    return "HELLO";
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