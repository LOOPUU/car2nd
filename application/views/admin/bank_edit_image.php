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
      <h4 class="h4">จัดการรูปภาพธนาคาร</h4>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
                
    </div>
    <div class="col-sm-12 col-md-12 col-lg-2 mb-2">
      <a href="<?php echo base_url('admin_management/bank_list'); ?>" class="btn btn-secondary btn-block">ย้อนกลับ</a> 
    </div>
  </div>
</div>
<?php $id = $this->uri->segment(3); ?>
<?php echo form_open_multipart('admin_management/bank_do_upload/'.$id.'/'.$num);?>
    <!-- Content -->
<div class="row">
    <div class="col-md-12 col-lg-8">
      <div class="wrap-box">
        <div class="title">
          <h6 class="h6">อัพโหลดรูปภาพธนาคาร</h6>
        </div>
        <div class="form-input">
          <div class="text-center">
            <?php
              if ($tn == "") {
              echo '<img class="img-thumbnail" alt="Thumbnail image" src="' . base_url() . 'backend/images/noimage100.gif" style="width: 120px;">';
              }
              if ($tn !== "") {
                echo '<img class="img-thumbnail" alt="Thumbnail image" src="' . base_url() . 'uploads/' . $tn . '' . $ex . '"  alt="Thumbnail image" style="width: 120px;">';
              }
            ?>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12 col-lg-4">
      <div class="wrap-box">
        <div class="title">
          <h6 class="h6">รูปภาพธนาคาร</h6>
        </div>
        <div class="form-input">
          <div class="mb-3">
            <img id="output" style="width:20%;"/>
          </div>
          <div class="custom-file">
            <input type="file" name="userfile" size="20" class="custom-file-input" accept="image/*" onchange="loadFile(event)"/> 
            <label class="custom-file-label" for="customFile">เลือกรูปภาพ</label>
          </div>
          <input type="hidden" name="id_image" value="<?php if ($id_image) echo $id_image ?>" />
          <input type="hidden" name="id_data" value="<?php echo $id; ?>" >
          <input type="hidden" name="num" value="<?php echo $num; ?>" >
          <div class="mt-3 mb-3">
            <div style="color:red;"><?php echo $error;?></div>
            <input type="submit" value="อัพโหลด" name="upload" class="btn btn-primary" />
            <input type="hidden" value="upload" name="upload" />
            <?php if ($id_image) { echo "<a class='btn btn-danger' onClick='return doconfirm_delete();' href=" . base_url('admin_management/bank_delete_image/' . $id . '/' . $num) . ">ลบ</a> "; } ?>
          </div>
        </div>
      </div>
    </div>
</div>

</form>

<script>
  var loadFile = function(event) {
  var output = document.getElementById('output');
  output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>

 



        
          
