<!-- Modal Add Member -->
<div class="modal fade" id="addModalAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-plus"></i>เพิ่มข้อมูลแอดมิน</h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="include/add_member.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row form-group">
            <div class="row mb-2" style="max-width: 50%; margin: auto;">
              <img loading="lazy" width="100%" id="previewImg" alt="">
            </div>
            <div class="row mb-2">
              <div class="col">
                <label class="form-label">รูปภาพ</label>               
                <input type="file" name="img" class="form-control" id="imgInput">
              </div>
            </div>
            <div class="row mb-2">
              <div class="col">
                <label class="form-label">ชื่อผู้ใช้</label>
                <input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้..." required>
              </div>
              <div class="col">
                <label class="form-label">รหัสผ่าน</label>
                <input type="text" name="password" class="form-control" placeholder="รหัสผ่าน..." required>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col">
                <label class="form-label">เบอร์โทร</label>
                <input type="tel" name="phone"  class="form-control" placeholder="เบอร์โทร..." required>
              </div>
              <div class="col">
                <label class="form-label">อีเมล</label>
                <input type="email" name="email"  class="form-control" placeholder="อีเมล..." required>
              </div> 
            </div>
            <div class="row mb-2">
              <div class="col">
                <label class="form-label">สถานะ</label>
                <select name="role" class="form-select" aria-label="Default select example">
                  <option selected>---</option>
                  <option value="แอดมิน">แอดมิน</option>
                  <option value="พนักงาน">พนักงาน</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> ยกเลิก</button>
          <button type="submit" name="btnInsertMember" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> บันทึกข้อมูล</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--End Modal Add Data Admin -->


<!-- Modal Edit Member -->
<!-- <div class="modal fade" id="editModalMember" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-square-check"></i> แก้ไขข้อมูลแอดมิน</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="include/add_member.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" id="id" name="id" value="">
          <div class="row form-group">
            <!-- <div class="mb-3">
              <label for="img" class="col-form-label">Image:</label>
              <img width="100%" src="include/uploads/<?php //echo $data['img']; ?>" id="previewImg" alt="">
              <input type="file" class="form-control" id="imgInput" name="img">
            </div> -->
            <!-- <div class="row mb-2" style="max-width: 50%; margin: auto;">
              <img loading="lazy" width="100%" id="previewImg" alt="">
            </div> -->
            <!-- <div class="row mb-2">
              <div class="col">
                <label class="form-label">รูปภาพ</label>               
                <input type="file" name="img" class="form-control" id="imgInput">
              </div>
            </div> -->
            <!-- <div class="row mb-2">
              <div class="col">
                <label class="form-label">ชื่อผู้ใช้</label>
                <input type="text" name="username" class="form-control username">
              </div>
              <div class="col">
                <label class="form-label">รหัสผ่าน</label>
                <input type="text" name="password" class="form-control password">
              </div>
            </div>
            <div class="row mb-2">
              <div class="col">
                <label class="form-label">เบอร์โทร</label>
                <input type="tel" name="phone"  class="form-control phone">
              </div>
              <div class="col">
                <label class="form-label">อีเมล</label>
                <input type="email" name="email"  class="form-control email">
              </div> 
            </div>
            <div class="row mb-2">
              <div class="col">
                <label class="form-label">สถานะ</label>
                <select name="role" id="role" class="form-select role">
                  <option class="role"></option>
                  <option value="แอดมิน">แอดมิน</option>
                  <option value="พนักงาน">พนักงาน</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> ยกเลิก</button>
          <button type="submit" name="updateMember" class="btn btn-success"><i class="fa-solid fa-square-check"></i> อัปเดตข้อมูล</button>
        </div>
      </form>
    </div>
  </div>
</div> --> 

