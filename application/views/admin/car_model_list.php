
<?php $id = $this->uri->segment(3);?>
<div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 mb-2">
                <h4 class="h4">จัดการรุ่นรถ [ยี่ห้อ <?php echo $car_cate['name_th'];?>]</h4>
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
                    <a class="bt" href="<?php echo base_url('admin_management/car_list/'.$car_cate['car_type_id']);?>">
                        <div class="button text-center">
                            <p style="color:#02507E;font-weight: bold;">STEP 2<br /><br />ยี่ห้อรถ</p>
                        </div>
                    </a>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-3 mb-3" <?php if($this->uri->segment(2)=="car_model_list" 
                        OR $this->uri->segment(2)=="car_model_add"
                        OR $this->uri->segment(2)=="car_model_edit"){echo 'id="color-link"';}?>>
                    <a class="bt" href="<?php echo base_url('admin_management/car_model_list/'.$id);?>">
                        <div class="button text-center" style="background-color: #02507E;color: #F5F5F5;">
                            <p>STEP 3<br /><br />รุ่นรถ</p>
                        </div>
                    </a>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-3 mb-3" id="color-link1">
                    <a class="bt" id="no-link">
                        <div class="button text-center" style="border: none;">
                            <p>STEP 4<br /><br />รายละเอียดรุ่นรถ</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

        
   
    <div class="wrap-box">
        <div class="table-responsive">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 mb-2">
                        <h6 class="h6">จัดการหมวดหมู่รถยนต์</h6>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
                    <a href="<?php echo base_url('admin_management/car_model_add/'.$id.'');?>" class="btn btn-dark btn-block">
                            <i class="fas fa-plus fa-fw"></i>เพิ่มรุ่นรถ
                        </a>
                    </div>
                </div>
            </div>
            <table id="table"  class="table table-striped table-bordered" style="width:100%; border-top:0px solid transparent">
                     <thead class="thead-light text-center" >
                      
                      <tr>
                        <th>ตำแหน่งการแสดงผล</th>
                        <th>รุ่นรถ&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('backend/images/thailand.png');?>" width=20px;></th>
                        <th>รุ่นรถ&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('backend/images/english.png');?>" width=20px;></th>   
                        <th>สถานะการใช้งาน</th>
                        <th>จัดการรายการ</th>
                        <th>จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ( $result as $row ) {     ?>
                        <tr>
                            <td><div class="text-center"><?php echo $row->position_id; ?></div></td>
                            <td><div class="text-center"><?php echo $row->name_model_th; ?></div></td>
                            <td><div class="text-center"><?php echo $row->name_model_en; ?></div></td>
                            <td><div class="text-center"><?php if($row->status_id == 1){echo "<div class='open'><p>เปิด</p></div>";}else{echo "<div class='close1'><p>ปิด</p></div>";} ?></div></td>
                            <td>
                                <div class="text-center">
                                    <a class="btn btn-info" style="width: 100%;" href="<?php echo base_url('admin_management/car_model_des_list/'.$row->car_model_id); ?>"><i class="fas fa-plus fa-fw"></i>รายละเอียดรุ่นรถ</a>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <div class="btn-group btn-group-toggle">
                                        <a class="btn btn-primary"  href="<?php echo base_url('admin_management/car_model_edit/'.$row->car_model_id.'/'.$id); ?>"><i class="fas fa-edit fa-md fa-fw"></i></a>
                                        <a class="btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลหรือไม่');" href="<?php echo base_url('admin_management/car_model_delete/'.$row->car_model_id.'/'.$id); ?>"><i class="fas fa-trash fa-md fa-fw"></i></a>
                                    </div>
                                </div>
                            </td>

                        </tr>
                       
                    <?php } ?>
             
            </table>
        </div>
    </div>


<script type="text/javascript">
    $(document).ready(function() {
     $('#table').DataTable({
         "language": {
            "url": "<?php echo base_url('backend');?>/json/thailand.json"     
    },
     "pageLength": 10,
     "lengthChange": [10]
     // "lengthChange": false,
     // searching: false,

    });
} );
</script>


