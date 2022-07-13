<body style="margin-bottom:2rem;">
    <?php $session = session(); ?>
    <div class="ex-basic-1 pt-5 pb-5" style=" margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
  margin-top:3px;
  ">
        <div class="container">
            <center>
                <h3>เเก้ไขข้อมูลงาน : <?php echo $work['work_name']; ?></h3>
            </center>
            <div class="row">
                <div class="col">
                    <form method="post" id="editWork" action="<?= base_url('/updateWork/' . $work['work_id']) ?>" enctype="multipart/form-data">
                        <div class="col-lg-6">
                            <!-- <label style="margin-top:8px"><b> ไอดีสมาชิก </b></label> -->
                            <input type="hidden" id="work_id" value="<?php echo $work['work_id']; ?>" class="form-control" required>
                        </div>
                        <div class="col-lg-12">
                            <label style="margin-top:8px"><b> ชื่องาน </b></label>
                            <input class="form-control" type="text" name="work_name" id="work_name" value="<?php echo $work['work_name']; ?>" required>
                        </div>
                        <div class="col-lg-12">
                            <label style="margin-top:8px"><b> รายละเอียดงาน </b></label>
                            <textarea class="form-control" name="work_information" rows="3"><?php echo $work['work_information']; ?></textarea>
                        </div>
                        <div class="col-lg-12">
                            <label style="margin-top:8px"><b> ที่อยู่งาน </b></label>
                            <input class="form-control" type="text" name="work_address" value="<?php echo $work['work_address']; ?>" id="work_address" required>
                        </div>
                        <div class="col-lg-12">
                            <label style="margin-top:8px"><b> เบอร์โทรศัพท์ </b></label>
                            <input type="work_phone" id="work_phone" name="work_phone" value="<?php echo $work['work_phone']; ?>" class="form-control" required>
                        </div>
                       
                        <div class="col-lg-12">
                            <label style="margin-top:8px"><b> สถานะ </b></label>
                            <select class="form-select" name="work_status" aria-label="Default select example" required>
                                <option value="<?php echo $work['work_status']; ?>"><?php if ($work['work_status'] == 1) {
                                                                                        echo 'เปิดเเสดง';
                                                                                    } else {
                                                                                        echo 'ปิดเเสดง';
                                                                                    } ?></option>
                                <?php if ($work['work_status'] == 1) { ?>
                                    <option value="0">ปิดเเสดง</option>
                                <?php } else if ($work['work_status'] == 0) { ?>
                                    <option value="1">เปิดเเสดง</option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>
                        <div class="text-center">
                            <input type="reset" id="button" class="btn btn-secondary" value="ยกเลิก" />
                            <button type="submit" class="btn btn-primary">ตกลง</button>
                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</body>