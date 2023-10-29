<h4 class="app-page-title">
    <span class="nav-icon">
        <span><i class="fa-solid fa-pen-to-square text-success"></i> จัดการข้อมูลยา - วัคซีน</span>
    </span>  
</h4>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <div class="table-responsive">
                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addModalVaccine"><i class="fa-solid fa-plus"></i> เพิ่มข้อมูล</button>
                    <hr class="mb-3">
                    <div class="table table-borderless mb-0">
                        <table id="myTable" class="table table-bordered" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>ชื่อยา</th>
                                    <th>วิธีใช้</th>
                                    <th>รายละเอียด</th>
                                    <th>เมนู</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include_once('include/connect.php');
                                    $stmt = $conn->query("SELECT * FROM tbl_vaccine");
                                    $stmt->execute();
                                    $data = $stmt->fetchAll();

                                    foreach($data as $row) {  
                                ?>
                                <tr>
                                    <td><?php echo $row['name_vaccine']; ?></td>
                                    <td><?php echo $row['method']; ?></td>
                                    <td><?php echo $row['detail']; ?></td>
                                    <td>
                                        <a herf="" data-id="<?php echo $row["id"]; ?>" data-namevaccine="<?php echo $row["name_vaccine"]; ?>" data-method="<?php echo $row["method"]; ?>" data-detail="<?php echo $row["detail"]; ?>" data-bs-toggle="modal" class="btn btn-sm btn-warning text-white editVaccine"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a data-id="<?php echo $row['id']; ?>" href="?delete_vaccine=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger text-white delete-btn"><i class="fa-solid fa-trash"></i></a>
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

<?php include_once('modal_vaccine.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    $(".editVaccine").click(function() {
    var id = $(this).attr('data-id');
    var name_vaccine = $(this).attr('data-namevaccine');
    var method = $(this).attr('data-method');
    var detail = $(this).attr('data-detail');

    $('#id').val(id);
    $('.name_vaccine').val(name_vaccine);
    $('.method').val(method);
    $('.detail').val(detail);
    $('#editModalVaccine').modal('show'); // ดึง id #editModalVaccine มาจากไฟล์ modal_vaccine.php
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
                            url: 'home.php?page=vaccine',
                            type: 'GET',
                            data: 'delete_vaccine=' + userId,
                        })
                        .done(function() {
                            Swal.fire({
                                confirmButtonText: 'ตกลง',
                                confirmButtonColor: '#198754',
                                text: 'ลบข้อมูลวัคซีนสำเร็จ!',
                                icon: 'success',
                            }).then(() => {
                                document.location.href = 'home.php?page=vaccine';
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


