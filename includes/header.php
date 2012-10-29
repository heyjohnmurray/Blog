<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->

<head>
<title><?= $title ?></title>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<![endif]-->

<meta name="robots" content="noindex,nofollow">

<link rel="stylesheet" href="css/box_grid.css" type="text/css" media="all"/>
<link rel="stylesheet" href="css/style_main.css" type="text/css" media="screen"/>
<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>

<script src="js/modernizr.js"></script>
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>

<!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
<body class="<?= $page ?>">
<?
	print '<pre>';
	print_r($_SESSION);
	print '</pre>';
?>
<div class="wrapper container clearfix">
	<header role="banner">
		<div class="box-16">
			<div class="row">
				<div class="box-8"><img src="images/logo.jpg" width="370" height="80" alt="" class="logo" /></div>
				<div class="box-8">
					<ul class="login-links">
						<?
							if(empty($_SESSION['loggedIn'])){
						?>
								<li><a href="<? $_SERVER['HTTP_HOST'] ?>/php/sandbox/blog/login.php">Log In</a></li>
						<?
							} else{								
						?>
								<li><a href="logout.php">Log Out</a></li>
						<?
							}
						?>						
						<li><a href="<? $_SERVER['HTTP_HOST'] ?>/php/sandbox/blog/register.php">Register</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<? include_once("includes/_main_nav.php"); ?>
			</div>
		</div>		
	</header>
	<br class="clear" />