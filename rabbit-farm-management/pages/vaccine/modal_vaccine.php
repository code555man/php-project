<!-- Modal Add Vaccine -->
<div class="modal fade" id="addModalVaccine" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-plus"></i> เพิ่มข้อมูลยา - วัคซีน</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row form-group">
          <form method="post" action="include/add_vaccine.php">
            <div class="col-12 mb-2">
              <label for="name_vaccine" class="form-label">ชื่อยา</label>
              <input type="text" class="form-control" name="name_vaccine" id="name_vaccine" placeholder="ชื่อยา..." required>
            </div>
            <div class="col-12 mb-2">
              <label for="method" class="form-label">วิธีใช้</label>
              <input type="text" class="form-control" name="method" id="method" placeholder="วิธีใช้..." required>
            </div>
            <div class="col-12 mb-2">
              <label for="detail" class="form-label">รายละเอียด</label>
              <textarea class="form-control" name="detail" id="detail" aria-label="With textarea" placeholder="รายละเอียด..."></textarea>            
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> ยกเลิก</button>
        <button type="submit" name="btnInsertVaccine" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> บันทึกข้อมูล</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal Add Vaccine -->

<!-- Modal Edit Vaccine -->
<div class="modal fade" id="editModalVaccine" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-square-check"></i> แก้ไขข้อมูลยา - วัคซีน</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="include/add_vaccine.php" method="post">
        <div class="row form-group">
          <input type="hidden" id="id" name="id" value="">
          <div class="col-12 mb-2">
            <label for="nameVacc" class="form-label">ชื่อยา</label>
            <input type="text" class="form-control name_vaccine" id="name_vaccine" name="name_vaccine" value="">
          </div>
          <div class="col-12 mb-2">
            <label for="method" class="form-label">วิธีใช้</label>
            <input type="text" class="form-control method" id="method" name="method" value="">
          </div>
          <div class="col-12 mb-2">
            <label for="detail" class="form-label">รายละเอียด</label>
            <input type="text" class="form-control detail" id="detail" name="detail" value="">              
          </div> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> ยกเลิก</button>
        <button type="submit" name="updateVaccine" class="btn btn-success"><i class="fa-solid fa-square-check"></i> อัปเดต</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--End Modal Edit Vaccine -->