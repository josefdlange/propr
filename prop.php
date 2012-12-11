<?php require_once("includes/setup.php"); 
    
    
    $query = "SELECT * FROM prop WHERE prop_id = ".$_GET['prop_id']."";
    $result = mysql_query($query) or die(mysql_error());
    
    if($result) {
        
        if(mysql_num_rows($result)>0) {
            
            $prop = mysql_fetch_assoc($result);
                        
        } else {
            
            $error = "Prop not found! Sorry!";
            
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
	<title>Propr: Stage Prop Management | View Prop</title>
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
    		
    		
    		      $title = $prop['title'];
        		  $description = $prop['description'];
        		  $tags = $prop['tag'];
        		  
        		  
        		  $owner = propHasOwner($prop['prop_id']);
        		  
        		  if($owner) {
        		      $row = mysql_fetch_assoc($owner);
            		  $description .= "<br /><br />This prop is owned by <a href=\"person.php?person_id=".$row['person_id']."\">".$row['first_name']." ".$row['last_name']."</a>.";
        		  }
        		  
        		  $production = propIsInProduction($prop['prop_id']);
        		  
        		  if($production) {
            		  $row = mysql_fetch_assoc(production);
            		  $description .= "<br /><br />This prop is currently involved in the production <a href=\"production.php?production_id=".$row['production_id']."\">".$row['title']."</a>.";

        		  }
        		  
        		  $photo_string = "";
        		  
        		  if(photoExists($prop['prop_id'])) {
            		  $photo_string = '<img src="image.php?prop_id='.$prop['prop_id'].'" />';
        		  }	else {
            		  
            		  $photo_string = '<img src="images/questionmark.png" />';
            		  
        		  }
        		  
        		  $html = "<h2>".$title."</h2>".$photo_string."<br /><span>".$description."";
        		  
        		  echo($html);

        		  echo('<br /><br /><br /><a href="deleteProp.php?id='.$prop['prop_id'].'">Delete Prop!</a>');
    		  }    		
    		?>
		</div>
    </div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>