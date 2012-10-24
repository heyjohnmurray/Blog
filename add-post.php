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
					<?									
						session_start();	
						//print_r($_SESSION['errors']); //use this if the form isn't validating right
					?>
					<p class="errors" id="errors">
						<?															
							if(!empty($_SESSION['errors'])){
						?>
								<script type="text/javascript">
									$(function() {
										setTimeout(function(){
											$("#errors").fadeIn(500);
											alert('Find out how to add class to highlight inputs, too!');											
										}, 500)
									//close jquery	
									});								
								</script>								
						<?
								foreach($_SESSION['errors'] as $error){
									echo $error;
								}
								session_unset($_SESSION['errors']);
							} 
							
							if(!empty($_SESSION['success'])){
						?>
							<script type="text/javascript">
								$(function() {
									setTimeout(function(){
										$("#errors").fadeIn(500).addClass("success").text("<?= $_SESSION['success'] ?>");
									}, 500)
								//close jquery	
								});								
							</script>	
						<?				
								session_unset($_SESSION['success']);	
							}
						?>
					</p>
					<form action="add-post-post2.php" method="post" name="add-post" class="admin-form add-post">						
						<label for="post-title">Title</label>
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