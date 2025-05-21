<style>
  .image-button {
    position: relative;
    width: 150px;
    height: 150px;
    border: 1px solid #eee;
    border-radius: 1000px;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    cursor: normal;
  }

  .image-button input[type="file"] {
    -webkit-appearance: none; 
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    cursor: pointer;
  } 

  .image-button1 {
    position: relative;
    width: 150px;
    height: 150px;
    border: 1px solid #eee;
    border-radius: 1000px;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    cursor: normal;
  }
  .error{color: red;}
  .is-orange.is-outlined{background-color: transparent;border-color:#FF5C00;color: #FF5C00;}
 
</style>
    <!-- Member Details -->
    <section class="member-details">
      <div class="container">
        <div class="w-md-75 mx-auto">
          <div class="member-box">
            <?php echo form_open_multipart('sale?check=button');?>
            <div class="columns is-multiline">
              <div class="column is-12">
                <!-- Title & Button -->
                <div class="columns">
                  <div class="column is-9">
                    <!-- Title Text-->

                    <style type="text/css">
                      .d-flex{display: flex;}
                      .justify-between{justify-content: space-between;}
                      .align-center{align-items: center;}
                      @media (max-width: 767px){
                        .mb-0-mobile{margin-bottom: 0 !important;}
                      }
                      
                    </style>
                  <div class="d-flex justify-between align-center">
                    <h5 class="title is-5 mb-0-mobile">
                      <?php echo $this->lang->line("resume");?>
                    </h5>
                  <div id="button_edit_data1">
                    <input  type="button" id="update11" class="button is-orange is-hidden-tablet" name="submit_pass" value="<?php echo $this->lang->line('editdata1');?>">
                    <input id="save11"  type="submit"  class="button is-orange is-hidden-tablet" name="submit_pass" value="<?php echo $this->lang->line("submit");?>">
                  </div>
                 
                  </div>
                  </div>
                  <div class="column is-3 is-hidden-mobile">
                    <div id="button_edit_data2">
                    <!-- Button Text-->
                    <input   type="button" id="update" class="button is-orange is-medium is-fullwidth" name="submit_pass" value="<?php echo $this->lang->line('editdata1');?>">

                    <input type="submit" id="save" class="button is-orange is-medium is-fullwidth" name="submit_pass" value="<?php echo $this->lang->line("submit");?>">
                    </div>
                  </div>
                </div>
              </div>

           
              <div class="column is-12">
                <!-- Profile Detail -->
               
                <div class="columns is-multiline">
                  <div class="column is-12" style="padding-bottom: .25rem;">
                    <div class="field">
                        <div class="control" id="show_img1">
                          <div class="image-button1 mx-auto" style="border: 1px solid #ccc;opacity: 0.5;background-image: url('<?php if($resume['img']!=""){echo base_url('uploads/'.$resume['img'].'');}else{echo base_url('frontend/assets/images/none.jpg');}?>');">
                          </div>
                        </div>
                        <div class="control" id="show_img2">
                           <div class="image-button mx-auto" id="imgInp1-container" style="border: 1px solid #ccc; background-image: url('<?php if($resume['img']!=""){echo base_url('uploads/'.$resume['img'].'');}else{echo base_url('frontend/assets/images/none.jpg');}?>');">
                                  <input type="file" name="userfile" id="imgInp1" class="image-button">
                                  <div class="trans2">
                                    <i class="bx bx-camera"></i><span style="font-size: 14px;"><?php echo $this->lang->line("update");?></span>
                                   </div>
                              </div>

                              <script>
                              function readURL(input) {
                                  if (input.files && input.files[0]) {
                                      var reader = new FileReader();

                                      reader.onload = function(e) {
                                          $('.image-button').css('background-image', 'url(' + e.target.result + ')');
                                      }

                                      reader.readAsDataURL(input.files[0]);
                                  }
                              }

                              $("#imgInp1").change(function() {
                              readURL(this);
                              });
                              </script>

                        </div>
                      </div>

                    <div class="has-text-centered">
                      <div id="name1">
                       <h5 class="title is-5"><?php if(set_value('name')){echo set_value('name');}else{echo $resume['name'];}?></h5>
                      </div>
                      <div id="name2">
                        <div class="w-md-25 mx-auto">
                          <label class="label"><?php echo $this->lang->line("t_name");?></label>
                          <div class="control">
                            <input class="input" type="text"    id="inputName"  name="name" placeholder="<?php echo $this->lang->line("r_name");?>" value="<?php if(set_value('name')){echo set_value('name');}else{echo $resume['name'];}?>">
                          </div>
                        </div>
                      
                      </div>
                      <?php echo form_error('name', '<div class="error" style="padding: 0% 0%;">', '</div>'); ?>
                    </div>
                  </div>
                  <div class="column is-12" style="padding-bottom: .25rem;">
                    <div class="has-text-centered">
                      <div id="tel1">
                        <p class="subtitle is-6" ><?php echo $this->lang->line("r_tel");?> :  <?php if(set_value('tel')){echo set_value('tel');}else{echo $resume['tel'];}?></p>
                      </div>
                      <div id="tel2">
                        <div class="w-md-25 mx-auto">
                          <label class="label"><?php echo $this->lang->line("r_tel");?></label>
                          <div class="control">
                            <input class="input" type="tel"   class="input" id="inputPhone"  name="tel" placeholder="<?php echo $this->lang->line("r_tel");?>" value="<?php if(set_value('tel')){echo set_value('tel');}else{echo $resume['tel'];}?>">
                          </div>
                        </div>   
                      </div>
                      <?php echo form_error('tel', '<div class="error" style="padding: 0% 0%;">', '</div>'); ?>
                    </div>
                  </div>
                  <div class="column is-12" style="padding-bottom: .25rem;">
                    <div class="has-text-centered">
                      <p class="subtitle is-6"><?php echo $this->lang->line("r_email");?> : <?php echo $resume['email'];?></p>
                    </div>
                  </div>
                  <div class="column is-12">
                    <!-- Button For Rent -->
                    <div class="w-md-25 mx-auto has-text-centered">
                      <a href="#" id="clickbox"
                        ><p style="color:#FF5C00;font-weight: bold;font-size:13px;text-decoration:underline;"><?php echo $this->lang->line("txt_change_pass");?></p>
                        </a
                      >
                    </div>

                  </div>
                </div>
            
              </div>

            </form>

      <div class="column is-12 <?php if($this->input->get('page')!="changepass"){echo "is-hidden";}?>" id="boxshow" style="padding-bottom: .25rem;">
          <?php echo form_open_multipart('sale?check1=button&&page=changepass#pass1');?>
          <div class="columns is-multiline"  id="pass1">
              <div class="column is-12">
                <!-- Title & Button -->
                <div class="columns">
                  <div class="column is-9">
                    <!-- Title Text-->
                    <h5 class="title is-5 is-hidden-mobile">
                      <?php echo $this->lang->line("txt_change_pass");?>
                    </h5>
                    <div class="is-divider is-hidden-tablet" data-content="OR"></div>
                  </div>
                  <div class="column is-3 is-hidden-mobile"> 
                    <!-- Button Text-->
                    <input type="submit" id="save1" class="button is-orange is-medium is-fullwidth" name="submit_pass" value="<?php echo $this->lang->line("submit");?> ">
                  </div>
                </div>
              </div>

           
              <div class="column is-12">
                <!-- Profile Detail -->
               
                <div class="columns is-multiline">
                  <div class="column is-12" style="padding-bottom: .25rem;">
                    <div class="has-text-centered">
                        <div class="w-md-25 mx-auto">
                          <label class="label"><?php echo $this->lang->line("r_pass_new");?></label>
                          <div class="control">
                            <input type="password" class="input" id="inputPassword2" name="password_new" placeholder="<?php echo $this->lang->line("fillpass");?>" value="<?php echo set_value('password_new');?>" >
                          </div>
                        </div>
                       <?php echo form_error('password_new', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                    </div>
                  </div>
                  <div class="column is-12" style="padding-bottom: .25rem;">
                    <div class="has-text-centered">
                        <div class="w-md-25 mx-auto">
                          <label class="label"><?php echo $this->lang->line("r_pass_confirm");?></label>
                          <div class="control">
                             <input type="password" class="input" id="inputPassword3"  name="re_password" placeholder="<?php echo $this->lang->line("fillpass");?>" value="<?php echo set_value('re_password');?>" >
                          </div>
                        </div>
                       <?php echo form_error('re_password', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                       <?php echo '<div class="error">'.$error_text3.'</div>';?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-12 is-hidden-tablet">
                <div class="columns is-mobile">               
                  <div class="column is-6 mx-auto"> 
                      <input type="submit" id="save1" class="button is-fullwidth is-orange is-outlined" name="submit_pass" value="<?php echo $this->lang->line("submit");?>">
                  </div>
                  
                </div>
              </div>

          </form>
      </div>
            </div>
            

            <div class="column is-12">
              <hr>
                <!-- Button For Rent -->
                <div class="w-md-25 mx-auto" id="add_sale">
                  <a href="<?php echo base_url('sale/sale_step1?id_login='.$id_login.'');?>" class="button is-orange is-medium is-fullwidth"
                    ><?php echo $this->lang->line("tt");?></a
                  >
                </div>
              </div>
           </div>
        </div>
      </div>
    </section>

    <!-- Member Details Rent & Buy -->
    <section class="member-details">
      <div class="container">
        <div class="w-md-75 mx-auto">
          <div class="member-box">
            <div class="columns is-multiline">
              <div class="column is-12">
                <!-- Title -->
                <div class="columns">
                  <div class="column is-12">
                    <!-- Title Text-->
                    <h5 class="title is-5">
                      <?php echo $this->lang->line("history");?>
                    </h5>
                  </div>
                </div>
              </div>
              <div class="column is-12">
                <!--Tabs -->
                <div class="tabs is-boxed">
                  <ul>
                    <li class="tab is-active" onclick="openTab(event,'buy')">
                      <a>
                        <span class="icon is-small"
                          ><i class="bx bxs-car" aria-hidden="true"></i
                        ></span>
                        <span><?php echo $this->lang->line("sale");?></span>
                      </a>
                    </li>
                    <li class="tab" onclick="openTab(event,'rent')">
                      <a>
                        <span class="icon is-small"
                          ><i class="bx bxs-cart" aria-hidden="true"></i
                        ></span>
                        <span><?php echo $this->lang->line("buy");?></span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="column is-12">
                <!-- Content sale -->
                <div id="buy" class="content-tab">
                  <?php if($data_history_count == "FALSE"){ ?>
                    <?php if($this->lang->line("set_lang")=="th"){?>
                      <div class="has-text-centered content">
                        ไม่มีข้อมูล
                      </div>
                      <?php }else{ ?>
                      <div class="has-text-centered content">
                        No Data
                      </div>
                    <?php } ?>
                  <?php }else{ ?>
                  <div class="columns is-multiline">
                    <?php foreach($data_history as $row){?>
                    <div class="column is-12">
                      <!-- Details Car Buy -->
                      <div class="car-buy-box">
                        <div class="columns">
                          <div class="column is-4">
                            <!-- Car Image -->
                            <div class="has-text-centered">
                              <figure class="image is-4by3 fig-image">
                                <?php if($row->thumb_name_multi==""){ ?>
                                <img
                                  class="img-rounded"
                                  src="<?php echo base_url('frontend');?>/assets/images/products/no-image.jpg"
                                  alt="Placeholder image"
                                />
                                <?php }else{ ?>
                                <img
                                  class="img-rounded"
                                  src="<?php echo base_url('uploads_car').'/'.$row->thumb_name_multi.'';?>"
                                  alt="Placeholder image"
                                />
                                <?php } ?>
                              </figure>
                            </div>
                          </div>
                          <div class="column is-5">
                            <!-- Car Details -->
                            <div clas="columns is-multiline">
                              <div
                                class="column is-12"
                                style="padding-bottom: .5rem;"
                              >
                                <!-- Type & Brand -->
                                <div class="columns">
                                  <div class="column is-5">
                                    <h6 class="title is-6">
                                      <?php if($this->lang->line("set_lang")=="th"){?>
                                        <?php echo @$row->name_type_th_t;?>
                                      <?php }else{?>
                                        <?php echo @$row->name_type_en_t;?>
                                      <?php }?>
                                    </h6>
                                  </div>
                                  <div class="column is-7">
                                    <p class="subtitle is-6">
                                      <?php if($this->lang->line("set_lang")=="th"){?>
                                        <?php echo @$row->name_th_o;?>&nbsp;<?php echo @$row->name_model_th2;?>
                                      <?php }else{?>
                                        <?php echo @$row->name_en_o;?>&nbsp;<?php echo @$row->name_model_th2;?>
                                      <?php }?>
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div
                                class="column is-12"
                                style="padding-bottom: .5rem;"
                              >
                                <!-- Gear -->
                                <div class="columns">
                                  <div class="column is-5">
                                    <h6 class="title is-6"><?php echo $this->lang->line("tx_gear");?> </h6>
                                  </div>
                                  <div class="column is-7">
                                    <p class="subtitle is-6">
                                      <?php if(!empty($row->name_gear_th) AND !empty($row->name_gear_en)){?>
                                        <?php if($this->lang->line("set_lang")=="th"){?>
                                          <?php echo @$row->name_gear_th;?>
                                        <?php }else{?>
                                          <?php echo @$row->name_gear_en;?>
                                        <?php }?>
                                      <?php }else{?>
                                        <?php if($row->name_gear!==""){?>
                                          <?php echo @$row->name_gear;?>
                                        <?php }?>
                                      <?php }?>
                                      <?php if($row->name_gear==""){echo "-";}?>
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div
                                class="column is-12"
                                style="padding-bottom: .5rem;"
                              >
                                <!-- Year -->
                                <div class="columns">
                                  <div class="column is-5">
                                    <h6 class="title is-6"><?php echo $this->lang->line("tx_year_pro");?></h6>
                                  </div>
                                  <div class="column is-7">
                                    <p class="subtitle is-6">
                                      <?php if(!empty($row->name_year_th) AND !empty($row->name_year_en)){?>
                                        <?php if($this->lang->line("set_lang")=="th"){?>
                                          <?php echo @$row->name_year_th;?>
                                        <?php }else{?>
                                          <?php echo @$row->name_year_en;?>
                                        <?php }?>
                                      <?php }else{?>
                                        <?php if($row->name_year_pro!==""){?>
                                          <?php echo @$row->name_year_pro;?>
                                        <?php }?>
                                      <?php }?>
                                      <?php if($row->name_year_pro==""){echo "-";}?>

                                  </p>
                                  </div>
                                </div>
                              </div>
                              <div
                                class="column is-12"
                                style="padding-bottom: .5rem;"
                              >
                                <!-- Color -->
                                <div class="columns">
                                  <div class="column is-5">
                                    <h6 class="title is-6"><?php echo $this->lang->line("tx_color");?></h6>
                                  </div>
                                  <div class="column is-7">
                                    <p class="subtitle is-6">
                                      <?php if(!empty($row->name_color_th) AND !empty($row->name_color_en)){?>
                                        <?php if($this->lang->line("set_lang")=="th"){?>
                                          <?php echo @$row->name_color_th;?>
                                        <?php }else{?>
                                          <?php echo @$row->name_color_en;?>
                                        <?php }?>
                                      <?php }else{?>
                                        <?php if($row->name_color!==""){?>
                                          <?php echo @$row->name_color;?>
                                        <?php }?>
                                      <?php }?>
                                      <?php if($row->name_color==""){echo "-";}?>
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div
                                class="column is-12"
                                style="padding-bottom: .5rem;"
                              >
                                <!-- Status -->
                                <div class="columns">
                                  <div class="column is-5">
                                    <h6 class="title is-6"><?php echo $this->lang->line("status");?></h6>
                                  </div>
                                  <div class="column is-7">
                                    <div class="tags has-addons">
                                    <?php if($row->status_id==1 OR $row->status_id==3) { ?>
                                      
                                      <span class="tag is-light is-small"><?php echo $this->lang->line("o"); ?> </span>
                                      <span class="tag is-success is-small" ><i class="bx bx-check"></i></span>

                                    <?php } elseif($row->status_id==4) { ?>

                                      <span class="tag is-light is-small"><?php echo $this->lang->line("c"); ?></span>
                                      <span class="tag is-danger is-small"><i class="bx bx-x"></i></span>

                                    <?php } elseif($row->status_id==2) { ?>

                                      <span class="tag is-light is-small"><?php echo $this->lang->line("cc"); ?></span>
                                      <span class="tag is-danger is-small"><i class="bx bx-x"></i></span>

                                    <?php } else { ?>

                                      <span class="tag is-light is-small"><?php echo $this->lang->line("w"); ?></span>
                                      <span class="tag is-warning is-small"><i class="bx bx-time"></i></span>

                                    <?php } ?>
                                    </div>
                                  </div>
                                </div>
                                <div class="columns">
                                  <div class="column is-5">
                                    <h6 class="title is-6"><?php echo $this->lang->line("messageadmin");?></h6>
                                  </div>
                                  <div class="column is-7">
                                    <div class="tags has-addons">
                                     
                                     
                                     <?php echo @nl2br($row->comment);?>
                                     
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="column is-3">
                            <!-- Button Edit -->
                            <div class="columns is-multiline">
                              <div class="column is-12">
                                <!-- Price Box -->
                                <div class="price-history-box">
                                  <h6 class="title is-6 has-text-orange has-text-centered">
                                    <?php echo @number_format($row->name_price).' '.$this->lang->line("baht");?>
                                  </h6>
                                </div>
                              </div>
                              <div class="column is-12">
                                <!-- Button -->
                                <a
                                  href="<?php echo base_url('buy/car_view/'.$row->car_top_id.'');?>"
                                  target="_blank"
                                  class="button is-orange is-medium is-fullwidth"
                                  ><?php echo $this->lang->line("sub_view");?></a
                                >

                               
                                <br>
                                <a
                                  href="<?php echo base_url('sale/sale_step1?id_login='.$row->id_login.'&car_top_id='.$row->car_top_id.'');?>"
                                  class="button is-orange is-medium is-fullwidth"
                                  ><?php echo $this->lang->line("editdata");?></a
                                >
                                
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php }?>
                  </div>
                  <?php } ?>
                </div>
                <!-- Content buy -->
                <div id="rent" class="content-tab" style="display:none">
                  <?php if($data_history_count_buy == "FALSE"){ ?>
                    <?php if($this->lang->line("set_lang")=="th"){?>
                      <div class="has-text-centered content">
                        ไม่มีข้อมูล
                      </div>
                      <?php }else{ ?>
                      <div class="has-text-centered content">
                        No Data
                      </div>
                    <?php } ?>
                  <?php }else{ ?>  
                  <div class="columns is-multiline">
                    <?php foreach($data_history_buy as $row){?>
                    <div class="column is-12">
                      <!-- Details Car Rent -->
                      <div class="car-rent-box">
                        <div class="columns">
                          <div class="column is-4">
                            <!-- Car Image -->
                            <div class="has-text-centered">
                              <figure class="image is-4by3 fig-image">
                                <?php if($row->thumb_name_multi==""){ ?>
                                <img
                                  class="img-rounded"
                                  src="<?php echo base_url('frontend');?>/assets/images/products/no-image.jpg"
                                  alt="Placeholder image"
                                />
                                <?php }else{ ?>
                                <img
                                  class="img-rounded"
                                  src="<?php echo base_url('uploads_car').'/'.$row->thumb_name_multi.'';?>"
                                  alt="Placeholder image"
                                />
                                <?php } ?>
                              </figure>
                            </div>
                          </div>
                          <div class="column is-5">
                            <!-- Car Details -->
                            <div clas="columns is-multiline">
                              <div
                                class="column is-12"
                                style="padding-bottom: .5rem;"
                              >
                                <!-- Type & Brand -->
                                <div class="columns">
                                  <div class="column is-5">
                                    <h6 class="title is-6">
                                      <?php if($this->lang->line("set_lang")=="th"){?>
                                        <?php echo @$row->name_type_th_t;?>
                                      <?php }else{?>
                                        <?php echo @$row->name_type_en_t;?>
                                      <?php }?>
                                    </h6>
                                  </div>
                                  <div class="column is-7">
                                    <p class="subtitle is-6">
                                      <?php if($this->lang->line("set_lang")=="th"){?>
                                        <?php echo @$row->name_th_o;?>&nbsp;<?php echo @$row->name_model_th2;?>
                                      <?php }else{?>
                                        <?php echo @$row->name_en_o;?>&nbsp;<?php echo @$row->name_model_th2;?>
                                      <?php }?>
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div
                                class="column is-12"
                                style="padding-bottom: .5rem;"
                              >
                                <!-- Gear -->
                                <div class="columns">
                                  <div class="column is-5">
                                    <h6 class="title is-6">
                                      <?php echo $this->lang->line("tx_gear");?> 
                                    </h6>
                                  </div>
                                  <div class="column is-7">
                                    <p class="subtitle is-6">
                                      <?php if(!empty($row->name_gear_th) AND !empty($row->name_gear_en)){?>
                                        <?php if($this->lang->line("set_lang")=="th"){?>
                                          <?php echo @$row->name_gear_th;?>
                                        <?php }else{?>
                                          <?php echo @$row->name_gear_en;?>
                                        <?php }?>
                                      <?php }else{?>
                                        <?php if($row->name_gear!==""){?>
                                          <?php echo @$row->name_gear;?>
                                        <?php }?>
                                      <?php }?>
                                      <?php if($row->name_gear==""){echo "-";}?>
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div
                                class="column is-12"
                                style="padding-bottom: .5rem;"
                              >
                                <!-- Year -->
                                <div class="columns">
                                  <div class="column is-5">
                                    <h6 class="title is-6"> <?php echo $this->lang->line("tx_year_pro");?></h6>
                                  </div>
                                  <div class="column is-7">
                                    <p class="subtitle is-6">
                                      <?php if(!empty($row->name_year_th) AND !empty($row->name_year_en)){?>
                                        <?php if($this->lang->line("set_lang")=="th"){?>
                                          <?php echo @$row->name_year_th;?>
                                        <?php }else{?>
                                          <?php echo @$row->name_year_en;?>
                                        <?php }?>
                                      <?php }else{?>
                                        <?php if($row->name_year_pro!==""){?>
                                          <?php echo @$row->name_year_pro;?>
                                        <?php }?>
                                      <?php }?>
                                      <?php if($row->name_year_pro==""){echo "-";}?>
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div
                                class="column is-12"
                                style="padding-bottom: .5rem;"
                              >
                                <!-- Color -->
                                <div class="columns">
                                  <div class="column is-5">
                                    <h6 class="title is-6"><?php echo $this->lang->line("tx_color");?></h6>
                                  </div>
                                  <div class="column is-7">
                                    <p class="subtitle is-6">
                                      <?php if(!empty($row->name_color_th) AND !empty($row->name_color_en)){?>
                                        <?php if($this->lang->line("set_lang")=="th"){?>
                                          <?php echo @$row->name_color_th;?>
                                        <?php }else{?>
                                          <?php echo @$row->name_color_en;?>
                                        <?php }?>
                                      <?php }else{?>
                                        <?php if($row->name_color!==""){?>
                                          <?php echo @$row->name_color;?>
                                        <?php }?>
                                      <?php }?>
                                      <?php if($row->name_color==""){echo "-";}?>
                                    </p>
                                  </div>
                                </div>
                              </div>

                              <div
                                class="column is-12"
                                style="padding-bottom: .5rem;"
                              >
                                <!-- bank -->
                                <div class="columns">
                                  <div class="column is-5">
                                    <h6 class="title is-6"><?php echo $this->lang->line("bank");?></h6>
                                  </div>
                                  <div class="column is-7">
                                    <p class="subtitle is-6">
                                      <?php if(!empty($row->bank_name_th) AND !empty($row->bank_name_en)){?>
                                        <?php if($this->lang->line("set_lang")=="th"){?>
                                          <?php echo @$row->bank_name_th;?>
                                        <?php }else{?>
                                          <?php echo @$row->bank_name_en;?>
                                        <?php }?>
                                      <?php }?>
                                       
                                      <?php if($row->bank_name_th=="" AND $row->bank_name_en==""){echo "-";}?>
                                    </p>
                                  </div>
                                </div>
                              </div>

                              <div
                                class="column is-12"
                                style="padding-bottom: .5rem;"
                              >
                                <!-- bank -->
                                <div class="columns">
                                  <div class="column is-5">
                                    <h6 class="title is-6"><?php echo $this->lang->line("num");?></h6>
                                  </div>
                                  <div class="column is-7">
                                    <p class="subtitle is-6">
                                      <?php if(!empty($row->installment_period)){?>
                                        
                                          <?php echo @$row->installment_period.' '.$this->lang->line("period");?>
                                       
                                      <?php }?>
                                       
                                      <?php if($row->installment_period==""){echo "-";}?>
                                    </p>
                                  </div>
                                </div>
                              </div>

                              <div
                                class="column is-12"
                                style="padding-bottom: .5rem;"
                              >
                                <!-- bank -->
                                <div class="columns">
                                  <div class="column is-5">
                                    <h6 class="title is-6"><?php echo $this->lang->line("num1");?></h6>
                                  </div>
                                  <div class="column is-7">
                                    <p class="subtitle is-6">
                                      <?php if(!empty($row->installment_amount)){?>
                                        
                                          <?php echo @$row->installment_amount.' '.$this->lang->line("baht");?>
                                       
                                      <?php }?>
                                       
                                      <?php if($row->installment_amount==""){echo "-";}?>
                                    </p>
                                  </div>
                                </div>
                              </div>


                              <div
                                class="column is-12"
                                style="padding-bottom: .5rem;"
                              >
                                <!-- bank -->
                                <div class="columns">
                                  <div class="column is-5">
                                    <h6 class="title is-6"><?php echo $this->lang->line("amoutdownpayment");?></h6>
                                  </div>
                                  <div class="column is-7">
                                    <p class="subtitle is-6">
                                      <?php if(!empty($row->downpayment_buy)){?>
                                        
                                          <?php echo @number_format($row->downpayment_buy).' '.$this->lang->line("baht");?>
                                       
                                      <?php }?>
                                       
                                      <?php if($row->downpayment_buy==""){echo "-";}?>
                                    </p>
                                  </div>
                                </div>
                              </div>


                            </div>
                          </div>
                          <div class="column is-3">
                            <!-- Button Edit -->
                            <div class="columns is-multiline">
                              <div class="column is-12">
                                <!-- Price Box -->
                                <div class="price-history-box">
                                  <h6 class="title is-6 has-text-orange has-text-centered" >
                                    <?php if($row->price_buy!=""){?>
                                      <?php echo @number_format($row->price_buy).' '.$this->lang->line("baht");?>
                                    <?php }else{
                                      echo "0 ".$this->lang->line("baht");
                                    } ?>
                                  </h6>
                                </div>
                              </div>
                              <div class="column is-12">
                                <!-- Button -->
                                <a
                                  href="<?php echo base_url('buy/car_view/'.$row->buy_car_id.'?page=buy&&car_top_id='.$row->car_top_id.'&&id_login='.$row->id_login.'');?>"
                                  target="_blank"
                                  class="button is-orange is-medium is-fullwidth"
                                  ><?php echo $this->lang->line("sub_view");?></a
                                >
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



 <script type="text/javascript">
  
  $("#update").on("click", function(){
  $("#save").show();
  $("#update").hide();
  $("#inputName").prop("disabled", false);
  $("#inputPhone").prop("disabled", false);
  $("#imgInp").prop("disabled", false);
  $("#show_img1").hide();
  $("#show_img2").show();
  $("#icon_change_pass1").hide();
  $("#icon_change_pass2").show();

  $("#name1").hide();
  $("#name2").show();
  $("#tel1").hide();
  $("#tel2").show();

  $("#add_sale").hide();
  $("#clickbox").hide();

  });

 $(document).ready(function(){
  var check = '<?php echo $this->input->get('check');?>';
if (check == '') {
  $("#save").hide();
  $("#inputName").prop("disabled", true);
  $("#inputPhone").prop("disabled", true);
  $("#imgInp").prop("disabled", true);
  $("#show_img1").show();
  $("#show_img2").hide();
  $("#icon_change_pass1").show();
  $("#icon_change_pass2").hide();

  $("#name1").show();
  $("#name2").hide();
  $("#tel1").show();
  $("#tel2").hide();

  $("#add_sale").show();
  $("#clickbox").show();


}else{
  $("#update").hide();
  $("#inputName").prop("disabled", false);
  $("#inputPhone").prop("disabled", false);
  $("#imgInp").prop("disabled", false);
  $("#show_img1").hide();
  $("#show_img2").show();
  $("#icon_change_pass1").hide();
  $("#icon_change_pass2").show();

  $("#name1").hide();
  $("#name2").show();
  $("#tel1").hide();
  $("#tel2").show();

  $("#add_sale").hide();
  $("#clickbox").hide();
}
})

</script>

<script type="text/javascript">
  
  $("#update11").on("click", function(){
  $("#save11").show();
  $("#update11").hide();
  $("#inputName").prop("disabled", false);
  $("#inputPhone").prop("disabled", false);
  $("#imgInp").prop("disabled", false);
  $("#show_img1").hide();
  $("#show_img2").show();
  $("#icon_change_pass1").hide();
  $("#icon_change_pass2").show();

  $("#name1").hide();
  $("#name2").show();
  $("#tel1").hide();
  $("#tel2").show();

  $("#add_sale").hide();
  $("#clickbox").hide();

  });

 $(document).ready(function(){
  var check = '<?php echo $this->input->get('check');?>';
if (check == '') {
  $("#save11").hide();
  $("#inputName").prop("disabled", true);
  $("#inputPhone").prop("disabled", true);
  $("#imgInp").prop("disabled", true);
  $("#show_img1").show();
  $("#show_img2").hide();
  $("#icon_change_pass1").show();
  $("#icon_change_pass2").hide();

  $("#name1").show();
  $("#name2").hide();
  $("#tel1").show();
  $("#tel2").hide();
   $("#add_sale").show();

}else{
  $("#update11").hide();
  $("#inputName").prop("disabled", false);
  $("#inputPhone").prop("disabled", false);
  $("#imgInp").prop("disabled", false);
  $("#show_img1").hide();
  $("#show_img2").show();
  $("#icon_change_pass1").hide();
  $("#icon_change_pass2").show();

  $("#name1").hide();
  $("#name2").show();
  $("#tel1").hide();
  $("#tel2").show();

   $("#add_sale").hide();

}
})

</script>
  

 <script type="text/javascript">
$(document).ready(function() {
    let hasHide = $("#boxshow").hasClass('is-hidden');
    if(!hasHide) {
        $('#boxshow').show().toggleClass('change');
        $('#clickbox').find('p').text('<?php echo $this->lang->line("canclepass");?>');
        $('#add_sale').toggleClass('is-hidden');
        $('#button_edit_data2').toggleClass('is-hidden');
        $('#button_edit_data1').toggleClass('is-hidden');
    }
});

$( "#clickbox" ).click(function() {
    let hasClass = $("#boxshow").hasClass('change');
    let hasHide = $("#boxshow").hasClass('is-hidden');
    if(hasHide) {
        $("#boxshow").removeClass('is-hidden').hide();
    }
    if(hasClass) {
        $(this).find('p').text('<?php echo $this->lang->line("chpass");?>');
    } else {
        $(this).find('p').text('<?php echo $this->lang->line("canclepass");?>');
    }
    $('#boxshow').toggle('swing').toggleClass('change');
    $('#add_sale').toggleClass('is-hidden');
    $('#button_edit_data2').toggleClass('is-hidden');
    $('#button_edit_data1').toggleClass('is-hidden');
});
</script>

 