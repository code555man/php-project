<h4 class="app-page-title">
    <span class="nav-icon">
        <span><i class="fa-solid fa-pen-to-square text-success"></i> จัดการข้อมูลการรับการรักษา</span>
    </span>  
</h4>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <div class="table-responsive">
                    <a data-bs-toggle="modal" data-bs-target="#addModalRabbitHeal" class="btn btn-sm btn-success"><i class="fa-solid fa-plus"></i> เพิ่มข้อมูล</a>
                    <hr class="mb-3">
                    <div class="table table-borderless mb-0">
                        <table id="myTable" class="table table-bordered" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>รหัสกรง</th>
                                    <th>รหัสกระต่าย</th>
                                    <th>รับการรักษา</th>
                                    <th>สถานะ</th>
                                    <th>เมนู</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                                include_once('include/connect.php');
                                $stmt = $conn->query("SELECT * FROM tbl_rabbit_heal");
                                $stmt->execute();
                                $data = $stmt->fetchAll();

                                foreach($data as $row) {  
                            ?>
                                <tr>
                                    <td><?php echo $row['heal_cage']; ?></td>
                                    <td><?php echo $row['heal_id']; ?></td>
                                    <td><?php echo $row['heal_date']; ?></td>
                                    <td><span class="badge bg-<?php echo $row['heal_status'] == "รักษาหายแล้ว" ? 'success' : 'warning' ?>"><?php echo $row['heal_status']; ?></span></td>
                                    <td>
                                        <a href="?page=checkList&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success text-white"><i class="fa-solid fa-list-check"></i></a>
                                        <a href="?page=heal_history&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success text-white"><i class="fa-solid fa-file-pen"></i></a>
                                        <a href="" data-id="<?php echo $row['id']; ?>" data-healcage="<?php echo $row['heal_cage']; ?>" data-healid="<?php echo $row['heal_id']; ?>" data-healdate="<?php echo $row['heal_date']; ?>" data-healstatus="<?php echo $row['heal_status']; ?>" data-bs-toggle="modal" class="btn btn-sm btn-warning text-white editRabbitHeal"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a data-id="<?php echo $row['id']; ?>" href="?delete_rb_heal=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger text-white delete-btn"><i class="fa-solid fa-trash"></i></a>
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

<?php include_once('modal_rb_heal.php'); ?>


<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    $(".checkList").click(function() {

        var heal_id = $(this).attr('data-healid'); 
        var fk_id = $(this).attr('data-id');
        $('#fk_id').val(fk_id);
        $('#heal_id').html(heal_id);
        
    });

    $(".editRabbitHeal").click(function() {

    var id = $(this).attr('data-id');
    var heal_cage = $(this).attr('data-healcage');
    var heal_id = $(this).attr('data-healid');
    var heal_date = $(this).attr('data-healdate');
    var heal_status = $(this).attr('data-healstatus');

    $('#id').val(id);
    $('.heal-cage').val(heal_cage);
    $('.heal-id').val(heal_id);
    $('.heal-date').val(heal_date);
    $('.heal-status').val(heal_status);

    $('#editModalRabbitHeal').modal('show'); 

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
                            url: 'home.php?page=rabbit_heal',
                            type: 'GET',
                            data: 'delete_rb_heal=' + userId,
                        })
                        .done(function() {
                            Swal.fire({
                                confirmButtonText: 'ตกลง',
                                confirmButtonColor: '#198754',
                                text: 'ลบข้อมูลสำเร็จ!',
                                icon: 'success',
                            }).then(() => {
                                document.location.href = 'home.php?page=rabbit_heal';
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