<?
	$page = "login-page";//body tag class
	$title = "Log in to your Bloggr Account";//title tag text
	session_start();
	require_once('includes/header.php'); 
?>
	<section id="content">
		<div class="box-16">
			<div class="row">
				<div class="box-10 centered-content">
					<h1>Log In</h1>										
					<p class="errors" id="errors">
						<?															
							if(!empty($_SESSION['errors'])){
						?>
								<script type="text/javascript">
									$(function() {
										setTimeout(function(){
											$("#errors").fadeIn(500);											
										}, 500)
									});								
								</script>								
						<?
								foreach($_SESSION['errors'] as $error){
									echo $error;
								}
								session_unset($_SESSION['errors']);
							} 							
						?>
					</p>					
					<form action="login-post2.php" method="post" class="admin-form login">
						<label for="userName">User Name</label>
						<input type="text" name="userName" class="user-name" value="" />
						<label for="password">Password</label>
						<input type="password" name="password" class="password" />				
						<input type="submit" class="submit button round3px float-right" name="register-submit" value="Log In!" />						
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