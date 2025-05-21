<style type="text/css">
  .error{color: red;}
</style>
    <!-- Section Rent Step 2 -->
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
                  <?php $url = @$_SERVER['HTTP_REFERER']; //ลิ้งค์ก่อนหน้า?>
                  <div class="step-item <?php if($step1){echo "is-completed is-success";}?>">
                    <?php ?>
                    <a <?php if($step1){?>href="<?php if($step1){echo $url_step1;}?>"
                      <?php }?>>
                      <div class="step-marker">1</div>
                    </a>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 1</p>
                      <p><?php echo $this->lang->line("txt_fill_place");?></p>
                    </div>
                  </div>
                  <div class="step-item is-active">
                    <div class="step-marker">2</div>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 2</p>
                      <p><?php echo $this->lang->line("txt_fill_des");?></p>
                    </div>
                    <div class="step-dec"></div>
                  </div>
                  <div class="step-item <?php if($step3){echo "is-completed is-success";}?>">
                    <a <?php if($step3){?>href="<?php if($step3){echo $url3;}?>"
                      <?php }?>>
                      <div class="step-marker">3</div>
                    </a>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 3</p>
                      <p><?php echo $this->lang->line("txt_upload_pic");?></p>
                    </div>
                  </div>
                  <div class="step-item <?php if($step4){echo "is-completed is-success";}?>">
                    <a <?php if($step4){?>href="<?php if($step4){echo $url4;}?>"
                      <?php }?>>
                      <div class="step-marker">4</div>
                    </a>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 4</p>
                      <p><?php echo $this->lang->line("txt_upload_file");?></p>
                    </div>
                  </div>
                  <div class="step-item <?php if($step5){echo "is-completed is-success";}?>">
                    <a <?php if($step5){?>href="<?php if($step5){echo $url5;}?>"
                      <?php }?>>
                      <div class="step-marker">5</div>
                    </a>
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
                  <div class="step-item is-active">
    
                    <div class="step-marker">2</div>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 2</p>
                      <p><?php echo $this->lang->line("txt_fill_des");?></p>
                    </div>
                    <div class="step-dec"></div>
               
                  </div>
                  <div class="step-item is-completed is-success">
                    <a href="<?php echo base_url("sale/gallery_multi/1/1/?id_login=".$this->input->get('id_login')."&car_top_id=".$this->input->get('car_top_id')."");?>">
                      <div class="step-marker">3</div> </a>
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


              <?php }?>


              </div>
              <div class="column is-12">
                <div class="content has-text-centered">
                  <h4 class="title is-4"><?php echo $this->lang->line("txt_fill_des");?></h4>
                  <p class="subititle is-6">
                    <?php echo $this->lang->line("txtt_fill");?>
                  </p>
                </div>
                <hr class="spacer" />
              </div>
              <!-- Section From -->
              <div class="column is-12">
                <div class="w-md-75 mx-auto">
                  <div class="rent-input">
                    <form action="<?php echo base_url('sale/sale_step2?province='.$this->input->get('province').'&&id_login='.$id_login.'&&car_top_id='.$this->input->get('car_top_id').'');?>#scroll" method="post">
<!--////////////////////////////step1////////////////////////////////////////////////////////-->



<input type="hidden" name="province" value="<?php if($this->input->get('province')){ echo $this->input->get('province');}else{ if(!empty($province)){echo $province;}else{echo @$car_data['province'];}} ?>">
<input type="hidden" name="id_login" value="<?php if(set_value("id_login")){echo set_value("id_login");}else{echo $id_login;}?>">
<input type="hidden" name="lang" value="<?php if(set_value("lang")){echo set_value("lang");}else{echo $this->lang->line("set_lang");}?>">        

<!--/////////////////////////////////ประเภท//////////////////////////////////////////////-->
                      <div class="columns is-multiline">
                        <div class="column is-12">
                          <div class="columns is-multiline">
                            <div class="column is-12">
                              <div class="columns">

                                <div class="column is-6" id="name_type1">
                                  <div class="w-md-100 mx-auto">
                                    <div class="field" >
                                      <label class="label has-text-weight-bold"
                                        ><?php echo $this->lang->line("tx_type");?>
                                        <span style="color: red;"
                                          >*  </span
                                        ></label
                                      >
                                      <div class="control">
                                        <div class="select is-fullwidth"> 
                                           <select   name="name_type" id="category" data-child="family" onchange="changeOption(event)">
                                             <option value=""><?php echo $this->lang->line("t_select");?></option>


                                          <?php  foreach($result_type as $row){?>

                                            <?php if($this->lang->line("set_lang")=="th"){?>

                                              <option value="<?php echo $row->car_type_id;?>" <?php if(set_value('name_type')==$row->car_type_id OR $name_type==$row->car_type_id OR @$car_data['car_type_id']==$row->car_type_id){echo "selected";}?>>
                                              <?php echo $row->name_type_th;?>
                                              </option>

                                            <?php }else{?>

                                              <option value="<?php echo $row->car_type_id;?>" <?php if(set_value('name_type')==$row->car_type_id OR $name_type==$row->car_type_id OR @$car_data['car_type_id']==$row->car_type_id){echo "selected";}?>>
                                              <?php echo $row->name_type_en;?>
                                              </option>
                                              
                                            <?php }?>

                                          <?php }?>
                                          </select>
                                      
                                            
                                        </div>
                                      </div>
                                      <?php echo form_error('name_type', '<span class="error" style="padding: 1% 0%;">', '</span>'); ?>
                                    </div>
                                  </div>
                                </div>
                                <!--/////////////////////////////////สีรถ//////////////////////////////////////////////-->
                                <div class="column is-6">
                                  <div class="w-md-100 mx-auto">
                                    <div class="field">
                                      <label class="label has-text-weight-bold"
                                        ><?php echo $this->lang->line("tx_color");?>
                                       <span style="color: red;"
                                          >*  </span
                                        ></label
                                      >
                                      <div class="control">
                                        <div class="select is-fullwidth">
                                          <select name="name_color"  class="form-control" id="exampleFormControlSelect1">
                                             <option value=""><?php echo $this->lang->line("t_select");?></option>
                                          <?php  foreach($result_color as $row){?>
                                            <?php if($this->lang->line("set_lang")=="th"){?>
                                            
                                            <option value="<?php echo $row->name_color_th; ?>" <?php if(set_value('name_color')==$row->name_color_th OR $name_color==$row->name_color_th OR @$car_data['name_color']==$row->name_color_th ){echo "selected";}?>><?php echo $row->name_color_th;?></option>
                                   
                                            <?php }else{?>

                                             <option value="<?php echo $row->name_color_en; ?>" <?php if(set_value('name_color')==$row->name_color_en OR $name_color==$row->name_color_en OR @$car_data['name_color']==$row->name_color_en){echo "selected";}?>><?php echo $row->name_color_en;?></option>

                                            <?php }?>
                                          <?php }?>

                                        </select>
                                        
                                        </div>
                                      </div>
                                      <?php echo form_error('name_color', '<span class="error" style="padding: 1% 0%;">', '</span>'); ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="column is-12">
                              <div class="columns">

                                <!--/////////////////////////////////ยี่ห้อ//////////////////////////////////////////////-->
                                <div class="column is-6" id="name1">
                                  <div class="w-md-100 mx-auto">
                                    <div class="field">
                                      <label class="label has-text-weight-bold"
                                        ><?php echo $this->lang->line("tx_brand");?>
                                        <span style="color: red;"
                                          >*  </span
                                        ></label
                                      >
                                      <div class="control">
                                        <div class="select is-fullwidth">
                                           <select name="name" class="form-control" id="family" data-child="item" onchange="changeOption(event)">
                                            <option data-group='SHOW' value=""><?php echo $this->lang->line("t_select");?></option>
                                              <?php  foreach($result as $row){?>

                                                <?php if($this->lang->line("set_lang")=="th"){?>

                                                  <option data-group="<?php echo $row->car_type_id;?>"  value="<?php echo $row->car_id;?>" <?php if(set_value('name')==$row->car_id OR $this->input->post('name')==$row->car_id OR $name==$row->car_id OR @$car_data['car_id']==$row->car_id){echo "selected";}?>>
                                                  <?php echo $row->name_th;?>
                                                  </option>

                                                <?php }else{?>

                                                  <option data-group="<?php echo $row->car_type_id;?>"  value="<?php echo $row->car_id;?>" <?php if(set_value('name')==$row->car_id  OR $this->input->post('name')==$row->car_id  OR $name==$row->car_id OR @$car_data['car_id']==$row->car_id){echo "selected";}?>>
                                                  <?php echo $row->name_en;?>
                                                  </option>
                                                  
                                                <?php }?>

                                              <?php }?>
                                              </select>
                                            
                                        </div>
                                      </div>
                                      <?php echo form_error('name', '<span class="error" style="padding: 1% 0%;">', '</span>'); ?>
                                    </div>
                                  </div>
                                </div>

                                 <!--/////////////////////////////////ระบบเกียร์//////////////////////////////////////////////-->

                                <div class="column is-6">
                                  <div class="w-md-100 mx-auto">
                                    <div class="field">
                                      <label class="label has-text-weight-bold"
                                        ><?php echo $this->lang->line("tx_gear");?>
                                        </label
                                      >
                                      <div class="control">
                                        <div class="select is-fullwidth">
                                          <select name="name_gear" class="form-control" id="exampleFormControlSelect1">
                                               <option value=""><?php echo $this->lang->line("t_select");?></option>
                                          <?php  foreach($result_gear as $row){?>
                                            <?php if($this->lang->line("set_lang")=="th"){?>
                                            
                                            <option value="<?php echo $row->name_gear_th; ?>" <?php if(set_value('name_gear')==$row->name_gear_th OR $name_gear==$row->name_gear_th OR @$car_data['name_gear']==$row->name_gear_th){echo "selected";}?>><?php echo $row->name_gear_th;?></option>
                                   
                                            <?php }else{?>

                                             <option value="<?php echo $row->name_gear_en; ?>" <?php if(set_value('name_gear')==$row->name_gear_en OR $name_gear==$row->name_gear_en OR @$car_data['name_gear']==$row->name_gear_en){echo "selected";}?>><?php echo $row->name_gear_en;?></option>

                                            <?php }?>
                                          <?php }?>

                                        </select>
                                          <?php echo form_error('name_gear', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                          <!--/////////////////////////////////รุ่นรถ//////////////////////////////////////////////-->
                            <div class="column is-12">
                              <div class="columns">
                                <div class="column is-6" id="name_model1">
                                  <div class="w-md-100 mx-auto">
                                    <div class="field">
                                      <label class="label has-text-weight-bold"
                                        ><?php echo $this->lang->line("tx_model");?>
                                        <span style="color: red;"
                                          >*  </span
                                        ></label
                                      >
                                      <div class="control">
                                        <div class="select is-fullwidth">
                                          <select  name="name_model"  class="form-control" id="item" data-child="item2" onchange="changeOption(event)">
                                           <option data-group='SHOW'  value=""><?php echo $this->lang->line("t_select");?></option>
                                          <?php  foreach($result_model as $row){?>

                                            <?php if($this->lang->line("set_lang")=="th"){?>

                                              <option data-group="<?php echo $row->car_id;?>" value="<?php echo $row->car_model_id;?>" <?php if(set_value('name_model')==$row->car_model_id OR $this->input->get('name_model') == $row->car_model_id  OR $name_model==$row->car_model_id OR @$car_data['car_model_id']==$row->car_model_id){echo "selected";}?>>
                                              <?php echo $row->name_model_th;?>
                                              </option>

                                            <?php }else{?>

                                             <option data-group="<?php echo $row->car_id;?>" value="<?php echo $row->car_model_id;?>" <?php if(set_value('name_model')==$row->car_model_id OR $this->input->get('name_model') == $row->car_model_id OR $name_model==$row->car_model_id  OR @$car_data['car_model_id']==$row->car_model_id){echo "selected";}?>>
                                              <?php echo $row->name_model_en;?>
                                              </option>
                                              
                                            <?php }?>

                                          <?php }?>
                                          </select>

                                          
                                        </div>
                                      </div>
                                      <?php echo form_error('name_model', '<span class="error" style="padding: 1% 0%;">', '</span>'); ?>
                                    </div>
                                  </div>
                                </div>
                                <!--/////////////////////////////////ความจุเครื่องยนต์//////////////////////////////////////////////-->
                                <div class="column is-6">
                                  <div class="w-md-100 mx-auto">
                                    <div class="field">
                                      <label class="label has-text-weight-bold"
                                        ><?php echo $this->lang->line("tx_capacity");?>
                                        </label
                                      >
                                      <div class="control">
                                        <div class="select is-fullwidth">
                                          <select name="name_capacity" class="form-control" id="exampleFormControlSelect1">
                                              <option value=""><?php echo $this->lang->line("t_select");?></option>
                                          <?php  foreach($result_capacity as $row){?>
                                            <?php if($this->lang->line("set_lang")=="th"){?>
                                            
                                            <option value="<?php echo $row->name_capacity_th; ?>" <?php if(set_value('name_capacity')==$row->name_capacity_th OR $name_capacity==$row->name_capacity_th  OR @$car_data['name_capacity']==$row->name_capacity_th){echo "selected";}?>><?php echo $row->name_capacity_th." CC";?></option>
                                   
                                            <?php }else{?>

                                             <option value="<?php echo $row->name_capacity_en; ?>" <?php if(set_value('name_capacity')==$row->name_capacity_en OR $name_capacity==$row->name_capacity_en OR @$car_data['name_capacity']==$row->name_capacity_en){echo "selected";}?>><?php echo $row->name_capacity_en." CC";?></option>

                                            <?php }?>
                                          <?php }?>

                                        </select>
                                          <?php echo form_error('name_capacity', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                             <!--/////////////////////////////////ปีที่ผลิต//////////////////////////////////////////////-->
                            <div class="column is-12">
                              <div class="columns">
                                <div class="column is-6">
                                  <div class="w-md-100 mx-auto">
                                    <div class="field">
                                      <label class="label has-text-weight-bold"><?php echo $this->lang->line("tx_year_pro");?></label>
                                      <div class="select is-fullwidth">
                                          <select  name="name_year_pro" id="year"  data-child="item2"  onchange="changeOption(event)"  onchange="changeOption(event)">
                                           <option data-group='SHOW'  value=""><?php echo $this->lang->line("t_select");?></option>
                                          <?php  foreach($car_year_pro_text as $row){?>
                                        
                                              <option data-group="<?php echo $row->car_model_id;?>"  value="<?php echo $row->name_year_pro;?>" <?php if(set_value('name_year_pro')==$row->name_year_pro OR $name_year_pro==$row->name_year_pro  OR @$car_data['name_year_pro']==$row->name_year_pro){echo "selected";}?>>
                                                  <?php echo $row->name_year_pro;?>
                                              </option>                                            
                                          <?php }?>
                                          </select>
                                      </div>
                                      <?php echo form_error('name_year_pro', '<span class="error" style="padding: 1% 0%;">', '</span>'); ?>
                                    </div>
                                  </div>
                            </div>
                            
                                <!--/////////////////////////////////เลขไมล์//////////////////////////////////////////////-->
                                <div class="column is-6">
                                  <div class="w-md-100 mx-auto">
                                    <div class="field">
                                      <label class="label has-text-weight-bold"
                                        ><?php echo $this->lang->line("mile");?>
                                       </label
                                      >
                                      <div class="control">
                                          <input type="number" class="input"  name="name_mile" value="<?php if(set_value('name_mile')){ echo  set_value('name_mile');}else{if(@$car_data['name_mile']){echo @$car_data['name_mile'];}else{echo $name_mile;}}?>" placeholder="<?php echo $this->lang->line("t_mile");?>" >
                                          <?php echo form_error('name_mile', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                           <!--/////////////////////////////////รายละเอียดรุ่นรถ//////////////////////////////////////////////-->
                            <div class="column is-12">
                              <div class="columns">
                                <div class="column is-6" id="name_model_des1">
                                  <div class="w-md-100 mx-auto">
                                    <div class="field">
                                      <label class="label has-text-weight-bold"
                                        ><?php echo $this->lang->line("tx_model_des");?>
                                        </label
                                      >
                                      <div class="control" >
                                        <div class="select is-fullwidth">
                                          <select   name="name_model_des"  class="form-control" id="item2" onchange="changeOption(event)">
                                           <option data-group='SHOW' value=""><?php echo $this->lang->line("t_select");?></option>
                                          <?php  foreach($result_model_des as $row){?>

                                            <?php if($this->lang->line("set_lang")=="th"){?>

                                              <option data-group="<?php echo $row->car_model_id;?>"  value="<?php echo $row->car_model_des_id;?>" <?php if(set_value('name_model_des')==$row->car_model_des_id OR $this->input->get('name_model_des') == $row->car_model_des_id OR $name_model_des==$row->car_model_des_id OR @$car_data['car_model_des_id']==$row->car_model_des_id){echo "selected";}?>><?php echo $row->name_model_des_th; ?></option>

                                            <?php }else{?>

                                              <option data-group="<?php echo $row->car_model_id;?>"  value="<?php echo $row->car_model_des_id;?>" <?php if(set_value('name_model_des')==$row->car_model_des_id OR $this->input->get('name_model_des') == $row->car_model_des_id OR $name_model_des==$row->car_model_des_id OR @$car_data['car_model_des_id']==$row->car_model_des_id){echo "selected";}?>><?php echo $row->name_model_des_th; ?></option><?php echo $row->name_model_des_en; ?></option>
                                              
                                            <?php }?>

                                          <?php }?>
                                          </select>
                 
                                            <?php echo form_error('name_model_des', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--/////////////////////////////////ราคา//////////////////////////////////////////////-->
                                <div class="column is-6">
                                  <div class="w-md-100 mx-auto">
                                    <div class="field">
                                      <label class="label has-text-weight-bold"
                                        ><?php echo $this->lang->line("tx_price");?>
                                        <span style="color: red;"
                                          >*  </span
                                        ></label
                                      >
                                      <div class="control">
                                       
                                         <input type="number" name="name_price" class="input" id="exampleFormControlInput1"  value="<?php if(set_value('name_price')){echo set_value('name_price');}else{if(@$car_data['name_price']){echo @$car_data['name_price'];}else{echo $name_price;}}?>" placeholder= "<?php echo $this->lang->line("t_price");?>" >
                                          
                                      </div>
                                      <?php echo form_error('name_price', '<span class="error" style="padding: 1% 0%;">', '</span>'); ?>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                            <!--/////////////////////////////////เงินดาวน์//////////////////////////////////////////////-->
                            <div class="column is-12">
                              <div class="columns">

                                <div class="column is-6">
                                  <div class="w-md-100 mx-auto">
                                    <div class="field">
                                      <label class="label has-text-weight-bold"><?php echo $this->lang->line("down_payment");?></label>
                                      <div class="control">
                                         <input type="number" name="downpayment" class="input" id="exampleFormControlInput1"  value="<?php if(set_value('downpayment')){echo set_value('downpayment');}else{if(@$car_data['downpayment']){echo @$car_data['downpayment'];}else{echo $downpayment;}}?>" placeholder= "<?php echo $this->lang->line("t_price");?>" >
                                          
                                      </div>
                                      <?php echo form_error('downpayment', '<span class="error" style="padding: 1% 0%;">', '</span>'); ?>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>

                          </div>
                          <hr />
                        </div>


                        <div class="column is-12">
                          <div class="columns is-mobile">
                            <div class="column is-9 is-3-tablet is-flex-tablet is-flex">
                              <h5 class="title is-5"><?php echo $this->lang->line("tx_device");?></h4> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <button type="button" class="button is-small is-orange" onclick="show()"><i class='bx bx-chevron-down'></i></button>  
                            </div>
                            
                          </div>
                        </div>
            
                        <div id="is-options" class="column is-12" style="display: none;">
                          <div class="columns">
                            <div class="column is-12">
                              <div class="field">
                                <div class="control">
                                  <div class="columns is-multiline">
                                    <?php foreach($result_device as $row){?>

                                      <div class="column is-12-mobile is-6-tablet-only is-6-desktop">


                                        
                                          <?php if($this->lang->line("set_lang")=="th"){?>

                                            <div class="custom-control custom-checkbox">
                                              <input type="checkbox" name="device[]" class="is-checkradio" id="checkBox-<?php echo $row->device_id;?>" value="<?php echo $row->device_name_th;?>" <?php 

                                              $i =  explode(",",@$car_data['device']);
                                             $num = count($i); 
                                              for($ii=0;$ii<$num;$ii++){                                    
                                                  if($i[$ii]==$row->device_name_th OR $i[$ii]==$row->device_name_en){
                                                  echo "checked";
                                                  }
                                              }?>>
                                              <label class="tax-Selected" for="checkBox-<?php echo $row->device_id;?>"><?php echo $row->device_name_th;?></label>
                                            </div>

                                          <?php }else{?>

                                            <div class="custom-control custom-checkbox">
                                              <input type="checkbox" name="device[]" class="is-checkradio" id="checkBox-<?php echo $row->device_id;?>" value="<?php echo $row->device_name_en;?>" <?php 

                                              $i =  explode(",",$car_data['device']);
                                             $num = count($i); 
                                              for($ii=0;$ii<$num;$ii++){                                    
                                                  if($i[$ii]==$row->device_name_th OR $i[$ii]==$row->device_name_en){
                                                  echo "checked";
                                                  }
                                              }?>>
                                              <label class="tax-Selected" for="checkBox-<?php echo $row->device_id;?>"><?php echo $row->device_name_en;?></label>
                                            </div>

                                          <?php }?>
                                      </div>
                                    <?php }?>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>


                        <div class="column is-12">
                          <div class="columns">
                            <div class="column is-12">
                              <div class="field">
                                <label class="label has-text-weight-bold"
                                  ><?php echo $this->lang->line("data_profile_sale");?></label
                                >
                                <div class="control">
                                  <textarea
                                    class="textarea" name = "descript"
                                    id="textDescription"
                                    rows="5"
                                    placeholder="<?php echo $this->lang->line("txt_message");?>"
                                  ><?php if(set_value('descript')){echo set_value('descript');}else{if(@$car_data['descript']){echo @$car_data['descript'];}else{echo $descript;}}?></textarea>
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
                               
                                <input type="submit" name="submit_step2" id="submit_step2"  class="button is-orange is-fullwidth" value="<?php echo $this->lang->line("stepp_next");?>">
                               
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

<?php $_SESSION['url_step1'] = base_url('sale/sale_step1');?>


<?php $_SESSION['url2'] = base_url('sale/sale_step2?province='.$this->input->get('province').'&&id_login='.$id_login.'&&type='.$this->input->get('type').'&&car_type_id='.$this->input->get('car_type_id').'&&brand='.$this->input->get('brand').'&&car_id='.$this->input->get('car_id').'&&model='.$this->input->get('model').'&&car_model_id='.$this->input->get('car_model_id').'&&model_des='.$this->input->get('model_des').'&&car_model_des_id='.$this->input->get('car_model_des_id').''); ?>
<?php $_SESSION['step2'] = 'step2'; ?>

<?php if($this->input->get('province')!==""){?>
  <?php $_SESSION['province'] = $this->input->get('province'); ?>
<?php }else{?>
  <?php $_SESSION['province'] = $province; ?>
<?php }?>




<script type="text/javascript">
$(document).ready(function() {
    $('a[href*=\\#]').on('click', function(e){
        e.preventDefault();
        $('html, body').animate({
            scrollTop : $(this.hash).offset().top
        }, 500);
    });
});

</script>


 <script type="text/javascript" src="<?php echo base_url('');?>backend/js/jquery-3.3.1.min.js"></script>

<script type="text/javascript">

  function show() {
    var x = document.getElementById("is-options");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }

</script>


      <?php
        if (!empty($this->input->post('name_type'))) {
          $category = $this->input->post("name_type");
        }elseif(!empty($car_data['car_type_id'])){
          $category = $car_data['car_type_id'];
        }elseif(!empty($name_type)){
          $category = $name_type;
        }

        if (!empty($this->input->post("name"))) {
          $family = $this->input->post("name");
        }elseif(!empty($car_data['car_id'])){
          $family = $car_data['car_id'];
        }elseif(!empty($name)){
          $family = $name;
        }

        if (!empty($this->input->post("name_model"))) {
          $item = $this->input->post("name_model");
        }elseif(!empty($car_data['car_model_id'])){
          $item = $car_data['car_model_id'];
        }elseif(!empty($name_model)){
          $item = $name_model;
        }

        if (!empty($this->input->post("name_year_pro"))) {
          $year = $this->input->post("name_year_pro");
        }elseif(!empty($car_data['name_year_pro'])){
          $year = $car_data['name_year_pro'];
        }elseif(!empty($name_year_pro)){
          $year = $name_year_pro;
        }

        if (!empty($this->input->post("name_model_des"))) {
          $item2 = $this->input->post("name_model_des");
        }elseif(!empty($car_data['car_model_des_id'])){
          $item2 = $car_data['car_model_des_id'];
        }elseif(!empty($name_model_des)){
          $item2 = $name_model_des;
        }

    ?>
   
               
    <script>
        let listCate = [
        <?php  foreach($result_type as $row){?>
          <?php if($this->lang->line("set_lang")=="th"){?>
            {
                id: <?php echo $row->car_type_id;?>,
                name: <?php echo '"'.$row->name_type_th.'"';?>
            },
          <?php }else{?>
            {
                id: <?php echo $row->car_type_id;?>,
                name: <?php echo '"'.$row->name_type_en.'"';?>
            },
          <?php } ?>
        <?php } ?>
        ];

        let listFamily = [
        <?php  foreach($result as $row){?>
          <?php if($this->lang->line("set_lang")=="th"){?>
            {
                id: <?php echo $row->car_id;?>,
                name: <?php echo '"'.$row->name_th.'"';?>,
                group: <?php echo $row->car_type_id;?>
            }, 
          <?php }else{?>
            {
                id: <?php echo $row->car_id;?>,
                name: <?php echo '"'.$row->name_en.'"';?>,
                group: <?php echo $row->car_type_id;?>
            },
          <?php } ?>
        <?php }?>
        ];

        let listItem = [
        <?php  foreach($result_model as $row){?>
          <?php if($this->lang->line("set_lang")=="th"){?>
            {
                id: <?php echo $row->car_model_id;?>,
                name: <?php echo '"'.$row->name_model_th.'"';?>,
                group: <?php echo $row->car_id;?>
            },
          <?php }else{?>
            {
                id: <?php echo $row->car_model_id;?>,
                name: <?php echo '"'.$row->name_model_en.'"';?>,
                group: <?php echo $row->car_id;?>
            },
          <?php }?>
        <?php }?>
            
        ];

        let listYear = [
        <?php  foreach($car_year_pro_text as $row){?>
            {
                id: <?php echo $row->name_year_pro;?>,
                name: <?php echo '"'.$row->name_year_pro.'"';?>,
                group: <?php echo $row->car_model_id;?>           
            },
        <?php }?>    
        ];

        let listItem2 = [
        <?php  foreach($result_model_des as $row){?>
          <?php if($this->lang->line("set_lang")=="th"){?>
            {
                id: <?php echo $row->car_model_des_id;?>,
                name: <?php echo '"'.$row->name_model_des_th.'"';?>,
                group: <?php echo $row->car_model_id;?>,
                group2: <?php echo $row->name_year_pro;?>
            },  
          <?php }else{?> 
            {
                id: <?php echo $row->car_model_des_id;?>,
                name: <?php echo '"'.$row->name_model_des_en.'"';?>,
                group: <?php echo $row->car_model_id;?>,
                group2: <?php echo $row->name_year_pro;?>
            },  
          <?php }?>                                             
        <?php }?>        
        ];

        function changeOption(event) {
            let target = event.target.id;
            let targerEle = document.getElementById(target);
            if(target == 'category' && targerEle.value != '') {
                selectOption('family', targerEle.value, 'group');
                selectOption('item', 'none', 'group');
                selectOption('year', 'none', 'group');
                selectOption('item2', 'none', 'group');
            } else if(target == 'category' && targerEle.value == '') {
                selectOption('family', 'all', 'group');
                selectOption('item', 'all', 'group');
                selectOption('year', 'all', 'group');
                selectOption('item2', 'all', 'group');
            } else if(target == 'family') {
                selectOption('item', targerEle.value, 'group');
                selectOption('year', 'none', 'group');
                selectOption('item2', 'none', 'group');
            } else if(target == 'item') {
                selectOption2('year', targerEle.value, 'group');
                selectOption('item2', 'none', 'group');
            } else if(target == 'year') {
                doubleOption('item2', 'item', 'year', 'group', '1');
            }
        }
        
        function searchGroup(target, position) {
            switch (target) {
                case "category":
                    dataTarget = listCate;
                    break;
                case "family":
                    dataTarget = listFamily;
                    break;
                case "item":
                    dataTarget = listItem;
                    break;
                case "year":
                    dataTarget = listYear;
                    break;
                case "item2":
                    dataTarget = listItem2;
                    break;
            }
            for (var i = 0; i < dataTarget.length; i++) {
                if(dataTarget[i].id == position) {
                    return dataTarget[i].group;
                }
            }
        }

        function selectOption(target, position, pointer) {
            switch (target) {
                case "category":
                  <?php if($this->lang->line("set_lang")=="th"){?>
                    defaultTarget = 'กรุณาเลือกประเภท';
                  <?php }else{?>
                    defaultTarget = 'Please select a category';
                  <?php }?>
                    selectTarget = document.getElementById('category');
                    dataTarget = listCate;
                    break;
                case "family":
                  <?php if($this->lang->line("set_lang")=="th"){?>
                    defaultTarget = 'กรุณาเลือกยี่ห้อ';
                  <?php }else{?>
                    defaultTarget = 'Please select a brand';
                  <?php }?>
                    selectTarget = document.getElementById('family');
                    dataTarget = listFamily;
                    break;
                case "item":
                  <?php if($this->lang->line("set_lang")=="th"){?>
                    defaultTarget = 'กรุณาเลือกรุ่น';
                  <?php }else{?>
                    defaultTarget = 'Please choose a model';
                  <?php }?>
                    selectTarget = document.getElementById('item');
                    dataTarget = listItem;
                    break;
                case "year":
                  <?php if($this->lang->line("set_lang")=="th"){?>
                    defaultTarget = 'กรุณาเลือกปี';
                  <?php }else{?>
                    defaultTarget = 'Please select the year';
                  <?php }?>
                    selectTarget = document.getElementById('year');
                    dataTarget = listYear;
                    break;
                case "item2":
                  <?php if($this->lang->line("set_lang")=="th"){?>
                    defaultTarget = 'กรุณาเลือกรายละเอียดรุ่น';
                  <?php }else{?>
                    defaultTarget = 'Please select the model details';
                  <?php }?>
                    selectTarget = document.getElementById('item2');
                    dataTarget = listItem2;
                    break;
            }
            selectTarget.options.length = 0;
            selectTarget.options[selectTarget.options.length] = new Option(defaultTarget, '');
            for (var i = 0; i < dataTarget.length; i++) {
                if(pointer == 'group' && dataTarget[i].group == position || position == 'all') {
                    selectTarget.options[selectTarget.options.length] = new Option(dataTarget[i].name, dataTarget[i].id);  
                } else if(pointer == 'id' && dataTarget[i].id == position || position == 'all') {
                    selectTarget.options[selectTarget.options.length] = new Option(dataTarget[i].name, dataTarget[i].id);  
                }
            }
        }

        function selectOption2(target, position, pointer) {
            switch (target) {
                case "category":
                    <?php if($this->lang->line("set_lang")=="th"){?>
                      defaultTarget = 'กรุณาเลือกประเภท';
                    <?php }else{?>
                      defaultTarget = 'Please select a category';
                    <?php }?>
                    selectTarget = document.getElementById('category');
                    dataTarget = listCate;
                    break;
                case "family":
                    <?php if($this->lang->line("set_lang")=="th"){?>
                      defaultTarget = 'กรุณาเลือกยี่ห้อ';
                    <?php }else{?>
                      defaultTarget = 'Please select a brand';
                    <?php }?>
                    selectTarget = document.getElementById('family');
                    dataTarget = listFamily;
                    break;
                case "item":
                    <?php if($this->lang->line("set_lang")=="th"){?>
                      defaultTarget = 'กรุณาเลือกรุ่น';
                    <?php }else{?>
                      defaultTarget = 'Please choose a model';
                    <?php }?>
                    selectTarget = document.getElementById('item');
                    dataTarget = listItem;
                    break;
                case "year":
                    <?php if($this->lang->line("set_lang")=="th"){?>
                      defaultTarget = 'กรุณาเลือกปี';
                    <?php }else{?>
                      defaultTarget = 'Please select the year';
                    <?php }?>
                    selectTarget = document.getElementById('year');
                    dataTarget = listYear;
                    break;
                case "item2":
                    <?php if($this->lang->line("set_lang")=="th"){?>
                      defaultTarget = 'กรุณาเลือกรายละเอียดรุ่น';
                    <?php }else{?>
                      defaultTarget = 'Please select the model details';
                    <?php }?>
                    selectTarget = document.getElementById('item2');
                    dataTarget = listItem2;
                    break;
            }
            selectTarget.options.length = 0;
            selectTarget.options[selectTarget.options.length] = new Option(defaultTarget, '');
            var dataRaw = [];
            var dataConv = [];
            for (var i = 0; i < dataTarget.length; i++) {
                if(pointer == 'group' && dataTarget[i].group == position || position == 'all') {
                    dataRaw.push(dataTarget[i].name);
                } else if(pointer == 'id' && dataTarget[i].id == position || position == 'all') {
                    dataRaw.push(dataTarget[i].name);
                }    
            }
            var dataConv = array_unique(dataRaw);
            for (var i = 0; i < dataConv.length; i++) {
                selectTarget.options[selectTarget.options.length] = new Option(dataConv[i], dataConv[i]);
            }
        }

        function array_unique(inputArr) {
            var key = ''
            var tmpArr2 = [];
            var val = ''
            var _arraySearch = function (needle, haystack) {
                var fkey = ''
                for (fkey in haystack) {
                    if (haystack.hasOwnProperty(fkey)) {
                        if ((haystack[fkey] + '') === (needle + '')) {
                            return fkey;
                        }
                    }
                }
                return false
            }
            for (key in inputArr) {
                if (inputArr.hasOwnProperty(key)) {
                    val = inputArr[key]
                    if (_arraySearch(val, tmpArr2) === false) {
                        key2 = tmpArr2.length;
                        tmpArr2[key2] = val;
                    }
                }
            }
            return tmpArr2
        }

        function getSelected(selTar) {
            let tarGet = document.getElementById(selTar);
            for ( var i = 0; i < tarGet.options.length; i++ ) {
                optSel = tarGet.options[i];
                if ( optSel.selected === true ) {
                    return optSel = tarGet.options[i].value;
                }
            }
        }

        function doubleOption(target, position, position2, pointer, choice) {
            if(choice == '1') {
                var value = document.getElementById(position).value;
                var value2 = document.getElementById(position2).value;
            } else if(choice == '2') {
                var value = getSelected(position);
                var value2 = getSelected(position2);
            }
            switch (target) {
                case "category":
                    <?php if($this->lang->line("set_lang")=="th"){?>
                      defaultTarget = 'กรุณาเลือกประเภท';
                    <?php }else{?>
                      defaultTarget = 'Please select a category';
                    <?php }?>
                    selectTarget = document.getElementById('category');
                    dataTarget = listCate;
                    break;
                case "family":
                    <?php if($this->lang->line("set_lang")=="th"){?>
                      defaultTarget = 'กรุณาเลือกยี่ห้อ';
                    <?php }else{?>
                      defaultTarget = 'Please select a brand';
                    <?php }?>
                    selectTarget = document.getElementById('family');
                    dataTarget = listFamily;
                    break;
                case "item":
                    <?php if($this->lang->line("set_lang")=="th"){?>
                      defaultTarget = 'กรุณาเลือกรุ่น';
                    <?php }else{?>
                      defaultTarget = 'Please choose a model';
                    <?php }?>
                    selectTarget = document.getElementById('item');
                    dataTarget = listItem;
                    break;
                case "year":
                    <?php if($this->lang->line("set_lang")=="th"){?>
                      defaultTarget = 'กรุณาเลือกปี';
                    <?php }else{?>
                      defaultTarget = 'Please select the year';
                    <?php }?>
                    selectTarget = document.getElementById('year');
                    dataTarget = listYear;
                    break;
                case "item2":
                    <?php if($this->lang->line("set_lang")=="th"){?>
                      defaultTarget = 'กรุณาเลือกรายละเอียดรุ่น';
                    <?php }else{?>
                      defaultTarget = 'Please select the model details';
                    <?php }?>
                    selectTarget = document.getElementById('item2');
                    dataTarget = listItem2;
                    break;
            }
            selectTarget.options.length = 0;
            selectTarget.options[selectTarget.options.length] = new Option(defaultTarget, '');
            for (var i = 0; i < dataTarget.length; i++) {
                if(pointer == 'group' && dataTarget[i].group == value && dataTarget[i].group2 == value2  || position == 'all') {
                    selectTarget.options[selectTarget.options.length] = new Option(dataTarget[i].name, dataTarget[i].id);  
                } else if(pointer == 'id' && dataTarget[i].id == value && dataTarget[i].group2 == value2 || position == 'all') {
                    selectTarget.options[selectTarget.options.length] = new Option(dataTarget[i].name, dataTarget[i].id);  
                }
            }
        }

        function searchIndex(target, value, func) {
            switch (target) {
                case "category":
                    dataTarget = listCate;
                    break;
                case "family":
                    dataTarget = listFamily;
                    break;
                case "item":
                    dataTarget = listItem;
                    break;
                case "year":
                    dataTarget = listYear;
                    break;
                case "item2":
                    dataTarget = listItem2;
                    break;
            }
            if(func == '1') {
                for (var i = 0; i < dataTarget.length; i++) {
                    if(dataTarget[i].id == value) {
                        return i + 1;
                    }
                }
            } else if(func == '2') {
                var dataRaw = [];
                var dataConv = [];
                for (var i = 0; i < dataTarget.length; i++) {
                    dataRaw.push(dataTarget[i].name);
                }
                var dataConv = array_unique(dataRaw);   
                for (var i = 0; i < dataConv.length; i++) {
                    if(dataConv[i] == value) {
                        return i + 1;
                    }
                }
            } else if(func == '3') {
                var selOpt = document.getElementById(target);
                for (var i = 0; i < selOpt.options.length; i++) {
                    if (selOpt.options[i].value == value) {
                        return i;
                    }
                }
            }
        }

        function selectList(target, value, func) {
            document.getElementById(target).selectedIndex = searchIndex(target, value ,func);
        }

        function loadOption(target, func) {
            switch (target) {
                case "category":
                    pevEle = '';
                    break;
                case "family":
                    pevEle = 'category';
                    break;
                case "item":
                    pevEle = 'family';
                    break;
                case "year":
                    pevEle = 'item';
                    break;
                case "item2":
                    pevEle = 'year';
                    break;
            }
            if(func == '1') {
                selectOption(target, document.getElementById(pevEle).value, 'group');
            } else if(func == '2') {
                selectOption2(target, document.getElementById(pevEle).value, 'group');
            } else {
                selectOption(target, document.getElementById(pevEle).value, 'group');
            }
        }

        function defaultBox() {
            selectOption('category', 'all', 'group');
            <?php if (isset($category) && $category != '') { ?>
                selectList('category', '<?php echo $category; ?>', '1');
                selectOption('family', '<?php echo $category; ?>', 'group');
                selectOption('item', 'none', 'group');
                selectOption('year', 'none', 'group');
                selectOption('item2', 'none', 'group');
            <?php } ?>

            <?php if (isset($family) && $family != '0') { ?>
                // selectOption('family', 'all', 'group');
                selectList('family', '<?php echo $family; ?>', '3');
                selectOption('item', '<?php echo $family; ?>', 'group');
                selectOption('year', 'none', 'group');
                selectOption('item2', 'none', 'group');
            <?php } else if(isset($category) && $category != '') { ?>
                // loadOption('family', '1');
                selectOption('family', '<?php echo $category; ?>', 'group');
            <?php } else { ?>
                selectOption('family', 'none', 'group');
            <?php } ?>

            <?php if (isset($item) && $item != '0') { ?>
                // selectOption('item', 'all', 'group');
                selectList('item', '<?php echo $item; ?>', '3');
                selectOption2('year', '<?php echo $item; ?>', 'group');
                selectOption('item2', 'none', 'group');
            <?php } else if(isset($family) && $family != '') { ?>
                // loadOption('item', '1');
                selectOption('item', '<?php echo $family; ?>', 'group');
            <?php } else { ?>
                selectOption('item', 'none', 'group');
            <?php } ?> 

            <?php if (isset($year) && $year != '') { ?>
                // selectOption2('year', 'all', 'group');
                selectList('year', '<?php echo $year; ?>', '3');
                doubleOption('item2', 'item', 'year', 'group', '2');
            <?php } else if(isset($item) && $item != '') { ?>
                // loadOption('year', '2');
                selectOption2('year', '<?php echo $item; ?>', 'group');
            <?php } else { ?>
                selectOption2('year', 'none', 'group');
            <?php } ?>

            <?php if (isset($item2) && $item2 != '') { ?>
                // selectOption('item2', 'all', 'group');
                selectList('item2', '<?php echo $item2; ?>', '3');
            <?php } else if(isset($year) && $year != '') { ?>
                // loadOption('item2', '1');
                doubleOption('item2', 'item', 'year', 'group', '2');
            <?php } else { ?>
                selectOption('item2', 'none', 'group');
            <?php } ?>
        };

        $(window).on('load', function() {
            defaultBox();
        });
        
    </script>
