<?
	//this page had to be created because you're using page.php and post.php and they have ?logout in the $_GET array. So when you click ?logout it removes the templates' id as well and messes up the page. when/if you do a mod rewrite for these pages so that they have pretty urls, then you can use the version below.
	session_start();

	if(!empty($_SESSION['loggedIn'])){
		session_destroy();
		header( 'Location: login.php' );
		exit();
	}	

?>

<?
	//this version is for if you add <a href="?logout">Logout</a>. When you get to use this version you'll add it at the top of the header.php file and it'll work
	if(isset($_GET['logout'])){
	   session_destroy();
	   header( 'Location: login.php' );
	   exit();
	}

?>