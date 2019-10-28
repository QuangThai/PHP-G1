<?php 
	include_once("../Model/entity/user.php");
	$username = $_REQUEST["username"];
	if(isset($username)) {
		if ($username == "abc") {
			$user = new User("nqthai", "123","Quang Thai");
		}
		if ($username == "abcd") {
			$user = new User("nqthai1", "1234","Quang Thai");
		}
	}
	// $user = new User("nqthai1", "1234","Quang Thai");
	$jsonUser = json_encode($user);
	echo $jsonUser;
?>