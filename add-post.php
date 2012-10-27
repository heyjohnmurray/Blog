<?
	$page = "add-post-page";	
	$title = "Add a Post";
	session_start();	
	require_once('includes/header.php'); 
?>
	<section id="content">
		<div class="box-16">
			<div class="row">
				<div class="box-10 centered-content">
					<h1>Add a Post</h1>
					<? include_once('includes/_validation_msg.html'); ?>
					<form action="add-post-post2.php" method="post" class="admin-form add-post">						
						<label for="post-title">Title</label>
						<input type="text" name="post-title" value="" class="post-title" />
						<label for="post-subhead">Subhead <span class="note">(Optional)</span></label>
						<input type="text" name="post-subhead" value="" class="post-subhead" />
						<label for="post-content">Content</label>
						<textarea name="post-content" class="post-content"></textarea>
						<input type="submit" class="submit button round3px float-right" name="add-post" value="Post!" />
					</form>
				</div><!-- close left content -->
			</div><!-- close row -->
		</div><!--/.box-16-->	
	</section>
<? require_once('includes/footer.php'); ?>
</div>
</body>
</html>

<!--
	after talking to brian you learned that:
	any page that needs to use a session variable has to have session_start() at the top
	see post file for notes as well
	
	at some point look at this list of text editors to decide which one you'll use for the <textarea>
-->