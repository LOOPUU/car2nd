<style type="text/css">
  .error{color: red;}
</style>
    <!-- Section Rent Step 1 -->
    <section class="rent">
      <div class="container">
        <div class="w-md-75 mx-auto">

        <?php if(@$car_data['status_id']==0 AND @$car_data['comment']!=""){?>
          <p class="error" style="text-align: center;">** <?php echo $this->lang->line("fillallstep");?></p>
        <?php }?>

          <div class="form-box">
            <div class="columns is-multiline">
              <div class="column is-12">
                <!-- Step -->

              <?php if(empty($this->input->get('car_top_id')) OR $this->input->get('car_top_id') == ""){?>

                <div class="steps">
                  <div class="step-item is-active">
                    <div class="step-marker">1</div>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 1</p>
                      <p><?php echo $this->lang->line("txt_fill_place");?></p>
                    </div>
                    <div class="step-dec"></div>
                  </div>
                  <div class="step-item <?php if($step2){echo "is-completed is-success";}?>">
                    <?php if($step2){?>
                      <a href="<?php if($step2){echo $url2;}?>"><div class="step-marker">2</div></a>
                    <?php }else{?>
                      <div class="step-marker">2</div>
                    <?php }?>
                    <div class="step-details <?php if($step3){echo "is-completed is-success";}?>">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 2</p>
                      <p><?php echo $this->lang->line("txt_fill_des");?></p>
                    </div>
                  </div>
                  <div class="step-item <?php if($step3){echo "is-completed is-success";}?>">
                    <?php if($step3){?>
                      <a href="<?php if($step3){echo $url3;}?>"><div class="step-marker">3</div></a>
                    <?php }else{?>
                      <div class="step-marker">3</div>
                    <?php }?>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 3</p>
                      <p><?php echo $this->lang->line("txt_upload_pic");?></p>
                    </div>
                  </div>
                  <div class="step-item <?php if($step4){echo "is-completed is-success";}?>">
                    <?php if($step4){?>
                      <a href="<?php if($step4){echo $url4;}?>"><div class="step-marker">4</div></a>
                    <?php }else{?>
                      <div class="step-marker">4</div>
                    <?php }?>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 4</p>
                      <p><?php echo $this->lang->line("txt_upload_file");?></p>
                    </div>
                  </div>
                  <div class="step-item <?php if($step5){echo "is-completed is-success";}?>">
                    <?php if($step5){?>
                      <a href="<?php if($step5){echo $url5;}?>"><div class="step-marker">5</div></a>
                    <?php }else{?>
                      <div class="step-marker">5</div>
                    <?php }?>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 5</p>
                      <p><?php echo $this->lang->line("txt_finish");?></p>
                    </div>
                  </div>
                </div>
                <hr />

              <?php }else{ ?>

                <div class="steps">
                  <div class="step-item is-active">
                    
                    <div class="step-marker">1</div>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 1</p>
                      <p><?php echo $this->lang->line("txt_fill_place");?></p>
                    </div>
                    <div class="step-dec"></div>
                   
                  </div>
                  <div class="step-item is-completed is-success">
                    <a href="<?php echo base_url("sale/sale_step2?id_login=".$this->input->get('id_login')."&car_top_id=".$this->input->get('car_top_id')."");?>">
                    <div class="step-marker">2</div></a>
                    <div class="step-details is-completed is-success">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 2</p>
                      <p><?php echo $this->lang->line("txt_fill_des");?></p>
                    </div>
                    
                  </div>
                  <div class="step-item is-completed is-success">
                    <a href="<?php echo base_url("sale/gallery_multi/1/1/?id_login=".$this->input->get('id_login')."&car_top_id=".$this->input->get('car_top_id')."");?>">
                      <div class="step-marker">3</div></a>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 3</p>
                      <p><?php echo $this->lang->line("txt_upload_pic");?></p>
                    </div>
                    
                  </div>
                  <div class="step-item is-completed is-success">
                    <a href="<?php echo base_url("sale/file_multi/1/1?id_login=".$this->input->get('id_login')."&car_top_id=".$this->input->get('car_top_id')."");?>"><div class="step-marker">4</div></a>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 4</p>
                      <p><?php echo $this->lang->line("txt_upload_file");?></p>
                    </div>
                    
                  </div>
                  <div class="step-item is-completed is-success">
    
                    <div class="step-marker">5</div>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 5</p>
                      <p><?php echo $this->lang->line("txt_finish");?></p>
                    </div>
                    
                  </div>
                </div>
                <hr />


              <?php } ?>

              </div>
              <div class="column is-12">
                <div class="content has-text-centered">
                  <h4 class="title is-4"><?php echo $this->lang->line("txt_fill_place");?></h4>
                  <p class="subititle is-6">
                    <?php echo $this->lang->line("txt_place");?>
                  </p>
                  <p class="subtitle is-6">
                    <?php echo $this->lang->line("txt_note");?>
                  </p>
                </div>
                <hr class="spacer" />
              </div>
              <!-- Section From -->
              <div class="column is-12">
                <div class="w-md-75 mx-auto">
                  <div class="rent-input">
                    <form action="<?php echo base_url('sale/sale_step1?province='.$province1.'&&id_login='.$id_login.'&&car_top_id='.$this->input->get('car_top_id').'');?>" method="POST">
                      <div class="columns is-multiline">
                        <div class="column is-12">
                          <div class="columns">
                            <div class="column is-12">
                              <div class="w-md-50 mx-auto">
                                <div class="field">
                                  <div class="control">
                                      <div class="select is-fullwidth">
                                     
                                      <select name="province">
                                        <option value=""><?php echo $this->lang->line("drop_province");?></option>
                                        <?php  foreach($province as $row){?>
                                          <?php if($this->lang->line("set_lang")=="th"){$lang_province = $row->PROVINCE_NAME;}else{$lang_province = $row->PROVINCE_NAME_ENG;}?>
                                          <option value="<?php echo $lang_province;?>"
                                            <?php if(set_value('province')==$lang_province OR $this->input->post('province')==$lang_province OR  $this->session->userdata("province")==$lang_province OR @$car_data['province']==$lang_province ){echo "selected";}?>><?php if($this->lang->line("set_lang")=="th"){echo $lang_province;}else{echo $lang_province;}?></option>
                                        <?php }?>
                                      </select>
                                      <?php echo form_error('province', '<p class="help is-danger">', '</p>'); ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <hr />
                        </div>
                        <div class="column is-12">
                          <div class="w-md-50 mx-auto">
                            <div class="field">
                              <div class="control">
                                <button
                                  type="submit" 
                                  name="submit"
                                  class="button is-orange is-fullwidth"
                                >
                                  <?php echo $this->lang->line("nxt_step");?>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!--///////////////////////////////////set session check step//////////////////////////////////////////////////////////////////-->
<?php $link =  @($_SERVER['REQUEST_URI']); //ลิ้งค์ปัจจุบัน?> 

<?php if($province1!==""){
  $province = $province1;
}elseif($this->input->get('province')!==""){
 $province = $this->input->get('province');
}elseif($this->input->get('province')!==""){
 $province = $this->input->get('province');
}elseif($this->session->userdata("province")!==""){

  $_SESSION['province1'] = $this->session->userdata("province");
}?>

<?php $_SESSION['province']  = $this->session->userdata("province");?>

<?php $_SESSION['url1'] = base_url('sale/sale_step1?province='.$this->input->get('province').'&&id_login='.$this->input->get('province').''); ?>
<?php $_SESSION['step1'] = 'step1'; ?>
