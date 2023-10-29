<!-- Modal Add Rabbit Hybrid -->
<div class="modal fade" id="addModalRabbitHb" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-plus"></i> เพิ่มข้อมูลการผสมพันธุ์</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row form-group">
          <form action="include/add_rb_hb.php" method="post">
            <div class="row mb-2">
              <div class="col">
                <label class="form-label">รหัสพ่อพันธุ์</label>
                <input type="text" name="hb_rb_fid" class="form-control" placeholder="รหัสพ่อพันธุ์..." required>
              </div>
              <div class="col">
                <label class="form-label">รหัสแม่พันธุ์</label>
                <input type="text" name="hb_rb_mid" class="form-control" placeholder="รหัสแม่พันธุ์..." required>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col">
                <label class="form-label">วันที่ผสมพันธุ์</label>
                <input type="date" name="hb_date" class="form-control">
              </div>
              <div class="col">
                <label class="form-label">รหัสกรง</label>
                <input type="text" name="hb_cage" class="form-control" placeholder="รหัสกรง..." required>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col">
                  <label class="form-label">สถานะ</label>
                  <select name="hb_status" class="form-select" aria-label="Default select example">
                    <option selected>---</option>
                    <option value="คลอดแล้ว">คลอดแล้ว</option>
                    <option value="กำลังตั้งท้อง">กำลังตั้งท้อง</option>
                </select>              
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> ยกเลิก</button>
        <button type="submit" name="btnInsertHb" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> บันทึกข้อมูล</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal Add Rabbit Hybrid -->

<!-- Modal Edit Rabbit Hybrid -->
<div class="modal fade" id="editModalRabbitHb" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-square-check"></i> แก้ไขข้อมูลการผสมพันธุ์</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row form-group">
          <form action="include/add_rb_hb.php" method="post">
            <div class="row mb-2">
              <div class="col">
                <input type="hidden" name="id" id="id" class="id">
                <label class="form-label">รหัสพ่อพันธุ์</label>
                <input type="text" id="hb_rb_fid" name="hb_rb_fid" class="form-control hb-rb-fid" value="">
              </div>
              <div class="col">
                <label class="form-label">รหัสแม่พันธุ์</label>
                <input type="text" id="hb_rb_mid" class="form-control hb-rb-mid" name="hb_rb_mid" value="">
              </div>
            </div>
            <div class="row mb-2">
              <div class="col">
                <label class="form-label">วันที่ผสมพันธุ์</label>
                <input type="date" name="hb_date" id="hb-date" class="form-control hb-date">
              </div>
              <div class="col">
                <label class="form-label">รหัสกรง</label>
                <input type="text" id="hb_cage" name="hb_cage" class="form-control hb-cage">
              </div>
            </div>
            <div class="row mb-2">
              <div class="col">
                  <label class="form-label">สถานะ</label>
                  <select class="form-select hb-status" id="hb_status" name="hb_status">
                      <option class="hb-status"></option>
                      <option value="คลอดแล้ว">คลอดแล้ว</option>
                      <option value="กำลังตั้งท้อง">กำลังตั้งท้อง</option>
                  </select>              
              </div>
            </div> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> ยกเลิก</button>
        <button type="submit" name="updateRabbitHb" class="btn btn-success"><i class="fa-solid fa-square-check"></i> อัปเดต</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- End Modal Edit Rabbit Hybrid -->