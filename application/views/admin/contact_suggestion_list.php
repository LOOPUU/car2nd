
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
           <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
                <h4 class="h4">ข้อเสนอแนะจากผู้ใช้</h4>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
             
            </div>
             <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
             <!--  <a href="<?php echo base_url('admin_management/contact_edit');?>" class="btn 
                <?php if($this->uri->segment(2)=="contact_edit"){echo "btn-info";}else{echo "btn-secondary";}?> btn-block">
                    ย้อนกลับ
                </a>  -->
            </div>
           
        </div>
      
    </div>

  
    <!-- Content -->

    <div class="wrap-box">
        <div class="table-responsive">

            <table id="table"  class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>ลำดับ</th>
                        <th>หัวข้อที่ต้องการติดต่อ</th>
                        <th>ชื่อ - นามสกุล</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>อีเมล</th>
                       <!--  <th>คำอธิบาย</th> -->
                        <th>ดูรายละเอียด</th>
                        <th>จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach ( $rows as $row ) {     ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->topic; ?></td>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->tel; ?></td>
                            <td><?php echo $row->email; ?></td>
                           <!--  <td><?php echo str_replace('\n', '<br>\n',  $row->description); ?></td> -->
                            <th> <a class="btn btn-primary"  style="width: 100%;" href="<?php echo base_url('admin_management/contact_suggestion_view/'.$row->suggestion_id); ?>">ดูรายละเอียด</a></th>
                            <th>
                                 <a class="btn btn-danger" style="width: 100%;" onclick="return confirm('ต้องการลบข้อมูลหรือไม่');" href="<?php echo base_url('admin_management/contact_suggestion_delete/'.$row->suggestion_id); ?>">ลบ</a>
                            </th>
                        </tr>
                       
                    <?php $no++;} ?>
             
            </table>
        </div>
    </div>

<script type="text/javascript">
    $(document).ready(function() {
     $('#table').DataTable({
         "language": {
            "url": "<?php echo base_url('backend');?>/json/thailand.json"     
    },
     "pageLength": 20,
      "order": [[ 0, "asc" ]]
    });
} );
</script>








