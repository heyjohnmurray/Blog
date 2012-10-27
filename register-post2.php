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
/*
		Summary of User Type Roles
			Super Admin - Someone with access to the blog network administration features controlling the entire network (See Create a Network).
			Administrator - Somebody who has access to all the administration features
			Editor - Somebody who can publish and manage posts and pages as well as manage other users' posts, etc.
			Author - Somebody who can publish and manage their own posts
			Contributor - Somebody who can write and manage their posts but not publish them
			Subscriber - Somebody who can only manage their profile
*/

	
	}
	if(!empty($_POST['mailConfirm'])){
		$mailConfirm = $_POST['mailConfirm'];
	} 
	/* THIS WON'T WORK ON LOCALHOST BECAUSE MAIL ISN'T SET UP
	if($_POST['mailConfirm'] == "Yes"){
		
		$to = "heyjohnmurray@gmail.com";
		$subject = "You have an email from http://sandbox.heyjohnmurray.com";
		$message = $_POST['userName']) . " filled out the newsletter signup form. \n" . "His email address is " . $_POST['userEmail'] . ".";
		mail($to,$subject,$message);		
	}*/
	
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