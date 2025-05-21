
<?php $id = $this->uri->segment(3);?>
<div class="pt-3 pb-2 mb-3 border-bottom">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8 mb-2">
            <h4 class="h4">จัดการรายละเอียดรุ่น [รุ่น <?php echo $car_model_cate['name_model_th'];?>]</h4>
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
<div class="wrap-box">
    <div class="table-responsive">
        <div class="content">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 mb-2">
                    <h6 class="h6">จัดการหมวดหมู่รถยนต์</h6>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
                    <a href="<?php echo base_url('admin_management/car_model_des_add/'.$id.'');?>" class="btn btn-dark btn-block">
                        <i class="fas fa-plus fa-fw"></i>เพิ่มรายละเอียดรุ่นรถ
                    </a>
                </div>
            </div>
        </div>
    </div>
    <table id="table"  class="table table-striped table-bordered" style="width:100%; border-top:0px solid transparent">
        <thead class="thead-light text-center" >
            <tr>
                <th>ตำแหน่งการแสดงผล</th>
                <th>ปีที่ผลิต</th>
                <th>รายละเอียดรุ่น&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('backend/images/thailand.png');?>" width=20px;></th>
                <th>รายละเอียดรุ่น&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('backend/images/english.png');?>" width=20px;></th>   
                <th>สถานะการใช้งาน</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ( $result as $row ) {     ?>
                <tr>
                    <td class="text-center"><?php echo $row->position_id; ?></td>
                    <td class="text-center"><?php echo $row->name_year_pro; ?></td>
                    <td class="text-center"><?php echo $row->name_model_des_th; ?></td>
                    <td class="text-center"><?php echo $row->name_model_des_en; ?></td>
                    <td class="text-center">
                        <?php if($row->status_id == 1){
                            echo "<span style='color: green;' title='เปิดการใช้งาน'><i class='bx bxs-check-circle bx-sm'></i></span>";
                        }else{
                            echo "<span style='color: red;' title='ปิดการใช้งาน'><i class='bx bxs-x-circle bx-sm'></i></span>";} ?>
                    </td>
                    <td class="text-center">
                        <div class="btn-group btn-group-toggle">
                            <a class="btn btn-primary"  href="<?php echo base_url('admin_management/car_model_des_edit/'.$row->car_model_des_id.'/'.$id); ?>"><i class="fas fa-edit fa-md fa-fw"></i></a>
                            <a class="btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลหรือไม่');" href="<?php echo base_url('admin_management/car_model_des_delete/'.$row->car_model_des_id.'/'.$id); ?>"><i class="fas fa-trash fa-md fa-fw"></i></a>
                        </div>
                    </td>
                </tr> 
            <?php } ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function() {
     $('#table').DataTable({
        "language": {
            "url": "<?php echo base_url('backend');?>/json/thailand.json"     
    },
     "pageLength": 10,
     "lengthChange": [10]
    });
} );
</script>







