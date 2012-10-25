<? if($_SERVER['REQUEST_METHOD'] == "POST"){
	session_start();					
	require_once('../_db_connect.php');
	
	$errors = array();
	$success = "Your post has been published, BUT YOU STILL NEED TO SANITIZE YOUR DATA USING PREPARED STATEMENTS!!!!";		
	
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
	
	header("Location: add-post.php");
	
	if(empty($errors)){
		
		$query = "INSERT INTO posts (`post-title`, `post-subhead`, `post-content`) VALUES ('$post_title','$post_subhead','$post_content')";			
		$result = mysqli_query($dbconnect, $query);		
		
		if($result){
		
			echo $success;
			
		} else {
		
			$errors[] = "Sorry, the following error(s) occurred while adding your data" . mysqli_error($dbconnect) . ".";
			
		}
		
		mysqli_close($dbconnect);
		
	} else{

		echo $errors;
		
	}		
			
	$_SESSION['success'] = $success;						
	$_SESSION['errors'] = $errors;
	
	exit();
} ?>
<!-- after talking to brian you learned that all session variables need to be declared after the variable their based on has been created. so in this case $_SESSION['success'] needs to come after $success otherwise you could be sending an empty $_SESSION variable. this was happening on the $errors array. also, had an issue with the header() location. also, realized i need to camelcase all table names from now on or use the weird apostrophe-looking mark to escape the names of my table rows. 
	
	NEXT STEP: SANITIZE THE DATA
-->

