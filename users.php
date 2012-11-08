<?			
	require_once('../_db_connect.php');
	require_once('includes/_functions.php');

	$page = "manage-users";//body tag class
	$title = "Manage Users";//title tag text
	
	session_start();
	require_once('includes/header.php'); 
	
	//if you're super user then you can access this page
	if($_SESSION && $_SESSION['userRole'] == 1){
	
		$query = "SELECT * FROM users";
		$result = mysqli_query($dbconnect, $query);
		
?>
	<section id="content">
		<div class="box-16">
			<div class="row">
				<div class="box-14 centered-content">
					<h1>Manage Users</h1>
					
					<? include('includes/_validation_msg.html'); ?>
					<form action="users-post2.php" method="post" class="admin-form users-list">
					
						<div class="row thead">
							<div class="box-1">Id</div>
							<div class="box-3">User Name</div>
							<div class="box-2">First Name</div>
							<div class="box-2">Last Name</div>
							<div class="box-4">User Email</div>
						</div>
						
						<?
									
							while($row = mysqli_fetch_array($result)){
								
								$userid = $row['id'];
								$userName = $row['userName'];
								$firstName = $row['firstName'];
								$lastName = $row['lastName'];
								$userEmail = $row['userEmail'];
															
						?>	
						
						<div class="row tbody">							
							<div class="box-1"><?= $userid ?></div>
							<div class="box-3"><?= $userName ?></div>
							<div class="box-2"><?= $firstName ?></div>
							<div class="box-2"><?= $lastName ?></div>
							<div class="box-4"><?= $userEmail ?></div>
							<div class="box-1">
								<input type="hidden" name="userId" value="<?= $userid ?>" />
								<input type="submit" class="red-btn button small-btn round3px" name="delete-user" value="Delete">
							</div>
						</div>
						<? } ?>
					
					</form>									
				</div><!-- close centered content -->
			</div><!-- close row -->
		</div><!--/.box-16-->	
	</section>
<? } else if($_SESSION && $_SESSION['userRole'] != 1){ //if you're logged in but not superuser

	include('includes/_permissions_prompt.php');

   } else { //if you're not not logged in

	include('includes/_login_prompt.php'); ?>

<? } ?>
<? require_once('includes/footer.php'); ?>
</div>
</body>
</html>