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

 
</style>
 <!-- Member Edit -->
<style type="text/css">
  .error{color: red;}
</style>
 <!-- Member Details -->
    <?php echo form_open_multipart('sale/edit_account?id_login='.$this->session->userdata('member_id_log').'&&check=button');?>
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
                      <?php echo $this->lang->line("resume");?>
                    </h5>
                  </div>
                </div>
              </div>
              <div class="column is-12">
                <!--Tabs -->
                <div class="tabs is-boxed">
                  <ul>
                    <li class="tab1 is-active">
                      <a href="<?php echo base_url('sale');?>">
                        <span class="icon is-small"
                          ><i class="bx bxs-user" aria-hidden="true"></i
                        ></span>
                        <span><?php echo $this->lang->line("edit_resume");?></span>
                      </a>
                    </li>
                    <li class="tab1" id="icon_change_pass1">
                      <a href="<?php echo base_url('sale/edit_password?id_login='.$this->session->userdata('member_id_log').'');?>">
                        <span class="icon is-small"
                          ><i class="bx bxs-user" aria-hidden="true"></i
                        ></span>
                        <span><?php echo $this->lang->line("txt_change_pass");?></span>
                      </a>
                    </li>
                    <li class="tab1" id="icon_change_pass2">
                      <a href="#" onclick="if(!confirm('<?php echo $this->lang->line("fillplease");?>')) window.location.href='<?php echo base_url('sale/edit_password?id_login='.$this->session->userdata('member_id_log').'');?>';">
                        <span class="icon is-small"
                          ><i class="bx bxs-user" aria-hidden="true"></i
                        ></span>
                        <span><?php echo $this->lang->line("txt_change_pass");?></span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>

              <a href="#" onclick="if(!confirm('<?php echo $this->lang->line("fillplease");?>')) window.location.href='<?php echo base_url('sale/edit_password?id_login='.$this->session->userdata('member_id_log').'');?>';">click</a>

              <form action="" method="post">
                <input type="text" name="name">
                <input type="submit" value="submit">
              </form>

              <div class="column is-12">
                <!-- Content resume -->
                <div id="resume" class="content-tab1">
                  <div class="column is-10 mx-auto">
                      <div class="field">
                        <label class="label"><?php echo $this->lang->line("picprofile");?></label>
                        <div class="control" id="show_img1">
                          <div class="image-button1 mx-auto" style="opacity: 0.5;background-image: url('<?php if($resume['img']!=""){echo base_url('uploads/'.$resume['img'].'');}else{echo base_url('frontend/assets/images/none.jpg');}?>');">
                          </div>
                        </div>
                        <div class="control" id="show_img2">
                           <div class="image-button mx-auto" id="imgInp1-container" style="border: 1px solid #ccc; background-image: url('<?php if($resume['img']!=""){echo base_url('uploads/'.$resume['img'].'');}else{echo base_url('frontend/assets/images/none.jpg');}?>');">
                                  <input type="file" name="userfile" id="imgInp1" class="image-button">
                                  <div class="trans">
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
                      <div class="field">
                        <label class="label"><?php echo $this->lang->line("r_name");?></label>
                        <div class="control">
                           <input type="text" class="input" id="inputName"  name="name" placeholder="<?php echo $this->lang->line("r_name");?>" value="<?php if(set_value('name')){echo set_value('name');}else{echo $resume['name'];}?>">
                        </div>
                         <?php echo form_error('name', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                      </div>
                      <div class="field">
                        <label class="label"><?php echo $this->lang->line("r_tel");?></label>
                        <div class="control">
                          <input type="tel" class="input" id="inputPhone" name="tel" value="<?php if(set_value('tel')){echo set_value('tel');}else{echo $resume['tel'];}?>"  placeholder="<?php echo $this->lang->line("r_tel");?>">
                        </div>
                        <?php echo form_error('tel', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                      </div>
                      <div class="w-md-25 mx-auto">
                        <input type="button" id="update" class="button is-orange is-medium is-fullwidth" name="submit_pass" value="<?php echo $this->lang->line('edit');?>">

                        <input type="submit" id="save" class="button is-orange is-medium is-fullwidth" name="submit_pass" value="<?php echo $this->lang->line("submit");?> ">
                      </div>
                  </div>
                </div>
                <!-- Content changepass -->
                <div id="changepass" class="content-tab1" style="display:none">
                  <div class="field">
                        <label class="label"><?php echo $this->lang->line("r_pass_old");?></label>
                        <div class="control">
                          <input type="password" class="input" id="inputPassword1" placeholder="<?php echo $this->lang->line("r_pass_old");?>" name="password" value="<?php echo set_value('password');?>">
                        </div>
                        <?php echo form_error('password', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                          <?php echo '<div class="error">'.$error_text2.'</div>';?>
                  </div>
                  <div class="field">
                        <label class="label"><?php echo $this->lang->line("r_pass_new");?></label>
                        <div class="control">
                          <input type="password" class="input" id="inputPassword2" name="password_new" placeholder="<?php echo $this->lang->line("r_pass_new");?>" value="<?php echo set_value('password_new');?>" >
                        </div>
                        <?php echo form_error('password_new', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                  </div>
                  <div class="field">
                        <label class="label"><?php echo $this->lang->line("r_pass_confirm");?></label>
                        <div class="control">
                          <input type="password" class="input" id="inputPassword3"  name="re_password" placeholder="<?php echo $this->lang->line("r_pass_confirm");?>" value="<?php echo set_value('re_password');?>" >
                        </div>
                         <?php echo form_error('re_password', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                         <?php echo '<div class="error">'.$error_text3.'</div>';?>
                  </div>
                  <div class="column is-12">
                      <div class="w-md-25 mx-auto">
                        <input type="submit" id="show8" class="button is-orange is-medium is-fullwidth" name="submit_pass" value="<?php echo $this->lang->line("submit");?> ">
                      </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </form>

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
                <!-- Content Buy -->
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
                              <figure class="image is-4by3">
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
                                      <span class="tag is-light is-small"
                                        ><?php echo $this->lang->line("o"); ?></span
                                      >
                                      <span class="tag is-success is-small"
                                        ><i class="bx bx-check"></i
                                      ></span>
                                      <?php } elseif($row->status_id==4) { ?>
                                      <span class="tag is-light is-small"
                                        ><?php echo $this->lang->line("c"); ?></span
                                      >
                                      <span class="tag is-danger is-small"
                                        ><i class="bx bx-x"></i
                                      ></span>
                                    <?php } elseif($row->status_id==2) { ?>
                                      <span class="tag is-light is-small"
                                        ><?php echo $this->lang->line("cc"); ?></span
                                      >
                                      <span class="tag is-danger is-small"
                                        ><i class="bx bx-x"></i
                                      ></span>
                                      <?php } else { ?>
                                      <span class="tag is-light is-small"
                                        ><?php echo $this->lang->line("w"); ?></span
                                      >
                                      <span class="tag is-warning is-small"
                                        ><i class="bx bx-time"></i
                                      ></span>
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
                                  <h6
                                    class="title is-6 has-text-orange has-text-centered"
                                  >
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

                                <?php if($row->status_id == 0 AND $row->comment !== ""){?>
                                <br>
                                <a
                                  href="<?php echo base_url('sale/sale_step1?id_login='.$row->id_login.'&car_top_id='.$row->car_top_id.'');?>"
                                  class="button is-orange is-medium is-fullwidth"
                                  ><?php echo $this->lang->line("editdata");?></a
                                >
                                <?php } ?>
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
                <!-- Content Rent -->
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
                              <figure class="image is-4by3">
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
                                  <h6
                                    class="title is-6 has-text-orange has-text-centered"
                                  >
                                    <?php if($row->name_price!=""){?>
                                      <?php echo @number_format($row->name_price).' '.$this->lang->line("baht");?>
                                    <?php } ?>
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
}else{
  $("#update").hide();
  $("#inputName").prop("disabled", false);
  $("#inputPhone").prop("disabled", false);
  $("#imgInp").prop("disabled", false);
  $("#show_img1").hide();
  $("#show_img2").show();
  $("#icon_change_pass1").hide();
  $("#icon_change_pass2").show();
}
})

</script>




