<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 

session_start();
include_once('connect.php');

if (isset($_POST['save_setting'])) {

    $desc_id = $_POST['desc_id'];
    $desc_header = $_POST['desc_header'];
    $desc_content = $_POST['desc_content'];

    $sql = $conn->prepare("UPDATE tbl_description SET desc_header = :desc_header, desc_content = :desc_content WHERE desc_id = :desc_id");
    $sql->bindParam(":desc_id", $desc_id);
    $sql->bindParam(":desc_header", $desc_header);
    $sql->bindParam(":desc_content", $desc_content);
    $sql->execute();

    if ($sql) {
        $_SESSION['success'] = "อัปเดตข้อมูลสำเร็จ!";
        header("Location: ../home.php?page=setting");
    } else {
        $_SESSION['error'] = "อัปเดตข้อมูลไม่สำเร็จ!";
        header("location: ../home.php?page=setting");
    }

}

if (isset($_POST['insertNotify'])) {
    $noti_content = $_POST['notify_content'];

    $sql = $conn->prepare("INSERT INTO tbl_notification(notify_content, notify_date_time) VALUE (:notify_content, :notify_date_time)");
    $sql->bindParam(":notify_content", $noti_content);
    $sql->bindParam(":notify_date_time", date("Y-m-d  H:i:s"));
    $sql->execute();

    if ($sql) {
        $_SESSION['success'] = "เพิ่มการแจ้งเตือนสำเร็จ!";
        header("Location: ../home.php?page=setting");
    } else {
        $_SESSION['error'] = "เพิ่มการแจ้งเตือนไม่สำเร็จ!";
        header("location: ../home.php?page=setting");
    }
}

if (isset($_POST['deleteNotify'])) {

    $sql = $conn->prepare("TRUNCATE TABLE tbl_notification");
    $sql->execute();

    if ($sql) {
        $_SESSION['success'] = "ลบการแจ้งเตือนสำเร็จ!";
        header("location: ../home.php?page=setting");
    } else {
        $_SESSION['error'] = "ลบการแจ้งเตือนไม่สำเร็จ!";
        header("location: ../home.php?page=setting");
    }
}

?>