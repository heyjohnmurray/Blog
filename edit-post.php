<?
	require_once('../_db_connect.php');
	require_once('includes/_functions.php');

	$page = "edit-post";//body tag class
	$title = "Edit a Post";//title tag text
	
	$errors = array();
	
	session_start();
	
	$editId = $_SESSION['editId'];
	
	$query = "SELECT * FROM posts WHERE postId = '$editId'";
	$result = mysqli_query($dbconnect, $query);	
		
	require_once('includes/header.php'); 
?>
	<section id="content">
		<div class="box-16">
			<div class="row">
				<div class="box-10 centered-content">
					<form action="" method="post" class="admin-form">
						<?
							while($row = mysqli_fetch_array($result)){
								$postTitle = strip_tags($row['postTitle']);
								$postSubhead = strip_tags($row['postSubhead']);
								$postContent = strip_tags($row['postContent']);
						?>
								<input type="text" name="existingTitle" class="page-title" value="<?= $postTitle ?>" />
								<input type="text" name="existingSubhead" class="page-subhead" value="<?= $postSubhead ?>" />
								<textarea name="existingContent" class="page-content" cols="30" rows="10"><?= $postContent ?></textarea>
								<input type="submit" class="submit button round3px float-right" name="add-page" value="Save Edits!">								
						<?		
							}
						?>					
						<br class="clear" />
					</form>
				</div><!-- close centered content -->
			</div><!-- close row -->
		</div><!--/.box-16-->	
	</section>
<? require_once('includes/footer.php'); ?>
</div>
</body>
</html>