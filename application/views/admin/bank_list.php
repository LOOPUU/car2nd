

<div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 mb-2">
                <h4 class="h4">จัดการธนาคาร/ดอกเบี้ย</h4>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 mb-2" >
                <a href="<?php echo base_url('admin_management/bank_add');?>" class="btn btn-dark btn-block">
                     <i class="fas fa-plus fa-fw"></i>เพิ่มธนาคาร/ดอกเบี้ย
                </a>
            </div>
           
        </div>
       
   
    <div class="wrap-box">
        <div class="table-responsive">

            <table id="table"  class="table table-striped table-bordered" style="width:100%">

                     <thead class="thead-light text-center">
                      <tr>
                        <th>ตำแหน่ง</th>
                        <th>รูปภาพ</th>
                        <th>ชื่อธนาคาร&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('backend/images/thailand.png');?>" width=20px;></th>
                       <!--  <th>ชื่อธนาคาร&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('backend/images/english.png');?>" width=20px;></th> -->
                        <th>ดอกเบี้ย 4 ปี</th>
                        <th>ดอกเบี้ย 5 ปี</th>
                        <th>ดอกเบี้ย 6 ปี</th> 
                        <th>ดอกเบี้ย 7 ปี</th>  
                        <th>สถานะการใช้งาน</th>
                        <th>จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ( $result as $row ) {     ?>
                        <tr>
                            <td><div class="text-center"><?php echo $row->position_id; ?></div></td>
                            <td>
                                <div class="text-center">
                                 <?php
                                   
                                    if($row->img==""){
                                         echo '<img class="img-thumbnail" width="150px" alt="Thumbnail image" src="'.base_url().'backend/images/noimage100.gif">';
                                    }else{
                                         echo '<img class="img-thumbnail" width="150px" alt="Thumbnail image" src="'.base_url().'uploads/'.$row->img.'"  alt="Thumbnail image">';
                                    }

                                  ?>
                                </div>
                            </td>
                            <td><?php echo $row->bank_name_th; ?></td>
                            <td><?php echo $row->four_year; ?></td>
                            <td><?php echo $row->five_year; ?></td>
                            <td><?php echo $row->six_year; ?></td>
                            <td><?php echo $row->seven_year; ?></td>
                            <td><div class="text-center"><?php if($row->status_id == 1){echo "<span style='color: green;' title='เปิดการใช้งาน'><i class='bx bxs-check-circle bx-sm'></i></span>";}else{echo "<span style='color: red;' title='ปิดการใช้งาน'><i class='bx bxs-x-circle bx-sm'></i></span>";} ?></div></td>
                           
                            <td>

                                <div class="text-center">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-primary" style="width: 100%;" href="<?php echo base_url('admin_management/bank_edit/'.$row->bank_id); ?>">แก้ไข</a>
                                        <!-- <a class="btn btn-info" style="width: 100%;" href="<?php echo base_url('admin_management/bank_edit_image/'.$row->bank_id.'/01'); ?>">รูปภาพ</a> -->
                                        <a class="btn btn-danger" style="width: 100%;" onclick="return confirm('ต้องการลบข้อมูลหรือไม่');" href="<?php echo base_url('admin_management/bank_delete/'.$row->bank_id); ?>">ลบ</a>
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
     "lengthChange": false,
     searching: false
    });
} );
</script>







