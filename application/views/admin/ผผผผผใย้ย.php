
   <div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
                <h4 class="h4">ข้อมูลรถ</h4>
            </div>
         
             
             <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
             
            </div>
          <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
               <a href="<?php echo base_url('admin_management/car_top_list');?>" class="btn btn-secondary btn-block">
                    กลับไปหน้ารายการข้อมูลรถ
                </a> 
            </div>
           
        </div>
    </div>


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
                                role="tab"
                                aria-controls="th-Tab"
                                aria-selected="true"
                                >ข้อมูลรถ</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                class="nav-link"
                                href="<?php echo base_url("admin_management/gallery_multi/1/".$this->uri->segment(3)."?type=".$this->input->get('type')."&&car_type_id=".$this->input->get('car_type_id')."&&brand=".$this->input->get('brand')."&&car_id=".$this->input->get('car_id')."&&model=".$this->input->get('model')."&&car_model_id=".$this->input->get('car_model_id')."&&model_des=".$this->input->get('model_des')."&&car_model_des_id=".$this->input->get('car_model_des_id')."")?>"
                                role="tab"
                                aria-controls="en-Tab"
                                aria-selected="false"
                                >รูปภาพรถ</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                class="nav-link"
                                href="<?php echo base_url("admin_management/file_multi/1/".$this->uri->segment(3)."?type=".$this->input->get('type')."&&car_type_id=".$this->input->get('car_type_id')."&&brand=".$this->input->get('brand')."&&car_id=".$this->input->get('car_id')."&&model=".$this->input->get('model')."&&car_model_id=".$this->input->get('car_model_id')."&&model_des=".$this->input->get('model_des')."&&car_model_des_id=".$this->input->get('car_model_des_id')."")?>"
                                role="tab"
                                aria-controls="en-Tab"
                                aria-selected="false"
                                >ไฟล์เอกสาร</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                class="nav-link"
                                href="<?php echo base_url("admin_management/car_top_edit_send_email/".$this->uri->segment(3)."?type=".$this->input->get('type')."&&car_type_id=".$this->input->get('car_type_id')."&&brand=".$this->input->get('brand')."&&car_id=".$this->input->get('car_id')."&&model=".$this->input->get('model')."&&car_model_id=".$this->input->get('car_model_id')."&&model_des=".$this->input->get('model_des')."&&car_model_des_id=".$this->input->get('car_model_des_id')."")?>"
                                role="tab"
                                aria-controls="en-Tab"
                                aria-selected="false"
                                >ส่งข้อความ</a
                                >
                            </li>
                        </ul>
                        <div class="form-group">
                           
                            <form action="<?php echo base_url('admin_management/car_top_edit/'.$data['car_top_id'].'?type='.$this->input->get('type').'&&car_type_id='.$this->input->get('car_type_id').'&&brand='.$this->input->get('brand').'&&car_id='.$this->input->get('car_id').'&&model='.$this->input->get('model').'&&car_model_id='.$this->input->get('car_model_id').'&&model_des='.$this->input->get('model_des').'&&car_model_des_id='.$this->input->get('car_model_des_id'));?>" method="post">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="wrap-box">
                                            <!-- Title -->
                                            <div class="title">
                                                <h6 class="h6">รายละเอียด</h6>
                                            </div>
                                            <!-- Form Input -->
                                            <div class="form-input">

                                             <div class="form-input">
                                                <div class="form-group">
                                                    <label>ประเภทรถ&nbsp;<span style="color:#DC3545;">*</span></label>
                                                
                                                  <select name="name_type"  class="form-control" onchange="location = this.value;">
                                                    <option value="">== เลือกประเภทรถ ==</option>
                                                   <?php  foreach($result_type as $row){?>
                                                       <option value="<?php echo base_url('admin_management/car_top_edit/'.$data['car_top_id'].'?type='.$row->name_type_th.'&&car_type_id='.$row->car_type_id.'&&click=click');?>" 
                                                       <?php 
                                                           if(empty($this->input->get('car_type_id'))){
                                                            if($data['car_type_id'] == $row->car_type_id){
                                                                echo "selected";
                                                            }
                                                           }else{
                                                            if($this->input->get('car_type_id')== $row->car_type_id){
                                                                echo  "selected";
                                                            }
                                                           }
                                                        ?>><?php echo $row->name_type_th;?></option>
                                                    <?php }?>
                                                   </select>
                                                

                                                    <?php echo form_error('name_type', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?> 
                                                </div>



                                                <div class="form-group">
                                                    <label>ยี่ห้อรถ&nbsp;<span style="color:#DC3545;">*</span></label>

                                                   <select name="name"  class="form-control" onchange="location = this.value;">
                                                       <option value="">
                                                      == เลือกยี่ห้อ ==</option>
                                                   <?php  foreach($result as $row){?>
                                                        
                                                       <option value="<?php echo base_url('admin_management/car_top_edit/'.$data['car_top_id'].'?type='.$this->input->get('type').'&&car_type_id='.$this->input->get('car_type_id').'&&brand='.$row->name_th.'&&car_id='.$row->car_id.'&&click=click');?>" <?php 

                                                           if(empty($this->input->get('car_id'))){
                                                            if(empty($this->input->get('click'))){
                                                              if($data['car_id'] == $row->car_id){
                                                                  echo "selected";
                                                              }
                                                            }
                                                           }else{

                                                           
                                                               if($this->input->get('car_id')== $row->car_id){
                                                                echo  "selected";
                                                       
                                                              }
                                                            
                                                           
                                                           }
                                                        ?>>
                                                        <?php echo $row->name_th;?></option>
                                                    <?php }?>
                                                   </select>
                                                   <?php echo form_error('name', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label>รุ่นรถ&nbsp;<span style="color:#DC3545;">*</span></label>
                                                
                                                   <select name="name_model"  class="form-control" onchange="location = this.value;">
                                                      
                                                       <option value="">== เลือกรุ่น ==</option>
                                                   <?php  foreach($result_model as $row){?>
                                                        
                                                       <option value="<?php echo base_url('admin_management/car_top_edit/'.$data['car_top_id'].'?type='.$this->input->get('type').'&&car_type_id='.$this->input->get('car_type_id').'&&brand='.$this->input->get('brand').'&&car_id='.$this->input->get('car_id').'&&model='.$row->name_model_th.'&&car_model_id='.$row->car_model_id.'&&click=click');?>" <?php 
                                                          if(empty($this->input->get('model'))){
                                                            if(empty($this->input->get('click'))){
                                                              if($data['car_model_id'] == $row->car_model_id){
                                                                    echo "selected";
                                                              }
                                                            }
                                                           }else{
                                                            if($this->input->get('car_model_id')== $row->car_model_id){
                                                                echo  "selected";
                                                            }
                                                           }
                                                        ?>>
                                                        <?php echo $row->name_model_th;?></option>
                                                    <?php }?>
                                                   </select>
                                                   <?php echo form_error('name_model', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label>รายละเอียดรุ่น</label>
                                                    <select name="name_model_des"  class="form-control" onchange="location = this.value;">
                                                      <option value="<?php echo base_url('admin_management/car_top_edit/'.$data['car_top_id'].'?type='.$this->input->get('type').'&&car_type_id='.$this->input->get('car_type_id').'&&brand='.$this->input->get('brand').'&&car_id='.$this->input->get('car_id').'&&model='.$this->input->get('model').'&&car_model_id='.$this->input->get('car_model_id').'&&model_des=false&&car_model_des_id=false&&click=click');?>" 
                                                        <?php if($this->input->get('car_model_des_id')=="false"){echo "selected";}?>>== เลือกรายละเอียดรุ่น ==</option>

                                                   <?php  foreach($result_model_des as $row){?> 
                                                       <option value="<?php echo base_url('admin_management/car_top_edit/'.$data['car_top_id'].'?type='.$this->input->get('type').'&&car_type_id='.$this->input->get('car_type_id').'&&brand='.$this->input->get('brand').'&&car_id='.$this->input->get('car_id').'&&model='.$this->input->get('model').'&&car_model_id='.$this->input->get('car_model_id').'&&model_des='.$row->name_model_des_th.'&&car_model_des_id='.$row->car_model_des_id.'&&click=click');?>" <?php 
                                                           if(empty($this->input->get('car_model_des_id'))){
                                                            if(empty($this->input->get('click'))){
                                                              if($data['car_model_des_id'] == $row->car_model_des_id){
                                                                  echo "selected";
                                                              }
                                                            }
                                                           }else{
                                                            if($this->input->get('car_model_des_id')== $row->car_model_des_id){
                                                                echo  "selected";
                                                            }
                                                           }
                                                        ?>><?php echo $row->name_model_des_th;?></option>
                                                    <?php }?>
                                                   </select>
                                      
                                                    <?php echo form_error('name_model_des', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                                </div>

                                                <!-- <div class="form-group">
                                                    <label>ปีที่จดทะเบียน</label>    
                                                    <input name="name_year_regis" maxlength="4" type="text" class="form-control" value="<?php if(set_value("name_year_regis")){echo set_value("name_year_regis");}else{echo $data['name_year_regis'];}?>">
                                                    <?php echo form_error('name_year_regis', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                                </div>
                         -->
                                                <div class="form-group">
                                                    <label>ปีที่ผลิต</label>
                                                    <input name="name_year_pro" maxlength="4" type="text" class="form-control" value="<?php if(set_value("name_year_pro")){echo set_value("name_year_pro");}else{echo $data['name_year_pro'];}?>">

                                                    <?php echo form_error('name_year_pro', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                                    <?php echo '<div class="error" style="padding: 1% 0%;">'.$check_year.'</div>';?>
                                                </div>

                                               
                                                <div class="form-group">
                                                    <label>ระบบเกียร์</label>
                                                    
                                                     <select name="name_gear"  class="form-control">
                                                      <option value="">== เลือกเกียร์ ==</option>
                                                   <?php  foreach($result_gear as $row){?> 
                                                       <option value="<?php echo $row->name_gear_th;?>" 
                                                       <?php if(empty(set_value('name_gear_th'))){
                                                            if($data['name_gear']==$row->name_gear_th OR $data['name_gear']==$row->name_gear_en){echo "selected";}
                                                        }else{
                                                            if(set_value('name_gear')==$row->name_gear_th OR set_value('name_gear')==$row->name_gear_en){echo "selected";}
                                                        }?>

                                                       ><?php echo $row->name_gear_th;?></option>
                                                    <?php }?>
                                                   </select>

                                               
                                                    <?php echo form_error('name_gear', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                                </div>

                                                <div class="form-group">
                                                    <label>ความจุเครื่องยนต์</label>
                                                     <select name="name_capacity"  class="form-control">
                                                      <option value="">== เลือกความจุเครื่องยนต์ ==</option>
                                                   <?php  foreach($result_capacity as $row){?> 
                                                       <option value="<?php echo $row->name_capacity_th;?>" 
                                                       <?php if(empty(set_value('name_capacity'))){
                                                            if($data['name_capacity']==$row->name_capacity_th OR $data['name_capacity']==$row->name_capacity_en){echo "selected";}
                                                        }else{
                                                            if(set_value('name_capacity')==$row->name_capacity_th OR set_value('name_capacity')==$row->name_capacity_en){echo "selected";}
                                                        }?>

                                                       ><?php echo $row->name_capacity_th;?></option>
                                                    <?php }?>
                                                   </select>
                                                    <?php echo form_error('name_capacity', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                                </div>

                                             

                                                 <div class="form-group">
                                                    <label>เลขไมล์</label>
                                                    <input name="name_mile" type="text" class="form-control" value="<?php if(set_value("name_mile")){echo set_value("name_mile");}else{echo $data['name_mile'];}?>">
                                                    <?php echo form_error('name_mile', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                                </div>

                                               
                                                <div class="form-group">
                                                    <label>จังหวัด&nbsp;<span style="color:#DC3545;">*</span></label>
                                                    <select name="province"  class="form-control">
                                                      <option value="">== เลือกจังหวัด ==</option>
                                                   <?php  foreach($province as $row){?> 
                                                       <option value="<?php echo $row->PROVINCE_NAME;?>" 
                                                       <?php if(empty(set_value('province'))){
                                                            if($data['province']==$row->PROVINCE_NAME OR $data['province']==$row->PROVINCE_NAME_ENG){echo "selected";}
                                                        }else{
                                                            if(set_value('province')==$row->PROVINCE_NAME){echo "selected";}
                                                        }?>

                                                       ><?php echo $row->PROVINCE_NAME;?></option>
                                                    <?php }?>
                                                   </select>

                                                    <?php echo form_error('province', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                                </div>
                                              
                                                <div class="form-group">
                                                    <label>อุปกรณ์</label>
                                                    <hr>
                                                    <div class="row">
                                                      <?php foreach($device as $row){?>
                                                         <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
                                                          <label><span><input type="checkbox" name="device[]" value="<?php echo $row->device_name_th;?>" 
                                                          <?php  
                                                              $i =  explode(",",$data['device']);
                                                              $num = count($i); 
                                                              for($ii=0;$ii<$num;$ii++){                                    
                                                                  if($i[$ii]==$row->device_name_th OR $i[$ii]==$row->device_name_en){
                                                                  echo "checked";
                                                                  }
                                                              }
                                                          ?>><?php echo $row->device_name_th;?></span></label>
                                                          </div>
                                                      <?php }?>

                                                    
                                                </div>
                                                <?php echo form_error('device[]', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                                <div class="form-group">
                                                    <label>ราคา (บาท)&nbsp;<span style="color:#DC3545;">*</span></label>
                                                    <input name="name_price" type="number" class="form-control" value="<?php if(set_value("name_price")){echo set_value("name_price");}else{echo $data['name_price'];}?>">
                                                    <?php echo form_error('name_price', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                                </div>
                                              
                                                 <div class="form-group">
                                                    <label>สี</label>
                                                   <select name="name_color"  class="form-control">
                                                      <option value="">== เลือกสีรถ ==</option>
                                                        <?php  foreach($result_color as $row){?> 
                                                       <option value="<?php echo $row->name_color_th;?>" 
                                                       <?php if(empty(set_value('name_color'))){
                                                            if($data['name_color']==$row->name_color_th OR $data['name_color']==$row->name_color_en){echo "selected";}
                                                        }else{
                                                            if(set_value('name_color')==$row->name_color_th OR set_value('name_color')==$row->name_color_en){echo "selected";}
                                                        }?>

                                                       ><?php echo $row->name_color_th;?></option>
                                                    <?php }?>
                                                   </select>
                                                    <?php echo form_error('name_color', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                                </div>
                                             

                                                <div class="form-group">

                                                    <label>เงินดาวน์ (บาท)</label>
                                                    <input name="downpayment" type="number" class="form-control" value="<?php if(set_value("downpayment")){echo set_value("downpayment");}else{echo $data['downpayment'];}?>">
                                                    
                                                </div>

                                                <div class="form-group">
                                                    <label>ดอกเบี้ย/ธนาคาร</label>
                                                    <div class="row">
                                                       <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
                                                      <?php foreach($bank as $row){?>
                                                        

                                                          <?php if($row->img==""){?>
                                                            <img style='width:30px;' src="<?php echo base_url('frontend/assets/images/bank.png');?>">
                                                          <?php }else{?>
                                                            <img style='width:30px;' src="<?php echo base_url('uploads/'.$row->img);?>">
                                                          <?php }?>

                                                          <label><span><input type="checkbox" name="bank[]" value="<?php echo $row->bank_id;?>" 
                                                          <?php  
                                                              $i =  explode(",",$data['bank_id']);
                                                              $num = count($i); 
                                                              for($ii=0;$ii<$num;$ii++){                                    
                                                                  if($i[$ii]==$row->bank_id){
                                                                  echo "checked";
                                                                  }
                                                              }
                                                          ?>><?php echo $row->bank_name_th;?></span></label><br><br>
                                                         
                                                      <?php }?> 
                                                       </div>
                                                </div>

                                               <div class="form-group">
                                                    <label>ข้อความจากผู้ประกาศขาย</label>
                                                    <textarea name="descript" class="form-control" ><?php echo $data['descript']?></textarea>
                                                </div>

                                                   <div class="form-group">

                                                                          <label>สถานะการใช้งาน&nbsp;<span style="color:#DC3545;">*</span></label>
                                                                          <select class="custom-select mr-sm-2" name="status_id">
                                                                              <option value="0" <?php if($data['status_id']=="0"){echo "selected";}?>>-- รอดำเนินการ --</option>
                                                                              <option value="1" <?php if($data['status_id']=="1"){echo "selected";}?>>เปิดการขาย</option>
                                                                              <option value="3" <?php if($data['status_id']=="3"){echo "selected";}?>>แสดงรถแนะนำ</option>
                                                                              <option value="4" <?php if($data['status_id']=="4"){echo "selected";}?>>ปิดการขาย</option>
                                                                              <option value="2" <?php if($data['status_id']=="2"){echo "selected";}?>>ยกเลิกการขาย</option>
                                                                          </select>
                                                                      </div>
                                                                          <?php echo form_error('status_id', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?> 

                                            </div>

                                        <div class="footer pb-3">
                                            <div class="row ghhMCK d-flex justify-content-center">
                                             
                                                <div class="col-sm-6 col-md-6 col-lg-6 mt-1 mb-1">
                                                    <input type="submit" name="submit" class="btn btn-primary btn-block text-white" value="บันทึกข้อมูล">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Footer -->
                                        
                                    </div>
                                </div>
                            </form>

                            
                        </div>
                    </div>         
                </div>
                </div>
                <!-- Footer -->    
            </div>
        </div>




    <!-- Content -->




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

