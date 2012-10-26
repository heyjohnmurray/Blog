<?
	$page = "register-page";//body tag class
	$title = "Register for free your Bloggr Account";//title tag text
	session_start();
	require_once('includes/header.php'); 
?>
	<section id="content">
		<div class="box-16">
			<div class="row">
				<div class="box-10 centered-content">
					<h1>Add New User</h1>
					<? include_once('includes/_validation_msg.html'); ?>
					<form action="register-post2.php" method="post" class="admin-form register-user">
						<label for="userName">User Name <span class="note">(Required)</span></label>
						<input type="text" name="userName" class="user-name" value="" />
						<label for="userEmail">Email <span class="note">(Required)</span></label>
						<input type="text" name="userEmail" class="user-email" value="" />
						<label for="firstName">First Name</label>
						<input type="text" name="firstName" class="first-name" value="" />
						<label for="lastName">Last Name</label>
						<input type="text" name="lastName" class="last-name" value="" />						
						<label for="passwordOne">Password</label>
						<input type="password" name="passwordOne" class="passwordOne" />
						<label for="passwordTwo">Confirm Password</label>
						<input type="password" name="passwordTwo" class="passwordTwo" />
						<label for="userType" class="float-left user-type-label">Role</label>
						<select name="userType" class="float-left">
							<option value="subscriber">Subscriber</option>							
							<option value="author">Author</option>
						</select>
						<br class="clear" />
						<input type="hidden" name="mailConfirm" value="No" />
						<input type="checkbox" name="mailConfirm" class="mail-confirm float-left" value="Yes" />
						<label for="mailConfirm" class="float-left mail-confirm-label">Send confirmation email?</label>						
						<input type="submit" class="submit button round3px float-right" name="register-submit" value="Add New User!" />
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