<?
	require_once('../_db_connect.php');	
	require_once('includes/_functions.php');

	$page = "post-page";	
	$title = "";

	session_start();
	require_once('includes/header.php'); 
	
	$pageId = $_GET['page'];
	
	$query = "SELECT pageId, pageTitle, pageSubhead, pageDate, pageContent FROM pages WHERE pageId = '$pageId' ";
	$result = mysqli_query($dbconnect, $query);
		
?>	
<section id="content">
	<div class="box-16">
		<div class="row">
			<div class="box-10 left-content page-<?= $pageId ?>">
				<?
					while($row = mysqli_fetch_array($result)){
				?>
					<h1><?= strip_tags($row['pageTitle']); ?></h1>
					<article>
						<hgroup>
							<h2><? if($row['pageSubhead']){ echo strip_tags($row['pageSubhead']);}?></h2>
							<h3>Posted on <?= date('F d, Y', strip_tags(strtotime($row['pageDate']))); ?> at <?= strip_tags(date('h:i', strtotime($row['pageDate']))); ?></h4>
						</hgroup>
						<p><?= strip_tags($row['pageContent']); ?></p>
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