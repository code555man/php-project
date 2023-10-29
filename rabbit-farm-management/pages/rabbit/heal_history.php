<?php

if (isset($_GET['page']) && $_GET['page'] == 'heal_history') {
    $id = $_GET['id'];

    $rb_id = $conn->query("SELECT heal_id FROM tbl_rabbit_heal WHERE id=$id");
    $rb_id->execute();
    $rbid = $rb_id->fetch(); 

}

?>

<h4 class="app-page-title">
    <span class="nav-icon">
        <span><i class="fa-solid fa-clock"></i> ประวัติการบันทึกสุขภาพกระต่าย</span>
    </span>  
</h4>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <div class="table-responsive">
                    <a href="?page=rabbit_heal" class="btn btn-sm btn-success"><i class="fa-solid fa-home"></i> กลับไปยังหน้าแรก</a>
                    <p class="text-center mb-4"><strong>รหัสกระต่าย <span class="badge bg-success"><?php echo $rbid['heal_id']; ?></span></strong></p>
                    <hr class="mb-3">
                    <div class="table table-borderless mb-0">
                        <table id="myTable" class="table table-bordered" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>ครั้งที่</th>
                                    <th>วัน-เวลา</th>
                                    <th>ลักษณะอาการ</th>
                                    <th>การให้ยา</th>
                                    <th>ลักษณะอึกระต่าย</th>
                                    <th>การกินหญ้า</th>
                                    <th>การกินอาหารเม็ด</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if (isset($_GET['id'])) {
                               
                                    $id = $_GET['id'];

                                    $data_health = $conn->query("SELECT * FROM tbl_health WHERE fk_id = $id");              
                                    
                                    $data_health->execute();
                                    $data = $data_health->fetchAll(); 

                                foreach ($data as $row) {
                                ?>
                                <tr>
                                    <th><?php echo $row['number']; ?></th>
                                    <td><?php echo $row['date_time']; ?></td>
                                    <td><?php echo $row['behavior']; ?></td>
                                    <td><?php echo $row['vaccine']; ?></td>
                                    <td><?php echo $row['poop']; ?></td>
                                    <td><?php echo $row['eat_grass']; ?></td>
                                    <td><?php echo $row['eat_pellets']; ?></td>
                                </tr>
              
                                <?php }   } ?>
                                                              
                            </tbody>
                        </table>   
                    </div>
                </div>
            </div><!--//app-card-body-->
        </div><!--//app-card-->
    </div>
</div><!--//row-->