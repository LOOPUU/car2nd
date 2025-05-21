<div class="pt-3 pb-2 mb-3 border-bottom">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8 mb-2">
            <h4 class="h4">จัดการโฆษณา</h4>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
            <a href="<?php echo base_url('admin_management/adv_add'); ?>" class="btn btn-dark btn-block">
                <i class="fas fa-plus fa-fw"></i>เพิ่มโฆษณา
            </a>
        </div>
    </div>
    <div class="wrap-box">
        <div class="table-responsive">

            <table id="table" class="table table-striped table-bordered" style="width:100%">

                <thead class="thead-light text-center">
                    <tr>
                        <th>ตำแหน่ง</th>
                        <th>รูปภาพ</th>
                        <th>วันที่เพิ่ม</th>
                        <th>สถานะการใช้งาน</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n = 1;
                    foreach ($data as $row) {     ?>
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
                                        <a class="btn btn-primary" style="width: 100%;" href="<?php echo base_url('admin_management/adv_edit?adv_id=' . $row->adv_id); ?>">แก้ไข</a>

                                        <a class="btn btn-danger" style="width: 100%;" onclick="return confirm('ต้องการลบข้อมูลหรือไม่');" href="<?php echo base_url('admin_management/adv_delete?adv_id=' . $row->adv_id); ?>">ลบ</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php $n++;
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
                "lengthChange": false,
                searching: false,
                "order": [
                    [0, "desc"]
                ]
            });
        });
    </script>