<?php 


function clean($string){
	return htmlentities($string);
}


function redirect($location){
	return header('Location: {$location}');
}


function set_message($message){
	if(!empty($message)){
		$_SESSION['message'] = $message;
	}

	else{
		$message = '';
	}
}


function display_message(){
	if(isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}



function token_generator(){
	$token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
	return $token;
}





/****************** Validation Function ***************/

function validate_user_registeration(){

	$errors = [];

	$min = 3;
	$max = 20;

	if($_SERVER['REQUEST_METHOD'] == 'POST'){


		$first_name = clean($_POST['first_name']);
		$last_name = clean($_POST['last_name']);
		$dob = clean($_POST['dob']);
		$phone_number = clean($_POST['phone_number']);
		$email = clean($_POST['register_email']);
		$state = clean($_POST['state']);
		$user_cat = clean($_POST['user_cat']);
		$username = clean($_POST['username']);
		$password = clean($_POST['password']);
		$confirm_password = clean($_POST['confirm_password']);


		if(strlen($first_name) < 3){
			$errors[] = 'your first name cannot be less than {$min} characters';
		}

		if(strlen($last_name) < 3){
			$errors[] = 'your first name cannot be less than {$min} characters';
		}

		if(!empty($errors)){
			foreach ($errors as $error){
				echo $error;
			}
		}


	}
}



function email_exists($email){
	$sql = "SELECT id FROM users WHERE email = '$email'";
	$result = query($sql);
	if(row_count($result) == 1){
		return true;
	}

	else{
		return false;
	}
}



?>










