<?php
ob_start();
header("Cache-Control: no-cache, must-revalidate"); 
?>
<div class="sidebar-overlay" id="sidebar-overlay"></div>
<div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
<div class="mobile-menu-handle"></div>


                <article class="content item-editor-page">
                    <div class="title-block">
                        <h3 class="title"> ผู้ดูแลระบบ
                            <span class="sparkline bar" data-type="bar"></span>
                        </h3>
                    </div>
                     <form action="<?php echo base_url('admin_management/admin');?>" method="post">
                        <div class="card card-block">
                            <h5>- เปลี่ยนข้อมูล -</h5><br>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">ชื่อผู้ใช้ : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" class="form-control boxed" placeholder="" value='<?php echo $data['username'];?>' disabled> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">อีเมล : </label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control boxed" placeholder="" value='<?php if(set_value("email")){echo set_value("email");}else{echo $data['email'];}?>'> 
                                    <div class="error" style="padding: 1% 0%;">* (อีเมล ส่วนนี้ใช้สำหรับรับข้อมูลลูกค้า)</div>
                                    <?php echo form_error('email', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <input type="submit" name="submit" value="บันทึกข้อมูล" class="btn btn-primary">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="card card-block">
                            <h5>- เปลี่ยนรหัสผ่าน -</h5><br>
                         
                             <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">รหัสผ่านใหม่ : </label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control boxed" placeholder="" value='<?php echo set_value('password'); ?>'> 
                                    <?php echo form_error('password', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">ยืนยันรหัสผ่าน : </label>
                                <div class="col-sm-10">
                                    <input type="password" name="password_new" class="form-control boxed" placeholder="" value=''> 
                                    <?php echo form_error('password_new', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                    <?php echo '<div class="error" style="padding: 1% 0%;">'.$error_pass."</div>";?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <input type="submit" name="submit_pass" value="บันทึกข้อมูล" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
                </article>