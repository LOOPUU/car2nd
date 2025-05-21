
<?php $id = $this->uri->segment(3);?>

<style type="text/css">
  img{
   max-width:180px;
  }
  input[type=file]{
    padding:10px;
    background:#2d2d2d;}
</style>

    <div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
                <h4 class="h4">จัดการแบนเนอร์</h4>
            </div>   
        </div>
    </div>
    
    <!-- Content -->

   <?php echo form_open_multipart('admin_management/banner_upload_image_multi/1/'.$this->uri->segment(4).'');?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="wrap-box">
                    <!-- Title -->
                    <div class="title">
                        <h6 class="h6">กรุณาเลือกรูปภาพ</h6>
                    </div>
                    <!-- Form Input -->
                    <div class="form-input">
                        <div class="form-group">

                                <div class="mb-3">
                                  <img id="output" style="width:15%;"/>

                                <?php if($tn){

                                    echo '<img class="img-thumbnail" style="width:30%;" alt="Thumbnail image" src="'. base_url().'uploads/'.$tn.'" >';

                                } ?>
                                </div>
                               <div style="color:red;"><?php echo $error;?></div>
                               <div class="custom-file">
                                <input type="file" name="userfile" accept="image/*" onchange="loadFile(event)" id="customFile" size="20" class="custom-file-input" onchange="readURL(this);" >
                                <label class="custom-file-label" for="customFile">คลิกเลือกรูปภาพ</label>
                               </div>
                              <div class="mt-3">
                               <p>รองรับไฟล์ภาพนามสกุล jpg  , png , jpeg</p>
                               <p>อัพโหลดไฟล์ภาพได้สูงสุด 5MB</p>
                               <p>ขนาด 1600x450 พิกเซล</p>
                             </div>
                              <input type="hidden" name="id_image" value="<?php if($id_image) echo $id_image ?>" />
                              <input type="hidden" name="num" value="<?php echo $num; ?>" />
                              <input type="hidden" name="gallery_id" value="<?php echo $this->uri->segment(4); ?>" />
                              <input type="hidden" name="id_image_multi" value="<?php if($id_image_multi) echo $id_image_multi; ?>" />
                              <input type="hidden" name="banner_id" value="<?php echo $id; ?>" ><div style="color:red;"></div>
    
                        </div>
                    </div>
                     <div class="footer pb-3">
                    <div class="row ghhMCK d-flex justify-content-center">
                    <?php if(!empty($this->uri->segment(5))){?>
                       
                        <div class="col-sm-6 col-md-6 col-lg-6 mt-1 mb-1">
                            <input type="submit" name="submit" class="btn btn-primary btn-block text-white" value="บันทึกข้อมูล">
                        </div>
                         <div class="col-sm-12 col-md-6 col-lg-6 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/banner_multi/1/1/'); ?>" class="btn btn-secondary btn-block text-white">ยกเลิก</a>
                        </div>
                    <?php }else{?>

                        <div class="col-sm-4 col-md-4 col-lg-4 mt-1 mb-1">
                            <input type="submit" name="submit" class="btn btn-primary btn-block text-white" value="เพิ่มรูปภาพ">
                        </div>
                    <?php }?>
                    </div>
                    </div>
                </div>
                </div>
                <!-- Footer -->
                
                
            </div>
        </div>
    <?php echo form_close(); ?>

    <br><br><br>
    <div class="title">
      <h6 class="h6">กรุณาเลือกหน้า/สถานะ</h6>
    </div>
    <br>
    <div class="wrap-box">
        <div class="table-responsive">

            <table id="table"  class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                          <th class="text-center">ลำดับ</th>
                          <th class="text-center">รูปภาพ</th>
                          <th class="text-center">วันที่เพิ่มรูปภาพ</th>
                          <th class="text-center">หน้า</th>
                          <th class="text-center">สถานะ</th>
                          <th class="text-center">จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php $no=1; foreach ($query as $row): ?>
     
                      <tr id="<?php echo $row->id_image_multi; ?>">
                       
                        <td><div class="text-center"><?php echo $no; ?></div></td>
                       
                        <td>
                            <div class="text-center">
                                <?php
                                    if($row->thumb_name_multi==""){
                                    echo "<img class='img-thumbnail' src=".base_url('image/noimage100.gif')." style='width: 200px;'> ";
                                    }elseif($row->thumb_name_multi!==""){
                                    echo "<img class='img-thumbnail' src=".base_url('uploads/'.$row->thumb_name_multi.'')." style='width: 200px;'/> ";
                                    }
                                ?>
                            </div>
                        </td>
                        <td><div class="text-center"><?php echo convert_time($row->upload_date)?></div></td>

                        <form action="<?php echo base_url('admin_management/banner_edit_check/'.$row->id_image_multi.'');?>" method="POST">
                        <td>
                                <select name="page" class="form-control" id="page<?php echo $row->id_image_multi;?>" style="width:200px !important;margin: auto !important;"">
                                    <option value="" <?php if($row->page==""){echo "selected";}?>>กรุณาเลือกหน้า</option>
                                    <option value="home" <?php if($row->page=="home"){echo "selected";}?>>home</option>
                                    <option value="about" <?php if($row->page=="about"){echo "selected";}?>>about</option>
                                    <option value="contact" <?php if($row->page=="contact"){echo "selected";}?>>contact</option>
                                    <option value="news" <?php if($row->page=="news"){echo "selected";}?>>news</option>
                                </select>
                        </td>
                        <td>
                                <select name="status" class="form-control" id="status<?php echo $row->id_image_multi;?>" style="width:200px !important;margin: auto !important;" >
                                    <option value="1" <?php if($row->status==1){echo "selected";}?>>เปิด</option>
                                    <option value="0" <?php if($row->status==0){echo "selected";}?>>ปิด</option>
                                </select>

                        </td>
                        <td>
                            <div class="text-center">
                                <div class="btn-group" role="group">
                                    <input type="submit" id="save<?php echo $row->id_image_multi;?>"  name="submit" class="btn btn-primary" value="บันทึก">
                                </form>
                                    <input type="button" id="edit_show<?php echo $row->id_image_multi;?>"  name="submit" class="btn btn-primary" value="แก้ไข">
                                    <!-- <button class='btn btn-primary' id="edit1" value="<?php echo $row->id_image_multi;?>">แก้ไข</button> -->
                                    <a class="btn btn-danger" style="width: 100%;" onclick="return confirm('ต้องการลบหรือไม่');" href="<?php echo base_url('admin_management/banner_delete_image_multi/'.$id.'/'.$num.'/'. $row->id_image_multi); ?>"><i class="fas fa-trash fa-md fa-fw"></i></a>
                                </div>
                            </div>
                        </td>          
                      </tr>
                    <?php $no++; endforeach; ?>  
            </table>
        </div>
    </div>
</div>        
</main>
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
<script>
    $(document).ready(function(){
      <?php $no=1; foreach ($query as $row): ?>
        $("#edit_show<?php echo $row->id_image_multi;?>").click(function(){
            $("#save<?php echo $row->id_image_multi;?>").show();
            $("#edit_show<?php echo $row->id_image_multi;?>").hide();
            $('#page<?php echo $row->id_image_multi;?>').attr("disabled", false);
            $('#status<?php echo $row->id_image_multi;?>').attr("disabled", false);
        });

        $("#save<?php echo $row->id_image_multi;?>").hide();
        $('#page<?php echo $row->id_image_multi;?>').attr("disabled", true);
        $('#status<?php echo $row->id_image_multi;?>').attr("disabled", true);
        <?php $no++; endforeach; ?> 
        
    });
</script> 

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



<script>
  var loadFile = function(event) {
  var output = document.getElementById('output');
  output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>