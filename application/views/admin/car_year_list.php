
<div class="pt-3 pb-2 mb-3 border-bottom">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8 mb-2">
            <h4 class="h4">จัดการปีผลิตรถ</h4>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 mb-2" >
            <a href="<?php echo base_url('admin_management/car_year_add');?>" class="btn btn-dark btn-block">
                <i class="fas fa-plus fa-fw"></i>เพิ่มปีผลิตรถ
            </a>
        </div>
    </div>
</div>    
<div class="wrap-box">
    <div class="table-responsive">
        <table id="table"  class="table table-striped table-bordered" style="width:100%">
            <thead class="thead-light text-center">
                <tr>
                    <th>ตำแหน่ง</th>
                    <th>ปีผลิต</th>
                    <th>สถานะการใช้งาน</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach ( $result as $row ) { ?>
                <tr>
                    <td class="text-center"><?php echo $i; ?></td>
                    <td class="text-center">
                        <?php if($row->name_year_min!==""){ ?>
                            <?php echo $row->name_year_min; ?>
                        <?php } ?>
                    </td>
                    <td>
                        <div class="text-center">
                            <?php if($row->status_id == 1){
                                echo "<span style='color: green;' title='เปิดการใช้งาน'><i class='bx bxs-check-circle bx-sm'></i></span>";
                            }else{
                                echo "<span style='color: red;' title='ปิดการใช้งาน'><i class='bx bxs-x-circle bx-sm'></i></span>";
                            } ?>   
                        </div>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-primary"  href="<?php echo base_url('admin_management/car_year_edit/'.$row->car_year_id); ?>">แก้ไข</a>
                        <a class="btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลหรือไม่');" href="<?php echo base_url('admin_management/car_year_delete/'.$row->car_year_id); ?>">ลบ</a>
                    </td>
                </tr>
            <?php $i++;} ?>
            </tbody>
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
     searching: false,
      "order": [[ 0, "asc" ]]
    });
} );
</script>







