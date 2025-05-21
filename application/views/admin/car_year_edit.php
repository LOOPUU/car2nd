
<div class="pt-3 pb-2 mb-3 border-bottom">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-lg-10 mb-2">
            <h4 class="h4">แก้ไขปีผลิต</h4>
        </div>
        <div class="col-sm-12 col-md-2 col-lg-2 mb-2">
            <a href="<?php echo base_url('admin_management/car_year_list'); ?>" class="btn btn-secondary btn-block">ย้อนกลับ</a>
        </div> 
    </div>
</div>
<?php foreach ( $data as $result ) { ?>
    <form action="<?php echo base_url('admin_management/car_year_edit/'.$result->car_year_id);?>" method="post">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="wrap-box">
                    <div class="title"><h6 class="h6">รายละเอียด</h6></div>
                    <div class="form-input">
                        <div class="form-group">
                            <label>ปีผลิต &nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="name_year_min" maxlength="4" type="text" class="form-control" value="<?php if(set_value("name_year_min")){echo set_value("name_year_min");}else{echo $result->name_year_min;}?>">
                            <?php echo form_error('name_year_min', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>สถานะการใช้งาน&nbsp;<span style="color:#DC3545;">*</span></label>
                            <select class="custom-select mr-sm-2" name="status_id">
                                <option value="" <?php if($result->status_id==""){echo "selected";}?>>==== เลือกสถานะการใช้งาน ====</option>
                                <option value="1" <?php if($result->status_id=="1"){echo "selected";}?>>เปิดการใช้งาน</option>
                                <option value="2" <?php if($result->status_id=="2"){echo "selected";}?>>ปิดการใช้งาน</option>
                            </select>
                            <?php echo form_error('status_id', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                    </div>
                </div>
                <div class="footer pb-3">
                    <div class="row ghhMCK d-flex justify-content-center">
                        <div class="col-sm-6 col-md-6 col-lg-6 mt-1 mb-1">
                            <input type="submit" name="submit" class="btn btn-primary btn-block text-white" value="บันทึกข้อมูล">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php }?>
</div>

