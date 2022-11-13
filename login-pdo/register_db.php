<?php
session_start();    
include('connection.php'); 

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($username) || empty($password) || empty($confirm_password)) {
        $_SESSION['err_fill'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
        header('location: register.php');
    } 
    else {
        if ($password !== $confirm_password) {
            $_SESSION['err_pw'] = "กรุณากรอกรหัสผ่านให้ตรงกัน";
            header('location: register.php');
        } 
        else {
            $select_stmt = $db->prepare("SELECT COUNT(username) AS count_uname FROM users WHERE username = :username");
            $select_stmt->bindParam(':username', $username);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['count_uname'] != 0) {
                $_SESSION['exist_uname'] = "มี username นี้ในระบบ";
                header('location: register.php');
            } 
            else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $insert_stmt = $db->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, 'user')");
                $insert_stmt->bindParam(':username', $username);
                $insert_stmt->bindParam(':password', $password);
                $insert_stmt->execute();

                if ($insert_stmt) {
                    $_SESSION['username'] = $username;
                    $_SESSION['is_logged_in'] = true;
                    header('location: index.php');
                } 
                else {
                    $_SESSION['err_insert'] = "ไม่สามารถนำเข้าข้อมูลได้";
                    header('location: register.php');
                }
            }
        }
    }
}
