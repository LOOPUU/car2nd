<div class="sidebar-overlay" id="sidebar-overlay"></div>
<div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
<div class="mobile-menu-handle"></div>


                <article class="content item-editor-page">
                    <div class="title-block">
                        <h3 class="title"> วิธีการชำระเงิน
                            <span class="sparkline bar" data-type="bar"></span>
                        </h3>
                    </div>
                     <form action="<?php echo base_url('admin_management/howto_pay');?>" method="post">
                        <div class="card card-block">
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> 
                                <img src="<?php echo base_url('backend/images/thailand.png');?>" width=20px;> 
                                หัวข้อ : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="title_th" class="form-control boxed" placeholder="" value='<?php if(set_value("title_th")){echo set_value("title_th");}else{echo $data['title_th'];}?>'> 
                                    <?php echo form_error('title_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                    
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> 
                                <img src="<?php echo base_url('backend/images/thailand.png');?>" width=20px;> 
                                รายละเอียด : </label>
                                <div class="col-sm-10">
                                    <textarea id="showtinymce" name="description_th" class="form-control boxed"><?php if(set_value("description_th")){echo set_value("description_th");}else{echo $data['description_th'];}?></textarea>
                                    <?php echo form_error('description_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>


                            <hr>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> 
                                <img src="<?php echo base_url('backend/images/english.png');?>" width=20px;> 
                                หัวข้อ : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="title_en" class="form-control boxed" placeholder="" value="<?php if(set_value("title_en")){echo set_value("title_en");}else{echo $data['title_en'];}?>">
                                    <?php echo form_error('title_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> 
                                <img src="<?php echo base_url('backend/images/english.png');?>" width=20px;> 
                                รายละเอียด : </label>
                                <div class="col-sm-10">
                                    <textarea id="showtinymce" name="description_en" class="form-control boxed"><?php if(set_value("description_en")){echo set_value("description_en");}else{echo $data['description_en'];}?></textarea>
                                    <?php echo form_error('description_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?> 
                                </div>
                            </div>
                           
                            
                            <div class="form-group row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <input type="submit" name="submit" value="บันทึกข้อมูล" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
                </article>