<div class="pt-3 pb-2 mb-3 border-bottom">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
            <h4 class="h4">จัดการข่าวสาร</h4>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3 mb-2">

        </div>
        <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
            <a href="<?php echo base_url('admin_management/news_add'); ?>" class="btn btn-dark btn-block">
                <i class="fas fa-plus fa-fw"></i> เพิ่มข่าวสาร
            </a>
        </div>
    </div>
</div>

<!-- Content -->

<div class="wrap-box">
    <div class="table-responsive">

        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="text-center">ตำแหน่ง</th>
                    <th class="text-center">รูปภาพ</th>
                    <th class="text-center">หัวข้อ&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('backend/images/thailand.png'); ?>" width=20px;></th>
                    <th class="text-center">วันที่เพิ่ม</th>
                    <th class="text-center">สถานะการใช้งาน</th>
                    <th class="text-center">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($rows as $row) :   ?>
                    <tr>
                        <td>
                            <div class="text-center"><?php echo $row->position_id; ?></div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php

                                if ($row->img == "") {
                                    echo '<img class="img-thumbnail" width="150px" alt="Thumbnail image" src="' . base_url() . 'backend/images/noimage100.gif">';
                                } else {
                                    echo '<img class="img-thumbnail" width="150px" alt="Thumbnail image" src="' . base_url() . 'uploads/' . $row->img . '"  alt="Thumbnail image">';
                                }

                                ?>
                            </div>
                        </td>
                        <td><?php echo $row->title_th; ?></td>
                        <td><?php echo convert_time($row->created_date)?></td>
                        <td>
                            <div class="text-center"><?php if ($row->status_id == 1) {
                                                            echo "<span style='color: green;' title='เปิดการใช้งาน'><i class='bx bxs-check-circle bx-sm'></i></span>";
                                                        } else {
                                                            echo "<span style='color: red;' title='ปิดการใช้งาน'><i class='bx bxs-x-circle bx-sm'></i></span>";
                                                        } ?></div>
                        </td>
                        <td>
                            <div class="text-center">
                                <div class="btn-group" role="group">
                                    <a class="btn btn-primary" style="width: 100%;" href="<?php echo base_url('admin_management/news_edit/' . $row->news_id); ?>">แก้ไข</a>
                                    <!--  <a class="btn btn-info" style="width: 100%;" href="<?php echo base_url('admin_management/news_edit_image/' . $row->news_id . '/01'); ?>">รูปภาพ</a> -->
                                    <a class="btn btn-danger" style="width: 100%;" onclick="return confirm('ต้องการลบข้อมูลหรือไม่');" href="<?php echo base_url('admin_management/news_delete/' . $row->news_id); ?>">ลบ</a>
                                </div>
                            </div>
                        </td>

                    </tr>

                    <?php $no++;
                endforeach; ?>

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
            "lengthChange": false,
            searching: false,
            "order": [
                [0, "desc"]
            ]
        });
    });
</script>