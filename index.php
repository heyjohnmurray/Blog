<?
	require_once('../_db_connect.php');
	require_once('includes/_functions.php');

	$query = "SELECT * FROM posts LIMIT 5";
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
						<h2><?= strip_tags($row['post-title']); ?></h2>
						<h3><?= strip_tags($row['post-subhead']); ?></h3>
						<!-- <h4><?= strip_tags(date_format(new DateTime($row['post-date']), 'F d, Y')); ?></h4> either this way or as shown below -->
						<h4>Posted on <?= date('F d, Y', strtotime($row['post-date'])); ?> at <?= date('h:i', strtotime($row['post-date'])); ?></h4>
					</hgroup>
					<p><?= strip_tags($row['post-content']); ?></p>
					<p><a href="/<? echo create_link($row['post-title']); ?>.php">Read More &#8250;</a></p>
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