<div class="pt-3 pb-2 mb-3 border-bottom">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
      <h4 class="h4">ข้อมูลการซื้อรถยนต์</h4>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
    </div>
    <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
    </div>
  </div>
</div>
<div class="wrap-box">
  <div class="table-responsive">

    <table id="table" class="table table-striped table-bordered" style="width:100%">

      <thead class="thead-light text-center">
        <tr>
          <th>ลำดับ</th>
          <th>หมายเลขรถ/รูปภาพ</th>
          <th>ผู้ขาย</th>
          <th>ผู้ซื้อ</th>
          <th>ประเภทรถ</th>
          <th>ยี่ห้อรถ</th>
          <th>รุ่นรถ</th>
          <th>ราคารถ</th>
          <th>วันที่ซื้อ</th>
          <th>สถานะการซื้อ</th>
          <th>จัดการ</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1;
        foreach ($result as $row) {     ?>
          <tr>
            <td class="text-center"><?php echo $i; ?></td>
            <td class="text-center">
              <?php echo '<b>' . $row->no_car . '</b>'; ?><br><br>
              <?php
              if ($row->thumb_name_multi == "") {
                echo '<img width="150px" alt="Thumbnail image" src="' . base_url() . 'frontend/assets/images/350x350.png">';
              } else {
                echo '<img width="150px" alt="Thumbnail image" src="' . base_url() . 'uploads_car/' . $row->thumb_name_multi . '"  alt="Thumbnail image">';
              }
              ?>
            </td>
            <td><?php if ($row->id_login1 == 0) {
                  echo "admin";
                } else {
                  echo $row->name_cc;
                } ?></td>
            <td><a href="<?php echo base_url('admin_management/member_edit/' . $row->id_login2 . '') ?>"><?php echo $row->name2; ?></a></td>
            <td><?php echo $row->name_type; ?></td>
            <td><?php echo $row->name; ?></td>
            <td><?php echo $row->name_model; ?></td>
            <td><?php if ($row->name_price) {
                  echo @number_format($row->price) . ' บาท';
                } ?></td>
            <td class="text-center"><?php echo convert_time($row->created_date)?></td>
            <td>
              <div class="text-center"><?php if ($row->status == 1) {
                                          echo "<span style='color: red;' title='เปิด'><i class='bx bxs-x-circle bx-sm'></i></span>";
                                        } else {
                                          echo "<span style='color:   green;' title='ปิด'><i class='bx bxs-check-circle bx-sm'></i></span>";
                                        } ?></div>
            </td>
            <td>
              <div class="btn-group" role="group">
                <a class="btn btn-primary" href="<?php echo base_url('admin_management/car_buy_view/' . $row->buy_car_id); ?>"><i class="fas fa-edit fa-md fa-fw"></i></a>
                <a class="btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลหรือไม่');" href="<?php echo base_url('admin_management/car_buy_delete/' . $row->buy_car_id); ?>"><i class="fas fa-trash fa-md fa-fw"></i></a>
                <!--  <a class="btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลหรือไม่');" href="<?php echo base_url('admin_management/car_buy_delete/' . $row->buy_car_id); ?>">ลบ</a> -->
              </div>
              <!--   <a class="btn btn-primary" style="width: 100%;" href="<?php echo base_url('admin_management/car_buy_view/' . $row->buy_car_id); ?>">ดูรายละเอียด</a> -->
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