<div class="pt-3 pb-2 mb-3 border-bottom">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
            <h4 class="h4">ข้อมูลสมาชิก</h4>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
            <a href="<?php echo base_url('admin_management/member_add'); ?>" class="btn btn-dark btn-block">
                <i class="fas fa-plus fa-fw"></i> เพิ่มสมาชิก
            </a>
        </div>
    </div>
</div>
<div class="wrap-box">
    <div class="table-responsive">

        <table id="table" class="table table-striped table-bordered" style="width:100%">

            <thead class="thead-light text-center">
                <tr>
                    <th>ลำดับ</th>
                    <th>รูปโปรไฟล์</th>
                    <th>ชื่อสมาชิก</th>
                    <th>อีเมล</th>
                    <th>เบอร์</th>
                    <th>วันที่สมัคร</th>
                    <th>สถานะ</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($result as $row) {     ?>
                    <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td style="width:100px;">
                            <a href="<?php echo base_url().'uploads/'.$row->img;?>" target="_blank">
                            <?php
                            if($row->img==""){
                                echo '<img class="img-thumbnail" id="blah" style="width:100%;" alt="Thumbnail image" src="'.base_url().'backend/images/noimage100.gif">';
                            }else{
                                echo '<img class="img-thumbnail" id="blah" style="width:100%;" alt="Thumbnail image" src="'.base_url().'uploads/'.$row->img.'"  alt="image">';
                            }
                            ?> 
                            </a>  
                        </td>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td><?php echo $row->tel; ?></td>
                        <td><?php echo convert_time($row->created_date); ?></td>
                        <td><?php if ($row->email_confirm == 1) {
                                echo "<div style='color:green;'>ยืนยันอีเมลแล้ว</div>";
                            } else {
                                echo "<div style='color:red;'>รอการยืนยันอีเมล</div>";
                            } ?></td>
                        <td>
                        <div class="btn-group" role="group">
                            <a class="btn btn-primary" style="width: 100%;" href="<?php echo base_url('admin_management/member_edit/' . $row->id); ?>"><i class="fas fa-edit fa-md fa-fw"></i></a>

                            <!-- <a class="btn btn-danger" style="width: 100%;" onclick="return confirm('ต้องการลบข้อมูลหรือไม่');" href="<?php echo base_url('admin_management/member_delete/' . $row->id); ?>"><i class="fas fa-trash fa-md fa-fw"></i></a> -->
                        </div>
                        </td>
                    </tr>
                    <?php $i++;
                } ?>
        </table>
    </div>
</div>
<?php
function convert_time($date)
{
    $t = date("g:i a", strtotime($date));
    $d = substr($date, 8, -9);
    $m = substr($date, 5, -12);
    $y = substr($date, 0, 4);
    $date_new = $d . "/" . $m . "/" . $y . "<br>" . "[" . $t . "]";
    return $date_new;
} ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable({
            "language": {
                "url": "<?php echo base_url('backend'); ?>/json/thailand.json"
            },
            "pageLength": 10,
            "lengthChange": [10],

            "order": [
                [0, "asc"]
            ]
        });
    });
</script>