<?php require_once("includes/setup.php"); 
	
	if(!$loggedIn) { header("Location: notLoggedIn.php"); }
	
	$query = "SELECT * FROM production";
	$result = mysql_query($query) or die(mysql_error());
	
	if($result) {
		
		if(mysql_num_rows($result)>0) {
			
			$productions = array();
			
			while($row = mysql_fetch_assoc($result)) {
				
				$productions[] = $row;
				
			}
						
		} else {
			
			$error = "No productions found! Sorry!";
			
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
	<title>Propr: Production Management | Productions</title>
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
		<div class="sixteen columns">
			<h3>Productions in Propr Database</h3>
			<?php if(isset($error)) { echo($error); echo("</div>"); } else { 
			?></div><?
				foreach($productions as $production) {
				  
					$title = $production['title'];
					$production_id = $production['production_id'];
					$playwright = $production['playwright'];
					$organization = $production['orginization'];
					$start_date = $production['start_date'];
					$end_date = $production['end_date'];

					$html = '
						<div class="four columns tile">
							<div>
								<a href="prop.php?prop_id='.$production['prop_id'].'">
									<h4>'.$title.'</h4>
									<br />
									<h5>'.$playwright.'</h5><h5>'.$orginization.'</h5>
									<br />
									<h6>'.$start_date.' to '.$end_date.'</h6>
								</a>
							</div>
						</div>';

				  echo($html);

			  }

			} ?>
			<div class="four columns tile">
				<div>
					<a href="addproduction.php">
						<h4>Add Production</h4>
						<img src="images/add.png">
						<br />
						<span>Add a production to the database.</span>
					</a>
				</div>
			</div>

	</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>