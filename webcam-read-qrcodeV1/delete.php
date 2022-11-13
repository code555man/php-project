<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "student";

    // Connect Database
    $conn = new mysqli($server, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " .$con->connect_error);
    }

	if(isset($_GET['deleteid'])){

        $delete_id = $_GET['deleteid'];
		$sql = "DELETE FROM data WHERE id = $delete_id";
        $result = mysqli_query($conn,$sql);

		if($result){
            header("Location: data.php?deleteid=$delete_id");
		}
		else{
			echo "<script>alert('failed')</script>";
            header("Location: data.php");
		}
	}

?>