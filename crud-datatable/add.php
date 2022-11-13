<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$id = $_POST['id'];
		$fullname = $_POST['fullname'];
		$phone = $_POST['phone'];
		$group = $_POST['group'];
		$sql = "INSERT INTO members (`id`,`fullname`, `phone`, `group`) VALUES ('$id','$fullname', '$phone', '$group')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Member added successfully';
		}	
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: index.php');
?>