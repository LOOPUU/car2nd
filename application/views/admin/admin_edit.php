
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-10 mb-2">
                <h4 class="h4">แก้ไขผู้ดูแลระบบ</h4>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2 mb-2">
               <a href="<?php echo base_url('admin_management/admin_list');?>" class="btn btn-secondary btn-block">
                    ย้อนกลับ
                </a> 
            </div>
        </div>
    </div>

    <!-- Content -->


<?php foreach ( $data as $result ) {    ?>

    
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="wrap-box">
                 

                 <form action="<?php echo base_url('admin_management/admin_edit/'.$result->id);?>" method="post">
                    <div class="form-input">
                        <div class="form-group">
                            <label>ชื่อผู้ใช้&nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="user" type="text" class="form-control" value="<?php if(set_value("user")){echo set_value("user");}else{echo $result->user;}?>">
                            <?php echo form_error('user', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>

                        </div>

                      
                        <div class="form-group">
                            <label>อีเมล&nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="email" type="email" placeholder="example@gmail.com" class="form-control" value="<?php if(set_value("email")){echo set_value("email");}else{echo $result->email;}?>">
                            <?php echo form_error('email', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>

                         <div class="form-group">
                            <label>เบอร์โทรศัพท์&nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="tel" type="text" placeholder="0x-xxx-xxxx" class="form-control" value="<?php if(set_value("tel")){echo set_value("tel");}else{echo $result->tel;}?>">
                            <?php echo form_error('tel', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                      
                    </div>


                    <div class="footer pb-3">
                    <div class="row ghhMCK d-flex justify-content-center">
                      
                        <div class="col-sm-6 col-md-6 col-lg-6 mt-1 mb-1">
                            <input type="submit" name="submit" class="btn btn-primary btn-block text-white" value="บันทึกข้อมูล">
                        </div>
                    </div>
                    </div>

                 </form>

                 <form action="<?php echo base_url('admin_management/change_password_admin/'.$result->id);?>" method="post">

                    <div class="form-input">
                        <div class="form-group">
                            <label>รหัสผ่านใหม่&nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="password" type="password" class="form-control" value="<?php echo set_value("password");?>">
                            <?php echo form_error('password', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>

                        </div>

                      
                        <div class="form-group">
                            <label>ยืนยันรหัสผ่านใหม่&nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="password_new" type="password" class="form-control" value="">
                            <?php echo form_error('password_new', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                            <?php echo '<div class="error" style="padding: 1% 0%;">'.@$error_pass.'</div>';?>
                        </div>

                      
                    </div>

                    <div class="footer pb-3">
                    <div class="row ghhMCK d-flex justify-content-center">
                      
                        <div class="col-sm-6 col-md-6 col-lg-6 mt-1 mb-1">
                            <input type="submit" name="submit_pass" class="btn btn-primary btn-block text-white" value="บันทึกข้อมูล">
                        </div>
                    </div>
                    </div>

                </form>



            
                <!-- Footer -->
                
            </div>
        </div>


   


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

