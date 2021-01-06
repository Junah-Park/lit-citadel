<?php
  $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

  $server = $url["host"];
  $username = $url["user"];
  $password = $url["pass"];
  $db = substr($url["path"], 1);

// sql to create table
$sql = "CREATE TABLE users ( 
  id INT(10) AUTO_INCREMENT PRIMARY KEY, 
  username VARCHAR(16) NOT NULL, 
  hash VARCHAR(100) NOT NULL, 
  salt VARCHAR(50) NOT NULL, 
  score INT(10) NOT NULL
  )";

if ($conn->query($sql) === TRUE) {
  echo "Table users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

?>
