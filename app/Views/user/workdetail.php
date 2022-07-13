<body style="margin-bottom:2rem;">
    <?php $session = session(); ?>
    <div class="ex-basic-1 pt-5 pb-5" style=" margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
  margin-top:3px;
  ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <form>
                        <div class="col-lg-12">
                            <label style="margin-top:8px"><b> ชื่องาน </b></label>
                            <div class="form-control" type="text" name="work_name" id="work_name"><?php echo $work['work_name']; ?></div>
                        </div>
                        <div class="col-lg-12">
                            <label style="margin-top:8px"><b> รายละเอียดงาน </b></label>
                            <div class="form-control" name="work_information" rows="3"><?php echo $work['work_information']; ?></div>
                        </div>
                        <div class="col-lg-12">
                            <label style="margin-top:8px"><b> ที่อยู่งาน </b></label>
                            <div class="form-control" type="text" name="work_address" id="work_address"><?php echo $work['work_address']; ?></div>
                        </div>
                        <div class="col-lg-12">
                            <label style="margin-top:8px"><b> เบอร์โทรศัพท์ </b></label>
                            <div class="form-control" type="text" name="work_phone" id="work_phone"><?php echo $work['work_phone']; ?></div>
                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</body>