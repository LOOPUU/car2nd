
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-10 mb-2">
                <h4 class="h4">แก้ไขธนาคาร/ดอกเบี้ย</h4>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2 mb-2">
              <a href="<?php echo base_url('admin_management/bank_list'); ?>" class="btn btn-secondary btn-block">ย้อนกลับ</a> 
            </div>
        </div>

      
    <!-- Content -->


<?php foreach ( $data as $result ) {    ?>

    <?php echo form_open_multipart('admin_management/bank_edit/'.$result->bank_id);?>
    
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="wrap-box">
                    <!-- Title -->
                    <div class="title">
                        <h6 class="h6">รายละเอียด</h6>
                    </div>
                    <!-- Form Input -->
                    <div class="form-input">
                        <div class="form-group">
                            <label>ชื่อธนาคาร&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('backend/images/thailand.png');?>" width=20px;>&nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="bank_name_th" type="text" class="form-control" value="<?php if(set_value("bank_name_th")){echo set_value("bank_name_th");}else{echo $result->bank_name_th;}?>">
                            <?php echo form_error('bank_name_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>

                        </div>
                        <div class="form-group">
                            <label>ชื่อธนาคาร&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('backend/images/english.png');?>" width=20px;>&nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="bank_name_en" type="text" class="form-control" value="<?php if(set_value("bank_name_en")){echo set_value("bank_name_en");}else{echo $result->bank_name_en;}?>">
                            <?php echo form_error('bank_name_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                         <div class="form-group">
                            <label>อัตราดอกเบี้ย 4 ปี&nbsp;<span style="color:#DC3545;">*(%)</span></label>
                            <input name="four_year" type="text" class="form-control" value="<?php if(set_value("four_year")){echo set_value("four_year");}else{echo $result->four_year;}?>">
                            <?php echo form_error('four_year', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                          <div class="form-group">
                            <label>อัตราดอกเบี้ย 5 ปี&nbsp;<span style="color:#DC3545;">*(%)</span></label>
                            <input name="five_year" type="text" class="form-control" value="<?php if(set_value("five_year")){echo set_value("five_year");}else{echo $result->five_year;}?>">
                            <?php echo form_error('five_year', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                          <div class="form-group">
                            <label>อัตราดอกเบี้ย 6 ปี&nbsp;<span style="color:#DC3545;">*(%)</span></label>
                            <input name="six_year" type="text" class="form-control" value="<?php if(set_value("six_year")){echo set_value("six_year");}else{echo $result->six_year;}?>">
                            <?php echo form_error('six_year', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                          <div class="form-group">
                            <label>อัตราดอกเบี้ย 7 ปี&nbsp;<span style="color:#DC3545;">*(%)</span></label>
                            <input name="seven_year" type="text" class="form-control" value="<?php if(set_value("seven_year")){echo set_value("seven_year");}else{echo $result->seven_year;}?>">
                            <?php echo form_error('seven_year', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>อัพโหลดรูปภาพ&nbsp;<span style="color:#DC3545;">*</span></label>
                            <div>
                                     <?php
                                        
                                        echo '<img id="output" style="width:20%;" src="'.base_url().'uploads/'.$result->img.'"/>';
                                    ?>
                            </div>
                                    <div class="custom-file">
                                        <input type="file" name="userfile" accept="image/*" onchange="loadFile(event)" id="customFile" size="20" class="custom-file-input" onchange="readURL(this);">
                                        <label class="custom-file-label" for="customFile">เลือกรูปภาพ</label>
                                    </div>
                                    <?php echo '<div class="error" style="padding: 1% 0%;">'.$error.'</div>';?>
                            <div>
                               <p>รองรับไฟล์ภาพนามสกุล jpg  , png , jpeg</p>
                               <p>อัพโหลดไฟล์ภาพได้สูงสุด 5MB</p>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>ตำแหน่งการแสดงผล&nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="position_id" type="text" class="form-control"  pattern="\d*" value="<?php if(set_value("position_id")){echo set_value("position_id");}else{echo $result->position_id;}?>">
                            <?php echo form_error('position_id', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                         <div class="form-group">

                            <label>สถานะการใช้งาน&nbsp;<span style="color:#DC3545;">*</span></label>
                            <select class="custom-select mr-sm-2" name="status_id">
                                <option value="" <?php if($result->status_id==""){echo "selected";}?>>==== เลือกสถานะการใช้งาน ====</option>
                                <option value="1" <?php if($result->status_id=="1"){echo "selected";}?>>เปิดการใช้งาน</option>
                                <option value="2" <?php if($result->status_id=="2"){echo "selected";}?>>ปิดการใช้งาน</option>
                            </select>
                        </div>
                            <?php echo form_error('status_id', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                    </div>
                <div class="footer pb-3">
                    <div class="row ghhMCK d-flex justify-content-center">
                       <!--  <div class="col-sm-12 col-md-6 col-lg-6 mt-1 mb-1">
                            <a href="#" class="btn btn-secondary btn-block text-white">ยกเลิก</a>
                        </div> -->
                        <div class="col-sm-6 col-md-6 col-lg-6 mt-1 mb-1">
                            <input type="submit" name="submit" class="btn btn-primary btn-block text-white" value="บันทึกข้อมูล">
                        </div>
                    </div>
                    </div>
                <!-- Footer -->
                
            </div>
        </div>
    </form>
<?php }?>

</div>        </main>
    </div>
</div>

<iframe name="k_frame_admin" id="k_frame_admin" style="display:none;"></iframe>

<script type="text/javascript">

    $(document).ready(function() {
        setTimeout(function(){
            $('#load').hide();
        }, 600);
    });

    function close_popUp(name) {
        $('#'+name).modal('hide');
    }

    function reloader(name) {
        $('#load').show();
        $('#submit_'+name).click();
    }

    function reloader_hide() {
        setTimeout(function(){
            $('#load').hide();
        }, 600);
    }
</script>


<script>
  var loadFile = function(event) {
  var output = document.getElementById('output');
  output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>

