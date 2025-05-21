<div class="pt-3 pb-2 mb-3 border-bottom">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
            <h4 class="h4">ข้อมูลการขายรถยนต์</h4>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
            <a href="<?php echo base_url('admin_management/car_top_add'); ?>" class="btn btn-dark btn-block">
                <i class=""></i> เพิ่มข้อมูลรถ
            </a>
        </div>
    </div>
</div>
<div class="wrap-box">
    <div class="table-responsive">
        <!-- <div style="color: red;"><br>* ถ้ายังไม่ได้อัพโหลดรูปภาพข้อมูลทั้งหมดจะไม่แสดงบนหน้าเว็บไซต์<br></div> -->
        <table id="table" class="table table-striped table-bordered" style="width:100%">
            <thead class="thead-light text-center">
                <tr>
                    <th>ลำดับ</th>
                    <th>หมายเลขรถ/รูปภาพ</th>
                    <th>ผู้เพิ่ม</th>
                    <th>ประเภทรถ</th>
                    <th>ยี่ห้อรถ</th>
                    <th>รุ่นรถ</th>
                    <th>ราคารถ</th>
                    <th>วันที่เพิ่ม</th>
                    <th>เงินดาวน์(บาท)</th>
                    <th>สถานะแสดง</th>
                    <!--  <th>สถานะรถ</th> -->
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($result as $row) {     ?>
                    <tr>
                        <td class="text-center">
                            <div class="text-center mb-3"><?php echo $i; ?></div>
                        </td>
                        <td>
                            <div class="text-center mb-3"><?php echo $row->no_car; ?></div>
                            <div class="text-center">
                                <?php
                                if ($row->thumb_name_multi == "") {
                                    echo '<img class="img-thumbnail" style="width: 50%;" alt="Thumbnail image" src="' . base_url() . 'frontend/assets/images/350x350.png">';
                                } else {
                                    echo '<img class="img-thumbnail" style="width: 50%;" alt="Thumbnail image" src="' . base_url() . 'uploads_car/' . $row->thumb_name_multi . '"  alt="Thumbnail image">';
                                }
                                ?>
                            </div>
                        </td>
                        <td><?php if ($row->id_login == 0) {
                                echo "admin";
                            } else {
                                echo $row->name_add;
                            } ?></td>
                        <td><?php echo $row->name_type; ?></td>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->name_model; ?></td>
                        <td><?php if ($row->name_price) {
                                echo @number_format($row->name_price) . ' บาท';
                            } ?></td>
                        <td><?php echo convert_time($row->created_date)?></td>
                        <td><?php echo @number_format($row->downpayment); ?></td>
                        <td>
                            <div class="text-center"><?php if ($row->status_id == 1) {
                                                            echo "<span style='color: green;' title='เปิดการใช้งาน'><i class='bx bxs-check-circle bx-sm'></i></span>";
                                                        } elseif ($row->status_id == 2) {
                                                            echo "<span style='color: red;' title='ยกเลิกการขาย'><i class='bx bxs-x-circle bx-sm'></i></span>";
                                                        } elseif ($row->status_id == 4) {
                                                            echo "<span style='color: red;' title='ปิดการขาย'><i class='bx bxs-x-circle bx-sm'></i></span>";
                                                        } elseif ($row->status_id == 3) {
                                                            echo "<span style='color: green;' title='เปิดการใช้งาน'><i class='bx bxs-check-circle bx-sm'></i></span>";
                                                        } elseif ($row->status_id == 0) {
                                                            echo "<span style='color: red;' title='รอดำเนินการ'><i class='bx bxs-x-circle bx-sm'></i></span>";
                                                        } ?></div>
                        </td>
                      
                        <td>
                            <div class="text-center">
                                <div class="btn-group" role="group">
                                    <a class="btn btn-primary" style="width: 100%;" href="<?php echo base_url('admin_management/car_top_edit/' . $row->car_top_id . '?type=' . $row->name_type . '&&car_type_id=' . $row->car_type_id . '&&brand=' . $row->name . '&&car_id=' . $row->car_id . '&&model=' . $row->name_model . '&&car_model_id=' . $row->car_model_id . '&&model_des=' . $row->name_model_des . '&&car_model_des_id=' . $row->car_model_des_id); ?>"><i class="fas fa-edit fa-md fa-fw"></i></a>
                                 
                                    <a class="btn btn-danger" style="width: 100%;" onclick="return confirm('ต้องการลบข้อมูลหรือไม่');" href="<?php echo base_url('admin_management/car_top_delete/' . $row->car_top_id); ?>"><i class="fas fa-trash fa-md fa-fw"></i></a>
                                </div>
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