<?
	require_once('../_db_connect.php');
	require_once('includes/_functions.php');

	$query = "SELECT * FROM posts LIMIT 10";
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
			?>
				<article>
					<hgroup>
						<h2><?= strip_tags($row['postTitle']); ?></h2>
						<h3><?= strip_tags($row['postSubhead']); ?></h3>
						<!-- <h4><?= strip_tags(date_format(new DateTime($row['post-date']), 'F d, Y')); ?></h4> either this way or as shown below -->
						<h4>Posted on <?= date('F d, Y', strtotime($row['postDate'])); ?> at <?= date('h:i', strtotime($row['postDate'])); ?></h4>
					</hgroup>
					<p><?= post_preview_length(strip_tags($row['postContent'])); ?></p>
					<p><a href="post.php?post=<?= strip_tags($row['postId']) ?>" class="read-more round3px">Read More &#8250;</a></p>
				</article>
			<?
				}
			?>								
			</div><!-- close left content -->
			
			<div class="box-4 right-content">
				<aside>
					<h2>About Us</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> 
					<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
				</aside>
			</div><!-- close .box-4 -->
		</div><!-- close row -->
	</div><!--/.box-16-->	
</section>

<? require_once('includes/footer.php'); ?>
</div>
</body>
</html>