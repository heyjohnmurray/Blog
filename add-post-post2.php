<?	
	if($_SERVER['REQUEST_METHOD'] ==  "POST"){
		session_start();					
		if(!empty($_POST['post-title']) && !empty($_POST['post-content'])){
			
			//run query			
			$success = "Your post has been published!";			
			$_SESSION['success'] = $success;
			
		} else{			
								
			$errors = array();
					
			if(empty($_POST['post-title'])){
				$errors[] = "Please enter a title for this post. <br />";
			}
			
			if(empty($_POST['post-content'])){
				$errors[] = "Please enter content for this post.";
			}					
			
			$_SESSION['errors'] = $errors;						
		}		

		header("Location: add-post.php");
		exit();
	}	
?>

<!-- after talking to brian you learned that all session variables need to be declared after the variable their based on has been created. so in this case $_SESSION['success'] needs to come after $success otherwise you could be sending an empty $_SESSION variable. this was happening on the $errors array -->