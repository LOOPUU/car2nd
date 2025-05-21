<?php $id = $this->uri->segment(3);?>
<div class="pt-3 pb-2 mb-3 border-bottom">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 mb-2">
            <h4 class="h4">เพิ่มรายละเอียดรุ่น</h4>
        </div>
    </div>
</div>
       
<div class="wrap-box">
    <div class="title"><h6 class="h6">เครื่องมือจัดการ</h6></div>
        <div class="content">
            <div class="row" id="row11">
                <div class="col-sm-12 col-md-12 col-lg-3 mb-3" <?php if($this->uri->segment(2)=="car_type_list" 
                        OR $this->uri->segment(2)=="car_type_add"
                        OR $this->uri->segment(2)=="car_type_edit"){echo 'id="color-link"';}?>>
                    <a class="bt" href="<?php echo base_url('admin_management/car_type_list');?>">
                        <div class="button text-center">
                            <p style="color:#02507E;font-weight: bold;">STEP 1<br /><br />ประเภทรถ</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-3 mb-3" <?php if($this->uri->segment(2)=="car_list" 
                        OR $this->uri->segment(2)=="car_add"
                        OR $this->uri->segment(2)=="car_edit"){echo 'id="color-link"';}?>>
                    <a class="bt" href="<?php echo base_url('admin_management/car_list/'.$car_check_id['car_type_id']);?>">
                        <div class="button text-center">
                            <p style="color:#02507E;font-weight: bold;">STEP 2<br /><br />ยี่ห้อรถ</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-3 mb-3" <?php if($this->uri->segment(2)=="car_model_list" 
                        OR $this->uri->segment(2)=="car_model_add"
                        OR $this->uri->segment(2)=="car_model_edit"){echo 'id="color-link"';}?>>
                    <a class="bt" href="<?php echo base_url('admin_management/car_model_list/'.$car_model_cate['car_id']);?>">
                        <div class="button text-center">
                            <p style="color:#02507E;font-weight: bold;">STEP 3<br /><br />รุ่นรถ</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-3 mb-3" <?php if($this->uri->segment(2)=="car_model_des_list" 
                        OR $this->uri->segment(2)=="car_model_des_add"
                        OR $this->uri->segment(2)=="car_model_des_edit"){echo 'id="color-link"';}?>>
                    <a class="bt" href="<?php echo base_url('admin_management/car_model_des_list/'.$id);?>">
                        <div class="button text-center" style="background-color: #02507E;color: #F5F5F5;">
                            <p>STEP 4<br /><br />รายละเอียดรุ่นรถ</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="<?php echo base_url('admin_management/car_model_des_add/'.$id.'');?>" method="post">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="wrap-box">
                <div class="title">
                    <h6 class="h6">รายละเอียด&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('backend/images/thailand.png');?>" width=20px;></h6>
                </div>
                <div class="form-input">
                    <div class="form-group">
                        <input type="hidden" name="car_id" value="<?php echo $id; ?>">
                        <label>รายละเอียดรุ่น&nbsp;<span style="color:#DC3545;">*</span></label>
                        <input name="name_model_des_th" type="text" class="form-control" value="<?php echo set_value('name_model_des_th');?>">
                        <?php echo form_error('name_model_des_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                    </div> 
                </div>
                <div class="title">
                    <h6 class="h6">รายละเอียด&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('backend/images/english.png');?>" width=20px;></h6>
                </div>
                <div class="form-input">
                    <div class="form-group">
                        <label>รายละเอียดรุ่น&nbsp;<span style="color:#DC3545;">*</span></label>
                        <input name="name_model_des_en" type="text" class="form-control" value="<?php  echo set_value('name_model_des_en');?>">
                        <?php echo form_error('name_model_des_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                    </div>  
                </div>
                <div class="form-input">
                    <div class="form-group">
                        <label>ปีที่ผลิต&nbsp;<span style="color:#DC3545;">*</span></label>
                        <select class="custom-select mr-sm-2" name="name_year_pro">
                            <option value="" <?php if(set_value('name_year_pro')==""){echo "selected";}?>>==== เลือกปีที่ผลิต ====</option>
                            <?php foreach($data_car_year_pro as $year){?>
                            <option value="<?php echo $year->name_year_min;?>" <?php if(set_value('name_year_pro')==$year->name_year_min){echo "selected";}?>><?php echo $year->name_year_min;?></option>
                            <?php }?>
                        </select>
                        <?php echo form_error('name_year_pro', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-input">
                    <div class="form-group">
                        <label>ตำแหน่งการแสดงผล&nbsp;<span style="color:#DC3545;">*</span></label>
                        <input name="position_id" type="number" class="form-control"  pattern="\d*" value="<?php echo set_value('position_id');?>">
                        <?php echo form_error('position_id', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>สถานะ&nbsp;<span style="color:#DC3545;">*</span></label>
                        <?php echo form_dropdown('status_id', $status, set_value('status_id'),'class="custom-select mr-sm-2"', 'id="status_id"') ?> 
                        <?php echo form_error('status_id', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                    </div>  
                </div>
                <div class="footer pb-3">
                    <div class="row ghhMCK d-flex justify-content-center">
                        <div class="col-sm-6 col-md-6 col-lg-6 mt-1 mb-1">
                            <input type="hidden" name="car_model_id" value="<?php echo $id;?>">
                            <input type="submit" name="submit" class="btn btn-primary btn-block text-white" value="บันทึกข้อมูล">
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</form>
