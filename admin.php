<?
	require_once('../_db_connect.php');
	$page = "admin-page";	
	$title = "Bloggr Admin Panel";
	require_once('includes/header.php'); 
?>
	<section id="content">
		<div class="box-16">
			<div class="row">
				<div class="box-10 centered-content">
					<h1>Admin</h1>
					<p><a href="/">View posts</a></p>					
					<p><a href="/">View authors</a></p>
				</div><!-- close left content -->
			</div><!-- close row -->
		</div><!--/.box-16-->	
	</section>
<? require_once('includes/footer.php'); ?>
</div>
</body>
</html>