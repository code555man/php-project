<?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "student";

    // connect Database
    $conn = new mysqli($server, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " .$con->connect_error);
    } 

    //  Insert Data To Database
    if (isset($_POST['stdId'])) {

        $stdId = $_POST['stdId'];
        $stdName = $_POST['stdName'];
        $stdLastname = $_POST['stdLastname'];
        $stdGroup = $_POST['stdGroup'];
        $sql = "INSERT INTO data(std_id, std_name, std_lastname, std_group,time_in) VALUES('$stdId', '$stdName','$stdLastname', '$stdGroup',now())";

        $conn->query($sql);
        
    } 
        
    $conn->close();
?>