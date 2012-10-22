<?	
	if($_SERVER['REQUEST_METHOD'] ==  "POST"){
		session_start();					
		if(!empty($_POST['post-title']) && !empty($_POST['post-content'])){
			
			//run query
			$_SESSION['success'] = $success;
			$success = "Your post has been published!";
			
		} else{			
								
			
			$_SESSION['errors'] = $errors;			
			$errors = array();
			
			if(empty($_POST['post-title'])){
				$errors[] = "Please enter a title for this post. <br />";
			}
			
			if(empty($_POST['post-content'])){
				$errors[] = "Please enter content for this post.";
			}					
		}		

		header("Location: add-post.php");
		exit();
	}	
?>