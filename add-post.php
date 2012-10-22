<?
	require_once('../_db_connect.php');
	$page = "add-post-page";	
	$title = "Add a Post";
	require_once('includes/header.php'); 
?>
	<section id="content">
		<div class="box-16">
			<div class="row">
				<div class="box-10 centered-content">
					<h1>Add a Post</h1>
					<form action="" method="post" name="add-post" class="admin-form add-post">						
						<label for="post-name">Title</label>
						<input type="text" name="post-title" value="" class="post-title" />
						<label for="post-subhead">Subhead <span class="optional">(Optional)</span></label>
						<input type="text" name="post-subhead" value="" class="post-subhead" />
						<label for="post-content">Content</label>
						<textarea name="post-content" class="post-content"></textarea>
						<input type="submit" class="submit button round3px float-right" value="Post!" />
					</form>
				</div><!-- close left content -->
			</div><!-- close row -->
		</div><!--/.box-16-->	
	</section>
<? require_once('includes/footer.php'); ?>
</div>
</body>
</html>