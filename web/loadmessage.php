<?php
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);

	$conn = new mysqli($server, $username, $password, $db);


	//validate connection
	if(mysqli_connect_errno())
	{
		echo "1: Connection failed"; //error code 1: connection failed
		exit();
	}

	//retrieve user id from url
	$id = $_GET['id'];

	//validate name
	$messagecheckquery = "SELECT message FROM messages WHERE id=" . $id . ";";

	$messagecheck = mysqli_query($conn, $messagecheckquery) or die("8: Id query failed"); //error code 8: id query fails

	if(mysqli_num_rows($messagecheck)>1)
	{
		echo "9: Multiple messages found"; //error code 9: multiple messages found
		exit();
	}


	else if(mysqli_num_rows($messagecheck)==0)
	{
		echo "N/A"; //no messages
		exit();
	}

	//get login info
	else
	{
		$existinginfo = mysqli_fetch_assoc($messagecheck);
		echo "0\t" . $existinginfo["message"];
	}

?>