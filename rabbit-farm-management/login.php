<?php 

    session_start();
    include_once('include/connect.php');

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

      
        if (empty($username)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อผู้ใช้';
            header("location: index.php");

        }else if (empty($password)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: index.php.php");
        }else {
            try {

                $check_data = $conn->prepare("SELECT * FROM tbl_members WHERE username = :username");
                $check_data->bindParam(":username", $username);
                $check_data->execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);

                if ($check_data->rowCount() > 0) {

                    if ($username == $row['username']) {
                        if ($password == $row['password']) {
                            if ($row['role'] == 'แอดมิน') {
                                $_SESSION['admin_login'] = $row['id'];
                                header("location: home.php");
                            } 
                            else if ($row['role'] == 'พนักงาน'){
                                $_SESSION['user_login'] = $row['id'];
                                header("location: home.php");
                            }
                        } else {
                            $_SESSION['error'] = 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง';
                            header("location: index.php");
                        }
                    } else {
                        $_SESSION['error'] = 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง';
                        header("location: index.php");
                    }
                } else {
                    $_SESSION['error'] = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
                    header("location: index.php");
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>