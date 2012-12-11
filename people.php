<?php require_once("includes/setup.php"); 
    
    if(!$loggedIn) { header("Location: notLoggedIn.php"); }
    
    $query = "SELECT * FROM person ORDER BY person.last_name ASC";
    $result = mysql_query($query) or die(mysql_error());
    
    if($result) {
        
        if(mysql_num_rows($result)>0) {
            
            $people = array();
            
            while($row = mysql_fetch_assoc($result)) {
                
                $people[] = $row;
                
            }
                        
        } else {
            
            $error = "No people found! Sorry!";
            
        }
        
    } else {
    
        $error = "Database Error! Sorry!";

        }
    
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Propr: Stage Prop Management | People</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="stylesheets/base.css">
	<link rel="stylesheet" href="stylesheets/skeleton.css">
	<link rel="stylesheet" href="stylesheets/layout.css">
	<link rel="stylesheet" href="stylesheets/propr.css">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

</head>
<body>

    <?php 
    echo($debug_messages);
    ?>

	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->

	<div class="container">
		<div class="sixteen columns">
			<h1 class="remove-bottom" style="margin-top: 40px">Propr</h1>
			<h5>Stage Prop Management</h5>
			<hr class="remove-bottom" />
		</div>
		<?php
		  require_once("includes/navigation.php");
		?>
		<div class="sixteen columns">
    		<h3>People in Propr Database</h3>
    		<?php if(isset($error)) { echo($error); echo("</div>"); } else { 
    		?></div><?
    		  foreach($people as $person) {
        		  
        		  $name = $person['first_name'] . " " . $person['last_name'];
        		  $id = $person['person_id'];
        		  $position = $person['person_type'];
        		  $organization = $person['organization'];
        		  
        		  $description = ucfirst($position) . " in " . $organization . ".";
        		  
        		  $phone = "Phone number: " . $person['phone'];
        		  
        		  $html = '<div class="fourteen columns offset-by-one"><div class="autotile tile"><a href="person.php?person_id="'.$id.'"><h3>'.$name.'</h3><br /><span>'.$description.'</span><span class="personMeta">'.$phone.'</span></a></div></div>';
        		  
        		  echo($html);
        		  
    		  }
    		
    		} ?>
    		<div class="fourteen columns offset-by-one"><div class="autotile tile"><a href="addPerson.php"><h4>Add Person</h4></a></div></div>
    		
    </div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>