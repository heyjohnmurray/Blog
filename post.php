<?
	require_once('../_db_connect.php');
	require_once('includes/_functions.php');

	$postId = $_GET['post'];

	$query = "SELECT postId, postTitle, postSubhead, postDate, postContent, postAuthor FROM posts WHERE postId = '$postId' ";
	$result = mysqli_query($dbconnect, $query);
	
	$page = "post-page";	
	$title = "";
	
	session_start();
	require_once('includes/header.php'); 
?>	
<section id="content">
	<div class="box-16">
		<div class="row">
			<div class="box-10 left-content post-<?= $postId ?>">
				<?
					while($row = mysqli_fetch_array($result)){
				?>
					<h1><?= strip_tags($row['postTitle']); ?> <!-- XXPostTitleXX --></h1>
					<article>
						<hgroup>
							<h2><?= strip_tags($row['postSubhead']); ?></h2>
							<h3>Posted by <?= strip_tags($row['postAuthor']); ?> on <?= strip_tags(date('F d, Y', strtotime($row['postDate']))); ?> at <?= strip_tags(date('h:i', strtotime($row['postDate']))); ?></h4>
						</hgroup>
						<p><?= $row['postContent']; ?></p>
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