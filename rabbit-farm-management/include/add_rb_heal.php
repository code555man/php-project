<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
date_default_timezone_set('Asia/Bangkok');
include_once('connect.php');

if (isset($_POST['btnInsertHeal'])) {

    $heal_cage = $_POST['heal_cage'];
    $heal_id = $_POST['heal_id'];
    $heal_date = date("Y-m-d",strtotime($_POST['heal_date']));
    $heal_status = $_POST['heal_status'];

    $sql = $conn->prepare("INSERT INTO tbl_rabbit_heal(heal_cage, heal_id, heal_date, heal_status) VALUES(:heal_cage, :heal_id, :heal_date, :heal_status)");
    $sql->bindParam(":heal_cage", $heal_cage);
    $sql->bindParam(":heal_id", $heal_id);
    $sql->bindParam(":heal_date", $heal_date);
    $sql->bindParam(":heal_status", $heal_status);
    $sql->execute();
       
    if ($sql) {
        echo "
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
                    window.location.href = '../home.php?page=rabbit_heal';
                });
            })
        </script>";
        //header("refresh:2; ../home.php?page=rabbit_heal");
    } else {
        header("location: ../home.php?page=rabbit_heal");
    }
}



if (isset($_POST['btnEditHeal'])) {

    $id = $_POST['id'];
    $heal_cage = $_POST['heal_cage'];
    $heal_id = $_POST['heal_id'];
    $heal_date = date("Y-m-d",strtotime($_POST['heal_date']));
    $heal_status = $_POST['heal_status'];

    $sql = $conn->prepare("UPDATE tbl_rabbit_heal SET heal_cage = :heal_cage, heal_id = :heal_id, heal_date = :heal_date, heal_status = :heal_status WHERE id = :id");
    $sql->bindParam(":id", $id);
    $sql->bindParam(":heal_cage", $heal_cage);
    $sql->bindParam(":heal_id", $heal_id);
    $sql->bindParam(":heal_date", $heal_date);
    $sql->bindParam(":heal_status", $heal_status);
    $sql->execute();
       
    if ($sql) {
        echo "
        <title>ระบบจัดการฟาร์มกระต่าย - มั่งมีฟาร์ม</title>
        <link rel='shortcut icon' href='logo.ico'>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    text: 'แก้ไขข้อมูลสำเร็จ!',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = '../home.php?page=rabbit_heal';
                });
            })
        </script>";
        //header("refresh:2; ../home.php?page=rabbit_heal");
    } else {
        header("location: ../home.php?page=rabbit_heal");
    }
}


if (isset($_POST['addCheckList'])) {

    $fk_id = $_POST['fk_id'];
    $number = $_POST['number'];
    $vaccine = $_POST['vaccine'];
    $poop = $_POST['poop'];
    $behavior = $_POST['behavior'];
    $eat_grass = $_POST['eat_grass'];
    $eat_pellets = $_POST['eat_pellets'];
    $date_time = date("Y-m-d H:i:s");
    $poops =  implode("<br>",$poop);
    $behaviors =  implode("<br>",$behavior);
    
    $sql = $conn->prepare("INSERT INTO tbl_health (fk_id, number, vaccine, poop, behavior, eat_grass, eat_pellets, date_time) VALUES(:fk_id, :number, :vaccine, :poop, :behavior, :eat_grass, :eat_pellets, :date_time)");

    $sql->bindParam(":fk_id", $fk_id);
    $sql->bindParam(":number", $number);
    $sql->bindParam(":vaccine", $vaccine);
    $sql->bindParam(":eat_grass", $eat_grass);
    $sql->bindParam(":eat_pellets", $eat_pellets);
    $sql->bindParam(":date_time",$date_time);
    $sql->bindParam(":poop", $poops);
    $sql->bindParam(":behavior", $behaviors);
    $sql->execute();
    
    if ($sql) {
        echo "
        <title>ระบบจัดการฟาร์มกระต่าย - มั่งมีฟาร์ม</title>
        <link rel='shortcut icon' href='logo.ico'>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    text: 'บันทึกข้อมูลสุขภาพกระต่ายสำเร็จ!',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = '../home.php?page=rabbit_heal';
                });
            })
        </script>";
        //header("refresh:2; ../home.php?page=rabbit_heal");
    } else {
        header("location: ../home.php?page=rabbit_heal");
    }
    
}
        
?>