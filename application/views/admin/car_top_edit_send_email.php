
   <div class="pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
                <h4 class="h4">ส่งข้อความ</h4>
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


    <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
               
                <div class="wrap-box">
                    <!-- Title -->
                    <div class="title">
                        <h6 class="h6">รายละเอียด</h6>
                    </div>
                    <!-- Form Input -->
                    <div class="form-input">
                    <?php if(!empty($id)){$id1 = $id;}else{$id1 = $this->uri->segment(3);}?>
                        <ul class="nav nav-tabs" id="TabLanguage" role="tablist">
                            <li class="nav-item">
                                <a
                                href="<?php echo base_url("admin_management/car_top_edit/".$id1."?type=".$this->input->get('type')."&&car_type_id=".$this->input->get('car_type_id')."&&brand=".$this->input->get('brand')."&&car_id=".$this->input->get('car_id')."&&model=".$this->input->get('model')."&&car_model_id=".$this->input->get('car_model_id')."&&model_des=".$this->input->get('model_des')."&&car_model_des_id=".$this->input->get('car_model_des_id')."")?>"
                                class="nav-link"
                                role="tab"
                                aria-controls="th-Tab"
                                aria-selected="true"
                                >ข้อมูลรถ</a
                                >
                            </li>
                            <li class="nav-item">
                             
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
                                class="nav-link"
                                href="<?php echo base_url("admin_management/file_multi/1/".$id1."?type=".$this->input->get('type')."&&car_type_id=".$this->input->get('car_type_id')."&&brand=".$this->input->get('brand')."&&car_id=".$this->input->get('car_id')."&&model=".$this->input->get('model')."&&car_model_id=".$this->input->get('car_model_id')."&&model_des=".$this->input->get('model_des')."&&car_model_des_id=".$this->input->get('car_model_des_id')."")?>"
                                role="tab"
                                aria-controls="en-Tab"
                                aria-selected="false"
                                >ไฟล์เอกสาร</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                class="nav-link active"
                                href="<?php echo base_url("admin_management/car_top_edit_send_email/".$id1."?type=".$this->input->get('type')."&&car_type_id=".$this->input->get('car_type_id')."&&brand=".$this->input->get('brand')."&&car_id=".$this->input->get('car_id')."&&model=".$this->input->get('model')."&&car_model_id=".$this->input->get('car_model_id')."&&model_des=".$this->input->get('model_des')."&&car_model_des_id=".$this->input->get('car_model_des_id')."")?>"
                                role="tab"
                                aria-controls="en-Tab"
                                aria-selected="false"
                                >ส่งข้อความ</a
                                >
                            </li>
                        </ul>
                        <div class="form-group">

                          <form action="<?php echo base_url('admin_management/car_top_edit_send_email/'.$data['car_top_id'].'?type='.$this->input->get('type').'&&car_type_id='.$this->input->get('car_type_id').'&&brand='.$this->input->get('brand').'&&car_id='.$this->input->get('car_id').'&&model='.$this->input->get('model').'&&car_model_id='.$this->input->get('car_model_id').'&&model_des='.$this->input->get('model_des').'&&car_model_des_id='.$this->input->get('car_model_des_id'));?>" method="post">
                              <div class="row">
                                  <div class="col-sm-12 col-md-12 col-lg-12">
                                      <div class="wrap-box">
                                         
                                          <!-- Form Input -->
                                          <div class="form-input">

                                            <div class="form-group">
                                                  <label>ส่งข้อความถึงผู้ขาย</label>
                                                  <textarea name="comment" class="form-control"></textarea>
                                              <?php echo form_error('comment', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>   
                                            </div>
                                              <input type="hidden" name="status_id" value="<?php echo $data['status_id'];?>">
                                          </div>

                                      <div class="footer pb-3">
                                          <div class="row ghhMCK d-flex justify-content-center">
                                           
                                              <div class="col-sm-6 col-md-6 col-lg-4 mt-1 mb-1">
                                                  <input type="submit" name="submit" class="btn btn-primary btn-block text-white" value="ส่งอีเมล">
                                              </div>
                                          </div>
                                      </div>
                                      <!-- Footer -->
                                      
                                  </div>
                              </div>
                          </form>
                           
                            
                        </div>
                    </div>         
                </div>
                </div>
                <!-- Footer -->    
            </div>
        </div>




    <!-- Content -->



    


</div>        </main>
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

