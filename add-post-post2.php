<?	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		session_start();
		$errors = array();
		$success = array();		
		$_SESSION['errors'] = $errors;
		$_SESSION['success'] = $success;			
		
		if(empty($_POST['post-title'])){		
		    $errors[] = "Please enter a title for this post.";
		} else{
			$post_title = strip_tags($_POST['post_title']);
		}
		
		if(empty($_POST['post-content'])){
		    $errors[] = "Please enter content for this post.";
		} else{
			$post_content = strip_tags($_POST['post_content']);
		}
		
		$post_subhead = strip_tags($_POST['post_subhead']);     								
				
		if(empty($errors)){	//everything is ok
					
			$query = 'INSERT INTO posts (post-title, post-subhead, post-content) values ($post_title, $post_subhead, $post_content)'; 
			
			$result = mysqli_query($dbconnect, $query);			
								
			if($result){
				$success[] = "Your post has been published!";
			} else{
				$errors[] = "Error" . mysqli_error($dbconnect);
			}
												
		}	
		
		//mysqli_close($dbconnect); 	

		header("Location: add-post.php");
		exit();
	}	
?>