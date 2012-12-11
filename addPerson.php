<?php require_once("includes/setup.php"); 
    
    
    if(isset($_REQUEST['first_name'])) {
        
        $first_name = $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];
        $email = $_REQUEST['email'];
        $a1 = $_REQUEST['address1'];
        $a2 = $_REQUEST['address2'];
        $city = $_REQUEST['city'];
        $state_province = $_REQUEST['state_province'];
        $country = $_REQUEST['country'];
        $phone = $_REQUEST['phone'];
        $person_type = $_REQUEST['person_type'];
        $organization = $_REQUEST['organization'];
        $password = md5($_REQUEST['password']);
            
        $query = "INSERT INTO person (first_name, last_name, email, address_line1, address_line2, city, state_province, country, phone, person_type, organization, password) VALUES ('".$first_name."','".$last_name."','".$email."','".$a1."','".$a2."','".$city."','".$state_province."','".$country."','".$phone."','".$person_type."','".$organization."','".$password."')";
        
        $result = mysql_query($query) or die(mysql_error());
        
        
        header("Location: people.php");
        
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
	<title>Propr: Stage Prop Management | Add Person</title>
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
		<div class="ten columns offset-by-two">
		  <h3>Add a Personni</h3>
		</div>
		      <form name="addprop" method="post" enctype="multipart/form-data">
		          <div class="four columns offset-by-two">

		          <label>First Name</label><input type="text" name="first_name" />
		          <label>Last Name</label><input type="text" name="last_name" />
		          <label>Email</label><input type="text" name="email" />
		          <label>Phone</label><input type="text" name="phone" />
  		          <label>Password</label><input type="password" name="password" />
		          </div>
		          <div class="four columns">
		          <label>Address (1)</label><input type="text" name="address1" />
		          <label>Address (2)</label><input type="text" name="address2" />
		          <label>City</label><input type="text" name="city" />
		          <label>State/Province</label><input type="text" name="state_province" />
		          <label>Country</label><input type="text" name="country" />
		          </div>
		          <div class="four columns">
		          <label>Organization</label><input type="text" name="organization" />
		          <label>Role Type</label>
		          <select name="person_type">
		              <option value="actor">Actor</option>
		              <option value="director">Director</option>
		              <option value="assistant">Assistant</option>
		              <option value="designer">Designer</option>
		              <option value="faculty">Faculty</option>
		              <option value="scholar">Scholar</option>
		              <option value="manager">Manager</option>
		              <option value="other">Other</option>
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