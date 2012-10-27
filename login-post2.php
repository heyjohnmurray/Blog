<? if($_SERVER["REQUEST_METHOD"] == "POST"){
	session_start();
	require_once('../_db_connect.php');
	
	$errors = array();
	$success = "You're logged in!";		
	
	if(empty($_POST['userName'])){
		$errors[] = "Please enter a user name. <br />";
	} else{
		$userName = $_POST["userName"];
	}
	
	if(empty($_POST['password'])){
		$errors[] = "Please enter a password.";
	} else{
		$password = $_POST['password'];
	}
	
	header("Location: login.php");	
	
	if(empty($errors)){
		$query = "SELECT userName, password FROM users WHERE userName = '$userName' and password = SHA1('$password')";
		$result = mysqli_query($dbconnect, $query);		
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_array($result);
			return array(true, $row);
			
		} else{
			$errors[] = "Please try again!";
		}					
	} 
	
	$_SESSION['errors'] = $errors;
	$_SESSION['success'] = $success;
	
	exit();

} ?>