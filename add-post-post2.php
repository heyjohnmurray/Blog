<? if($_SERVER['REQUEST_METHOD'] == "POST"){
	session_start();					
	require_once('../_db_connect.php');
	
	$errors = array();
	$success = "Your post has been published!";		
	
	if(empty($_POST['post-title'])){
		$errors[] = "Please enter a title for this post. <br />";
	} else{
		$post_title = $_POST['post-title'];
	}
		
	if(!empty($_POST['post-subhead'])){
		$post_subhead = $_POST['post-subhead'];
	}
	
	if(empty($_POST['post-content'])){
		$errors[] = "Please enter content for this post. <br />";
	} else{
		$post_content = $_POST['post-content'];
	}
	
	if(!empty($_POST['authorId'])){
		$authorId = $_POST['authorId'];
	} else{
		$errors[] = "WRONG!";
	}
	
	if(empty($errors)){
		
		$query = "INSERT INTO posts (postTitle, postSubhead, postContent, postAuthor) VALUES (?,?,?,?)";
		$stmt = mysqli_prepare($dbconnect, $query);
		mysqli_bind_param($stmt, "sssi", $post_title, $post_subhead, $post_content, $authorId);

		if(mysqli_execute($stmt)){		
			$success;			
		} else{			
			$errors[] = "There was a problem creating your post!";	
		}
		
		mysqli_stmt_close($stmt);		
		mysqli_close($dbconnect);
		
		$_SESSION['success'] = $success;
		header("Location: add-post.php");
		exit();
		
	} else{
		$_SESSION['errors'] = $errors;	
		header("Location: add-post.php");
		exit();
	}		
			
} ?>
<!-- after talking to brian you learned that all session variables need to be declared after the variable their based on has been created. so in this case $_SESSION['success'] needs to come after $success otherwise you could be sending an empty $_SESSION variable. this was happening on the $errors array. also, had an issue with the header() location. also, realized i need to camelcase all table names from now on or use the weird apostrophe-looking mark to escape the names of my table rows. 
	
	NEXT STEP: SANITIZE THE DATA
	
	now that i've sanitized data i learned a couple of things:
		1. use mysqli_real_escape_string() or prepared statements to sanitize db queries
		2. use strip_slashes(), htmlspecialchars() and htmlentities(); on code that will be output as html
		
		3. if you try to use strip_slashes() et al on db queries it will break the queries
-->