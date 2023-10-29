<?php 

    session_start();

    include_once("../../include/connect.php");

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $img = $_FILES['img'];

        $img2 = $_POST['img2'];
        $upload = $_FILES['img']['name'];

        if ($upload != '') {
            $allow = array('jpg', 'jpeg', 'png');
            $extension = explode('.', $img['name']);
            $fileActExt = strtolower(end($extension));
            $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
            $filePath = '../../include/uploads/'.$fileNew;

            if (in_array($fileActExt, $allow)) {
                if ($img['size'] > 0 && $img['error'] == 0) {
                   move_uploaded_file($img['tmp_name'], $filePath);
                }
            }

        } else {
            $fileNew = $img2;
        }

        $stmt = $conn->prepare("UPDATE  tbl_members SET username = :username, password = :password, phone = :phone ,email = :email, img = :img, role = :role WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':img', $fileNew);
        $stmt->execute();

        if ($stmt) {
            // $_SESSION['success_member'] = "Data has been updated successfully";
            header("location: ../../home.php?page=member");
        } else {
            // $_SESSION['error_member'] = "Data has not been updated successfully";
            header("location: ../../home.php?page=member");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการฟาร์มกระต่าย - มั่งมีฟาร์ม</title>
    <link rel="shortcut icon" href="../../assets/images/logo.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="../../assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <style>

      @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');

      body{
        font-family: 'Kanit', sans-serif;
      }
      .container {
            max-width: 550px;
        }

    </style>
</head>
<body>
        <div class="container mt-5">
            <h4 class="app-page-title">
                <span class="nav-icon">
                    <span><i class="fa-solid fa-pen-to-square text-success"></i> แก้ไขข้อมูลสมาชิก</span>
                </span>  
            </h4>
            <hr>
            <form action="edit_member.php" method="post" enctype="multipart/form-data">
                <?php
                    if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $stmt = $conn->query("SELECT * FROM tbl_members WHERE id = $id");
                            $stmt->execute();
                            $data = $stmt->fetch();
                            $_SESSION['role'] = $data['role'];
                    }
                ?>  
                
                <!-- Edit Form  -->
                <div class="row mb-2">
                    <div class="col">
                        <label for="id" class="col-form-label">ID:</label>
                        <input type="text" readonly value="<?php echo $data['id']; ?>" class="form-control" name="id" >
                    </div>
                    <div class="col">
                        <label for="firstname" class="col-form-label">ชื่อผู้ใช้ : </label>
                        <input type="text" value="<?php echo $data['username']; ?>" required class="form-control" name="username">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <label for="firstname" class="col-form-label">รหัสผ่าน :</label>
                        <input type="text" value="<?php echo $data['password']; ?>" required class="form-control" name="password">
                    </div>
                    <div class="col">
                        <label for="firstname" class="col-form-label">อีเมล :</label>
                        <input type="text" value="<?php echo $data['email']; ?>" required class="form-control" name="email" >
                        <input type="hidden" value="<?php echo $data['img']; ?>" required class="form-control" name="img2" >
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <label for="firstname" class="col-form-label">เบอร์โทร :</label>
                        <input type="text" value="<?php echo $data['phone']; ?>" required class="form-control" name="phone">
                    </div>
                    <div class="col">
                        <label class="form-label">สถานะ :</label>
                        <select name="role" class="form-select">
                            <option value="<?php echo $data['role']; ?>" selected><?php echo $data['role']; ?></option>
                            <option value="<?php echo $data['role'] == "แอดมิน" ? 'พนักงาน' : 'แอดมิน' ?>"><?php echo $data['role'] == "แอดมิน" ? 'พนักงาน' : 'แอดมิน' ?></option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="img" class="col-form-label">รูปภาพ :</label>
                    <input type="file" class="form-control" id="imgInput" name="img">
                    <br>
                    <img width="70%" src="../../include/uploads/<?php echo $data['img']; ?>" id="previewImg" alt="">
                </div>
                <hr>
                <a href="../../home.php?page=member" class="btn btn-danger"><i class="fa-solid fa-circle-xmark"></i> ยกเลิก</a>
                <button type="submit" name="update" class="btn btn-success"><i class="fa-solid fa-square-check"></i> บันทึกข้อมูล</button>
            </form>
        <div class="container mt-5">

    <!-- Bootstrap js file -->
    <script src="../../assets/plugins/popper.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script>

        let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('previewImg');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
                if (file) {
                    previewImg.src = URL.createObjectURL(file)
            }
        }

    </script>
</body>
</html>