<? if($_SERVER['REQUEST_METHOD'] == "POST"){
	session_start();					
	require_once('../_db_connect.php');
	
	$errors = array();
	$success = "Your page has been created!";		

	if(empty($_POST['page-title'])){
		$errors[] = "Please enter a title for this page. <br />";
	} else{
		$page_title = $_POST['page-title'];
	}
		
	if(!empty($_POST['page-subhead'])){
		$page_subhead = $_POST['page-subhead'];
	}
	
	if(empty($_POST['page-content'])){
		$errors[] = "Please enter content for this page. <br />";
	} else{
		$page_content = $_POST['page-content'];
	}	
	
	if(empty($errors)){

		$query = "INSERT INTO pages (pageTitle, pageSubhead, pageContent) VALUES (?,?,?)";			
		$stmt = mysqli_prepare($dbconnect, $query);
		mysqli_bind_param($stmt, "sss", $page_title, $page_subhead, $page_content);
		
		if(mysqli_execute($stmt)){
			$success;			
		} else{			
			$errors[] = "There was a problem creating your page!";			
		}

		mysqli_stmt_close($stmt);		
		mysqli_close($dbconnect);
		
		$_SESSION['success'] = $success;
		header("Location: add-page.php");
		exit();
		
	} else{

		$_SESSION['errors'] = $errors;
		header("Location: add-page.php");
		exit();
	}		
	
	
} ?>