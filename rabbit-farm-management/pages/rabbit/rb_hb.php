<h4 class="app-page-title">
    <span class="nav-icon">
        <span><i class="fa-solid fa-pen-to-square text-success"></i> จัดการข้อมูลการผสมพันธุ์</span>
    </span>  
</h4>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <div class="table-responsive">
                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addModalRabbitHb"><i class="fa-solid fa-plus"></i> เพิ่มข้อมูล</button>                    
                    <a href="?page=checkHb" class="btn btn-sm btn-success"><i class="fa-solid fa-magnifying-glass"></i> ตรวจสอบประวัติ</a>                    
                    <hr class="mb-3">
                    <div class="table table-borderless mb-0">
                        <table id="myTable" class="table table-bordered" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>รหัสกรง</th>
                                    <th>รหัสพ่อพันธุ์</th>
                                    <th>รหัสแม่พันธุ์</th>
                                    <th>วันที่ผสมพันธุ์</th>
                                    <th>กำหนดคลอด</th>
                                    <th>สถานะ</th>
                                    <th>เมนู</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include_once('include/connect.php');

                                $stmt = $conn->query("SELECT * FROM tbl_rabbit_hb");
                                $stmt->execute();
                                $data = $stmt->fetchAll();

                                foreach($data as $row) {  
                            ?>
                                <tr>
                                    <td><?php echo $row['hb_cage']; ?></td>
                                    <td><?php echo $row['hb_rb_fid']; ?></td>
                                    <td><?php echo $row['hb_rb_mid']; ?></td>
                                    <td><?php echo $row['hb_date']; ?></td>
                                    <td><?php echo $row['hb_schedule']; ?></td>
                                    <td><span class="badge bg-<?php echo $row['hb_status'] == 'คลอดแล้ว' ? 'success' : 'warning' ?>"><?php echo $row['hb_status']; ?></span></td>
                                    <td>
                                        <a 
                                            href=""
                                            data-id="<?php echo $row['id']; ?>"
                                            data-hbcage="<?php echo $row['hb_cage']; ?>"
                                            data-hbrbfid="<?php echo $row['hb_rb_fid']; ?>"
                                            data-hbrbmid="<?php echo $row['hb_rb_mid']; ?>"
                                            data-hbdate="<?php echo $row['hb_date']; ?>"
                                            data-hbschedule="<?php echo $row['hb_schedule']; ?>"
                                            data-hbstatus="<?php echo $row['hb_status']; ?>"
                                            data-bs-toggle="modal" class="btn btn-sm btn-warning text-white editRabbitHb">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a data-id="<?php echo $row['id']; ?>" href="?delete_rb_hb=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger text-white delete-btn"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>                                             
                            </tbody>
                        </table>   
                    </div>
                </div>
            </div><!--//app-card-body-->
        </div><!--//app-card-->
    </div>
</div><!--//row-->

<?php include_once('modal_rb_hb.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    $(".editRabbitHb").click(function() {

        var id = $(this).attr('data-id');
        var hb_cage = $(this).attr('data-hbcage');
        var hb_rb_fid = $(this).attr('data-hbrbfid');
        var hb_rb_mid = $(this).attr('data-hbrbmid');
        var hb_date = $(this).attr('data-hbdate');
        var hb_status = $(this).attr('data-hbstatus');

        $('#id').val(id);
        $('.hb-cage').val(hb_cage);
        $('.hb-rb-fid').val(hb_rb_fid);
        $('.hb-rb-mid').val(hb_rb_mid);
        $('.hb-date').val(hb_date);
        $('.hb-status').val(hb_status);
        
        $('#editModalRabbitHb').modal('show'); 

    });

    $(".delete-btn").click(function(e) {
        var userId = $(this).data('id');
        e.preventDefault();
        deleteConfirm(userId);
    })
    function deleteConfirm(userId) {
        Swal.fire({
            title: 'แน่ใจหรือไม่?',
            text: "ข้อมูลนี้จะถูกลบอย่างถาวร!!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#198754',
            cancelButtonColor: '#d33',
            cancelButtonText: 'ยกเลิก',
            confirmButtonText: 'ลบข้อมูล',

            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                            url: 'home.php?page=rabbit_hb',
                            type: 'GET',
                            data: 'delete_rb_hb=' + userId,
                        })
                        .done(function() {
                            Swal.fire({
                                confirmButtonText: 'ตกลง',
                                confirmButtonColor: '#198754',
                                text: 'ลบข้อมูลการผสมพันธ์ุกระต่ายสำเร็จ!',
                                icon: 'success',
                            }).then(() => {
                                document.location.href = 'home.php?page=rabbit_hb';
                            })
                        })
                        .fail(function() {
                            Swal.fire('Oops...', 'Something went wrong with ajax !', 'error')
                            window.location.reload();
                        });
                    });
            },
        });
    }
</script>

