<?
	require_once('../_db_connect.php');
	require_once('includes/_functions.php');

	$page = "add-page";	
	$title = "Add a Page";
	session_start();	
	require_once('includes/header.php'); 
?>
	<section id="content">
		<div class="box-16">
			<div class="row">
				<div class="box-10 centered-content">
					<h1>Add a Page</h1>
					<? include_once('includes/_validation_msg.html'); ?>
					<form action="add-page-post2.php" method="post" class="admin-form">						
						<label for="page-title">Title</label>
						<input type="text" name="page-title" value="" class="page-title" />
						<label for="page-subhead">Subhead <span class="note">(Optional)</span></label>
						<input type="text" name="page-subhead" value="" class="page-subhead" />
						<label for="page-content">Content</label>
						<textarea name="page-content" class="page-content"></textarea>
						<input type="submit" class="submit button round3px float-right" name="add-page" value="Create Page!" />
					</form>
				</div><!-- close left content -->
			</div><!-- close row -->
		</div><!--/.box-16-->	
	</section>
<? require_once('includes/footer.php'); ?>
</div>
</body>
</html>