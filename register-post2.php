<? if($_SERVER['REQUEST_METHOD'] == "POST"){
	session_start();
	require_once('../_db_connect.php');
		
	$errors = array();
	$success = "You're registered!";
	
	if(empty($_POST['userName'])){
		$errors[] = "Please enter a user name. <br />";
	} else{
		$userName = $_POST['userName'];
	}
	
	if(empty($_POST['userEmail'])){
		$errors[] = "Please enter a valid email address. <br />";
	} else{
		$userEmail = $_POST['userEmail'];
		if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL)){
			$errors[] = "Please enter a valid email address. <br />";
		}
	}
		
	if(!empty($_POST['firstName'])){
		$firstName = $_POST['firstName'];
	}
	
	if(!empty($_POST['lastName'])){
		$lastName = $_POST['lastName'];
	}
	
	if(empty($_POST['passwordOne'])){
		$errors[] = "Please enter a password. <br />";
	} else{
		if($_POST['passwordOne'] != $_POST['passwordTwo']){
			$errors[] = "Your passwords do not match. Please try again. <br />";
		} else{
			$password = $_POST['passwordOne']; 
		}
	}
			
	if(!empty($_POST['userType'])){
		$userType = $_POST['userType'];
	}
	
	if(!empty($_POST['mailConfirm'])){
		$mailConfirm = $_POST['mailConfirm'];
	} 
	
	header("Location: register.php");
	
	if(empty($errors)){
		
		$query = "INSERT INTO users (userName, firstName, lastName, userEmail, password, mailConfirm, userType) values(?,?,?,?,?,?,?)"; 		
		$stmt = mysqli_prepare($dbconnect,  $query);
		mysqli_stmt_bind_param($stmt, "sssssss", $userName, $firstName, $lastName, $userEmail, SHA1($password), $mailConfirm, $userType);			
		if(mysqli_stmt_execute($stmt)){
		
			echo $success;
		
		} else{
		
			$errors[] = "Something is wrong with your prepared statement.";
		
		}
		mysqli_stmt_close($stmt);
		
		mysqli_close($dbconnect);

	} else{
		
		echo $errors;
		
	}
	$_SESSION['errors'] = $errors;		
	$_SESSION['success'] = $success;

						
	exit();		
} ?>