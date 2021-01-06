<?php
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);

	$con = new mysqli($server, $username, $password, $db); 
	//validate connection
	if(mysqli_connect_errno())
	{
		echo "1: Connection failed"; //error code 1: connection failed
		exit();
	}

	echo "21";

	$username = $_POST["name"];
	$password = $_POST["password"];

	echo $username;

	//validate name
	$namecheckquery = "SELECT username FROM users WHERE username='" . $username . "';";

	echo $namecheckquery;
	$namecheck = mysql_query($namecheckquery) or die("2: Username query failed"); 
	//error code 2: name query fails
	echo $namecheck;
	echo "namecheck passes";

	if($namecheck)
	{
		echo "3: Username already exists"; //error code 3: name exists
		exit();
	}

	//add user to the table
	// $salt = "\$5\$rounds=5000\$" . "steamedhams" . $username . "\$";
	// $hash = crypt($password, $salt);
	// $insertuserquery = "INSERT INTO users (username, hash, salt) VALUES ('" . $username . "', '" . $hash . "', '" . $salt . "');";
	
	// echo $insertuserquery;

	// $con->query($insertuserquery) or die("4: Insert user query failed"); //error code 4: insert query failed

	echo "0";
?>