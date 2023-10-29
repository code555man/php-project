<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

include_once('connect.php');


// Insert Vaccine
if (isset($_POST['btnInsertVaccine'])) {
    $name_vaccine = $_POST['name_vaccine'];
    $method = $_POST['method'];
    $detail = $_POST['detail'];

    $sql = $conn->prepare("INSERT INTO tbl_vaccine(name_vaccine,method,detail) VALUES(:name_vaccine,:method,:detail)");
    $sql->bindParam(":name_vaccine", $name_vaccine);
    $sql->bindParam(":method", $method);
    $sql->bindParam(":detail", $detail);
    $sql->execute();
       
    if ($sql) {
       
        echo "
        <title>ระบบจัดการฟาร์มกระต่าย - มั่งมีฟาร์ม</title>
        <link rel='shortcut icon' href='logo.ico'>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    text: 'เพิ่มข้อมูลวัคซีนสำเร็จ!',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = '../home.php?page=vaccine';
                });
            })
        </script>";
        //header("refresh:2; ../home.php?page=vaccine");
    } else {
        header("location: ../home.php?page=vaccine");
    }
}

// Update Table Vaccine
if (isset($_POST['updateVaccine'])) {

    $id = $_POST['id'];
    $name_vaccine = $_POST['name_vaccine'];
    $method = $_POST['method'];
    $detail = $_POST['detail'];

    $stmt = $conn->prepare("UPDATE  tbl_vaccine SET name_vaccine = :name_vaccine, method = :method, detail = :detail WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name_vaccine', $name_vaccine);
    $stmt->bindParam(':method', $method);
    $stmt->bindParam(':detail', $detail);
    $stmt->execute();

    if ($stmt) {
        echo '
        <title>ระบบจัดการฟาร์มกระต่าย - มั่งมีฟาร์ม</title>
        <link rel="shortcut icon" href="logo.ico">
        <script>
            $(document).ready(function() {
                Swal.fire({
                    text: "แก้ไขข้อมูลวัคซีนสำเร็จ!",
                    icon: "success",
                    timer: 5000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = "../home.php?page=vaccine";
                });
            })
        </script>';
        //header("refresh:2; ../home.php?page=vaccine");
    } else {
        header("location: ../home.php?page=vaccine");
    }

}
?>