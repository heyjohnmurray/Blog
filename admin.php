<?
	require_once('../_db_connect.php');
	$page = "admin-page";//body tag class
	$title = "BloggrCMS Admin";//title tag text
	
	session_start();
	require_once('includes/header.php'); 
	
	if(isset($_SESSION['userName'])){
		
	$userName = $_SESSION['userName'];	
	
	//THIS WAS MY FIRST QUERY BUT IT WAS WRONG B/C I NEEDED TO SPECIFY AN ALIAS FOR MY MULTIPLE ids EVEN THOUGH THEY WEREN'T IN THE SELECT QUERY. I LATER REALIZED I CAN COMBINE ALL THIS INTO A JOIN I PULLED EACH BIT OF DATA THAT I WANT TO INCLUDE ON THE PAGE
	
	$query = "SELECT	USERS.firstName, 
					 	USERS.lastName, 
					 	USERS.userEmail, 
					 	USERS.userTypeId, 
					 	ROLES.id, 
					 	ROLES.roleName 
				FROM userRoles AS ROLES 
				LEFT JOIN users as USERS
				ON ROLES.id = USERS.userTypeId
				WHERE USERS.userName = '$userName'";
				
	//ROLES was used on ROLES.id because USERS has an id as well that conflicts even though it wasn't called in $query
				
	$result = mysqli_query($dbconnect, $query);
	
	/* if your db query ($roleResult) is wrong then debug it with:
		if(!$result){
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
							$firstName = $row['firstName'];
							$lastName = $row['lastName'];
							$fullName = $firstName . " " . $lastName;
							$accountEmail = $row['userEmail'];
							$adminRole = $row['roleName'];
					?>
					<p>Hello, <?= $userName ?>.</p>
				</div><!-- close left content -->
				<div class="box-4 right-content">
					<aside>
						<h2>Profile Details</h2>
						<ul class="profile-details">
							<li>Name: <?= $fullName ?></li>
							<li>Email: <?= $accountEmail ?></li>							
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