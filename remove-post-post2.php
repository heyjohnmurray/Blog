<?
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		session_start();
		require_once('../_db_connect.php');		
			
		if(isset($_POST['delete-posts'])){
			
			$removedId = $_POST['postId'];	
			
			//run delete query
			$query = "DELETE FROM posts WHERE postId = '$removedId'";			
			$result = mysqli_query($dbconnect, $query);			
			
			if($result){				
			
				header("Location: admin.php");
				exit();
				
			}				
			
		}
		
		if(isset($_POST['edit-posts'])){
			
			//redirect to edit page
			$editId = $_POST['postId'];
			$_SESSION['editId'] = $editId;
			
			header("Location: edit-post.php");
			exit();
			
		}		
			
	}
?>