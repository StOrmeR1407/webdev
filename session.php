<?php
	function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
	}
	
	class User{
		public $ten;
		public $email;	
		public $web;
		public $gender;
		}
		
		try{
			$user = new User();
			$user->ten = $_POST["ten"];
			$user->email = $_POST["email"];
			$user->web = $_POST["web"];	
			$user->gender = @$_POST["gender"];
			
			$myJSON = json_encode($user);

			session_start();
			$name_session = generateRandomString();
			$_SESSION[$name_session] = $myJSON;
			echo $name_session . " " . $_SESSION[$name_session] . "<br>";
			
			$responseMatch = $_SESSION[$name_session] == $_COOKIE["Cookies2"];
			echo $responseMatch ? 'Dùng nhiều acc nè' : 'acc mới';
		}
		
		catch (Exception $ex) {
    		echo 'Caught exception: ',  $ex->getMessage(), "\n";
		}
	
?>

