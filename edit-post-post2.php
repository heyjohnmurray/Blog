<?
	if($_SERVER['REQUEST_METHOD'] == "POST"){

		session_start();
		require_once('../_db_connect.php');
				
		$errors = array();
		$success = "Your post was edited!";
		
		$editId = $_SESSION['editId'];
		
		if(empty($_POST['existingTitle'])){
			
			$errors[] = "You must enter a post title. <br />";
			
		} else{
			
			$newTitle = $_POST['existingTitle'];
			
		}
		
		if(empty($_POST['existingSubhead'])){
			
			$newSubhead = NULL;
			
			//$newSubhead = " "; //sloppy but not great
			
		} else{
			
			$newSubhead = $_POST['existingSubhead'];
			
		}
		
		if(empty($_POST['existingContent'])){
			
			$errors[] = "You must enter post content. <br />";
			
		} else{
			
			$newContent = $_POST['existingContent'];
			
		}
		
		if(!empty($_SESSION['userId'])){
			
			$authorId = $_SESSION['userId'];
	
		}		
		
		if(empty($errors)){
			
			$query = "UPDATE posts SET postTitle = '$newTitle', postSubhead = '$newSubhead', postContent = '$newContent', postAuthor = $authorId WHERE postId = '$editId'";
			//the quotes are needed around these vars b/c they're strings. this took forever to figure out.
			
			$result = mysqli_query($dbconnect, $query);				
			
			if(!$result){
				$errors[] = "The query was wrong";
				$_SESSION['errors'] = $errors;
				header("Location: edit-post.php");
				exit();
			} else {
				$success = "The query was right";
				$_SESSION['success'] = $success;
				header("Location: edit-post.php");
				exit();
			}			
			
		} else{
			$_SESSION['errors'] = $errors;
			header("Location: edit-post.php");
			exit();
		} 
		
	}
?>