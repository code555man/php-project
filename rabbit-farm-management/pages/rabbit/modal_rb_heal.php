<!-- Modal Add Rabbit Heal -->
<div class="modal fade" id="addModalRabbitHeal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-plus"></i> เพิ่มข้อมูลการรับการักษา</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row form-group">
          <form action="include/add_rb_heal.php" method="post">
            <div class="row mb-2">
              <div class="col">
                <label class="form-label">รหัสกรง</label>
                <input type="text" name="heal_cage" class="form-control" placeholder="รหัสกรง..." required>
              </div>
              <div class="col">
                <label class="form-label">รหัสกระต่าย</label>
                <input type="text" name="heal_id" class="form-control" placeholder="รหัสกระต่าย..." required>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col">
                <label class="form-label">วันรับการรักษา</label>
                <input type="date" name="heal_date" class="form-control">
              </div>
              <div class="col">
                <label class="form-label">สถานะ</label>
                <select name="heal_status" class="form-select" aria-label="Default select example">
                  <option selected>---</option>
                  <option value="กำลังรักษา">กำลังรักษา</option>
                  <option value="รักษาหายแล้ว">รักษาหายแล้ว</option>
                </select>
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> ยกเลิก</button>
        <button type="submit" name="btnInsertHeal" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> บันทึกข้อมูล</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal Add Rabbit Heal -->


<!-- Modal Edit Rabbit Heal -->
<div class="modal fade" id="editModalRabbitHeal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-square-check"></i> แก้ไขข้อมูลการับการรักษา</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row form-group">
          <form action="include/add_rb_heal.php" method="post">
            <input type="hidden" id="id" name="id">
            <div class="row mb-2">
              <div class="col">
                <label class="form-label">รหัสกรง</label>
                <input type="text" name="heal_cage" class="form-control heal-cage">
              </div>
              <div class="col">
                <label class="form-label">รหัสกระต่าย</label>
                <input type="text" name="heal_id" class="form-control heal-id">
              </div>
            </div>
            <div class="row mb-2">
              <div class="col">
                <label class="form-label">วันที่รักษา</label>
                <input type="date" name="heal_date" class="form-control heal-date">
              </div>
              <div class="col">
                <label class="form-label">สถานะ</label>
                <select class="form-select heal-status" name="heal_status" id="heal_status">
                  <option class="heal-status"></option>
                  <option value="กำลังรักษา">กำลังรักษา</option>
                  <option value="รักษาหายแล้ว">รักษาหายแล้ว</option>
                </select>
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> ยกเลิก</button>
        <button type="submit" name="btnEditHeal" class="btn btn-success"><i class="fa-solid fa-square-check"></i> อัปเดต</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal Edit Rabbit Heal -->
