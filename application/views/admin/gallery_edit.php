<div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
                <h4 class="h4">แก้ไข gallery</h4>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
            
            </div>

            <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
                <a href="<?php echo base_url('admin_management/gallery_multi/1/1');?>" class="btn btn-secondary btn-block">
                    <i class="fas fa-plus fa-fw"></i> เพิ่มรูปภาพ gallery
                </a>
            </div>
        </div>
    </div>


    <!-- Content -->


<?php foreach ( $data as $result ) {    ?>

    <form action="<?php echo base_url('admin_management/gallery_edit/1');?>" method="post">
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
                            <label>คำอธิบาย (ภาษาไทย)&nbsp;<span style="color:#DC3545;">*</span></label>
                             <textarea name="gallery_name_th" class="form-control"><?php if(set_value("gallery_name_th")){echo set_value("gallery_name_th");}else{echo $result->gallery_name_th;}?></textarea>
                            <?php echo form_error('gallery_name_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="form-input">
                        <div class="form-group">
                            <label>คำอธิบาย (ภาษาอังกฤษ)&nbsp;<span style="color:#DC3545;">*</span></label>
                             <textarea name="gallery_name_en" class="form-control"><?php if(set_value("gallery_name_en")){echo set_value("gallery_name_en");}else{echo $result->gallery_name_en;}?></textarea>
                            <?php echo form_error('gallery_name_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
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

