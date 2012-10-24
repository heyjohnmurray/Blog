<<<<<<< HEAD
<? require_once('includes/header.php'); ?>
=======
<?
	require_once('../_db_connect.php');
	$page = "posts-page";	
	$title = "List of posts";
	require_once('includes/header.php'); 
?>
>>>>>>> parent of 2f989d6... Final Commit of the night
	<section id="content">
		<div class="box-16">
			<div class="row">
				<div class="box-10 two-third left-content">
					<h1>Recent Posts</h1>
					<article>
						<hgroup>
							<h2>Post One Header</h2>							
							<h3>Subhead</h3>
							<time>Posted on December, 08, 2012</time>
						</hgroup>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>						
					</article>					
				</div>
				<div class="box-5 third right-content">
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