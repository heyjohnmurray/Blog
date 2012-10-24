<?
	ob_start();
	session_start();
	$errors = array();
	$success = array();					
	$_SESSION['errors'] = $errors;
	$_SESSION['success'] = $success;
	$page = "add-post-page";	
	$title = "Add a Post";	
	require_once('../_db_connect.php');
	require_once('includes/header.php'); 	
?>
	<section id="content">
		<div class="box-16">
			<div class="row">
				<div class="box-10 centered-content">
					<h1>Add a Post</h1>
					<div class="errors" id="errors">
						<script type="text/javascript">
							$(function() {
								<?		
									if(isset($_SESSION['errors'])){?>
										setTimeout(function(e){
											$("#errors").fadeIn(500);
										}, 500)	
								<?
										foreach($_SESSION['errors'] as $error){
											echo $error;
										}
									}
									
									if(isset($_SESSION['success'])){ 									
								?>
										setTimeout(function(e){
											$("#errors").fadeIn(500).addClass("success").text("<?= $_SESSION['success'] ?>");
										}, 500)
								<?	
									} 
											
									session_unset($_SESSION['errors']);
									//session_unset($_SESSION['success']);							
								?>
							//close jquery	
							});								
						</script>						
					</div>
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