<?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "qrcode";

    $conn = new mysqli($server, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " .$con->connect_error);
    }
    if(isset($_POST['text'])){
        $text = $_POST['text'];
        $sql = "INSERT INTO data(student_id,time_in) VALUES ('$text',NOW())";

        if ($conn->query($sql) === TRUE) {
            echo "บันทึกข้อมูลสำเร็จ";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
?>