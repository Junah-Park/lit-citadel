<?php
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);

	$conn = new mysqli($server, $username, $password, $db);
	$conn->query("CREATE TABLE `unityaccess`.`example` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `username` VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `hash` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `salt` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `score` INT(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; ");
?>
