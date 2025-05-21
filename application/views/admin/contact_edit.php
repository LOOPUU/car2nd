
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
           <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
                <h4 class="h4">จัดการช่องทางติดต่อ</h4>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
             
            </div>
            
           
        </div>
      
    </div>

    <!-- Content -->


<?php foreach ( $data as $result ) {    ?>

    <form action="<?php echo base_url('admin_management/contact_edit/1');?>" method="post">
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
                            <label>ชื่อบริษัท&nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="company_th" type="text" class="form-control"  value="<?php if(set_value("company_th")){echo set_value("company_th");}else{echo $result->company_th;}?>">
                            <?php echo form_error('websize', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                      
                        <div class="form-group">
                            <label>ที่อยู่&nbsp;<span style="color:#DC3545;">*</span></label>
                            <textarea name="address_th"  class="form-control"><?php if(set_value("address_th")){echo set_value("address_th");}else{echo $result->address_th;}?></textarea>
                            <?php echo form_error('address_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                        
                         
                       
                    </div>

                     <!-- Title -->
                    <div class="title">
                        <h6 class="h6">รายละเอียด&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('backend/images/english.png');?>" width=20px;></h6>
                    </div>
                    <!-- Form Input -->
                    <div class="form-input">
                        
                        <div class="form-group">
                            <label>ชื่อบริษัท&nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="company_en" type="text"  class="form-control" value="<?php if(set_value("company_en")){echo set_value("company_en");}else{echo $result->company_en;}?>">
                            <?php echo form_error('company_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                       
                        <div class="form-group">
                            <label>ที่อยู่&nbsp;<span style="color:#DC3545;">*</span></label>
                            <textarea name="address_en" class="form-control"><?php if(set_value("address_en")){echo set_value("address_en");}else{echo $result->address_en;}?></textarea>
                            <?php echo form_error('address_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                        
                       
                    </div>

                     <!-- Title -->
                    <div class="title">
                        <h6 class="h6">รายละเอียด</h6>
                    </div>
                    <!-- Form Input -->
                    <div class="form-input">
                        
                        
                        <div class="form-group">
                            <label>เบอร์โทร&nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="tel" type="text" placeholder="0x-xxx-xxxx" class="form-control" value="<?php if(set_value("tel")){echo set_value("tel");}else{echo $result->tel;}?>">
                            <?php echo form_error('tel', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>แฟกซ์&nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="fax" type="text" placeholder="0x-xxx-xxxx" class="form-control" value="<?php if(set_value("fax")){echo set_value("fax");}else{echo $result->fax;}?>">
                            <?php echo form_error('fax', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>email&nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="email" type="text" placeholder="example@gmail.com" class="form-control" value="<?php if(set_value("email")){echo set_value("email");}else{echo $result->email;}?>">
                            <?php echo form_error('email', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>facebook&nbsp;</label>
                            <input name="facebook" type="text" placeholder="https://www.facebook.com/example" class="form-control" value="<?php if(set_value("facebook")){echo set_value("facebook");}else{echo $result->facebook;}?>">
                            <?php echo form_error('facebook', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                         <div class="form-group">
                            <label>twitter&nbsp;</label>
                            <input name="twitter" type="text" placeholder="https://twitter.com/example" class="form-control" value="<?php if(set_value("twitter")){echo set_value("twitter");}else{echo $result->twitter;}?>">
                            <?php echo form_error('twitter', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                         <div class="form-group">
                            <label>instragram&nbsp;</label>
                            <input name="instragram" type="text" placeholder="https://www.instragram.com/example" class="form-control" value="<?php if(set_value("instragram")){echo set_value("instragram");}else{echo $result->instragram;}?>">
                            <?php echo form_error('instragram', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
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

