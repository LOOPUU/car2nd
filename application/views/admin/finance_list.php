<div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
                <h4 class="h4">จัดการ ไฟแนนซ์</h4>
            </div>
           
             <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
              
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
             
            </div>
           
            
        </div>
    </div>

    <!-- Content -->

    <div class="wrap-box">
        <div class="table-responsive">

            <table id="table"  class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>ตำแหน่ง</th>
                        <th>หัวข้อ<br><br><img src="<?php echo base_url('backend/images/thailand.png');?>" width=20px;></th>
                        <th>คำอธิบาย<br><br><img src="<?php echo base_url('backend/images/thailand.png');?>" width=20px;></th>
                        <th>หัวข้อ<br><br><img src="<?php echo base_url('backend/images/english.png');?>" width=20px;></th>
                        <th>คำอธิบาย<br><br><img src="<?php echo base_url('backend/images/english.png');?>" width=20px;></th>
                        <th>สถานะ</th>
                        <th>จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ( $rows as $row ) {     ?>
                        <tr>
                            <td><div class="text-center"><?php echo $row->position_id; ?></div></td>
                            <td><div class="text-center"><?php echo $row->title_th; ?></div></td>
                            <td><div class="text-center"><?php echo $row->descript_th; ?></div></td>
                            <td><div class="text-center"><?php echo $row->title_en; ?></div></td>
                            <td><div class="text-center"><?php echo $row->descript_en; ?></div></td>
                            <td><div class="text-center"><div class="text-center"><?php if($row->status_id == 1){echo "<span style='color: green;' title='เปิดการใช้งาน'><i class='bx bxs-check-circle bx-sm'></i></span>";}else{echo "<span style='color: red;' title='ปิดการใช้งาน'><i class='bx bxs-x-circle bx-sm'></i></span>";} ?></div></td>
                            <td>
                             <a class="btn btn-primary"  href="<?php echo base_url('admin_management/finance_edit/'.$row->finance_id); ?>"><i class="fas fa-edit fa-md fa-fw"></i></a>
                             <!--  <a class="btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลหรือไม่');" href="<?php echo base_url('admin_management/finance_delete/'.$row->finance_id); ?>">ลบ</a> -->
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





