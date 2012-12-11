<?php require_once("includes/setup.php"); 
    
    
    if(isset($_GET['person_id'])&&$_GET['person_id']!="") {
    
        $query = "SELECT * FROM person WHERE person_id=".$_GET['person_id'];
        $result = mysql_query($query) or die(mysql_error());
        
        if($result) {
            
            if(mysql_num_rows($result)>0) {
                
                $person = mysql_fetch_assoc($result);
                            
            } else {
                
                $error = "Person not found! Sorry!";
                
            } 
            
        } else {
        
            $error = "Database Error! Sorry!";
    
            }
        
        $sql = "SELECT * FROM owns_prop WHERE person_id=".$_GET['person_id'];
        $result = mysql_query($sql) or die(mysql_error());
        
        if($result) {
            
            if(mysql_num_rows($result)>0) {
                
                $props_owned = array();
                
                while($row = mysql_fetch_assoc($result)) {
                    $props_owned[] = $row;
                }
                            
            } else {
                
               
                
            } 
            
        } else {
        
            $error = "Database Error! Sorry!";
    
            }
        
    } else { header('Location: people.php'); }
        
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Propr: Stage Prop Management | View Person</title>
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
		<div class="six columns offset-by-five prop">
    		<?php if(isset($error)) { echo($error); echo("</div>"); } else { 
    		
    		
    		      $name = $person['first_name'] . " " . $person['last_name'];
    		      $email = $person['email'];
    		      $al2 = "";
    		      if($person['address_line2']!="") { $al2 = $person['address_line2']."<br />"; }
    		      $address = $person['address_line1'] . "<br />" . $al2 . $person['city'] . ", " . $person['state_province'] . ", " . $person['country'];
    		      $phone = $person['phone'];
    		      $organization = $person['organization'];
    		      $role = $person['person_type'];
    		      $subtitle = ucfirst($role) . ' in ' . $organization;
    		      
    		      $html = '<div style="ten columns offset-by-three"><h2>'.$name.'</h2><h4>'.$subtitle.'</h4><br /><span>'.$address.'<br /><br />'.$phone.'</span></div>';
    		      
    		      echo($html);
    		  }    		
    		?>
		</div>
    </div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>