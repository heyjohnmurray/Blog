<?
	require_once('../_db_connect.php');
	$page = "admin-page";//body tag class
	$title = "BloggrCMS Admin";//title tag text
	
	session_start();
	require_once('includes/header.php'); 
?>
	<section id="content">
		<div class="box-16">
			<div class="row">
				<div class="box-10 centered-content">
					<h1>Admin</h1>
				</div><!-- close centered content -->
			</div><!-- close row -->
		</div><!--/.box-16-->	
	</section>
<? require_once('includes/footer.php'); ?>
</div>
</body>
</html>