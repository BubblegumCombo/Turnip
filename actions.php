<?php

	include ("functions.php");

	if ($_GET['action'] == "loginSignup") {
		
		$error = "";

		if (!$_POST['email']) {

			$error = "An email address is required.";

		} else if (!$_POST['password']) {

			$error ="A password is required.";

		} else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {

  			$error = ("Enter a valid email address");
		}

		if ($_POST['loginActive'] == "0") { // Signup Logic

			$query  = "SELECT * FROM users WHERE email = '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
			$result = mysqli_query($link, $query);
			if(mysqli_num_rows($result) > 0){
				$error = "That email already exists.";
			} else {

				$query = "INSERT INTO users (`email`, `password`) VALUES ('". mysqli_real_escape_string($link, $_POST['email'])."', '". mysqli_real_escape_string($link, $_POST['password'])."')";
				if (mysqli_query($link, $query)) {

					$_SESSION['id'] = mysqli_insert_id($link);

					$query = "UPDATE users SET password = '".md5(md5($_SESSION['id']).$_POST['password']) ."' WHERE id = '".($_SESSION['id'])."' LIMIT 1";
					mysqli_query($link, $query);					

				} else {

					$error ="Couldn't create the user. Try again?";
				}

			}
            
		} else { // Login Logic

			
			$query  = "SELECT * FROM users WHERE email = '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

			$result = mysqli_query($link, $query);

			$row = mysqli_fetch_assoc($result);
			if($row){
				if ($row['password'] = md5(md5($row ['id'].$_POST['password']))) {
					$_SESSION['id'] = $row['id'];
					?>
					<script type="text/javascript">
					window.location = "http://localhost/stuff/turnip/index.php";
					</script>
    			<?php
				} else {
					$error = "Could not find that username/password combo. Try again";
				}
			} else {
				$error = "Could not find that username/password combo. Try again";
			}
			
			}
		}

    global $error;
	if ($error != "") {

		echo "Cool good job dude";
		exit();

	}

if ($_GET['action'] == 'postPrice') {
    
     if (!$_POST['turnipContent']) {
                            
                    echo "Enter a price, dummy!";
         
                } else if (strlen($_POST['turnipContent']) > 3) {
         
         echo "You probably typed in the wrong number. Try again!";
     } else {
         
         mysqli_query($link, "INSERT INTO turnips (`price`, `userid`, `datetime`) VALUES ('".mysqli_real_escape_string($link, $_POST['turnipContent'])."', ".mysqli_real_escape_string($link, $_SESSION['id']).", NOW())");
         
         echo"Price Succesfully Posted";
     }
}

?>