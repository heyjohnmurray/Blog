<?
	require_once('../_db_connect.php');
	require_once('includes/_functions.php');
	session_start();
	
	$page = "admin-page";//body tag class
	$title = "BloggrCMS Admin";//title tag text
		
	require_once('includes/header.php'); 
	
	if(isset($_SESSION['userName'])){
		
	$userName = $_SESSION['userName'];	
	$userId = $_SESSION['userId'];
	
	$query = 	"SELECT POSTS.postId,
				POSTS.postTitle, 
				POSTS.postDate 
				FROM posts AS POSTS
				LEFT JOIN users AS USERS
				ON POSTS.postAuthor = USERS.id
				WHERE USERS.id = '$userId'";
	$result = mysqli_query($dbconnect, $query);
?>
	<section id="content">
		<div class="box-16">
			<div class="row">
				<div class="box-10 left-content">
					<h1>Admin</h1>
					<p>Hello, <?= $userName ?>. Here's some of the content you've created:</p>						<table class="admin-edit-posts">									
							<tr>
								<td width="50%"><h3>Post Title</h3></td>
								<td width="34%"><h3>Post Date</h3></td>
								<td width="16%"></td>
							</tr>
							<?
								include('includes/_validation_msg.html');
							
								while($row = mysqli_fetch_array($result)){
									$postId = $row['postId'];
									$postTitle = $row['postTitle'];
									$postDate = $row['postDate'];
							?>
								<form action="remove-post-post2.php" method="post">
									<input type="hidden" name="removedPostId" value="<?= $row['postId'] ?>" />
									
										<tr>
											<td colspan="1" align="left" valign="middle"><strong><a href="post.php?post=<?= $postId ?>"><?= $postTitle ?></a></strong></td>
											<td colspan="1" align="left" valign="middle"><?= date('F d, Y', strtotime($postDate)); ?></td>
											<td colspan="1" align="right" valign="middle"><input type="submit" class="submit button round3px" name="edit-posts" value="Edit"></td>
										</tr>								
								</form>										
							<?
								}
							?>
						</table>
				</div><!-- close left content -->
				<div class="box-4 right-content">
					<aside>
						<h2>Profile Details</h2>
					<?
						$query = "SELECT	USERS.firstName, 
										 	USERS.lastName, 
										 	USERS.userEmail, 
										 	USERS.userTypeId, 
										 	ROLES.id, 
										 	ROLES.roleName 
									FROM userRoles AS ROLES 
									LEFT JOIN users as USERS
									ON ROLES.id = USERS.userTypeId
									WHERE USERS.Id = '$userId'";
									
						$result = mysqli_query($dbconnect, $query);
												
						
						while($row = mysqli_fetch_array($result)){
							$firstName = $row['firstName'];
							$lastName = $row['lastName'];
							$fullName = $firstName . " " . $lastName;
							$accountEmail = $row['userEmail'];
							$adminRole = $row['roleName'];
					?>
							
						<ul class="profile-details">
							<li>Name: <?= $fullName ?></li>
							<li>Email: <?= $accountEmail ?></li>							
							<li>Admin Role: <?= ucwords($adminRole) ?></li>
						</ul>
						<h2>Add Content</h2>
						<ul class="profile-details">
							<li><a href="add-post.php">Add Post</a></li>
							<li><a href="add-page.php">Add Page</a></li>
						</ul>
					</aside>						
					<? } ?>							
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