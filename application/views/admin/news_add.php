<style type="text/css">
  img{
   max-width:180px;
  }
  input[type=file]{
    padding:10px;
    background:#2d2d2d;}
</style>
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-10 mb-2">
                <h4 class="h4">เพิ่มข่าวสาร</h4>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2 mb-2">
               <a href="<?php echo base_url('admin_management/news_list');?>" class="btn btn-secondary btn-block">
                    ย้อนกลับ
                </a> 
            </div>
        </div>
    </div>

    <!-- Content -->

    <?php echo form_open_multipart('admin_management/news_add');?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="wrap-box">
                    <!-- Title -->
                    <div class="title">
                        <h6 class="h6">รายละเอียด&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('backend/images/thailand.png');?>" width=20px;></h6>
                    </div>
                    <!-- Form Input -->
                    <div class="form-input">
                        <div class="form-group">
                            <label>หัวข้อ&nbsp; <span style="color:#DC3545;">*</span> </label>
                            <input name="title_th" type="text" class="form-control" value="<?php echo set_value('title_th');?>">
                            <?php echo form_error('title_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>

                        </div>
                      
                        <div class="form-group">
                            <label>รายละเอียด&nbsp; <span style="color:#DC3545;">*</span></label>
                           <textarea name="description_th" class="form-control"><?php  echo set_value('description_th');?></textarea>
                            <?php echo form_error('description_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                    </div>
                        


                         <!-- Title -->
                    <div class="title">
                        <h6 class="h6">รายละเอียด&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('backend/images/english.png');?>" width=20px;></h6>
                    </div>
                    <!-- Form Input -->
                    <div class="form-input">
                       
                        <div class="form-group">
                            <label>หัวข้อ&nbsp; <span style="color:#DC3545;">*</span> </label>
                            <input name="title_en" type="text" class="form-control" value="<?php  echo set_value('title_en');?>">
                            <?php echo form_error('title_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                      
                        <div class="form-group">
                            <label>รายละเอียด&nbsp;<span style="color:#DC3545;">*</span></label>
                            <textarea name="description_en" class="form-control"><?php  echo set_value('description_en');?></textarea>
                            <?php echo form_error('description_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?> 
                        </div>
                    </div>
                      

                         <!-- Title -->
                    <div class="title">
                        <h6 class="h6">รายละเอียด</h6>
                    </div>
                    <!-- Form Input -->
                    <div class="form-input">

                        <div class="form-group">
                            <label>อัพโหลดรูปภาพ&nbsp;<span style="color:#DC3545;">*</span></label>
                            <div class="">
                                  <img id="output" style="width:25%;"/>
                            </div>
                            <div class="custom-file">

                                <input type="file" name="userfile" accept="image/*" onchange="loadFile(event)"  id="customFile" size="20" class="custom-file-input" onchange="readURL(this);">
                                <label class="custom-file-label" for="customFile">เลือกรูปภาพ</label>
                            </div>
                            <?php echo '<div class="error" style="padding: 1% 0%;">'.$error.'</div>';?>
                            <div>
                               <p>รองรับไฟล์ภาพนามสกุล jpg  , png , jpeg</p>
                               <p>อัพโหลดไฟล์ภาพได้สูงสุด 5MB</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>ตำแหน่งแสดงผล&nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="position_id" type="number" class="form-control" value="<?php  echo set_value('position_id');?>">
                            <?php echo form_error('position_id', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>สถานะ&nbsp;<span style="color:#DC3545;">*</span></label>
                            <?php echo form_dropdown('status_id', $status, set_value('status_id'),'class="custom-select mr-sm-2"', 'id="status_id"') ?> 

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
                <!-- Footer -->
                
            </div>
        </div>
    </form>

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

