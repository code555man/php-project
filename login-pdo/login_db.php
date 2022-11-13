<?php
session_start();  
include('connection.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $_SESSION['err_fill'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
        header('location: login.php');
    } 
    else {
        $select_stmt = $db->prepare("SELECT COUNT(username) AS count_uname, password FROM users WHERE username = :username");
        $select_stmt->bindParam(':username', $username);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

        if ($row['count_uname'] == 0) {
            $_SESSION['err_uname'] = "ไม่มี username นี้ในระบบ";
            header('location: login.php');
        }
        else {
            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $username;
                $_SESSION['is_logged_in'] = true;
                header('location: index.php');
            }
            else {
                $_SESSION['err_pw'] = "รหัสผ่านไม่ถูกต้อง";
                header('location: login.php');
            }
        }
    }
}
