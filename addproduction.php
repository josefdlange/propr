<?php require_once("includes/setup.php"); 
    
    
    if(isset($_REQUEST['title'])) {
        
        $title = addslashes($_REQUEST['title']);
        $playwright = addslashes($_REQUEST['playwright']);
		  $orginization = addslashes($_REQUEST['orginization']);
		  $start_date = addslashes($_REQUEST['start_date']);
		  $end_date = addslashes($_REQUEST['end_date']);
        
        
        $query = "INSERT INTO production (`title`,`playwright`,`orginization`,`start_date`,`end_date`) VALUES ('".$title."','".$playwright."','".$orginization."','".$start_date."','".$end_date."')";
        
        $result = mysql_query($query) or die(mysql_error());
		  
		  $id = mysql_insert_id();

		  if (isset($point_of_contact_id) && $point_of_contact_id != ""){
		  
			  $query = "INSERT INGNORE INTO `involved_in` (`person_id`, `production_id`)".
				  "VALUES('".$point_of_contact_id."','".$id."')";

			  $result = mysql_query($query) or die(mysql_error());
		  }

        header("Location: productions.php");
        
    }   else {      
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Propr: Stage Prop Management | View Production</title>
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
			<h5>Production Management</h5>
			<hr class="remove-bottom" />
		</div>
		<?php
		  require_once("includes/navigation.php");
		?>
		<div class="twelve columns offset-by-two">
		  <h3>Add a Production</h3>
		</div>
		      <form name="addproduction" method="post" enctype="multipart/form-data">
		      <div class="four columns offset-by-two">
		          <label>Title</label><input type="text" name="title" value="Production Title" />
		          <label>Playwright</label><input type="text" name="playwright" value="Production Description" />
		          <label>Orginization</label><input type="text" name="orginization" value="Organization"/>
		      </div>
		      <div class="four columns">
		          <label>Start date (YYYY-MM-DD)</label><input type="text" name="start_date" value="Start Date" />
					 <label>End date (YYYY-MM-DD)</label><input type="text" name="end_date" value="End Date" />
					 <label>Point of Contact</label>
					 <select name="point_of_contact_id">
						 <option value="">No Contact</option>
					 <?php
					 	$result = mysql_query("SELECT person_id, first_name, last_name, person_type, organization FROM person") or die(mysql_error());
						while($row = mysql_fetch_assoc($result)){
							echo('<option value="'.$row['person_id'].'">'.$row['first_name'].' '.$row['last_name'].' - '.ucfirst($row['person_type'])   .' in '.$row['organization'].'</option>');
						}
					 ?>
				 </select>
		          <input type="submit" value="Submit" />
		      </div>
		      </form>
		</div>
    </div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html><?php } ?>