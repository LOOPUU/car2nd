<style type="text/css">
  img{
   max-width:180px;
  }
  input[type=file]{
    padding:10px;
    background:#2d2d2d;}
</style>


<?php $id = $this->uri->segment(4);?>


<div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
                <h4 class="h4">ไฟล์เอกสาร</h4>
            </div>

             <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
           
            </div>
          
            <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
               <a href="<?php echo base_url('admin_management/car_top_list');?>" class="btn btn-secondary btn-block">
                    กลับไปหน้ารายการข้อมูลรถ
                </a> 
            </div>

           
            
        </div>
    </div>



    <!-- Content -->




   <?php echo form_open_multipart("admin_management/file_upload_image_multi/1/".$this->uri->segment(4)."?type=".$this->input->get('type')."&&car_type_id=".$this->input->get('car_type_id')."&&brand=".$this->input->get('brand')."&&car_id=".$this->input->get('car_id')."&&model=".$this->input->get('model')."&&car_model_id=".$this->input->get('car_model_id')."&&model_des=".$this->input->get('model_des')."&&car_model_des_id=".$this->input->get('car_model_des_id')."");?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="wrap-box">
                    <!-- Title -->
                    <div class="title">
                        <h6 class="h6">รายละเอียด</h6>
                    </div>
                    <!-- Form Input -->
                    <div class="form-input">
                       <ul class="nav nav-tabs" id="TabLanguage" role="tablist">
                             <li class="nav-item">
                                <a
                                href="<?php echo base_url("admin_management/car_top_edit/".$this->uri->segment(4)."?type=".$this->input->get('type')."&&car_type_id=".$this->input->get('car_type_id')."&&brand=".$this->input->get('brand')."&&car_id=".$this->input->get('car_id')."&&model=".$this->input->get('model')."&&car_model_id=".$this->input->get('car_model_id')."&&model_des=".$this->input->get('model_des')."&&car_model_des_id=".$this->input->get('car_model_des_id')."")?>"
                                class="nav-link"
                                role="tab"
                                aria-controls="th-Tab"
                                aria-selected="true"
                                >ข้อมูลรถ</a
                                >
                            </li>
                            <li class="nav-item">
                              <?php if(!empty($id)){$id1 = $id;}else{$id1 = $this->uri->segment(3);}?>
                                <a
                                class="nav-link"
                                href="<?php echo base_url("admin_management/gallery_multi/1/".$id1."?type=".$this->input->get('type')."&&car_type_id=".$this->input->get('car_type_id')."&&brand=".$this->input->get('brand')."&&car_id=".$this->input->get('car_id')."&&model=".$this->input->get('model')."&&car_model_id=".$this->input->get('car_model_id')."&&model_des=".$this->input->get('model_des')."&&car_model_des_id=".$this->input->get('car_model_des_id')."")?>"
                                role="tab"
                                aria-controls="en-Tab"
                                aria-selected="false"
                                >รูปภาพรถ</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                class="nav-link active"
                                href="<?php echo base_url("admin_management/file_multi/1/".$id1."?type=".$this->input->get('type')."&&car_type_id=".$this->input->get('car_type_id')."&&brand=".$this->input->get('brand')."&&car_id=".$this->input->get('car_id')."&&model=".$this->input->get('model')."&&car_model_id=".$this->input->get('car_model_id')."&&model_des=".$this->input->get('model_des')."&&car_model_des_id=".$this->input->get('car_model_des_id')."")?>"
                                role="tab"
                                aria-controls="en-Tab"
                                aria-selected="false"
                                >ไฟล์เอกสาร</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                class="nav-link"
                                href="<?php echo base_url("admin_management/car_top_edit_send_email/".$id1."?type=".$this->input->get('type')."&&car_type_id=".$this->input->get('car_type_id')."&&brand=".$this->input->get('brand')."&&car_id=".$this->input->get('car_id')."&&model=".$this->input->get('model')."&&car_model_id=".$this->input->get('car_model_id')."&&model_des=".$this->input->get('model_des')."&&car_model_des_id=".$this->input->get('car_model_des_id')."")?>"
                                role="tab"
                                aria-controls="en-Tab"
                                aria-selected="false"
                                >ส่งข้อความ</a
                                >
                            </li>
                        </ul>
                        <div class="form-group">
                          <br><br>
                             <div class="mt-3 mb-3">
                              <div class="mb-3">
                                  <img id="output" style="width:20%;"/>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="userfile" size="20" class="custom-file-input"  accept="image/*" onchange="loadFile(event)"/> 
                                    <label class="custom-file-label" for="customFile">เลือกไฟล์เอกสาร</label>
                                </div>
                            </div>
                            <div class="mt-3 mb-3">
                              <?php if($tn){

                              echo '<img class="img-thumbnail" alt="Thumbnail image" style="width: 20%;" src="'. base_url().'uploads_file/'.$tn.'" >';

                               } ?>
                            </div>
                              <div style="color:red;"><?php echo $error;?></div>
                              <div>
                               <p>รองรับไฟล์ภาพนามสกุล jpg  , png , jpeg</p>
                               <p>อัพโหลดไฟล์ภาพได้สูงสุด 5MB</p>
                             </div>
                             
                              <input type="hidden" name="id_image" value="<?php if($id_image) echo $id_image ?>" />
                              <input type="hidden" name="num" value="<?php echo $num; ?>" />
                              <input type="hidden" name="car_top_id" value="<?php echo $this->uri->segment(4); ?>" />
                              <input type="hidden" name="id_image_multi" value="<?php if($id_image_multi) echo $id_image_multi; ?>" />
                              <input type="hidden" name="file_id" value="<?php echo $id; ?>" ><div style="color:red;"></div>
                        </div>
                    </div>
                     <div class="footer pb-3">
                    <div class="row ghhMCK d-flex justify-content-center">
                     
                        <div class="col-sm-4 col-md-4 col-lg-4 mt-1 mb-1">
                            <input type="submit" name="submit" class="btn btn-primary btn-block text-white" value="เพิ่มไฟล์เอกสาร">
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <!-- Footer -->
                
                
            </div>
        </div>
    <?php echo form_close(); ?>





<div class="wrap-box">
        <div class="table-responsive">

            <table id="example_sort" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                          <th>ลำดับ</th>
                          <th>รูปภาพ</th>
                          <th>วันที่เพิ่มรูปภาพ</th>
                          <!-- <th>จัดการ</th> -->
                      </tr>
                    </thead>
                    <tbody>
                     <?php $no=1; foreach ($query as $row): ?>
     
                      <tr id="<?php echo $row->id_image_multi; ?>">
                       
                        <td><?php echo $no; ?></td>
                       
                        <td>
                        <a target="_blank" href="<?php echo base_url('uploads_file/'.$row->thumb_name_multi.'');?>">
                         <?php
                            if($row->thumb_name_multi==""){
                              echo "<img src=".base_url('image/noimage100.gif')." style='width: 200px;'> ";
                            }elseif($row->thumb_name_multi!==""){
                              echo "<img src=".base_url('uploads_file/'.$row->thumb_name_multi.'')." style='width: 200px;'/> ";
                            }
                          ?>
                        </a>
                        </td>
                         <td><?php echo convert_time($row->upload_date); ?> </td>

                        <!-- <td>
                          <div class="text-center">
                            <div class="btn-group btn-group-toggle">
                          
                              <a class="btn btn-danger" style="width: 100%;" onclick="return confirm('ต้องการลบหรือไม่');" href="<?php echo base_url('admin_management/file_delete_image_multi/'.$id.'/'.$num.'/'. $row->id_image_multi); ?>">ลบ</a>
                            </div>
                          </div>
                        </td> -->
                      </tr>

                    <?php $no++; endforeach; ?>  
             
            </table>
        </div>
    </div>

</div>        
</main>
    </div>
</div>

<iframe name="k_frame_admin" id="k_frame_admin" style="display:none;"></iframe>
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
        setTimeout(function(){
            $('#load').hide();
        }, 600);
    });

    function close_popUp(name) {
        $('#'+name).modal('hide');
    }

    function reloader(name) {
        $('#load').show();
        $('#submit_'+name).click();
    }

    function reloader_hide() {
        setTimeout(function(){
            $('#load').hide();
        }, 600);
    }
</script>


<script>
  var loadFile = function(event) {
  var output = document.getElementById('output');
  output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>

