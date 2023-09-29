<?php
	
	$color='red';
	$car='BMW';

	class User{
		public $ten;
		public $email;	
		public $web;
		public $gender;
		public $time_get;
		public $time_check;
	}
	
	try{
		// Tạo đối tượng
		$user = new User();
		$user->ten = $_POST["ten"];
		$user->email = $_POST["email"];
		$user->web = $_POST["web"];	
		$user->gender = $_POST["gender"];
		$user->time_get = $_POST["time"];
		$user->time_check = $_POST["time_check"];
		
		$myJSON = json_encode($user);
		
		$ten = $_POST["ten"];
		$email = $_POST["email"];
		$web = $_POST["web"];
		$gender = @$_POST["gender"];
		$time_get = $_POST["time"];
		$time_check = $_POST["time_check"];
		$story = $_POST["story"];
		
		// Check valid tên, email, web
		if (!preg_match("/^[a-zA-Z-' ]*$/",$ten)) {
	  		$ten = "Only letters and white space allowed";
	  	}
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  		$email = "Invalid email format";
		}
		
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$web)) {
	  		$web = "Invalid URL";
		}	
		
		if($time_get == "acy"){
			$time_get = date("Y");
		}
		else if($time_get == "gat"){
			$time_get = date("h:i:sa");
		}
		
		else if($time_get == "gytz"){
			date_default_timezone_set("America/New_York");
			$time_get = date("h:i:sa");
		}
		
		// Nối sql
		$serverName = 'StOrmeR';
		$connectionInfo = array( "Database"=>"Story", "CharacterSet" => "UTF-8");
		$conn = sqlsrv_connect( $serverName, $connectionInfo);
		if( $conn === false) {
			die( print_r( sqlsrv_errors(), true));
		}
		else{
			echo "Có kết nối <br>";
			$sql = "select * from _User where id=$story";
			$stmt = sqlsrv_query($conn,$sql);
			
			while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
				$n = $row["name_user"];
				$e = $row["email_user"];
			echo "$n" . "$e <br>";
			}			
		}
		
		// Phản hồi
		echo "Tên là: $ten và email là: $email và web là: $web và giới tính là $gender và ngày là $time_get và ngày được chọn là: $time_check <br>";
		echo "Đây là tên file script đang thực thi: " . htmlspecialchars($_SERVER["PHP_SELF"]) . "<br>";
		echo "Vẫn là trả về các biến nhưng ở dạng json: " . $myJSON . "<br>";
		
		// Handle file
		$myfile = fopen("ehe.txt", "r") or die("Unable to open file!");
		echo "Đọc file ehe.txt: " . fread($myfile,filesize("ehe.txt")) . "<br>";
		fclose($myfile);
		
		$myfile1 = fopen("ehe.txt", "r") or die("Unable to open file!");		
		echo "Đọc dòng 1: " . fgets($myfile1) . "<br>";
		echo "Đọc dòng 2: " . fgets($myfile1) . "<br>";
		echo "Đọc dòng 3: " . fgets($myfile1) . "<br>";
		if(feof($myfile1)){
			echo "Hết. <br>";
		}
		fclose($myfile1);
		
		$myfile2 = fopen("newfile.txt", "w") or die("Unable to open file!");
		$txt = "Mickey Mouse\n";
		fwrite($myfile2, $txt);
		$txt = "Minnie Mouse\n";
		fwrite($myfile2, $txt);
		fclose($myfile2);
		
		$myfile3 = fopen("newfile.txt", "r") or die("Unable to open file!");
		echo "Đọc file newfile.txt: " . fread($myfile3,filesize("ehe.txt")) . "<br>";
		fclose($myfile3);
									
	}
	
	catch (Exception $ex) {
    	echo 'Caught exception: ',  $ex->getMessage(), "\n";
	}
?>

