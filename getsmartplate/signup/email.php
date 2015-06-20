<?php
session_start(); 
$notified_msg = '';
$error_msg = '';

if(isset($_POST['data_capture_form'])){
	$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

	if (preg_match($pattern, $_POST['email']) === 1) {
		
	}else{
		$_SESSION['msg'] = "EmailAddress is not valid";
	}
	
	
	if(!empty($error_msg)){
		$notified_msg = $error_msg;
	}else{
	$servername = "localhost";
	$username = "getsmart_formdat";
	$password = "G0Bp&hefBiJ[";
	$dbname = "getsmart_formdata";
	$email_message = "";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}else{
		if (!empty($_SERVER['HTTP_CLIENT_IP'])){
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		//$curnt_date = date('Y-m-d H:i:s');
		$sql = "INSERT INTO data_capture(fname, lname, email, create_date, ip_address) VALUES ('".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['email']."', now(), '".$ip."')"; 
		if (mysqli_query($conn, $sql)){		
			// php mail script start
			$email_to =  "anthony@fitly.com, dhawal@dignitasdigital.com";
			$email_subject = "Email from SmartPlate"; 
			
			$email_message .= "First Name: ".$_POST['fname']."\n"; 
			$email_message .= "Last Name: ".$_POST['lname']."\n"; 
			$email_message .= "Email: ".$_POST['email']."\n"; 
			
			// create email headers 
			$headers = 'From: '.$_POST['email']."\r\n".	 
			'Reply-To: '.$_POST['email']."\r\n" .	 
			'X-Mailer: PHP/' . phpversion();	 
			@mail($email_to, $email_subject, $email_message, $headers); 
			// php mail script end
			
			$_SESSION['msg']  = "Thank you for showing interest in SmartPlate. We will keep you posted with the latest updates.";	
		}else{
			$_SESSION['msg']  = "Thank you for showing interest in SmartPlate. We will keep you posted with the latest updates.";
		}	
		mysqli_close($conn);		
		header("Location: http://getsmartplate.com/signup");
		die();

	}
}}

?>