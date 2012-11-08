<? if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	session_start();
	require('../_db_connect.php');
	
	$deleteUser = $_POST['userId'];
	
	$errors = array();	
	$success = "User has been removed!";
	
	$query = 	"DELETE USERS FROM users AS USERS
				LEFT JOIN posts AS POSTS
				ON USERS.id = POSTS.postAuthor
				WHERE USERS.id = '$deleteUser'";	
				
	$result = mysqli_query($dbconnect, $query);
	
	if($result){
				
		$success;
		$_SESSION['success'] = $success;
				
	} else{
		
		$errors[] = "User was NOT removed!";		
		$_SESSION['errors'] = $errors;		
	
	}

	header("Location: users.php");
	exit();		

}
	
?>