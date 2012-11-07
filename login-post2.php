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
		//check user-sbumitted user name and password
		$query = 	"SELECT id, userName, password 
					FROM users 
					WHERE userName = '$userName' and password = SHA1('$password')";
		$result = mysqli_query($dbconnect, $query);		
		if(mysqli_num_rows($result) == 1){//if username and password match;
			
			$row = mysqli_fetch_array($result);
			//these variables will be used throughout the site			
			$userId = $row['id'];//get userName id and assign it to $userId
			$_SESSION['userId'] = $userId;//logged userId
			$_SESSION['userName'] = $userName;//logged in userName
			$_SESSION['loggedIn'] = $loggedIn;//logged in status
			
			if($userId){
				
				//get user role based on user's id
				$query = 	"SELECT ROLES.id, ROLES.roleName, USERS.userTypeId
							FROM userRoles AS ROLES
							LEFT JOIN users AS USERS
							ON ROLES.id = USERS.userTypeId
							WHERE USERS.id = '$userId'";
				$result = mysqli_query($dbconnect, $query);
				
				if(mysqli_num_rows($result) == 1){
					
					$row = mysqli_fetch_array($result);		
								
					$_SESSION['userRole'] = $row['id'];
					$_SESSION['userRoleType'] = $row['roleName'];
					
				}
				
				header("Location: admin.php");
				exit();

			}
						
		} else{
		
			$errors[] = "Please try again.<br />";
			$_SESSION['errors'] = $errors;
			
			header("Location: login.php");
			exit();
			
		}					
	} else{
	
		$_SESSION['errors'] = $errors;
		
		header("Location: login.php");
		exit();
	}

} ?>