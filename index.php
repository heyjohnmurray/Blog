<?
	require_once('../_db_connect.php');
	$page = "posts-page";	
	$title = "List of posts";
	$query = "";
	require_once('includes/header.php'); 
	
	$query = "SELECT * FROM posts";
	$result = mysqli_query($dbconnect,$query);	
?>
	<section id="content">
		<div class="box-16">
			<div class="row">
				<div class="box-10 two-third left-content">
					<h1>Recent Posts</h1>
					<?
						if($result){
							while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){												echo"<article>
									<hgroup>
										<h2>" . $row['post-title'] . "</h2>
										<h3>" . $row['post-subhead'] . "</h3>					
									</hgroup>
									<time>Posted on" . $row['post-date'] . "</time>
									<p>" . $row['post-content'] . "</p>
									<p><a href=\"#\" class=\"read-more\">Read More</a></p>
								</article>";				
							}
							mysqli_free_result($result);
						} else {
							echo "<p>" . mysqli_error($dbconnect) . "</p>";
						}
					?>						
				</div><!-- close left content -->
				<div class="box-5 third right-content">
					<aside>
						<h2>About Us</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> 
						<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
						<p><a href="#" class="read-more">Read More</a></p>
					</aside>
				</div><!-- close right content -->
			</div><!-- close row -->
		</div><!--/.box-16-->	
	</section>
<? require_once('includes/footer.php'); ?>
</div>
</body>
</html>