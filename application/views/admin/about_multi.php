
<?php $id = $this->uri->segment(3);?>


<div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
                <h4 class="h4">เพิ่มแบนเนอร์ (เกี่ยวกับเรา)</h4>
            </div>

             <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
          
            </div>
          
            <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
               <a href="<?php echo base_url('admin_management/about_edit');?>" class="btn btn-secondary btn-block">
                    กลับไปหน้าข้อมูล เกี่ยวกับเรา
                </a> 
            </div>

           
            
        </div>
    </div>



    <!-- Content -->




   <?php echo form_open_multipart('admin_management/about_upload_image_multi/1/'.$this->uri->segment(4).'');?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="wrap-box">
                    <!-- Title -->
                    <div class="title">
                        <h6 class="h6">รายละเอียด</h6>
                    </div>
                    <!-- Form Input -->
                    <div class="form-input">
                        <div class="form-group">
                            <label>รูปภาพ เกี่ยวกับเรา&nbsp;<span style="color:#DC3545;">*</span></label>
                            <div class="mb-3">
                              <?php if($tn){

                              echo '<img class="img-thumbnail" alt="Thumbnail image" src="'. base_url().'uploads/'.$tn.'" >';

                               } ?>
                            </div>
                               <div style="color:red;"><?php echo $error;?></div>
                              <div class="custom-file">
                                <input type="file" name="userfile" id="customFile" size="20" class="custom-file-input">
                                <label class="custom-file-label" for="customFile">เลือกรูปภาพ</label>
                              </div>
                              <input type="hidden" name="id_image" value="<?php if($id_image) echo $id_image ?>" />
                              <input type="hidden" name="num" value="<?php echo $num; ?>" />
                              <input type="hidden" name="gallery_id" value="<?php echo $this->uri->segment(4); ?>" />
                              <input type="hidden" name="id_image_multi" value="<?php if($id_image_multi) echo $id_image_multi; ?>" />
                              <input type="hidden" name="about_id" value="<?php echo $id; ?>" ><div style="color:red;"></div>
                        </div>
                    </div>
                     <div class="footer pb-3">
                    <div class="row ghhMCK d-flex justify-content-center">
                       <?php if(!empty($this->uri->segment(5))){?>
                       
                            <div class="col-sm-6 col-md-6 col-lg-6 mt-1 mb-1">
                                <input type="submit" name="submit" class="btn btn-primary btn-block text-white" value="บันทึกข้อมูล">
                            </div>
                             <div class="col-sm-12 col-md-6 col-lg-6 mt-1 mb-1">
                                <a href="<?php echo base_url('admin_management/about_multi/1/1/'); ?>" class="btn btn-secondary btn-block text-white">ยกเลิก</a>
                            </div>
                        <?php }else{?>

                            <div class="col-sm-6 col-md-6 col-lg-6 mt-1 mb-1">
                                <input type="submit" name="submit" class="btn btn-primary btn-block text-white" value="บันทึกข้อมูล">
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





<div class="wrap-box">
        <div class="table-responsive">

            <table id="example_sort" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                          <th>ลำดับ</th>
                          <th>รูปภาพ</th>
                          <th>วันที่เพิ่มรูปภาพ</th>
                          <th>จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php $no=1; foreach ($query as $row): ?>
     
                      <tr id="<?php echo $row->id_image_multi; ?>">
                       
                        <td><?php echo $no; ?></td>
                       
                        <td>
                         <?php
                            if($row->thumb_name_multi==""){
                              echo "<img src=".base_url('image/noimage100.gif')." style='width: 200px;'> ";
                            }elseif($row->thumb_name_multi!==""){
                              echo "<img src=".base_url('uploads/'.$row->thumb_name_multi.'')." style='width: 200px;'/> ";
                            }
                          ?>
                    
                        </td>
                         <td><?php echo $row->upload_date; ?> </td>

                        <td>
                         
                          <div class="btn-group" role="group">
                                    <a class="btn btn-primary" style="width: 100%;"  href="<?php echo base_url('admin_management/about_multi/'.$id.'/'.$num.'/'. $row->id_image_multi); ?>"><i class="fas fa-edit fa-md fa-fw"></i></a>
                                    <a class="btn btn-danger" style="width: 100%;" onclick="return confirm('ต้องการลบหรือไม่');" href="<?php echo base_url('admin_management/about_delete_image_multi/'.$id.'/'.$num.'/'. $row->id_image_multi); ?>"><i class="fas fa-trash fa-md fa-fw"></i></a>
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

<iframe name="k_frame_admin" id="k_frame_admin" style="display:none;"></iframe>

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



