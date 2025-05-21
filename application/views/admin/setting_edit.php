
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mb-2">
                <h4 class="h4">ตั้งค่าเว็บไซต์</h4>
            </div>
        </div>
    </div>

    <!-- Content -->


<?php foreach ( $data as $result ) {    ?>

    <form action="<?php echo base_url('admin_management/setting_edit/1');?>" method="post">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="wrap-box">
                    <!-- Title -->
                    <div class="title">
                        <h6 class="h6">รายละเอียด</h6>
                    </div>
                    <!-- Form Input -->
                    <div class="form-input">
                        <ul class="nav nav-tabs" id="TabLanguage" role="tablist">
                            <li class="nav-item">
                                <a
                                class="nav-link active"
                                data-toggle="tab"
                                href="#thTab"
                                role="tab"
                                aria-controls="th-Tab"
                                aria-selected="true"
                                >ภาษาไทย</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                class="nav-link"
                                data-toggle="tab"
                                href="#enTab"
                                role="tab"
                                aria-controls="en-Tab"
                                aria-selected="false"
                                >ภาษาอังกฤษ</a
                                >
                            </li>
                        </ul>
                        <div class="tab-content" id="Language">
                            <!-- Thai -->
                            <div
                                class="tab-pane fade show active"
                                id="thTab"
                                role="tabpanel"
                                aria-labelledby="th-Tab"
                            >
                                <div class="pt-3">
                                    <div class="form-group">
                                        <label>คำอธิบายย่อย&nbsp;<span style="color:#DC3545;">*</span></label>
                                        <input type="text" class="form-control" name="setting_top_th" value="<?php if(set_value("setting_top_th")){echo set_value("setting_top_th");}else{echo $result->setting_top_th;}?>" class="">
                                        <?php echo form_error('setting_top_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>คำอธิบายเว็บไซต์&nbsp;<span style="color:#DC3545;">*</span></label>
                                        <input type="text" class="form-control" name="setting_des_th" value="<?php if(set_value("setting_des_th")){echo set_value("setting_des_th");}else{echo $result->setting_des_th;}?>" class="">
                                        <?php echo form_error('setting_des_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>seo keyword&nbsp;<span style="color:#DC3545;">*</span></label>
                                        <textarea name="seo_keyword_th" class="form-control"><?php if(set_value("seo_keyword_th")){echo set_value("seo_keyword_th");}else{echo $result->seo_keyword_th;}?></textarea>
                                        <?php echo form_error('seo_keyword_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>seo คำอธิบาย&nbsp;<span style="color:#DC3545;">*</span></label>
                                        <textarea name="seo_descript_th" class="form-control"><?php if(set_value("seo_descript_th")){echo set_value("seo_descript_th");}else{echo $result->seo_descript_th;}?></textarea>
                                        <?php echo form_error('seo_descript_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- English -->
                            <div
                                class="tab-pane fade"
                                id="enTab"
                                role="tabpanel"
                                aria-labelledby="en-Tab"
                            >
                                <div class="pt-3">
                                    <div class="form-group">
                                        <label>คำอธิบายย่อย&nbsp;<span style="color:#DC3545;">*</span></label>
                                        <input type="text" class="form-control" name="setting_top_en" value="<?php if(set_value("setting_top_en")){echo set_value("setting_top_en");}else{echo $result->setting_top_en;}?>" class="">
                                        <?php echo form_error('setting_top_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>คำอธิบายเว็บไซต์&nbsp;<span style="color:#DC3545;">*</span></label>
                                        <input type="text" class="form-control" name="setting_des_en" value="<?php if(set_value("setting_des_en")){echo set_value("setting_des_en");}else{echo $result->setting_des_en;}?>" class="">
                                        <?php echo form_error('setting_des_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>seo keyword&nbsp;<span style="color:#DC3545;">*</span></label>
                                        <textarea name="seo_keyword_en" class="form-control"><?php if(set_value("seo_keyword_en")){echo set_value("seo_keyword_en");}else{echo $result->seo_keyword_en;}?></textarea>
                                        <?php echo form_error('seo_keyword_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>seo คำอธิบาย&nbsp;<span style="color:#DC3545;">*</span></label>
                                        <textarea name="seo_descript_en" class="form-control"><?php if(set_value("seo_descript_en")){echo set_value("seo_descript_en");}else{echo $result->seo_descript_en;}?></textarea>
                                        <?php echo form_error('seo_descript_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <div class="footer pb-3">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 mt-1 mb-1">
                            <input type="submit" name="submit" class="btn btn-primary btn-block text-white" value="บันทึกข้อมูล">
                        </div>
                    </div>
                </div>
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

