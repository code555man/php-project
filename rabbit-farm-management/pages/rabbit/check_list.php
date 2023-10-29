<?php 

include_once("include/connect.php");

if (isset($_GET['page']) && $_GET['page'] == 'checkList') {
    $id = $_GET['id'];

    $rb_id = $conn->query("SELECT heal_id FROM tbl_rabbit_heal WHERE id=$id");
    $rb_id->execute();
    $rbid = $rb_id->fetch(); 

    $heal_fk_id_count = $conn->query("select count(fk_id) from tbl_health where fk_id = $id")->fetchColumn(); 

}

?>

<h4 class="app-page-title">
    <span class="nav-icon">
        <span><i class="fa-solid fa-pen-to-square text-success"></i> บันทึกสุขภาพกระต่าย <span class="badge bg-success">วันที่ <?php echo date("d-m-Y"); ?></span></span>
    </span>  
</h4>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <h5 class="text-center mb-4"><strong>รหัสกระต่าย <span class="badge bg-success"><?php echo $rbid['heal_id']; ?></span></strong></h5>
                <div class="row form-group">
                <form action="include/add_rb_heal.php" method="post">
                    <input type="hidden" id="fk_id" name="fk_id" value="<?php echo $id; ?>">
                    <div class="row mb-2">
                        <div class="col">
                            <label class="form-label">ครั้งที่</label>
                            <input type="number" name="number" class="form-control" value="<?php echo $heal_fk_id_count + 1; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">การให้ยา</label>
                            <select class="form-select" name="vaccine">
                            <option value="ไม่มี">ไม่มี</option>

                            <?php
                            
                                $name_vaccine = $conn->query("SELECT name_vaccine FROM tbl_vaccine");              
                                
                                $name_vaccine->execute();
                                $data = $name_vaccine->fetchAll(); 

                                foreach ($data as $vaccine) :
                                ?>
                                
                                <option value="<?php echo $vaccine['name_vaccine']; ?>"><?php echo $vaccine['name_vaccine']; ?></option>

                            <?php endforeach; ?>

                            </select>
                        </div>
                    </div>
                    <hr class="mb-2">
                    <div class="row mb-2">
                        <div class="col">
                            <label class="form-label">ลักษณะอาการ</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="behavior[]" value="ปกติ" id="flexCheckDefault1">
                                <label class="form-check-label" for="flexCheckDefault1">ปกติ</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="behavior[]" value="มีน้ำมูก" id="flexCheckChecked2">
                                <label class="form-check-label" for="flexCheckChecked2">มีน้ำมูก</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="behavior[]" value="จาม" id="flexCheckChecked3">
                                <label class="form-check-label" for="flexCheckChecked3">จาม</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="behavior[]" value="ไอ" id="flexCheckChecked4">
                                <label class="form-check-label" for="flexCheckChecked4">ไอ</label>
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-label">ลักษณะอึกระต่าย</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="poop[]" value="ปกติ" id="flexCheckDefault5">
                                <label class="form-check-label" for="flexCheckDefault5">ปกติ</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="poop[]" value="เป็นพวงองุ่น" id="flexCheckChecked6">
                                <label class="form-check-label" for="flexCheckChecked6">ลักษณะเป็นพวงองุ่น</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="poop[]" value="เป็นของเหลว" id="flexCheckChecked7">
                                <label class="form-check-label" for="flexCheckChecked7">ลักษณะเป็นของเหลว</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="poop[]" value="เล็กผิดปกติ" id="flexCheckChecked8">
                                <label class="form-check-label" for="flexCheckChecked8">ลักษณะเล็กผิดปกติ</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="poop[]" value="ใหญ่ผิดปกติ" id="flexCheckChecked9">
                                <label class="form-check-label" for="flexCheckChecked9">ลักษณะใหญ่ผิดปกติ</label>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-2">
                    <div class="row mb-2">
                        <div class="col">
                            <label class="form-label">ปริมาณการกินอาหารหญ้า</label>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="eat_grass" value="ปกติ" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">ปกติ</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="eat_grass" value="กินน้อย" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">กินน้อย</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="eat_grass" value="กินเยอะกว่าปกติ" id="flexRadioDefault3">
                                <label class="form-check-label" for="flexRadioDefault3">กินเยอะกว่าปกติ</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="eat_grass" value="ไม่กินหญ้า" id="flexRadioDefault4">
                                <label class="form-check-label" for="flexRadioDefault4">ไม่กินหญ้า</label>
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-label">ปริมาณการกินอาหารเม็ด</label>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="eat_pellets" value="ปกติ" id="flexRadioDefault5">
                                <label class="form-check-label" for="flexRadioDefault5">ปกติ</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="eat_pellets" value="กินน้อย" id="flexRadioDefault6">
                                <label class="form-check-label" for="flexRadioDefault6">กินน้อย</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="eat_pellets" value="กินเยอะกว่าปกติ" id="flexRadioDefault7">
                                <label class="form-check-label" for="flexRadioDefault7">กินเยอะกว่าปกติ</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="eat_pellets" value="ไม่กินอาหารเม็ด" id="flexRadioDefault8">
                                <label class="form-check-label" for="flexRadioDefault8">ไม่กินอาหารเม็ด</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mb-2">
                <div class="my-3">
                    <a href="?page=rabbit_heal" class="btn btn-danger btn-sm"><i class="fa-solid fa-circle-xmark"></i> ยกเลิก</a>
                    <button type="submit" name="addCheckList" class="btn btn-success btn-sm"><i class="fa-solid fa-floppy-disk"></i> บันทึกข้อมูล</button>
                </div>
                </form>
            </div><!--//app-card-body-->
        </div><!--//app-card-->
    </div>
</div><!--//row-->