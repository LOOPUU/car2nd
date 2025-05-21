
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-10 mb-2">
                <h4 class="h4">ตั้งค่าสิทธิ์ผู้ดูแลระบบ</h4>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2 mb-2">
               <a href="<?php echo base_url('admin_management/admin_list');?>" class="btn btn-secondary btn-block">
                    ย้อนกลับ
                </a> 
            </div>
        </div>
    </div>

    <!-- Content -->


<?php foreach ( $data as $result ) {    ?>


<form action="<?php echo base_url('admin_management/admin_setting/'.$result->id);?>" method="post">

         <div class="wrap-box">
            <div class="table-responsive">
                <table   class="table table-striped table-bordered" style="width:100%">
                    <thead class="thead-light text-center">
                        <tr>
                            <th>ระบบพื้นฐาน</th>
                            <th>ระบบหลัก</th>
                            <th>ฐานข้อมูลระบบ</th>
                            <th>จัดการรถยนต์</th>
                            <th>จัดการไฟแนนซ์</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <label><span><input name="setting_edit" type="checkbox"  value="1" <?php if($result->setting_edit==1){echo "checked";}?>>  จัดการเว็บไซต์</span></label>
                            </td>
                            <td>
                                <label><span><input name="menu_list" type="checkbox"  value="1" <?php if($result->menu_list==1){echo "checked";}?>>  จัดการแถบเมนู</span></label>
                            </td>
                            <td>
                                 <label><span><input name="member_list" type="checkbox"  value="1" <?php if($result->member_list==1){echo "checked";}?>>  ข้อมูลสมาชิก </span></label>
                            </td>
                            <td>
                                 <label><span><input name="car_type_list" type="checkbox"  value="1" <?php if($result->car_type_list==1){echo "checked";}?>>  จัดการหมวดหมู่รถยนต์ </span></label>
                            </td>
                            <td>
                                <label><span><input name="finance_list" type="checkbox"  value="1" <?php if($result->finance_list==1){echo "checked";}?>>  จัดการไฟแนนซ์</span></label>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <label><span><input name="banner_multi" type="checkbox"  value="1" <?php if($result->banner_multi==1){echo "checked";}?>>  จัดการแบนเนอร์</span></label>
                            </td>
                            <td>
                                <label><span><input name="car_top_list" type="checkbox"  value="1" <?php if($result->car_top_list==1){echo "checked";}?>>  ข้อมูลการขายรถยนต์ </span></label>
                            </td>
                            <td>
                                 <label><span><input name="car_price_list" type="checkbox"  value="1" <?php if($result->car_price_list==1){echo "checked";}?>>  จัดการราคารถยนต์ </span></label>
                            </td>
                            <td>
                                <label><span><input name="bank_list" type="checkbox"  value="1" <?php if($result->bank_list==1){echo "checked";}?>>  จัดการข้อมูลธนาคาร </span></label>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <label><span><input name="about_edit" type="checkbox"  value="1" <?php if($result->about_edit==1){echo "checked";}?>>  จัดการเกี่ยวกับเรา</span></label>
                            </td>
                            <td>
                                <label><span><input name="car_buy_list" type="checkbox"  value="1" <?php if($result->car_buy_list==1){echo "checked";}?>>  ข้อมูลการซื้อรถยนต์ </span></label>
                            </td>
                            <td>
                                <label><span><input name="car_year_list" type="checkbox"  value="1" <?php if($result->car_year_list==1){echo "checked";}?>>  จัดการปีผลิต/จดทะเบียน </span></label>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <label><span><input name="news_list" type="checkbox"  value="1" <?php if($result->news_list==1){echo "checked";}?>>  จัดการข่าวสาร</span></label>
                            </td>
                            <td></td>
                            <td>
                                <label><span><input name="car_color_list" type="checkbox"  value="1" <?php if($result->car_color_list==1){echo "checked";}?>>  จัดการสีรถยนต์ </span></label>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <label><span><input name="contact_edit" type="checkbox"  value="1" <?php if($result->contact_edit==1){echo "checked";}?>>  จัดการผู้ติดต่อ</span></label>
                            </td>
                            <td></td>
                            <td>
                                <label><span><input name="car_gear_list" type="checkbox"  value="1" <?php if($result->car_gear_list==1){echo "checked";}?>>  จัดการระบบเกียร์</span></label>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                 <label><span><input name="adv_list" type="checkbox"  value="1" <?php if($result->adv_list==1){echo "checked";}?>>  จัดการโฆษณา</span></label>
                            </td>
                            <td></td>
                            <td>
                                <label><span><input name="car_mile_list" type="checkbox"  value="1" <?php if($result->car_mile_list==1){echo "checked";}?>>  จัดการเลขไมล์</span></label>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <label><span><input name="car_capacity_list" type="checkbox"  value="1" <?php if($result->car_capacity_list==1){echo "checked";}?>>  จัดการความจุเครื่อง</span></label>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <label><span><input name="car_device_list" type="checkbox"  value="1" <?php if($result->car_device_list==1){echo "checked";}?>>  จัดการอุปกรณ์รถยนต์</span></label>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="footer pb-3">
            <div class="row ghhMCK d-flex justify-content-center">  
                <div class="col-sm-6 col-md-6 col-lg-6 mt-1 mb-1">
                    <input type="submit" name="submit" class="btn btn-primary btn-block text-white" value="บันทึกข้อมูล">
                </div>
            </div>
        </div>

    
</form>

<?php }?>



</div>        
</main>
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



<script type="text/javascript">
    $(document).ready(function() {
     $('#table').DataTable({
         "language": {
            "url": "<?php echo base_url('backend');?>/json/thailand.json"     
    },
    "pageLength": 10,
     "lengthChange": [10],

      "order": [[ 0, "desc" ]],
      "lengthChange": false,
      searching: false,
      "bPaginate": false,
       "bInfo": false, // hide showing entries
    });
} );
</script>


