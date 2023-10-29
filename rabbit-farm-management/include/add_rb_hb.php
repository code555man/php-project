<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

session_start();
include_once('connect.php');

if (isset($_POST['btnInsertHb'])) {
    $hb_cage = $_POST['hb_cage'];
    $hb_rb_fid = $_POST['hb_rb_fid'];
    $hb_rb_mid = $_POST['hb_rb_mid'];
    $hb_date = date("Y-m-d",strtotime($_POST['hb_date']));
    $hb_schedule = new DateTime($hb_date);
    $hb_schedule->add(new DateInterval('P30D'));
    $hb_schedule_last = $hb_schedule->format('Y-m-d');

    $day = strtotime($hb_schedule_last);
    $hb_day = ceil(($day-time())/60/60/24);

    $hb_status = $_POST['hb_status'];

    $sql = $conn->prepare("INSERT INTO tbl_rabbit_hb(hb_cage, hb_rb_fid, hb_rb_mid, hb_date, hb_schedule, hb_day, hb_status) VALUES(:hb_cage,:hb_rb_fid, :hb_rb_mid, :hb_date, :hb_schedule, :hb_day, :hb_status)");
    $sql->bindParam(":hb_cage", $hb_cage);
    $sql->bindParam(":hb_rb_fid", $hb_rb_fid);
    $sql->bindParam(":hb_rb_mid", $hb_rb_mid);
    $sql->bindParam(":hb_date", $hb_date);
    $sql->bindParam(":hb_schedule", $hb_schedule_last);
    $sql->bindParam(":hb_day", $hb_day);
    $sql->bindParam(":hb_status", $hb_status);
    $sql->execute();
       
    if ($sql) {
        echo '
        <title>ระบบจัดการฟาร์มกระต่าย - มั่งมีฟาร์ม</title>
        <link rel="shortcut icon" href="logo.ico">
        <script>
            $(document).ready(function() {
                Swal.fire({
                    text: "เพิ่มข้อมูลการผสมพันธุ์กระต่ายสำเร็จ!",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = "../home.php?page=rabbit_hb";
                });
            })
        </script>';
        //header("refresh:2; ../home.php?page=rabbit_hb");
    } else {
        header("location: ../home.php?page=rabbit_hb");
    }
}

if (isset($_POST['updateRabbitHb'])) {

    $id = $_POST['id'];
    $hb_cage = $_POST['hb_cage'];
    $hb_rb_fid = $_POST['hb_rb_fid'];
    $hb_rb_mid = $_POST['hb_rb_mid'];
    $hb_date = date("Y-m-d",strtotime($_POST['hb_date']));
    $hb_status = $_POST['hb_status'];

    $hb_schedule = new DateTime($hb_date);
    $hb_schedule->add(new DateInterval('P30D'));
    $hb_schedule_last = $hb_schedule->format('Y-m-d');
   

    $sql = $conn->prepare("UPDATE tbl_rabbit_hb SET hb_cage = :hb_cage, hb_rb_fid = :hb_rb_fid, hb_rb_mid = :hb_rb_mid, hb_date = :hb_date, hb_status = :hb_status, hb_schedule = :hb_schedule WHERE id =:id");
    $sql->bindParam(":id", $id);
    $sql->bindParam(":hb_cage", $hb_cage);
    $sql->bindParam(":hb_rb_fid", $hb_rb_fid);
    $sql->bindParam(":hb_rb_mid", $hb_rb_mid);
    $sql->bindParam(":hb_date", $hb_date);
    $sql->bindParam(":hb_schedule", $hb_schedule_last);
    $sql->bindParam(":hb_status", $hb_status);
    $sql->execute();

    if ($sql) {
        echo "
        <title>ระบบจัดการฟาร์มกระต่าย - มั่งมีฟาร์ม</title>
        <link rel='shortcut icon' href='logo.ico'>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    text: 'แก้ไขข้อมูลการผสมพันธุ์สำเร็จ!',
                    icon: 'success',
                    timer: 5000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = '../home.php?page=rabbit_hb';
                });
            })
        </script>";
        //header("refresh:2; ../home.php?page=rabbit_hb");
    } else {
        header("location: ../home.php?page=rabbit_hb");
    }

}



