<?
	require_once('../_db_connect.php');
	require_once('includes/_functions.php');
	session_start();
	
	$page = "author-page";//html body class	
	$title = "Author's Page";//title tag text
	
	$authorId = $_GET['id'];
	$authorName = $_GET['author'];
	
	$query = "SELECT 	POSTS.postId,
						POSTS.postSubhead,
						POSTS.postTitle,
						POSTS.postDate,
						POSTS.postContent,
						USERS.userName
						FROM posts AS POSTS
						LEFT JOIN users AS USERS
						ON POSTS.postAuthor = USERS.id
						WHERE USERS.id = '$authorId'";
	$result = mysqli_query($dbconnect, $query);
		
	require_once('includes/header.php'); 
?>	
<section id="content">
	<div class="box-16">
		<div class="row">
			<div class="box-10 left-content">				
				<h1>Posts by <?= $authorName ?></h1>
				<?
					while($row = mysqli_fetch_array($result)){ 
				?>				
				<article>
					<hgroup>
						<h2><?= strip_tags($row['postTitle']); ?></h2>
						<h3><?= strip_tags($row['postSubhead']); ?></h3>
						<h4>Posted by <?= strip_tags($row['userName']); ?> on <?= date('F d, Y', strtotime($row['postDate'])); ?> at <?= date('h:i', strtotime($row['postDate'])); ?></h4>
					</hgroup>
					<p><?= post_preview_length(strip_tags($row['postContent'])); ?></p>
					<p><a href="post.php?post=<?= strip_tags($row['postId']) ?>" class="read-more round3px">Read More &#8250;</a></p>
				</article>
				<?
					}
				?>
			</div><!-- close left content -->

			<div class="box-4 right-content">
				<? include_once('includes/_sidebar.php'); ?>
			</div><!-- close right-content -->
		</div><!-- close row -->
	</div><!--/.box-16-->	
</section>
<? require_once('includes/footer.php'); ?>
</body>
</html>