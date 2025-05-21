

    <div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
           <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
                <h4 class="h4">รายละเอียดการซื้อของคุณ  <?php echo $rows['name_add'];?></h4>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
             
            </div>
             <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
              <a href="<?php echo base_url('admin_management/car_buy_list');?>" class="btn 
                <?php if($this->uri->segment(2)=="car_buy_list"){echo "btn-info";}else{echo "btn-secondary";}?> btn-block">
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
                        <h6 class="h6">รายละเอียดข้อมูลรถที่ซื้อ</h6>
                    </div>
                    <!-- Form Input -->
                    <div class="form-input">
                      
                        <div class="form-group">
                            <label>หมายเลขรถ</label>
                            <input type="text" class="form-control" value="<?php echo $rows['no_car']; ?>" disabled>  
                        </div>
                        <div class="form-group">
                            <label>ผู้ขาย</label>
                            <input type="text" class="form-control" value="<?php if($rows['id_login1']==0){echo "admin";}else{echo $rows['name_cc'];}?>" disabled>  
                        </div>
                         <div class="form-group">
                            <label>คำอธิบายการขาย</label>
                            <textarea class="form-control" disabled><?php echo $rows['descript']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>ราคารถ</label>
                            <input type="text" class="form-control" value="<?php echo $rows['price']; ?> บาท" disabled>  
                        </div>
                         <div class="form-group">
                            <label>ประเภทรถ</label>
                            <input type="text" class="form-control" value="<?php echo $rows['name_type']; ?>" disabled>  
                        </div>
                         <div class="form-group">
                            <label>ยี่ห้อรถ</label>
                            <input type="text" class="form-control" value="<?php echo $rows['name']; ?>" disabled>  
                        </div>
                         <div class="form-group">
                            <label>รุ่นรถ</label>
                            <input type="text" class="form-control" value="<?php echo $rows['name_model']; ?>" disabled>  
                        </div>
                        <div class="form-group">
                            <label>รายละเอียดรุ่นรถ</label>
                            <input type="text" class="form-control" value="<?php echo $rows['name_model_des']; ?>" disabled>  
                        </div>
                        <div class="form-group">
                            <label>สีรถ</label>
                            <input type="text" class="form-control" value="<?php echo $rows['name_color']; ?>" disabled>  
                        </div>
                        <div class="form-group">
                            <label>ระบบเกียร์</label>
                            <input type="text" class="form-control" value="<?php echo $rows['name_gear']; ?>" disabled>  
                        </div>
                        <div class="form-group">
                            <label>ระบบเครื่องยนต์</label>
                            <input type="text" class="form-control" value="<?php echo $rows['name_capacity']; ?>" disabled>  
                        </div>
                        <div class="form-group">
                            <label>ไมล์</label>
                            <input type="text" class="form-control" value="<?php echo $rows['name_mile']; ?>" disabled>  
                        </div>
                        <div class="form-group">
                            <label>อุปกรณ์</label>
                            <textarea class="form-control" disabled><?php echo $rows['device']; ?></textarea>
                        </div>
                        <!-- <div class="form-group">
                            <label>ปีที่จดทะเบียน</label>
                            <input type="text" class="form-control" value="<?php echo $rows['name_year_pro']; ?>" disabled>  
                        </div> -->
                        <div class="form-group">
                            <label>ปีที่ผลิต</label>
                            <input type="text" class="form-control" value="<?php echo $rows['name_year_regis']; ?>" disabled>  
                        </div>
                    </div>

                <div class="title">
                    <h6 class="h6">รายละเอียดไฟแนนซ์</h6>
                </div>
                       
                    <div class="form-input">
                        <div class="form-group">
                            <label>ธนาคารที่เลือก</label>
                            <input type="text" class="form-control" value="<?php echo $rows['bank_name_th']; ?>" disabled>  
                        </div>
                        <div class="form-group">
                            <label>ดอกเบี้ย</label>
                            <input type="text" class="form-control" value="<?php echo $rows['interest_rate']; ?>%" disabled>  
                        </div>
                        <div class="form-group">
                            <label>อัตราดอกเบี้ยต่อปี</label>
                            <input type="text" class="form-control" value="<?php echo $rows['interest_rate_result']; ?> บาท" disabled>  
                        </div>
                        <div class="form-group">
                            <label>จำนวนเงินดาวน์</label>
                            <input type="text" class="form-control" value="<?php echo @number_format($rows['downpayment']); ?> บาท" disabled>  
                        </div>
                        <div class="form-group">
                            <label>ระยะเวลาผ่อน</label>
                            <input type="text" class="form-control" value="<?php echo $rows['installment_period']; ?> งวด" disabled>  
                        </div>
                        <div class="form-group">
                            <label>จำนวนเงินผ่อน/เดือน</label>
                            <input type="text" class="form-control" value="<?php echo $rows['installment_amount']; ?> บาท" disabled>  
                        </div>

                        <div class="form-group">
                            <label>สถานะการซื้อ</label>
                            <form action="<?php echo base_url('admin_management/car_buy_list_save?buy_car_id='.$rows['buy_car_id'].'')?>" method="POST">
                                <select name="status" class="form-control">
                                  <option value="0" <?php if($rows['status']==0){echo "selected";}?>>เปิดการขาย</option>
                                  <option value="1" <?php if($rows['status']==1){echo "selected";}?>>ปิดการขาย</option>
                                </select>
                                <input type="hidden" name="car_top_id" value="<?php echo $rows['car_top_id'];?>">
                                <br>
                                <div class="row ghhMCK d-flex justify-content-center">
                      
                                    <div class="col-sm-6 col-md-6 col-lg-6 mt-1 mb-1">
                                        <input type="submit" name="submit" class="btn btn-primary btn-block text-white" value="บันทึกข้อมูล">
                                    </div>
                                </div>
                                
                            </form>
                        </div>

                    </div>
                       
               
        </div>


</div>        </main>
    </div>
</div>


