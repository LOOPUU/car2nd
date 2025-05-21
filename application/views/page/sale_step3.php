<?php $id = $this->uri->segment(3);?>

 <style type="text/css">
  .error{color: red;}
  @media (max-width: 767px){
  .columns-reverse-mobile{flex-direction: column-reverse;}}
</style>

    <!-- Section Rent Step 3 -->
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
                  <div class="step-item is-active">
                    <a <?php if($step3){?>href="<?php if($step3){echo $url3;}?>"
                      <?php }?>>
                      <div class="step-marker">3</div>
                    </a>
                    <div class="step-details <?php if($step4){echo "is-completed is-success";}?>">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 3</p>
                      <p><?php echo $this->lang->line("txt_upload_pic");?></p>
                    </div>
                    <div class="step-dec"></div>
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
                  <div class="step-item is-active">
                    <div class="step-marker">3</div>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 3</p>
                      <p><?php echo $this->lang->line("txt_upload_pic");?></p>
                    </div>
                    <div class="step-dec"></div>
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


              <?php }?>

              </div>
              <div class="column is-12">
                <div class="content has-text-centered">
                  <h4 class="title is-4"><?php echo $this->lang->line("txt_upload_pic");?></h4>
                  <p class="subititle is-6">
                   <?php echo $this->lang->line("pic4");?>
                  </p>
                </div>
                <hr class="spacer" />
              </div>
               
              <!-- Section From -->
              <div class="column is-12">
                <div class="w-md-100 mx-auto">
                  <div class="rent-input">
                        
                      <div class="columns is-multiline">
                        <div class="column is-12">
                          <div class="columns">
                            <div class="column is-12">
                              <div class="w-md-100 mx-auto">
                                <div class="columns is-multiline">
                                  


                                  <!--/////////////////////////////////////////////PIC1///////////////////////////////////////////////////////////////-->
                                 
                              <div class="columns is-mobile columns-reverse-mobile">
                                 <?php foreach($show_1 as $row){?>
                                     
                                  <div class="column is-4-desktop" id="<?php echo "scroll_pic".$row->id_image_multi;?>">

                                    <div class="columns is-multiline">
                                      <div class="column is-12">
                                        <div class="has-text-centered">
                                          <!-- Upload Image 1 -->

                                          <?php if($row->status=="delete" or $row->thumb_name_multi==""){?>
                                          <?php if($this->lang->line("set_lang")=="th"){?>
                                            <img class="" id="pic1" src="<?php echo base_url('frontend');?>/assets/images/demo/pic1.png" alt="Upload Image 1"width="350"/>
                                          <?php }else{?>
                                            <img class="" id="pic1_en" src="<?php echo base_url('frontend');?>/assets/images/demo/pic1_en.png" alt="Upload Image 1"width="350"/>
                                          <?php }?>
                                           
                                          <?php }else{ ?>
                                             <img
                                              class=""
                                              id="pic1"
                                              src="<?php echo base_url('uploads_car').'/'.$row->thumb_name_multi;?>"
                                              alt="Upload Image 1"
                                              width="350"
                                            />
                                            <div class="mt-3 mb-3">
                                              <a class="button is-danger" href="<?php echo base_url('sale/gallery_delete_image_multi_4/'.$id.'/'.$num.'/'. $row->id_image_multi.'?id_login='.$this->input->get('id_login').'&&car_top_id='.$this->input->get('car_top_id').''); ?>"><?php echo $this->lang->line("delete");?></a>
                                            </div>
                                          <?php }?>

                                        </div>
                                      </div>
                                      <div class="column is-12">
                                        <div
                                          class="p-3"
                                          style="background-color: #F4F4F4;"
                                        >
                                          <div class="has-text-centered">
                                            <!-- Desdcription Image 1 -->
                                            <p><?php echo $this->lang->line("tx_pic_top");?></p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <form  id="f1" action="<?php echo base_url('sale/gallery_upload_image_multi/1/1/'.$row->id_image_multi.'?id_login='.$this->input->get('id_login').'&&car_top_id='.$this->input->get('car_top_id').'#scroll_pic1')?>" method="post" enctype="multipart/form-data">
                                        <input type="file" name="userfile" id="file1" class="userfile"  size="20" style="display: none;"/>
                                        <input type="hidden" name="id_image" value="<?php if($id_image) echo $id_image ?>" />
                                        <input type="hidden" name="num" value="<?php echo $num; ?>" />
                                        <input type="hidden" name="car_top_id" value="<?php echo $this->uri->segment(4); ?>" />
                                        <input type="hidden" name="id_image_multi" value="<?php echo $row->id_image_multi;?>" />
                                        <input type="hidden" name="gallery_id" value="<?php echo $id; ?>" ><div style="color:red;"></div>
                                        <input type="hidden" name="car_top_id" value="<?php echo $car_top_id_max['car_top_id'];?>">
                                  </form>

                                  <?php }?>

                                   <div class="column is-8-desktop">
                                    <div class="rent-preview">
                                      <div class="columns is-multiline">
                                        <div class="column is-12">
                                          <div
                                            class="content has-text-centered"
                                          >
                                            <h5 class="title is-5">
                                              <?php echo $this->lang->line("tx_pic_good");?>
                                            </h5>
                                            <p class="subititle is-7">
                                             <?php echo $this->lang->line("tx_pic_no");?>
                                            </p>
                                          </div>
                                        </div>
                                        <div class="column is-12">
                                          <!-- Image Preview -->
                                          <div class="columns">
                                            <div class="column is-4">
                                              <!-- Image 1-->
                                              <div class="has-text-centered">
                                                <img
                                                  class=""
                                                  src="<?php echo base_url('frontend');?>/assets/images/demo/pic5.png"
                                                  alt="Do not Upload Image"
                                                />
                                                <p class="pt-3">
                                                  <?php echo $this->lang->line("txt_pic_y");?>
                                                </p>
                                              </div>
                                            </div>
                                            <div class="column is-4">
                                              <!-- Image 2-->
                                              <div class="has-text-centered">
                                                <img
                                                  class=""
                                                  src="<?php echo base_url('frontend');?>/assets/images/demo/pic6.png"
                                                  alt="Do not Upload Image"
                                                />
                                                <p class="pt-3">
                                                  <?php echo $this->lang->line("txt_no_size");?>
                                                </p>
                                              </div>
                                            </div>
                                            <div class="column is-4">
                                              <!-- Image 3-->
                                              <div class="has-text-centered">
                                                <img
                                                  class=""
                                                  src="<?php echo base_url('frontend');?>/assets/images/demo/pic7.png"
                                                  alt="Do not Upload Image"
                                                />
                                                <p class="pt-3">
                                                  <?php echo $this->lang->line("txt_no_zoom");?>
                                                </p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                              </div>
                                 

                                 

                                  <!--/////////////////////////////////////////////PIC2///////////////////////////////////////////////////////////////-->
                                  <?php foreach($show_2 as $row){?><h2 id="scroll_pic<?php echo $row->id_image_multi;?>"></h2><?php } ?>
                                  <?php foreach($show_2 as $row){?>
                                  <div class="column is-4">
                                    <div class="columns is-multiline">
                                      <div class="column is-12">
                                        <div class="has-text-centered">
                                          <!-- Upload Image 2 -->
                                          <?php if($row->status=="delete" or $row->thumb_name_multi==""){?>

                                          <?php if($this->lang->line("set_lang")=="th"){?>
                                            <img class="" id="pic2" src="<?php echo base_url('frontend');?>/assets/images/demo/pic2.png" alt="Upload Image 2"width="350"/>
                                          <?php }else{?>
                                            <img class="" id="pic2_en" src="<?php echo base_url('frontend');?>/assets/images/demo/pic2_en.png" alt="Upload Image 2"width="350"/>
                                          <?php }?>

                                          <?php }else{ ?>
                                            <img
                                            id="pic2"
                                            class=""
                                            src="<?php echo base_url('uploads_car').'/'.$row->thumb_name_multi;?>"
                                            alt="Upload Image 2"
                                            width="350"
                                          />
                                          <div class="mt-3 mb-3">
                                            <a class="button is-danger" href="<?php echo base_url('sale/gallery_delete_image_multi_4/'.$id.'/'.$num.'/'. $row->id_image_multi.'?id_login='.$this->input->get('id_login').'&&car_top_id='.$this->input->get('car_top_id').''); ?>"><?php echo $this->lang->line("delete");?></a>
                                          </div>
                                          <?php }?>
                                        </div>
                                      </div>
                                      <div class="column is-12">
                                        <div
                                          class="p-3"
                                          style="background-color: #F4F4F4;"
                                        >
                                          <div class="has-text-centered">
                                            <!-- Desdcription Image 2 -->
                                            <p><?php echo $this->lang->line("pic_no");?> 2</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <form  id="f2" action="<?php echo base_url('sale/gallery_upload_image_multi/1/1/'.$row->id_image_multi.'?id_login='.$this->input->get('id_login').'&&car_top_id='.$this->input->get('car_top_id').'#scroll')?>" method="post" enctype="multipart/form-data">
                
                                        <input type="file" name="userfile" id="file2" class="userfile"  size="20" style="display: none;"/>
                                        <input type="hidden" name="id_image" value="<?php if($id_image) echo $id_image ?>" />
                                        <input type="hidden" name="num" value="<?php echo $num; ?>" />
                                        <input type="hidden" name="car_top_id" value="<?php echo $this->uri->segment(4); ?>" />
                                        <input type="hidden" name="id_image_multi" value="<?php echo $row->id_image_multi;?>" />
                                        <input type="hidden" name="gallery_id" value="<?php echo $id; ?>" ><div style="color:red;"></div>
                                        <input type="hidden" name="car_top_id" value="<?php echo $car_top_id_max['car_top_id'];?>">
                                  </form>

                                  <?php }?>


                                  <!--/////////////////////////////////////////////PIC3///////////////////////////////////////////////////////////////-->

                                <?php foreach($show_3 as $row){?><h2 id="scroll_pic<?php echo $row->id_image_multi;?>"></h2><?php } ?>
                                <?php foreach($show_3 as $row){?>
                                  
                                  <div class="column is-4">
                                    <div class="columns is-multiline">
                                      <div class="column is-12">
                                        <div class="has-text-centered">
                                          <!-- Upload Image 3 -->
                                          <?php if($row->status=="delete" or $row->thumb_name_multi==""){?>
                                            <?php if($this->lang->line("set_lang")=="th"){?>
                                              <img class="" id="pic3" src="<?php echo base_url('frontend');?>/assets/images/demo/pic3.png" alt="Upload Image 3"width="350"/>
                                            <?php }else{?>
                                              <img class="" id="pic3_en" src="<?php echo base_url('frontend');?>/assets/images/demo/pic3_en.png" alt="Upload Image 3"width="350"/>
                                            <?php }?>
                                          <?php }else{ ?>
                                            <img
                                            id="pic3" 
                                            class=""
                                            src="<?php echo base_url('uploads_car').'/'.$row->thumb_name_multi;?>"
                                            alt="Upload Image 3"
                                            width="350"
                                          />
                                          <div class="mt-3 mb-3">
                                              <a class="button is-danger" href="<?php echo base_url('sale/gallery_delete_image_multi_4/'.$id.'/'.$num.'/'. $row->id_image_multi.'?id_login='.$this->input->get('id_login').'&&car_top_id='.$this->input->get('car_top_id').''); ?>"><?php echo $this->lang->line("delete");?></a>
                                          </div>
                                          <?php }?>
                                        </div>
                                      </div>
                                      <div class="column is-12">
                                        <div
                                          class="p-3"
                                          style="background-color: #F4F4F4;"
                                        >
                                          <div class="has-text-centered">
                                            <!-- Desdcription Image 3 -->
                                            <p><?php echo $this->lang->line("pic_no");?> 3</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <form  id="f3" action="<?php echo base_url('sale/gallery_upload_image_multi/1/1/'.$row->id_image_multi.'?id_login='.$this->input->get('id_login').'&&car_top_id='.$this->input->get('car_top_id').'#scroll')?>" method="post" enctype="multipart/form-data">
                 
                                        <input type="file" name="userfile" id="file3" class="userfile"  size="20" style="display: none;"/>
                                        <input type="hidden" name="id_image" value="<?php if($id_image) echo $id_image ?>" />
                                        <input type="hidden" name="num" value="<?php echo $num; ?>" />
                                        <input type="hidden" name="car_top_id" value="<?php echo $this->uri->segment(4); ?>" />
                                        <input type="hidden" name="id_image_multi" value="<?php echo $row->id_image_multi;?>" />
                                        <input type="hidden" name="gallery_id" value="<?php echo $id; ?>" ><div style="color:red;"></div>
                                        <input type="hidden" name="car_top_id" value="<?php echo $car_top_id_max['car_top_id'];?>">
                                  </form>

                                <?php }?>

                                <!--/////////////////////////////////////////////PIC4///////////////////////////////////////////////////////////////-->

                                <?php foreach($show_4 as $row){?><h2 id="scroll_pic<?php echo $row->id_image_multi;?>"></h2><?php } ?>
                                <?php foreach($show_4 as $row){?>
                                  <div class="column is-4">
                                    <div class="columns is-multiline">
                                      <div class="column is-12">
                                        <div class="has-text-centered">
                                          <!-- Upload Image 4 -->
                                          <?php if($row->status=="delete" or $row->thumb_name_multi==""){?>
                                            <?php if($this->lang->line("set_lang")=="th"){?>
                                              <img class="" id="pic4" src="<?php echo base_url('frontend');?>/assets/images/demo/pic4.png" alt="Upload Image 4"width="350"/>
                                            <?php }else{?>
                                              <img class="" id="pic4_en" src="<?php echo base_url('frontend');?>/assets/images/demo/pic4_en.png" alt="Upload Image 4"width="350"/>
                                            <?php }?>
                                          <?php }else{ ?>
                                            <img
                                            id="pic4"
                                            class=""
                                            src="<?php echo base_url('uploads_car').'/'.$row->thumb_name_multi;?>"
                                            alt="Upload Image 3"
                                            width="350"
                                          />
                                            <div class="mt-3 mb-3">                                                
                                                <a class="button is-danger" href="<?php echo base_url('sale/gallery_delete_image_multi_4/'.$id.'/'.$num.'/'. $row->id_image_multi.'?id_login='.$this->input->get('id_login').'&&car_top_id='.$this->input->get('car_top_id').''); ?>"><?php echo $this->lang->line("delete");?></a>
                                            </div>
                                          <?php }?>
                                        </div>
                                      </div>
                                      <div class="column is-12">
                                        <div
                                          class="p-3"
                                          style="background-color: #F4F4F4;"
                                        >
                                          <div class="has-text-centered">
                                            <!-- Desdcription Image 4 -->
                                            <p><?php echo $this->lang->line("pic_no");?> 4</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <form  id="f4" action="<?php echo base_url('sale/gallery_upload_image_multi/1/1/'.$row->id_image_multi.'?id_login='.$this->input->get('id_login').'&&car_top_id='.$this->input->get('car_top_id').'#scroll')?>" method="post" enctype="multipart/form-data">
                    
                                        <input type="file" name="userfile" id="file4" class="userfile"  size="20" style="display: none;"/>
                                        <input type="hidden" name="id_image" value="<?php if($id_image) echo $id_image ?>" />
                                        <input type="hidden" name="num" value="<?php echo $num; ?>" />
                                        <input type="hidden" name="car_top_id" value="<?php echo $this->uri->segment(4); ?>" />
                                        <input type="hidden" name="id_image_multi" value="<?php echo $row->id_image_multi;?>" />
                                        <input type="hidden" name="gallery_id" value="<?php echo $id; ?>" ><div style="color:red;"></div>
                                        <input type="hidden" name="car_top_id" value="<?php echo $car_top_id_max['car_top_id'];?>">
                                  </form>


                                <?php }?>

                                <!--/////////////////////////////////////////////PIC ALL///////////////////////////////////////////////////////////////-->

                                <h2 id="scroll_pic_all<?php echo $row->sort_no;?>"></h2>
                                <?php foreach($show_all as $row){?>
                                  <div class="column is-4">
                                    <div class="columns is-multiline">
                                      <div class="column is-12">
                                        <div class="has-text-centered">
                                          <!-- Upload Image 4 -->
                                          <?php if($row->status=="delete" or $row->thumb_name_multi==""){?>
                                          <img
                                            id="pic4"
                                            class=""
                                            src="<?php echo base_url('frontend');?>/assets/images/demo/pic4.png"
                                            alt="Upload Image 3"
                                            width="350"
                                          />
                                          <?php }else{ ?>
                                            <img
                                            id="pic4"
                                            class=""
                                            src="<?php echo base_url('uploads_car').'/'.$row->thumb_name_multi;?>"
                                            alt="Upload Image 3"
                                            width="350"
                                          />
                                            <div class="mt-3 mb-3">                                                
                                                <a class="button is-danger" href="<?php echo base_url('sale/gallery_delete_image_multi/'.$id.'/'.$num.'/'. $row->id_image_multi.'?id_login='.$this->input->get('id_login').'&&car_top_id='.$this->input->get('car_top_id').'&&sort_no='.$row->sort_no.''); ?>"><?php echo $this->lang->line("delete");?></a>
                                            </div>
                                          <?php }?>
                                        </div>
                                      </div>
                                      
                                    </div>
                                  </div>

                                <?php }?> 
                                <h2 id="scroll_pic"></h2>
                                <?php if($check_image=="yes"){?>
                                  
                                  <div class="column is-4">
                                    <div class="columns is-multiline">
                                      <div class="column is-12">
                                        <div
                                          class="p-3"
                                          style="background-color: #F4F4F4;"
                                        >
                                          <div id="pic_all" class="has-text-centered">
                                            <!-- Desdcription pic_all -->
                                            <p>+ <?php echo $this->lang->line("add_pic_");?></p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                <?php }?>

                                <form  id="f_all" action="<?php echo base_url('sale/gallery_upload_image_multi/1/1/?id_login='.$this->input->get('id_login').'&&car_top_id='.$this->input->get('car_top_id').'')?>" method="post" enctype="multipart/form-data">
                                        <input type="file" name="userfile" id="file_all" class="userfile"  size="20" style="display: none;"/>
                                        <input type="hidden" name="id_image" value="<?php if($id_image) echo $id_image ?>" />
                                        <input type="hidden" name="num" value="<?php echo $num; ?>" />
                                        <input type="hidden" name="car_top_id" value="<?php echo $this->uri->segment(4); ?>" />
                                        <input type="hidden" name="id_image_multi" value="<?php if($id_image_multi) echo $id_image_multi; ?>" />
                                        <input type="hidden" name="gallery_id" value="<?php echo $id; ?>" ><div style="color:red;"></div>
                                        <input type="hidden" name="car_top_id" value="<?php echo $car_top_id_max['car_top_id'];?>">
                                  </form>

                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="w-md-75 mx-auto"><hr /></div>
                        </div>

                        <div style="color:red;"><?php echo $error;?></div>

                        <div class="column is-12">
                          <div class="w-md-75 mx-auto">
                            <div class="w-md-50 mx-auto">
                              <div class="field">
                                <div class="control">
                                  <?php if($check_4_image == "4_img_no"){?>
                                  <?php if($this->lang->line("set_lang")=="th"){?>
                                   <a href="#" onclick="return confirm('อัพโหลด 4 รูปแรกให้ครบถ้วน');" class="button is-orange is-fullwidth"><?php echo $this->lang->line("nxt_step");?></a>
                                  <?php }else{?>
                                   <a href="#" onclick="return confirm('Upload the first 4 images to complete.');" class="button is-orange is-fullwidth"><?php echo $this->lang->line("nxt_step");?></a>
                                  <?php }?>
                                <?php }else{?>
                                   <a href="<?php echo base_url('sale/file_multi/1/1?id_login='.$this->input->get('id_login').'&&car_top_id='.$this->input->get('car_top_id').'')?>" class="button is-orange is-fullwidth""><?php echo $this->lang->line("nxt_step");?></a>
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
      </div>
    </section>

  <script type="text/javascript">

document.getElementById("file1").onchange = function() {
  document.getElementById("f1").submit();
}
document.getElementById("file2").onchange = function() {
  document.getElementById("f2").submit();
}
document.getElementById("file3").onchange = function() {
  document.getElementById("f3").submit();
}
document.getElementById("file4").onchange = function() {
  document.getElementById("f4").submit();
}
document.getElementById("file_all").onchange = function() {
  document.getElementById("f_all").submit();
}
</script>




<!--///////////////////////////////////set session check step//////////////////////////////////////////////////////////////////-->

<?php $_SESSION['url_step1'] = base_url('sale/sale_step1');?>

<?php $_SESSION['name_year_regis'] = $data_car_top['name_year_regis'];?>
<?php $_SESSION['name_year_pro'] = $data_car_top['name_year_pro'];?>
<?php $_SESSION['name_color'] = $data_car_top['name_color'];?>
<?php $_SESSION['name_gear'] = $data_car_top['name_gear'];?>
<?php $_SESSION['name_capacity'] = $data_car_top['name_capacity'];?>
<?php $_SESSION['name_mile'] = $data_car_top['name_mile'];?>
<?php $_SESSION['name_price'] = $data_car_top['name_price'];?>
<?php $_SESSION['downpayment'] = $data_car_top['downpayment'];?>
<?php $_SESSION['descript'] = $data_car_top['descript'];?>
<?php $_SESSION['device'] = $data_car_top['device'];?>

<?php $_SESSION['name_type'] = $data_car_top['car_type_id'];?>
<?php $_SESSION['name'] = $data_car_top['car_id'];?>
<?php $_SESSION['name_model'] = $data_car_top['car_model_id'];?>
<?php $_SESSION['name_model_des'] = $data_car_top['car_model_des_id'];?>



<?php $_SESSION['url3'] = base_url('sale/gallery_multi/1/1/?id_login='.$this->input->get('id_login').''); ?>
<?php $_SESSION['step3'] = 'step3'; ?>

<?php $_SESSION['provice'] = $data_car_top['province'];?>



<!--//////////////////////////////////////scroll///////////////////////////////////////////////////////////////-->











