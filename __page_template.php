<?
	require_once('../_db_connect.php');
	require_once('includes/_functions.php');

	$page = "";//html body class	
	$title = "";//title tag text
	
	session_start();
	require_once('includes/header.php'); 
?>	
<section id="content">
	<div class="box-16">
		<div class="row">
			<div class="box-10 left-content">
				<h1>XXTITLEXX</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>						
			</div><!-- close left content -->

			<div class="box-4 right-content">
				<? include_once('includes/_sidebar.php'); ?>
			</div><!-- close right-content -->
		</div><!-- close row -->
	</div><!--/.box-16-->	
</section>
<? require_once('includes/footer.php'); ?>
</body>
</html>