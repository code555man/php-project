<?php

include_once('include/connect.php'); 

$rabbit_count = $conn->query('select count(*) from tbl_rabbit')->fetchColumn(); 
$rabbit_hb_count = $conn->query("select count(*) from tbl_rabbit_hb where hb_status = 'กำลังตั้งท้อง'")->fetchColumn(); 
$rabbit_gb_count = $conn->query("select count(*) from tbl_rabbit where rb_status = 'ว่าง'")->fetchColumn(); 
$rabbit_heal_count = $conn->query("select count(*) from tbl_rabbit_heal where heal_status = 'กำลังรักษา'")->fetchColumn(); 

$stmt = $conn->query("SELECT * FROM tbl_description WHERE desc_id = 1");
$stmt->execute();
$data = $stmt->fetch(); 

?>



<div style="background-color: #fff;" class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
    <div class="inner">
        <div class="app-card-body p-3 p-lg-4">
            <h2 class="mb-3"><strong><?php echo $data['desc_header'] ?></strong></h2>
            <div class="row gx-5 gy-3">
                <div class="col-12 col-lg-9">
                    <div><h5><?php echo $data['desc_content']; ?></h5></div>
                </div><!--//col-->
            </div><!--//row-->
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div><!--//app-card-body--> 
    </div><!--//inner-->
</div><!--//app-card-->
    
<div class="row g-4 mb-4">
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">กระต่ายทั้งหมด</h4>
                <div class="stats-figure"><?php echo $rabbit_count; ?></div>
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="?page=rabbit_data"></a>
        </div><!--//app-card-->
    </div><!--//col-->
    
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">กำลังรับการรักษา</h4>
                <div class="stats-figure"><?php echo $rabbit_heal_count; ?></div>
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="?page=rabbit_heal"></a>
        </div><!--//app-card-->
    </div><!--//col-->
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">กำลังตั้งท้อง</h4>
                <div class="stats-figure"><?php echo $rabbit_hb_count; ?></div>
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="?page=rabbit_hb"></a>
        </div><!--//app-card-->
    </div><!--//col-->
    <div class="col-6 col-lg-3"> 
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">พร้อมผสมพันธุ์</h4>
                <div class="stats-figure"><?php echo $rabbit_gb_count; ?></div>
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="?page=rabbit_data"></a>
        </div><!--//app-card-->
    </div><!--//col-->
</div><!--//row-->

<div class="row g-10 mb-4 settings-section">
    <!--//col-->
    <div class="col-12 col-md-12">
        <div class="app-card app-card-stats-table h-100 shadow-sm">
            <div class="app-card-header p-3">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <h4 class="app-card-title"><i class="fa-solid fa-calendar-days"></i>  วันกำหนดคลอด</h4>
                    </div><!--//col-->
                </div><!--//row-->
            </div><!--//app-card-header-->
            <div class="app-card-body p-3 p-lg-4"  style="overflow-y: scroll; overflow-x: hidden; height: 365px;">
                <div class="table-responsive">
                    <table id="#" class="table table-borderless mb-0">
                        <thead>
                            <tr>
                                <th class="meta"><span class="badge bg-success">รหัสกรง</span></th>
                                <th class="meta"><span class="badge bg-success">รหัสแม่พันธุ์</span></th>
                                <th class="meta"><span class="badge bg-success">วันที่ผสมพันธุ์</span></th>
                                <th class="meta"><span class="badge bg-success">กำหนดคลอด</span></th>
                                <th class="meta"><span class="badge bg-success">วันใกล้คลอด</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include 'include/connect.php';

                                $stmt = $conn->query("SELECT * FROM tbl_rabbit_hb where hb_status = 'กำลังตั้งท้อง'"); 
                                $stmt->execute();
                                $data = $stmt->fetchAll();
                                

                                foreach($data as $row) {  
                            ?>
                    
                            <tr>
                                <td><?php echo $row['hb_cage'] ?></td>
                                <td><?php echo $row['hb_rb_mid'] ?></td>
                                <td><?php echo $row['hb_date'] ?></td>
                                <td><?php echo $row['hb_schedule'] ?></td>
                                <td>
                                    
                                    <?php
                                        $hb_day = ceil((strtotime($row['hb_schedule'])-time())/60/60/24); 
                                        if ($hb_day > 0) {
                                            echo '<span class="text-success">อีก '.$hb_day.' วัน</span>';
                                        }else{
                                            echo '<span class="text-danger">เลยกำหนด</span>';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div><!--//table-responsive-->
            </div><!--//app-card-body-->
        </div><!--//app-card-->
    </div><!--//col-->
</div>

