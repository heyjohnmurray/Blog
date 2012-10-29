<?
	require_once('../_db_connect.php');
	$page = "admin-page";//body tag class
	$title = "BloggrCMS Admin";//title tag text
	
	session_start();
	require_once('includes/header.php'); 
	//list of session vars
		//$_SESSION['userName']; this is the userName	which we collect from the login page and login post file	
	
	if(isset($_SESSION['userName'])){
		
	$userName = $_SESSION['userName'];	
	
	$query = "SELECT id, firstName, lastName, userEmail, mailConfirm, userType FROM users WHERE userName = '$userName'";
	$result = mysqli_query($dbconnect, $query);
	
	
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
							$adminRole = $row['userType'];
					?>
					<p>Hello, <?= $fullName ?>.</p>
				</div><!-- close left content -->
				<div class="box-4 right-content">
					<aside>
						<h2>Profile Details</h2>
						<ul class="profile-details">
							<li>Name: <?= $fullName ?></li>
							<li>Email: <?= $accountEmail ?></li>
							<li>Admin Role: <?= ucwords($adminRole) ?></li>
						</ul>
					</aside>
				</div><!-- close .box-4 -->								
			</div><!-- close row -->
		</div><!--/.box-16-->	
	</section>
	<? } //close while loop
	} /*close isset conditional*/ else { ?>
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