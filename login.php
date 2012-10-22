<?
	require_once('../_db_connect.php');
	$page = "login-page";	
	$title = "Bloggr Login";
	require_once('includes/header.php'); 
?>
	<section id="content">
		<div class="box-16">
			<div class="row">
				<div class="box-10 centered-content">
					<h1>Login</h1>
					<form action="" method="post" name="login-form" class="admin-form login-form">						
						<label for="user-name">User Name</label>
						<input type="text" name="user-name" value="" />
						<label for="password">Password</label>
						<input type="password" name="password" value="" />						
						<input type="submit" class="submit button round3px float-right" value="Log In!" />
					</form>
				</div><!-- close left content -->
			</div><!-- close row -->
		</div><!--/.box-16-->	
	</section>
<? require_once('includes/footer.php'); ?>
</div>
</body>
</html>