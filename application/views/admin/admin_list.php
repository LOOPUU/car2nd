



<div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
                <h4 class="h4">จัดการผู้ดูแลระบบ</h4>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
               
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
             
               <a href="<?php echo base_url('admin_management/admin_add');?>" class="btn btn-dark btn-block">
                    <i class="fas fa-plus fa-fw"></i> เพิ่มผู้ดูแลระบบ
                </a>
        
            </div>
        </div>
    </div>


   
    <div class="wrap-box">
        <div class="table-responsive">

            <table id="table"  class="table table-striped table-bordered" style="width:100%">

                     <thead class="thead-light text-center">
                      <tr>
                        <th>ชื่อผู้ใช้</th>
                        <th>อีเมล</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ( $result as $row ) {     ?>
                        <tr>
                            <td><div class="text-center"><?php echo $row->user; ?></div></td>
                            <td><div class="text-center"><?php echo $row->email; ?></div></td>
                            <td><div class="text-center"><?php echo $row->tel; ?></div></td>
                            <td>
                                <div class="text-center">
                                <div class="btn-group" role="group">
                                     
                                    <?php if($row->id!=1){?>
                                    <a class="btn btn-info" style="width: 100%;"  href="<?php echo base_url('admin_management/admin_setting/'.$row->id);?>">ตั้งค่าสิทธิ์</a> 
                                    <?php }?>

                                    <a class="btn btn-primary"  style="width: 100%;" href="<?php echo base_url('admin_management/admin_edit/'.$row->id); ?>"><i class="fas fa-edit fa-md fa-fw"></i></a>
                                 
                                   
                                   <?php if($row->id!=1){?>
                                    <a class="btn btn-danger" style="width: 100%;" onclick="return confirm('ต้องการลบข้อมูลหรือไม่');" href="<?php echo base_url('admin_management/admin_delete/'.$row->id);?>"><i class="fas fa-trash fa-md fa-fw"></i></a>
                                    <?php }?>
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
     searching: false,
    "order": [[ 0, "asc" ]]
    });
} );
</script>






