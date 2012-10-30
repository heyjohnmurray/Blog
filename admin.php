<?
	require_once('../_db_connect.php');
	$page = "admin-page";//body tag class
	$title = "BloggrCMS Admin";//title tag text
	
	session_start();
	require_once('includes/header.php'); 
	
	if(isset($_SESSION['userName'])){
		
	$userName = $_SESSION['userName'];	
	
	$query = "SELECT id, firstName, lastName, userEmail, mailConfirm FROM users WHERE userName = '$userName'";
	$result = mysqli_query($dbconnect, $query);
	
	
	//THIS WAS MY FIRST QUERY BUT IT WAS WRONG B/C I NEEDED TO SPECIFY AN ALIAS. 
	//I FOUND THIS OUT ON STACKOVERFLOW.COM
	//$roleQuery = "SELECT id, roleName, userTypeId FROM userRoles JOIN users ON id=userTypeId";
	
	
	//IF YOU HAVE TO DO A JOIN YOU'LL NEED TO DO IT IN A SEPARATE QUERY 
	//you can pull data from these tables even if you don't "SELECT" if in the query. this is why i can pull USERS.userName
	$roleQuery = "SELECT ROLES.id, ROLES.roleName, USERS.userTypeId 
					FROM userRoles AS ROLES
					INNER JOIN users AS USERS
					ON ROLES.id = USERS.userTypeId
					WHERE USERS.userName = '$userName'";
								
	//THESE TWO QUERIES WORK. THIS MEANS A JOIN SHOULD WORK, I'M JUST DOING THE JOIN SYNTAX WRONG
	//$roleQuery = "SELECT id, roleName FROM userRoles";
	//$roleQuery = "SELECT userTypeId FROM users";
	//$roleQuery = "SELECT id, roleName, userTypeId from userRoles, users WHERE id = userTypeId";
	$roleResult = mysqli_query($dbconnect, $roleQuery);
	
	/* if your db query ($roleResult) is wrong then debug it with:
		if(!$roleResult){
			echo 'WRONG';
		} else{
			echo 'RIGHT';
		}
	*/
?>
	<section id="content">
		<div class="box-16">
			<div class="row">
				<div class="box-10 left-content">
					<h1>Admin</h1>
					<?
						while($row = mysqli_fetch_array($result)){
							$accountId = $row['id'];
							$firstName = $row['firstName'];
							$lastName = $row['lastName'];
							$fullName = $firstName . $lastName;
							$accountEmail = $row['userEmail'];
					?>
					<p>Hello, <?= $fullName ?>.</p>
				</div><!-- close left content -->
				<div class="box-4 right-content">
					<aside>
						<h2>Profile Details</h2>
						<ul class="profile-details">
							<li>Name: <?= $fullName ?></li>
							<li>Email: <?= $accountEmail ?></li>
					<? } ?> <!-- close while loop -->
					<?
						while($roleRow = mysqli_fetch_array($roleResult)){
							$adminRole = $roleRow['roleName'];
					?>					
						<li>Admin Role: <?= ucwords($adminRole) ?></li>		
					<? } ?>							
						</ul>
					</aside>
				</div><!-- close .box-4 -->								
			</div><!-- close row -->
		</div><!--/.box-16-->	
	</section>
	
	<? } /*close isset conditional*/ else { ?>
	<section id="content">
		<div class="box-16">
			<div class="row">
				<div class="box-10 left-content">
					<h1>We're sorry!</h1>
					<p>You need to <a href="login.php">log in</a> to view this page.</p>
				</div><!-- close left content -->
				<div class="box-4 right-content">
					<? include_once('includes/_sidebar.php'); ?>
				</div><!-- close .box-4 -->								
			</div><!-- close row -->
		</div><!--/.box-16-->	
	</section>
	<? } ?>
<? require_once('includes/footer.php'); ?>
</div>
</body>
</html>