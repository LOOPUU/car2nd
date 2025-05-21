
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-10 mb-2">
                <h4 class="h4">เพิ่มอุปกรณ์รถ</h4>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2 mb-2">
              <a href="<?php echo base_url('admin_management/car_device_list'); ?>" class="btn btn-secondary btn-block">ย้อนกลับ</a> 
            </div>
        </div>
       
    <!-- Content -->

    <form action="<?php echo base_url('admin_management/car_device_add/');?>" method="post">
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
                            <label>อุปกรณ์&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('backend/images/thailand.png');?>" width=20px;>&nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="device_name_th" type="text" class="form-control" value="<?php echo set_value('device_name_th');?>">
                            <?php echo form_error('device_name_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>

                        </div>
                        <div class="form-group">
                            <label>อุปกรณ์&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('backend/images/english.png');?>" width=20px;>&nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="device_name_en" type="text" class="form-control" value="<?php  echo set_value('device_name_en');?>">
                            <?php echo form_error('device_name_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                        
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

