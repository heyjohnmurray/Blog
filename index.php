<?
	session_start();
	require_once('../_db_connect.php');
	require_once('includes/_functions.php');
	
	$query = "SELECT 	POSTS.postId, 
						POSTS.postTitle, 
						POSTS.postSubhead, 
						POSTS.postDate, 
						POSTS.postContent, 
						POSTS.postAuthor,
						USERS.userName,
						USERS.id
				FROM posts AS POSTS 
				LEFT JOIN users as USERS
				ON POSTS.postAuthor = USERS.id
				LIMIT 10";				
				
				//this confused me b/c i thought that when i join a table i only had access to the part of the table that was joined, when in fact i have access to everything in both tables. all i needed to do was at USERS.userName to the query and add $row['userName'] into the html
				
	$result = mysqli_query($dbconnect, $query);	
	
	$page = "posts-page";	
	$title = "List of posts";
	
	
	require_once('includes/header.php'); 
?>	
<section id="content">		
	<div class="box-16">
		<div class="row">
			<div class="box-10 left-content">
				<h1>Recent Posts</h1>				
				<?
					while($row = mysqli_fetch_array($result)){ 
						$postId = strip_tags($row['postId']);
						$postTitle = strip_tags($row['postTitle']);
						$postSubhead =  strip_tags($row['postSubhead']);
						$userName = strip_tags($row['userName']);
						$postDate = strip_tags($row['postDate']);
						$postContent = strip_tags($row['postContent']);
				?>
				<article>
					<hgroup>
						<h2><?= $postTitle ?></h2>
						<h3><?= $postSubhead ?></h3>
						<h4>Posted by <a href="author.php?id=<?= $row['id'] ?>&author=<?= $userName ?>"><?= $userName ?></a> on <?= date('F d, Y', strtotime($postDate)); ?> at <?= date('h:i', strtotime($postDate)); ?></h4>
					</hgroup>
					<p><?= post_preview_length($postContent); ?></p>
					<p><a href="post.php?post=<?= $postId ?>" class="read-more round3px">Read More &#8250;</a></p>
				</article>
				<?
					}
				?>								
			</div><!-- close left content -->
			
			<div class="box-4 right-content">
				<? include_once('includes/_sidebar.php'); ?>
			</div><!-- close .box-4 -->
		</div><!-- close row -->
	</div><!--/.box-16-->	
</section>

<? require_once('includes/footer.php'); ?>
</div>
</body>
</html>