<h4 class="app-page-title">
    <span class="nav-icon">
        <span><i class="fa-solid fa-pen-to-square text-success"></i> จัดการข้อมูลสมาชิก</span>
    </span>  
</h4>

<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <div class="table-responsive">
                    <button data-bs-toggle="modal" data-bs-target="#addModalAdmin" class="btn btn-sm btn-success"><i class="fa-solid fa-plus"></i> เพิ่มข้อมูล</button>
                    <hr class="mb-3">
                    <div class="table table-borderless mb-0">
                        <table id="myTable" class="table table-bordered" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>รูปภาพ</th>
                                    <th>ชื่อผู้ใช้</th>
                                    <th>รหัสผ่าน</th>
                                    <th>เบอร์โทร</th>
                                    <th>อีเมล</th>
                                    <th>สถานะ</th>
                                    <th>เมนู</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                $stmt = $conn->query("SELECT * FROM tbl_members");
                                $stmt->execute();
                                $data = $stmt->fetchAll();

                                foreach($data as $row) {  ?>

                                    <tr>
                                    
                                        <td><img src="include/uploads/<?=$row['img'];?>" style="width: 100px; height: auto"></td>
                                        <td><?php echo $row['username'];?></td>
                                        <td><?php echo $row['password'];?></td>
                                        <td><?php echo $row['phone'];?></td>
                                        <td><?php echo $row['email'];?></td>
                                        <td><span class="badge bg-<?php echo $row['role'] == "แอดมิน" ? 'success' : 'primary' ?>"><?php echo $row['role']; ?></span></td>
                                        <td>  
                                            <!-- <a href="?edit" data-id="<?php //echo $row['id']; ?>" data-username="<?php //echo $row['username']; ?>" data-password="<?php //echo $row['password']; ?>" data-phone="<?php //echo $row['phone']; ?>" data-email="<?php //echo $row['email']; ?>" data-role="<?php // echo $row['role']; ?>" data-bs-toggle="modal" class="btn btn-warning btn-sm text-white editMember"><i class="fa-solid fa-pen-to-square"></i></a> -->
                                            <a href="pages/members/edit_member.php?id=<?php echo $row['id']; ?>"  class="btn btn-warning btn-sm text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a data-id="<?php echo $row['id']; ?>" href="?delete_member=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm delete-btn"><i class="fa-solid fa-trash"></i></a>
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

<?php include('modal_member.php'); ?>	     					
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    $(".editMember").click(function() {
        var id = $(this).attr('data-id');
        var username = $(this).attr('data-username');
        var password = $(this).attr('data-password');
        var phone = $(this).attr('data-phone');
        var email = $(this).attr('data-email');
        var role = $(this).attr('data-role');

        $('#id').val(id);
        $('.username').val(username);
        $('.password').val(password);
        $('.phone').val(phone);
        $('.email').val(email);
        $('.role').val(role);

        $('#editModalMember').modal('show'); 

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
                            url: 'home.php?page=member',
                            type: 'GET',
                            data: 'delete_member=' + userId,
                        })
                        .done(function() {
                            Swal.fire({
                                confirmButtonText: 'ตกลง',
                                confirmButtonColor: '#198754',
                                text: 'ลบข้อมูลสำเร็จ!',
                                icon: 'success',
                            }).then(() => {
                                document.location.href = 'home.php?page=member';
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

    let imgInput = document.getElementById('imgInput');
    let previewImg = document.getElementById('previewImg');

    imgInput.onchange = evt => {
        const [file] = imgInput.files;
        if (file) {
        previewImg.src = URL.createObjectURL(file)
        }
    }

</script>