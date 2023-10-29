<h4 class="app-page-title">
    <span class="nav-icon">
        <span><i class="fa-solid fa-pen-to-square text-success"></i> จัดการข้อมูลกระต่าย</span>
    </span>  
</h4>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <div class="table-responsive">
                    <button data-bs-toggle="modal" data-bs-target="#addModalRabbitData" class="btn btn-sm btn-success"><i class="fa-solid fa-plus"></i> เพิ่มข้อมูล</button>
                    <hr class="mb-3">
                    <div class="table table-borderless mb-0">
                        <table id="myTable" class="table table-bordered" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>รหัสกรง</th>
                                    <th>รหัสกระต่าย</th>
                                    <th>เพศ</th>
                                    <th>วันเกิด</th>
                                    <th>สถานะ</th>
                                    <th>ประเภท</th>
                                    <th>สายพันธุ์</th>
                                    <th>รหัสพ่อพันธ์ุ</th>
                                    <th>รหัสแม่พันธ์ุ</th>
                                    <th>เมนู</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include_once('include/connect.php');

                                    $stmt = $conn->query("SELECT * FROM tbl_rabbit");
                                    $stmt->execute();
                                    $data = $stmt->fetchAll();

                                    foreach($data as $row) {  
                                ?>
                                <tr>
                                    <td><?php echo $row['rb_cage']; ?></td>
                                    <td><?php echo $row['rb_id']; ?></td>
                                    <td><?php echo $row['rb_gender']; ?></td>
                                    <td><?php echo $row['rb_birthday']; ?></td>
                                    <td><span class="badge bg-<?php echo $row['rb_status']== "ว่าง" ? 'success' : 'warning' ?>"><?php echo $row['rb_status']; ?></span></td>
                                    <td><?php echo $row['rb_type']; ?></td>
                                    <td><?php echo $row['rb_hb']; ?></td>
                                    <td><?php echo $row['rb_fid']; ?></span></td>
                                    <td><?php echo $row['rb_mid']; ?></span></td>
                                    <td>
                                        <a href=""
                                            data-id="<?php echo $row['id']; ?>"
                                            data-rbcage="<?php echo $row['rb_cage']; ?>"
                                            data-rbid="<?php echo $row['rb_id']; ?>"
                                            data-rbgender="<?php echo $row['rb_gender']; ?>"
                                            data-rbbirthday="<?php echo $row['rb_birthday']; ?>"
                                            data-rbstatus="<?php echo $row['rb_status']; ?>"
                                            data-rbtype="<?php echo $row['rb_type']; ?>"
                                            data-rbhb="<?php echo $row['rb_hb']; ?>"
                                            data-rbfid="<?php echo $row['rb_fid']; ?>"
                                            data-rbmid="<?php echo $row['rb_mid']; ?>"
                                            data-bs-toggle="modal" class="btn btn-sm btn-warning text-white editRabbitDate">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a data-id="<?php echo $row['id']; ?>" href="?delete_rb_data=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger text-white delete-btn"><i class="fa-solid fa-trash"></i></a>
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

<?php include_once('modal_rb_data.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(".editRabbitDate").click(function() {
        var id = $(this).attr('data-id');
        var rb_cage = $(this).attr('data-rbcage');
        var rb_id = $(this).attr('data-rbid');
        var rb_gender = $(this).attr('data-rbgender');
        var rb_birthday = $(this).attr('data-rbbirthday');
        var rb_status = $(this).attr('data-rbstatus');
        var rb_type = $(this).attr('data-rbtype');
        var rb_hb = $(this).attr('data-rbhb');
        var rb_fid = $(this).attr('data-rbfid');
        var rb_mid = $(this).attr('data-rbmid');

        $('#id').val(id);
        $('.rb_cage').val(rb_cage);
        $('.rb_id').val(rb_id);
        $('.rb_gender').val(rb_gender);
        $('.rb_birthday').val(rb_birthday);
        $('.rb_status').val(rb_status);
        $('.rb_type').val(rb_type);
        $('.rb_hb').val(rb_hb);
        $('.rb_fid').val(rb_fid);
        $('.rb_mid').val(rb_mid);

        $('#editModalRabbitData').modal('show'); 

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
                            url: 'home.php?page=rabbit_data',
                            type: 'GET',
                            data: 'delete_rb_data=' + userId,
                        })
                        .done(function() {
                            Swal.fire({
                                confirmButtonText: 'ตกลง',
                                confirmButtonColor: '#198754',
                                text: 'ลบข้อมูลกระต่ายสำเร็จ!',
                                icon: 'success',
                            }).then(() => {
                                document.location.href = 'home.php?page=rabbit_data';
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
