<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
include_once('connect.php');

if (isset($_POST['btnInsertRb'])) {
    $rb_cage = $_POST['rb_cage'];
    $rb_id = $_POST['rb_id'];
    $rb_gender = $_POST['rb_gender'];
    $rb_birthday = date("Y-m-d",strtotime($_POST['rb_birthday']));
    $rb_status = $_POST['rb_status'];
    $rb_type = $_POST['rb_type'];
    $rb_hb = $_POST['rb_hb'];
    $rbf_id = $_POST['rb_fid'];
    $rbm_id = $_POST['rb_mid'];

    $sql = $conn->prepare("INSERT INTO tbl_rabbit(rb_cage, rb_id, rb_gender, rb_birthday, rb_status, rb_type, rb_hb, rb_fid, rb_mid) VALUES(:rb_cage, :rb_id, :rb_gender, :rb_birthday, :rb_status, :rb_type, :rb_hb, :rb_fid, :rb_mid)");
    $sql->bindParam(":rb_cage", $rb_cage);
    $sql->bindParam(":rb_id", $rb_id);
    $sql->bindParam(":rb_gender", $rb_gender);
    $sql->bindParam(":rb_birthday", $rb_birthday);
    $sql->bindParam(":rb_status", $rb_status);
    $sql->bindParam(":rb_type", $rb_type);
    $sql->bindParam(":rb_hb", $rb_hb);
    $sql->bindParam(":rb_fid", $rbf_id);
    $sql->bindParam(":rb_mid", $rbm_id);
    $sql->execute();
       
    if ($sql) {
        echo "
        <title>ระบบจัดการฟาร์มกระต่าย - มั่งมีฟาร์ม</title>
        <link rel='shortcut icon' href='logo.ico'>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    text: 'เพิ่มข้อมูลกระต่ายสำเร็จ!',
                    icon: 'success',
                    timer: 5000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = '../home.php?page=rabbit_data';
                });
            })
        </script>";
        //header("refresh:2; ../home.php?page=rabbit_data");
    } else {
        header("location: ../home.php?page=rabbit_data");
    }
}


if (isset($_POST['btnUpdateRb'])) {
    $id = $_POST['id'];
    $rb_cage = $_POST['rb_cage'];
    $rb_id = $_POST['rb_id'];
    $rb_gender = $_POST['rb_gender'];
    $rb_birthday = date("Y-m-d",strtotime($_POST['rb_birthday']));
    $rb_status = $_POST['rb_status'];
    $rb_type = $_POST['rb_type'];
    $rb_hb = $_POST['rb_hb'];
    $rb_fid = $_POST['rb_fid'];
    $rb_mid = $_POST['rb_mid'];

    $sql = $conn->prepare("UPDATE tbl_rabbit SET rb_cage = :rb_cage, rb_id = :rb_id, rb_gender = :rb_gender, rb_birthday = :rb_birthday, rb_status = :rb_status, rb_type = :rb_type, rb_hb = :rb_hb, rb_fid = :rb_fid, rb_mid = :rb_mid WHERE id =:id");
    $sql->bindParam(":id", $id);
    $sql->bindParam(":rb_cage", $rb_cage);
    $sql->bindParam(":rb_id", $rb_id);
    $sql->bindParam(":rb_gender", $rb_gender);
    $sql->bindParam(":rb_birthday", $rb_birthday);
    $sql->bindParam(":rb_status", $rb_status);
    $sql->bindParam(":rb_type", $rb_type);
    $sql->bindParam(":rb_hb", $rb_hb);
    $sql->bindParam(":rb_fid", $rb_fid);
    $sql->bindParam(":rb_mid", $rb_mid);
    $sql->execute();

    if ($sql) {
        echo "
        <title>ระบบจัดการฟาร์มกระต่าย - มั่งมีฟาร์ม</title>
        <link rel='shortcut icon' href='logo.ico'>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    text: 'แก้ไขข้อมูลกระต่ายสำเร็จ!',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = '../home.php?page=rabbit_data';
                });
            })
        </script>";
        //header("refresh:2; ../home.php?page=rabbit_data");
    } else {
        header("location: ../home.php?page=rabbit_data");
    }

}
        
?>