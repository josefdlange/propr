<?php require_once("includes/setup.php"); 
    
    
    if(isset($_REQUEST['email'])) {
        
        $email  = $_REQUEST['email'];
        $pass   = md5($_REQUEST['password']);
        
        $sql = "SELECT * FROM person WHERE email='$email' AND password='$pass'";
        
        $result = mysql_query($sql) or die(mysql_error());
        
        if($result) {
            
            if(mysql_num_rows($result)>0) {
                
                // Successfully logged in a user. Let's set the session variables.
                $_SESSION['currentUser'] = $email;
                $_SESSION['loggedIn'] = true;
                
                session_write_close();
                
                header("Location: index.php");
                
            }
            
            $loginError = "Failed to log in. Check your credentials.";
            
        }
        
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
	<title>Propr: Stage Prop Management | Log In</title>
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

	<div class="container">
		<div class="sixteen columns">
			<h1 class="remove-bottom" style="margin-top: 40px">Propr</h1>
			<h5>Stage Prop Management</h5>
			<hr class="remove-bottom" />
		</div>
		<?php
		  require_once("includes/navigation.php");
		?>
		<div class="four columns offset-by-six">
		  <?php if($loggedIn) {
        
    		  ?><h3>Already logged in!</h3><?php
        
    } else {
    
    if(isset($loginError)) {
    
    echo("<h5>".$loginError."</h5>");
    
    }?> 
    
    <h4>Log in</h4>
		  <form name="login" method="POST">
		      <input type="text" name="email" value="Email Address" />
		      <input type="password" name="password" value="Password" />
		      <input type="submit" value="Submit" />
		      <input type="reset" value="Reset" />
		  </form>
		</div>
		<?php } ?>
	</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>