<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php  

include_once("connect.php");

if (isset($_POST['btnInsertMember'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $img = $_FILES['img'];

    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode('.', $img['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
    $filePath = 'uploads/'.$fileNew;

    if (in_array($fileActExt, $allow)) {
        if ($img['size'] > 0 && $img['error'] == 0) {
            if (move_uploaded_file($img['tmp_name'], $filePath)) {
                $sql = $conn->prepare("INSERT INTO tbl_members(img, username, password, phone, email, role) VALUES(:img, :username, :password, :phone, :email, :role)");
                $sql->bindParam(":img", $fileNew);
                $sql->bindParam(":username", $username);
                $sql->bindParam(":password", $password);
                $sql->bindParam(":phone", $phone);
                $sql->bindParam(":email", $email);
                $sql->bindParam(":role", $role);
                $sql->execute();

                if ($sql) {
                    echo  "
                    <title>ระบบจัดการฟาร์มกระต่าย - มั่งมีฟาร์ม</title>
                    <link rel='shortcut icon' href='logo.ico'>
                    <script>
                    $(document).ready(function() {
                        Swal.fire({
                            text: 'เพิ่มข้อมูลสำเร็จ!',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = '../home.php?page=member';
                        });
                    })
                    </script>";
                    //header("refresh:2; ../home.php?page=member");
                } else {
                    header("Location ../home.php?page=member");
                }
            }
        }
    }
}


if (isset($_POST['updateMember'])) {

    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("UPDATE  tbl_members SET username = :username, password = :password, phone = :phone ,email = :email ,role = :role WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':role', $role);
    $stmt->execute();

    if ($stmt) {
        echo "
        <title>ระบบจัดการฟาร์มกระต่าย - มั่งมีฟาร์ม</title>
        <link rel='shortcut icon' href='logo.ico'>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    text: 'แก้ไขข้อมูลสมาชิกสำเร็จ!',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = '../home.php?page=member';
                });
            })
        </script>";
        header("refresh:2; ../home.php?page=member");
    } else {
        header("location: ../home.php?page=member");
    }

}

?>
