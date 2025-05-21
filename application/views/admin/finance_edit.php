<div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-10 mb-2">
                <h4 class="h4">แก้ไข ไฟแนนซ์</h4>
            </div>
          
            <div class="col-sm-12 col-md-2 col-lg-2 mb-2">
               <a href="<?php echo base_url('admin_management/finance_list');?>" class="btn btn-secondary btn-block">
                    ย้อนกลับ
                </a> 
            </div>
             
            
           
            
        </div>
    </div>

    <!-- Content -->


<?php foreach ( $data as $result ) {    ?>

    <form action="<?php echo base_url('admin_management/finance_edit/'.$result->finance_id);?>" method="post">
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
                            <label>หัวข้อ&nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="title_th" type="text" class="form-control" value="<?php if(set_value("title_th")){echo set_value("title_th");}else{echo $result->title_th;}?>">
                            <?php echo form_error('title_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>

                        </div>
                       
                         <div class="form-group">
                            <label>คำอธิบาย&nbsp;<span style="color:#DC3545;">*</span></label>
                            <textarea  name="descript_th" class="form-control"><?php if(set_value("descript_th")){echo set_value("descript_th");}else{echo $result->descript_th;}?></textarea>
                           
                            <?php echo form_error('descript_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                       
                    </div>

                      <!-- Title -->
                    <div class="title">
                        <h6 class="h6">รายละเอียด&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('backend/images/english.png');?>" width=20px;></h6>
                    </div>
                    <!-- Form Input -->
                    <div class="form-input">
                      
                        <div class="form-group">
                            <label>หัวข้อ&nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="title_en" type="text" class="form-control" value="<?php if(set_value("title_en")){echo set_value("title_en");}else{echo $result->title_en;}?>">
                            <?php echo form_error('title_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                     
                         <div class="form-group">
                            <label>คำอธิบาย&nbsp;<span style="color:#DC3545;">*</span></label>
                            <textarea  name="descript_en" class="form-control"><?php if(set_value("descript_en")){echo set_value("descript_en");}else{echo $result->descript_en;}?></textarea>
                            <?php echo form_error('descript_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                       
                       
                    </div>

                      <!-- Title -->
                    <div class="title">
                        <h6 class="h6">รายละเอียด</h6>
                    </div>
                    <!-- Form Input -->
                    <div class="form-input">
                       
                       
                        <div class="form-group">
                            <label>ตำแหน่งการแสดงผล&nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="position_id" type="number" class="form-control"  pattern="\d*" value="<?php if(set_value("position_id")){echo set_value("position_id");}else{echo $result->position_id;}?>">
                            <?php echo form_error('position_id', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>สถานะการใช้งาน&nbsp;<span style="color:#DC3545;">*</span></label>
                            <select class="custom-select mr-sm-2" name="status_id">
                                <option value="" selected>==== เลือกสถานะการใช้งาน ====</option>
                                <option value="1" <?php if($result->status_id==1){echo "selected";}else{echo "";}?>>เปิดการใช้งาน</option>
                                <option value="2" <?php if($result->status_id==2){echo "selected";}else{echo "";}?>>ปิดการใช้งาน</option>
                            </select>
                        </div>
                            <?php echo form_error('status_id', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
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

