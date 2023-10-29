<?php 
include_once("include/connect.php");

$desc_id = 1;
$stmt = $conn->query("SELECT * FROM tbl_description WHERE desc_id = $desc_id");
$stmt->execute();
$data = $stmt->fetch(); 

?>

<h1 class="app-page-title"><i class="fa-solid fa-wrench"></i> ตั้งค่าเว็บไซต์</h1>
<hr class="mb-4">

<div class="col">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4"> 
                <div class="app-card-body">
                    <form action="include/save_setting.php" class="settings-form" method="post">
                        <?php if(isset($_SESSION['error'])) { ?>
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>
                                    <?php 
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if(isset($_SESSION['success'])) { ?>
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </symbol>
                                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                </symbol>
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </symbol>
                            </svg>
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                <div>
                                <?php 
                                    echo $_SESSION['success'];
                                    unset($_SESSION['success']);
                                ?>
                                </div>
                            </div>
                        <?php } ?>
                        <input type="hidden" name="desc_id" value="<?php echo $data['desc_id']; ?>">
                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">หัวข้อ :</label>
                            <input type="text" name="desc_header" class="form-control" value="<?php echo $data['desc_header']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">คำอธิบาย :</label>
                            <input type="text" name="desc_content" class="form-control" value="<?php echo $data['desc_content']; ?>">
                        </div>
                        <button type="submit" name="save_setting" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i> อัปเดต</button>
                    </form>  
                </div><!--//app-card-body-->
            </div><!--//app-card-->
        </div>
    </div><!--//row-->

    <div class="row g-4 settings-section mt-2">
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4"> 
                <div class="app-card-body" style="display: inline">
                    <form action="include/save_setting.php" method="post" class="d-inline">
                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">แจ้งเตือน :</label>
                            <input type="text" name="notify_content" class="form-control" placeholder="รายละเอียด" required>
                        </div>
                        <button type="submit" name="insertNotify" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i> อัปเดตแจ้งเตือน</button>
                    </form> 
                    <form action="include/save_setting.php" method="post" class="d-inline">
                        <button type="submit" name="deleteNotify" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> ลบแจ้งเตือนทั้งหมด</button>
                    </form>
                </div><!--//app-card-body-->
                <!-- <hr class="mb-4"> -->
            </div><!--//app-card-->
        </div>
    </div><!--//row-->
</div>
