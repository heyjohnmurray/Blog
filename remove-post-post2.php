<?
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		session_start();
		require_once('../_db_connect.php');
			
		if(!empty($_POST['removedPostId'])){
		
			$removedId = $_POST['removedPostId'];			
			
			//run the query
			$query = "DELETE FROM posts WHERE postId = '$removedId'";			
			$result = mysqli_query($dbconnect, $query);
			
			
			if($result){				
			
				header("Location: admin.php");
				exit();
				
			}				
			
		}		
			
	}
?>