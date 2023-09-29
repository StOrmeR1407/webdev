<?php

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

			$cookie_name = $_POST["name_cookies"];	
						
			if(!isset($_COOKIE[$cookie_name])) {
	  			echo "Cookie named '" . $cookie_name . "' is not set!";
	  			setcookie($cookie_name, $myJSON, time() + 300, "/");
			} 
			else {
	  		echo "Cookie '" . $cookie_name . "' is set!<br>";
	  		echo "Value is: " . $_COOKIE[$cookie_name] . "<br>";
	  		echo "There are your cookies: <br> ";
	  		foreach ($_COOKIE as $key=>$val)
		  		{
		    	echo $key.' is '.$val."<br>\n";
		  		}
			}
		}
		
		catch (Exception $ex) {
    		echo 'Caught exception: ',  $ex->getMessage(), "\n";
		}

?>
