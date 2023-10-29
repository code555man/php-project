<?php 

if (isset($_POST["checkHb"])) {

    $hb_id = $_POST['hb_id'];

    $rb_hb_check = $conn->query("SELECT * FROM tbl_rabbit_hb WHERE hb_rb_fid = '$hb_id' OR hb_rb_mid = '$hb_id'");
    $rb_hb_check->execute();
    $data = $rb_hb_check->fetchAll(PDO::FETCH_ASSOC);
}

?>

<h4 class="app-page-title">
    <span class="nav-icon">
        <span><i class="fa-solid fa-circle-info text-success"></i> ตรวจสอบประวัติการผสมพันธุ์</span>
    </span>  
</h4>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form method="post">
                    <div class="row form-group">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label">รหัสพ่อพันธุ์ / รหัสแม่พันธุ์</label>
                                <input type="text" name="hb_id" class="form-control" placeholder="รหัสพ่อพันธุ์ หรือ รหัสแม่พันธุ์">
                            </div>
                        </div>
                    </div>
                    <div class="my-3">
                        <a href="?page=rabbit_hb" class="btn btn-danger btn-sm"><i class="fa-solid fa-circle-xmark"></i> ยกเลิก</a>
                        <button type="submit" name="checkHb" class="btn btn-success btn-sm"><i class="fa-solid fa-magnifying-glass"></i> ตรวจสอบ</button>
                    </div>
                </form>

                <hr class="mb-2">
                       
                <?php 

                if(isset($_POST["checkHb"])) {
                        
                    if($rb_hb_check->rowCount() > 0){     ?>
                        <table class="table table-striped mt-0">
                            <thead>
                                <tr>
                                    <th>รหัสกรง</th>
                                    <th>รหัสพ่อพันธุ์</th>
                                    <th>รหัสแม่พันธุ์</th>
                                    <th>วันที่ผสมพันธุ์</th>
                                </tr>
                            </thead>

                            <tbody>


                            <?php foreach ($data as $row) { ?>
                            
                                <tr>
                                    <td><?php echo $row["hb_cage"] ?></td>
                                    <td><?php echo $row["hb_rb_fid"] ?></td>
                                    <td><?php echo $row["hb_rb_mid"] ?></td>
                                    <td><?php echo $row["hb_date"] ?></td>
                                </tr>
                            <?php  }  ?>
                
                            </tbody>
                        </table> 
                    
                    <?php }else{ ?>

                        <strong><p class="text-center text-danger">กระต่ายรหัส <span class="badge bg-danger text-white"><?php echo $hb_id; ?></span> ไม่มีข้อมูลการผสมพันธุ์</p></strong>

                    <?php } } ?>
            </div><!--//app-card-body-->
        </div><!--//app-card-->
    </div>
</div><!--//row-->



