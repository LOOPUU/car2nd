

<div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 mb-2">
                <h4 class="h4">จัดการเลขไมล์</h4>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 mb-2" >
                <a href="<?php echo base_url('admin_management/car_mile_add');?>" class="btn btn-dark btn-block">
                     <i class="fas fa-plus fa-fw"></i>เพิ่มเลขไมล์
                </a>
            </div>
           
        </div>
       
   
    <div class="wrap-box">
        <div class="table-responsive">

            <table id="table"  class="table table-striped table-bordered" style="width:100%">

                     <thead class="thead-light text-center">
                      <tr>
                        <th>ตำแหน่ง</th>
                        <th>เลขไมล์</th>
                        <th>สถานะการใช้งาน</th>
                        <th>จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ( $result as $row ) {     ?>
                        <tr>
                            <td class="text-center"><?php echo $row->position_id; ?></td>
                            <td>
                                <?php if($row->name_mile_min!==""){?>
                                    ระหว่าง <?php echo $row->name_mile_min; ?> กม. ถึง <?php echo $row->name_mile_max; ?> กม.
                                <?php }?>
                            </td>
                            <td><div class="text-center"><?php if($row->status_id == 1){echo "<span style='color: green;' title='เปิดการใช้งาน'><i class='bx bxs-check-circle bx-sm'></i></span>";}else{echo "<span style='color: red;' title='ปิดการใช้งาน'><i class='bx bxs-x-circle bx-sm'></i></span>";} ?></div></td>
                            <td class="text-center">
                                <a class="btn btn-primary"  href="<?php echo base_url('admin_management/car_mile_edit/'.$row->car_mile_id); ?>">แก้ไข</a>
                                <a class="btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลหรือไม่');" href="<?php echo base_url('admin_management/car_mile_delete/'.$row->car_mile_id); ?>">ลบ</a>
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







