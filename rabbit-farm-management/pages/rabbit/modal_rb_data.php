<!-- Modal Add Rabbit Data -->
<div class="modal fade" id="addModalRabbitData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-plus"></i> เพิ่มข้อมูลกระต่าย</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row form-group">
          <form method="post" action="include/add_data_rb.php">
            <div class="row mb-2">
              <div class="col">
                <label class="form-label">รหัสกรง</label>
                <input type="text" class="form-control" name="rb_cage" placeholder="รหัสกรง..." required>
              </div>
              <div class="col">
                <label class="form-label">รหัสกระต่าย</label>
                <input type="text" class="form-control" name="rb_id"  placeholder="รหัสกระต่าย..." required>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col">
                <label class="form-label">เพศ</label>
                <select name="rb_gender" class="form-select" aria-label="Default select example" required>
                  <option selected>---</option>
                  <option value="เพศผู้">เพศผู้</option>
                  <option value="เพศเมีย">เพศเมีย</option>
                </select>
              </div>
              <div class="col">
                <label class="form-label">วันเกิด</label>
                <input type="date" class="form-control" name="rb_birthday" required>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col">
                  <label class="form-label">ประเภท</label>
                  <select name="rb_type" class="form-select" aria-label="Default select example" required>
                    <option selected>---</option>
                    <option value="กระต่ายเนื้อ">กระต่ายเนื้อ</option>
                    <option value="กระต่ายขน">กระต่ายขน</option>
                    <option value="กระต่ายสวยงาม">กระต่ายสวยงาม</option>
                  </select>
              </div>
              <div class="col">
                <label class="form-label">สายพันธุ์</label>
                <select name="rb_hb" class="form-select" aria-label="Default select example" required>
                  <option selected>---</option>
                  <option value="กระต่ายพื้นเมือง">กระต่ายพื้นเมือง</option>
                  <option value="พันธุ์คาลิฟอร์เนียน">พันธุ์คาลิฟอร์เนียน</option>
                  <option value="พันธุ์ชินชินล่า">พันธุ์ชินชินล่า</option>
                </select>
              </div>
            </div>
            <div class="row mb-2">
            <div class="col">
                <label class="form-label">สถานะ</label>
                <select name="rb_status" class="form-select" aria-label="Default select example" required>
                  <option selected>---</option>
                  <option value="ว่าง">ว่าง</option>
                  <option value="พ่อพันธุ์">พ่อพันธุ์</option>
                  <option value="แม่พันธุ์">แม่พันธุ์</option>
                </select>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col">
                <label class="form-label">รหัสพ่อพันธุ์</label>
                <input type="text" class="form-control" name="rb_fid"  placeholder="รหัสพ่อพันธุ์..." required>
              </div>
              <div class="col">
                <label class="form-label">รหัสแม่พันธุ์</label>
                <input type="text" class="form-control" name="rb_mid"  placeholder="รหัสแม่พันธุ์..." required>
              </div>
            </div> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> ยกเลิก</button>
        <button type="submit" name="btnInsertRb" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> บันทึกข้อมูล</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal Add Rabbit Data -->


<!-- Modal Edit Rabbit Data -->
<div class="modal fade" id="editModalRabbitData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-square-check"></i> แก้ไขข้อมูลกระต่าย</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row form-group">
        <form method="post" action="include/add_data_rb.php">
          <input type="hidden" class="id" id="id" name="id" value="">
          <div class="row mb-2">
            <div class="col">
              <label class="form-label">รหัสกรง</label>
              <input type="text" class="form-control rb_cage" id="rb_cage" name="rb_cage" value="">
            </div>
            <div class="col">
              <label class="form-label">รหัสกระต่าย</label>
              <input type="text" class="form-control rb_id" id="rb_id" name="rb_id" value="">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col">
              <label class="form-label">เพศ</label>
              <select name="rb_gender" id="rb_gender" class="form-select rb_gender">
                <option class="rb_gender"></option>
                <option value="เพศผู้">เพศผู้</option>
                <option value="เพศเมีย">เพศเมีย</option>
              </select>
            </div>
            <div class="col">
              <label class="form-label">วันเกิด</label>
              <input type="date" id="rb_birthday" class="form-control rb_birthday" name="rb_birthday" value="">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col">
                <label class="form-label">ประเภท</label>
                <select name="rb_type" id="rb_type" class="form-select rb_type">
                  <option class="rb_type"></option>
                  <option value="กระต่ายเนื้อ">กระต่ายเนื้อ</option>
                  <option value="กระต่ายขน">กระต่ายขน</option>
                  <option value="กระต่ายสวยงาม">กระต่ายสวยงาม</option>
                </select>
            </div>
            <div class="col">
              <label class="form-label">สายพันธุ์</label>
              <select name="rb_hb" id="rb_hb" class="form-select rb_hb">
                <option class="rb_hb"></option>
                <option value="กระต่ายพื้นเมือง">กระต่ายพื้นเมือง</option>
                <option value="พันธุ์คาลิฟอร์เนียน">พันธุ์คาลิฟอร์เนียน</option>
                <option value="พันธุ์ชินชินล่า">พันธุ์ชินชินล่า</option>
              </select>
            </div>
          </div>
          <div class="row mb-2">
          <div class="col">
              <label class="form-label">สถานะ</label>
              <select name="rb_status" id="rb_status" class="form-select rb_status">
                <option class="rb_status"></option>
                <option value="ว่าง">ว่าง</option>
                <option value="พ่อพันธุ์">พ่อพันธุ์</option>
                <option value="แม่พันธุ์">แม่พันธุ์</option>
              </select>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col">
              <label class="form-label">รหัสพ่อพันธุ์</label>
              <input type="text" class="form-control rb_fid" id="rb_fid" name="rb_fid" value="">
            </div>
            <div class="col">
              <label class="form-label">รหัสแม่พันธุ์</label>
              <input type="text" class="form-control rb_mid" id="rb_mid" name="rb_mid" value="">
            </div>
          </div> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> ยกเลิก</button>
        <button type="submit" name="btnUpdateRb" class="btn btn-success"><i class="fa-solid fa-square-check"></i> อัปเดตข้อมูล</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal Edit Rabbit Data -->

