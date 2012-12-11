<?php require_once("includes/setup.php"); 
    
    
    if(isset($_REQUEST['production_id'])) {
        
        $prop_id = $_REQUEST['prop_id'];
        $production_id = $_REQUEST['production_id'];
        $condition_out = $_REQUEST['condition_out'];
        $date_out = date("Y-d-m");
        $date_due = $_REQUEST['date_due'];
            
        $query = "INSERT INTO in_production (prop_id, production_id, condition_out, date_out, date_due) VALUES ('".$prop_id."','".$production_id."','".$condition_out."','".$date_out."','".$date_due."',)";
        
        $result = mysql_query($query) or die(mysql_error());
        
        $id = mysql_insert_id();
        
        header("Location: prop.php?prop_id=".$prop_id);
        
    }   else if(isset($_REQUEST['prop_id']) {      
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
		<div class="ten columns offset-by-three">
		  <h3>Check Out Prop</h3>
		      <form name="addToProduction" method="post" enctype="multipart/form-data">
		          <label>Production</label>
		          <select name="production_id">
		              <option value="">No Owner</option>
		              <?php 
    		              $result = mysql_query("SELECT production_id, title FROM production") or die(mysql_error());
    		              while($row = mysql_fetch_assoc($result)) {
        		              echo('<option value="'.$production_id.'">'.$title.'</option>');
    		              }
		              ?>
		          </select>
		          <input type="submit" value="Submit" />
		      </form>
		</div>
    </div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html><?php } else { header('Location: props.php'); } ?>