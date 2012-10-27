<?
	//dbconnect and functions pages are already declared in the head
	$pagequery = "SELECT * FROM pages";
	$pageresult = mysqli_query($dbconnect, $pagequery);
?>
<nav>
	<ul>
		<li><a href="<? $_SERVER['HTTP_HOST'] ?>/php/sandbox/blog/index.php">Home</a></li>
		<?
			while($row = mysqli_fetch_array($pageresult)){
		?>
			<li><a href="page.php?page=<?= $row["pageId"] ?>"><?= $row["pageTitle"] ?></a></li>
		<?				
			} mysqli_free_result($pageresult);
		?>
	</ul>
	<br class="clear" />
</nav>