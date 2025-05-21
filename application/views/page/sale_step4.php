<style type="text/css">
  .error{color: red;}
</style>
<?php $id = $this->uri->segment(3);?>

    <!-- Section Rent Step 4 -->
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
                  <div class="step-item <?php if($step1){echo "is-completed is-success";}?>">
                    <?php if($step1){?>
                      <a href="<?php if($step1){echo $url_step1;}?>"><div class="step-marker">1</div></a>
                    <?php }else{?>
                      <div class="step-marker">1</div>
                    <?php }?>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 1</p>
                      <p><?php echo $this->lang->line("txt_fill_place");?></p>
                    </div>
                  </div>
                  <div class="step-item <?php if($step2){echo "is-completed is-success";}?>">
                    <?php if($step2){?>
                      <a href="<?php if($step2){echo $url2;}?>"><div class="step-marker">2</div></a>
                    <?php }else{?>
                      <div class="step-marker">2</div>
                    <?php }?>
                    <div class="step-details">
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
                  <div class="step-item is-active">
                    <div class="step-marker">4</div>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 4</p>
                      <p><?php echo $this->lang->line("txt_upload_file");?></p>
                    </div>
                    <div class="step-dec"></div>
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
                  <div class="step-item is-completed is-success">
                    <a href="<?php echo base_url("sale/sale_step1?id_login=".$this->input->get('id_login')."&car_top_id=".$this->input->get('car_top_id')."");?>"><div class="step-marker">1</div></a>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 1</p>
                      <p><?php echo $this->lang->line("txt_fill_place");?></p>
                    </div>
                    
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
                  <div class="step-item is-active">
                    <div class="step-marker">4</div>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 4</p>
                      <p><?php echo $this->lang->line("txt_upload_file");?></p>
                    </div>
                    <div class="step-dec"></div>
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


              <?php }?>

              </div>
              <div class="column is-12">
                <div class="content has-text-centered">
                  <h4 class="title is-4"><?php echo $this->lang->line("txt_upload_file");?></h4>
                  <p class="subititle is-6">
                    <?php echo $this->lang->line("up_buy");?>
                    <br>
                    * <?php echo $this->lang->line("noprivate");?>
                  </p>
                </div>
                <hr class="spacer" />
              </div>
              <!-- Section From -->
              <div class="column is-12">
                <div class="w-md-75 mx-auto">
                  <div class="rent-input">
                  
                      <div class="columns is-multiline">
                        <div class="column is-12">
                          <div class="columns">

                            <?php $no=1; foreach ($query as $row): ?>

    

                            <?php  if($row->status=="delete" or $row->thumb_name_multi==""){?>
                              <div class="column is-6"  id="text1">
                                <div class="upload-image-box" style='background-color: #EAEAEA;cursor: pointer;'>
                                  <!-- <div class="p-3">
                                    <div class="has-text-centered">
                                      <img src="" alt="Image" />
                                    </div>
                                  </div> -->
                                  <div class="p-3">
                                    <div class="has-text-centered">
                                      <p>
                                        <?php echo $this->lang->line("txt_file1");?>
                                        <?php echo $this->lang->line("txt_car_regi");?>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php }else{?>
                               <div class="column is-6">
                                <div class="upload-image-box">
                                  <div class="p-3"  id="text1">
                                    <div class="has-text-centered">
                                      <img src="<?php echo base_url('uploads_file').'/'.$row->thumb_name_multi;?>" alt="Image" />
                                    </div>
                                  </div>
                                  <div class="p-3">
                                    <div class="has-text-centered">
                                      <p>
                                       <?php echo $this->lang->line("txt_up_file01");?>
                                      </p>

                                      <?php if($row->status=="no" AND $row->thumb_name_multi!==""){?>
                                        <div class="text-center mt-3 mb-3">
                                          <a class="button is-danger" href="<?php echo base_url('sale/file_delete_image_multi/'.$id.'/'.$num.'/'. $row->id_image_multi.'?id_login='.$this->input->get('id_login').'&&car_top_id='.$this->input->get('car_top_id').''); ?>"><?php echo $this->lang->line("delete");?></a>
                                        </div>
                                      <?php }?>

                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php }?>

                            <?php $no++; endforeach; ?>



                            <?php $no=1; foreach ($query1 as $row): ?>
                            <?php  if($row->status=="delete" or $row->thumb_name_multi==""){?>
                            <div class="column is-6" id="text2" >
                              <div class="upload-image-box" style='background-color: #EAEAEA;cursor: pointer;'>
                                <!-- <div class="p-3">
                                  <div class="has-text-centered">
                                    <img src="" alt="Image" />
                                  </div>
                                </div> -->
                                <div class="p-3">
                                  <div class="has-text-centered">
                                    <p>
                                      <?php echo $this->lang->line("txt_file1");?>
                                      <?php echo $this->lang->line("txt_card");?>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php }else{?>
                              <div class="column is-6">
                              <div class="upload-image-box">
                                <div class="p-3" id="text2">
                                  <div class="has-text-centered">
                                    <img src="<?php echo base_url('uploads_file').'/'.$row->thumb_name_multi;?>" alt="Image" />
                                  </div>
                                </div>
                                <div class="p-3">
                                  <div class="has-text-centered">
                                    <p>
                                      <?php echo $this->lang->line("txt_up_file02");?>
                                    </p>
                                    <?php if($row->status=="no" AND $row->thumb_name_multi!==""){?>
                                      <div class="text-center mt-3 mb-3">
                                        <a class="button is-danger" href="<?php echo base_url('sale/file_delete_image_multi/'.$id.'/'.$num.'/'. $row->id_image_multi.'?id_login='.$this->input->get('id_login').'&&car_top_id='.$this->input->get('car_top_id').''); ?>"><?php echo $this->lang->line("delete");?></a>
                                      </div>
                                    <?php }?>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php }?>
                           
                            <?php $no++; endforeach; ?> 


                          </div>
                          <hr />
                        </div>


                      <?php $no=1; foreach ($query as $row): ?>
                      <form  id="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('sale/file_upload_image_multi/1/1/'.$row->id_image_multi.'/?id_login='.$this->input->get('id_login').'&&car_top_id='.$this->input->get('car_top_id').'#scroll')?>">
                              
                              <input type="file" name="userfile" id="my_file" class="userfile"  size="20" onchange="readURL(this);" style="display: none;"/>
                              <input type="hidden" name="id_image" value="<?php if($id_image) echo $id_image ?>" />
                              <input type="hidden" name="num" value="<?php echo $num; ?>" />
                              <input type="hidden" name="car_top_id" value="<?php echo $this->uri->segment(4); ?>" />
                              <input type="hidden" name="id_image_multi" value="<?php echo $row->id_image_multi;?>" />
                              <input type="hidden" name="file_id" value="<?php echo $id; ?>" ><div style="color:red;"></div>
                              <input type="hidden" name="car_top_id" value="<?php echo $car_top_id_max['car_top_id'];?>">
                      
                      </form>
                      <?php $no++; endforeach; ?>

                      <?php $no=1; foreach ($query1 as $row): ?>
                      <form  id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url('sale/file_upload_image_multi/1/1/'.$row->id_image_multi.'/?id_login='.$this->input->get('id_login').'&&car_top_id='.$this->input->get('car_top_id').'#scroll')?>">
                              
                              <input type="file" name="userfile" id="my_file1" class="userfile"  size="20" onchange="readURL(this);"  style="display: none;"/>
                              <input type="hidden" name="id_image" value="<?php if($id_image) echo $id_image ?>" />
                              <input type="hidden" name="num" value="<?php echo $num; ?>" />
                              <input type="hidden" name="car_top_id" value="<?php echo $this->uri->segment(4); ?>" />
                              <input type="hidden" name="id_image_multi" value="<?php echo $row->id_image_multi;?>" />
                              <input type="hidden" name="file_id" value="<?php echo $id; ?>" ><div style="color:red;"></div>
                              <input type="hidden" name="car_top_id" value="<?php echo $car_top_id_max['car_top_id'];?>">
                      
                      </form>
                      <?php $no++; endforeach; ?>
                       <div style="color:red;"><?php echo $error;?></div>


                        <div class="column is-12">
                          <div class="w-md-50 mx-auto">
                            <div class="field">
                              <div class="control">
                                <a
                                  href="<?php echo base_url('buy/car_view/'.$car_top_id_max1.'');?>"
                                  class="button is-outlined is-fullwidth" target="_blank"
                                >
                                  <?php echo $this->lang->line("txt_view_finish");?>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="column is-12">
                          <div class="w-md-50 mx-auto">
                            <div class="field">
                              <div class="control">

                                <?php if($check_2_image == "2_img_no"){?>
                                <?php if($this->lang->line("set_lang")=="th"){?>
                                 <a href="#scroll" onclick="return confirm('อัพโหลดสำเนาบัตรให้ครบถ้วน');" class="button is-orange is-fullwidth"><?php echo $this->lang->line("nxt_step");?></a>
                                <?php }else{?>
                                 <a href="#scroll" onclick="return confirm('Upload a copy of the card.');" class="button is-orange is-fullwidth"><?php echo $this->lang->line("nxt_step");?></a>
                                <?php }?>
                              <?php }else{?>
                                <?php if($car_data['status_id']==0 AND $car_data['comment']!=""){?>
                                 <form action="<?php echo base_url('sale/sale_step5/1/1?id_login='.$this->input->get('id_login').'&&car_top_id='.$this->input->get('car_top_id').'');?>#scroll" method="post">

                                    <div class="field">
                                      <label class="label has-text-weight-bold"
                                        ><?php echo $this->lang->line("messagetoadmin");?>
                                        </label
                                      >
                                      <div class="control">
                                        
                                         <textarea class="textarea" name="comment_member"><?php echo @$car_data['comment_member'];?></textarea>
                                        
                                      </div>
                                    </div>
                                  </div>
                                  <br>
                                  <input type="submit" class="button is-orange is-fullwidth" name="submit" value="<?php echo $this->lang->line("nxt_step");?>">
                                </form>
                                <?php }else{?>
                                  <a href="<?php echo base_url('sale/sale_step5/1/1?id_login='.$this->input->get('id_login').'&&car_top_id='.$this->input->get('car_top_id').'')?>" class="button is-orange is-fullwidth"><?php echo $this->lang->line("nxt_step");?></a>
                                <?php }?>


                              <?php }?>


                               
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    

                    


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


<script type="text/javascript">

  document.getElementById("my_file").onchange = function() {
  document.getElementById("form").submit();
}
</script>

<script type="text/javascript">

  document.getElementById("my_file1").onchange = function() {
  document.getElementById("form1").submit();
}
</script>

<!--///////////////////////////////////set session check step//////////////////////////////////////////////////////////////////-->

<?php $_SESSION['url_step1'] = base_url('sale/sale_step1');?>

<?php $_SESSION['url4'] = base_url('sale/file_multi/1/1/'.$this->uri->segment(5).'/?id_login='.$this->input->get('id_login').''); ?>
<?php $_SESSION['step4'] = 'step4'; ?>
<?php $_SESSION['province'] = $province; ?>

