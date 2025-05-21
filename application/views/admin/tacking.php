<div class="sidebar-overlay" id="sidebar-overlay"></div>
<div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
<div class="mobile-menu-handle"></div>


                <article class="content item-editor-page">
                    <div class="title-block">
                        <h3 class="title"> ตั้งค่าหมายเลขสินค้า
                            <span class="sparkline bar" data-type="bar"></span>
                        </h3>
                    </div>
                     <form action="<?php echo base_url('admin_management/tacking');?>" method="post">
                        <div class="card card-block">
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> 
                               
                                คำนำหน้าหมายเลขสินค้า : </label>
                                <div class="col-sm-2">
                                    <input type="text" name="tacking" class="form-control boxed" placeholder="" value='<?php if(set_value("tacking")){echo set_value("tacking");}else{echo $data['tacking'];}?>'>

                                    
                                </div>
                                -
                                <div class="col-sm-3">
                                    <input type="text" name="tacking" class="form-control boxed" placeholder="" value='0101' disabled>

                                    
                                </div>
                               

                            </div>
                             <?php echo form_error('tacking', '<div class="error" style="padding: 0.5% 0%;">', '</div><div class="error" style="padding: 0.5% 0%;">ตย. PRO - 0102</div>'); ?>
                           

                            
                            <div class="form-group row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <input type="submit" name="submit" value="บันทึกข้อมูล" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
                </article>