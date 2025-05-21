  <?php $suggestion_id = $this->uri->segment(3);?>

    <div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
           <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
                <h4 class="h4">ข้อเสนอแนะจากผู้ใช้(รายละเอียด)</h4>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
             
            </div>
             <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
              <a href="<?php echo base_url('admin_management/contact_suggestion_list');?>" class="btn 
                <?php if($this->uri->segment(2)=="contact_suggestion_list"){echo "btn-info";}else{echo "btn-secondary";}?> btn-block">
                    ย้อนกลับ
                </a> 
            </div>
           
        </div>
      
    </div>

  

    <!-- Content -->




        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="wrap-box">
                    <!-- Title -->
                    <div class="title">
                        <h6 class="h6">รายละเอียด</h6>
                    </div>
                    <!-- Form Input -->
                    <div class="form-input">
                        <!-- <div class="form-group">
                            <label>ผู้ใช้กรอกภาษา</label>
                            <input type="text" class="form-control" value="<?php if($rows['lang']=="TH"){echo "ภาษาไทย";}else{echo "ภาษาอังกฤษ";} ?>" disabled>  
                        </div> -->
                        <div class="form-group">
                            <label>หัวข้อคำเสนอแนะ</label>
                            <input type="text" class="form-control" value="<?php echo $rows['topic']; ?>" disabled>  
                        </div>
                         <div class="form-group">
                            <label>ชื่อ - นามสกุล</label>
                            <input type="text" class="form-control" value="<?php echo $rows['name']; ?>" disabled>  
                        </div>
                        <div class="form-group">
                            <label>เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" value="<?php echo $rows['tel']; ?>" disabled>  
                        </div>
                        <div class="form-group">
                            <label>อีเมล</label>
                            <input type="text" class="form-control" value="<?php echo $rows['email']; ?>" disabled>  
                        </div>
                        <div class="form-group">
                            <label>คำอธิบาย</label>
                            <textarea class="form-control" style="height: 300px;" disabled><?php echo $rows['description']; ?></textarea> 
                        </div>
                    </div>
               
        </div>


</div>        </main>
    </div>
</div>


