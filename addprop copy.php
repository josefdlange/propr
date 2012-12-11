<?php require_once("includes/setup.php"); 
    
    
    if(isset($_REQUEST['title'])) {
        
        $title = addslashes($_REQUEST['title']);
        $description = addslashes($_REQUEST['description']);
        $tag = addslashes($_REQUEST['tag']);
        
        $query = "INSERT INTO prop (`title`,`description`,`tag`) VALUES ('".$title."','".$description."','".$tag."')";
        
        $result = mysql_query($query) or die(mysql_error());
        
        $id = mysql_insert_id();
        
        if(is_uploaded_file($_FILES['photo']['tmp_name'])) {
            
            $fileName = $_FILES['photo']['name'];
            $tmpName  = $_FILES['photo']['tmp_name'];
            $fileSize = $_FILES['photo']['size'];
            $fileType = $_FILES['photo']['type'];
            
            $fp      = fopen($tmpName, 'r');
            $content = fread($fp, filesize($tmpName));
            $content = addslashes($content);
            fclose($fp);
             
             
             $query = "INSERT INTO photo (`prop-id`, `photo-mime-type`, `photo-blob`) ".
"VALUES ('".$id."', '".$fileType."', '".$content."')";

            $result = mysql_query($query) or die(mysql_error());
            
        }
        
        header("Location: props.php");
        
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
		  <h3>Add a Prop</h3>
		      <form name="addprop" method="post" enctype="multipart/form-data">
		          <label>Title</label><input type="text" name="title" value="Prop Title" />
		          <label>Description</label><input type="text" name="description" value="Prop Description" />
		          <label>Photo</label><input type="file" name="photo" /><br /><br />
		          <label>Tag</label><input type="text" name="tag" value="Prop Tag" />
		          <input type="submit" value="Submit" />
		      </form>
		</div>
    </div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html><?php } ?>