<? if($_SERVER["REQUEST_METHOD"] == "POST"){
	session_start();
	require_once('../_db_connect.php');
	
	$errors = array();
	$loggedIn = "You're logged in!";
			
	if(empty($_POST['userName'])){
		$errors[] = "Please enter a user name. <br />";
	} else{
		$userName = $_POST["userName"];
	}
	
	if(empty($_POST['password'])){
		$errors[] = "Please enter a password.<br />";
	} else{
		$password = $_POST['password'];
	}
	
	if(empty($errors)){
		$query = "SELECT userName, password FROM users WHERE userName = '$userName' and password = SHA1('$password')";
		$result = mysqli_query($dbconnect, $query);		
		if(mysqli_num_rows($result) == 1){//if username and password match;
			$row = mysqli_fetch_array($result);
			$_SESSION['userName'] = $userName;//this will be used throughout the site
			$_SESSION['loggedIn'] = $loggedIn;		
			header("Location: admin.php");
			exit();
		}					
	} else{
		$_SESSION['errors'] = $errors;
		header("Location: login.php");
		exit();
	}

} ?>