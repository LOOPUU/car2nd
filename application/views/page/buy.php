<style type="text/css">
  .error{color: red;}
  .is-gray{background-color: #ccc;cursor: default;}
</style>


    <!-- Section Cars -->
    <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column is-12">
            <!-- Title -->
            <h4 class="title is-4 has-text-weight-normal has-text-centered pt-5">
              <?php echo $this->lang->line("search_car");?>
            </h4>
            <hr class="spacer is-1" />
          </div>
        </div>
        <div class="columns">
          <div class="column is-3">
            <div class="search-options">
              <div class="search-title">
                <h5 class="title is-5 has-text-weight-normal"><?php echo $this->lang->line("fi_search");?> 
                <a class="button is-hidden-tablet is-orange-inverted is-pulled-right" id="clickbox" style="margin-top:-6px;"><span class="icon"><i class="bx bx-filter"></i></span></a></h5>
              </div>

            <form action="<?php echo base_url('buy?page=1'.'&&offset=0');?>" method="post">  
              <div class="search-content is-hidden-mobile" id="boxshow">
                <div class="columns is-multiline">
 <!--__________________________________________________-->
                  <div class="column is-12">
                    <div class="columns is-multiline">
                      <div class="column is-12">
                        <div class="control">
                          <div class="select is-fullwidth">
                            <select  name="name_type"  class="form-control"  id="category" data-child="family"  onchange="changeOption(event)">
                              <option value="0" <?php if(set_value('name_type')==""){echo "selected";}?>>
                                  <?php echo $this->lang->line("search_type");?>
                              </option>
                              <?php  foreach($result_type as $row){?>
                                <?php if($this->lang->line("set_lang")=="th"){?>
                                  <option value="<?php echo $row->car_type_id;?>">
                                      <?php echo $row->name_type_th;?>
                                  </option>
                                <?php }else{?>
                                  <option value="<?php echo $row->car_type_id;?>">
                                            <?php echo $row->name_type_en;?>
                                  </option>
                                <?php }?>
                              <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="column is-12">
                    <div class="columns is-multiline">
                      <div class="column is-12">
                        <div class="control">
                          <div class="select is-fullwidth">
                            <select name="name"  class="form-control" id="family" data-child="item"  onchange="changeOption(event)">
                                <option data-group='SHOW' value="0"><?php echo $this->lang->line("search_brand");?></option>
                              <?php  foreach($result as $row){?>
                                <?php if($this->lang->line("set_lang")=="th"){?>
                                <option data-group="<?php echo $row->car_type_id;?>" value="<?php echo $row->car_id;?>">
                                          <?php echo $row->name_th;?>
                                           <?php if($row->name_type_th!=""){?>
                                            <?php echo " - ".$row->name_type_th."";?>
                                          <?php } ?>
                                </option>
                                <?php }else{?>
                                <option data-group="<?php echo $row->car_type_id;?>" value="<?php echo $row->car_id;?>">
                                          <?php echo $row->name_en;?>
                                          <?php if($row->name_type_en!=""){?>
                                            <?php echo " - ".$row->name_type_en."";?>
                                          <?php } ?>
                                </option>        
                                <?php }?>
                             <?php }?>
                            </select> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="column is-12">
                    <div class="columns is-multiline">
                      <div class="column is-12">
                        <div class="control">
                          <div class="select is-fullwidth">
                            <select  name="name_model"  class="form-control" id="item" data-child="item2"  onchange="changeOption(event)">
                              <option data-group='SHOW' value="0"><?php echo $this->lang->line("search_model");?></option>
                              <?php  foreach($result_model as $row){?>
                                <?php if($this->lang->line("set_lang")=="th"){?>
                                  <option data-group="<?php echo $row->car_id;?>" value="<?php echo $row->car_model_id;?>">
                                    <?php echo $row->name_model_th;?>
                                  </option>
                                <?php }else{?>
                                  <option data-group="<?php echo $row->car_id;?>" value="<?php echo $row->car_model_id;?>">
                                    <?php echo $row->name_model_en;?>
                                  </option>      
                                <?php }?>
                              <?php }?>
                            </select>   
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="column is-12">
                    <div class="columns is-multiline">
                      <div class="column is-12">
                        <div class="control">
                          <div class="select is-fullwidth">
                            <select   name="name_model_des"  class="form-control"   id="item2"  onchange="changeOption(event)">
                              <option data-group='SHOW' value="0" <?php if(set_value('name_model_des')==""){echo "selected";}?>><?php echo $this->lang->line("search_model_des");?></option>
                                  <?php  foreach($result_model_des as $row){?>
                                    <?php if($this->lang->line("set_lang")=="th"){?>                            
                                      <option data-group="<?php echo $row->car_model_id;?>" value="<?php echo $row->car_model_des_id;?>">
                                        <?php echo $row->name_model_des_th;?>
                                      </option>
                                    <?php }else{?>
                                      <option data-group="<?php echo $row->car_model_id;?>" value="<?php echo $row->car_model_des_id;?>">
                                        <?php echo $row->name_model_des_en;?>
                                      </option>              
                                    <?php }?>
                                  <?php }?>
                            </select>  
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="column is-12">
                    <div class="columns is-multiline">
                      <div class="column is-12">
                        <div class="control">
                          
                          <div class="columns">
                            <div class="column">
                              <input type="text" name="year_min" pattern="[0-9]{1,}" title="<?php echo $this->lang->line("fillnumber");?>" id="input-min" class="input" value="" maxlength=4 placeholder="<?php echo $this->lang->line("year_min");?>" onkeyup="keyInput('input-min','input-max')" >
                            </div>
                           <p class="mt-3"> -</p>
                            <div class="column">
                              <input type="text" name="year_max"  id="input-max"  class="input" maxlength=4  value="" pattern="[0-9]{1,}"  title="<?php echo $this->lang->line("fillnumber");?>" placeholder="<?php echo $this->lang->line("year_max");?>">
                            </div>
                          </div>
                          <?php echo form_error('year_min', '<p class="help is-danger">', '</p>'); ?>
                          <?php echo form_error('year_max', '<p class="help is-danger">', '</p>'); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="column is-12">
                    <div class="columns is-multiline">
                      <div class="column is-12">
                        <div class="control">
                          <div class="select is-fullwidth">
                            <select name="color" class="form-control" id="exampleFormControlSelect1">
                              <option value=""><?php echo $this->lang->line("search_color");?></option>
                              <?php  foreach($result_color as $row){?>
                                <?php if($this->lang->line("set_lang")=="th"){?> 
                                <option value="<?php echo $row->car_color_id; ?>"><?php echo $row->name_color_th;?></option>
                                <?php }else{?>
                                <option value="<?php echo $row->car_color_id; ?>"><?php echo $row->name_color_en;?></option>
                                <?php }?>
                              <?php }?>
                            </select>    
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="column is-12">
                    <div class="columns is-multiline">
                      <div class="column is-12">
                        <div class="control">
                          <div class="select is-fullwidth">
                            <select name="gear" class="form-control" id="exampleFormControlSelect1">
                              <option value=""><?php echo $this->lang->line("search_gear");?></option>
                              <?php  foreach($result_gear as $row){?>
                                <?php if($this->lang->line("set_lang")=="th"){?>
                                <option value="<?php echo $row->car_gear_id; ?>"><?php echo $row->name_gear_th;?></option>
                                <?php }else{?>
                                <option value="<?php echo $row->car_gear_id; ?>"><?php echo $row->name_gear_en;?></option>
                                <?php }?>
                              <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="column is-12">
                    <div class="columns is-multiline">
                      <div class="column is-12">
                        <div class="control">
                          <div class="select is-fullwidth">
                            <select name="capacity" class="form-control" id="exampleFormControlSelect1">
                              <option value=""><?php echo $this->lang->line("search_capacity");?></option>
                              <?php  foreach($result_capacity as $row){?>
                                <?php if($this->lang->line("set_lang")=="th"){?>
                                <option value="<?php echo $row->name_capacity_th; ?>"><?php echo $row->name_capacity_th.' CC';?></option>
                                <?php }else{?>
                                <option value="<?php echo $row->name_capacity_en; ?>"><?php echo $row->name_capacity_en.' CC';?></option>
                                <?php }?>
                              <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="column is-12">
                    <div class="columns is-multiline">
                      <div class="column is-12">
                        <div class="control">
                          <div class="select is-fullwidth">
                            <select name="mile" class="form-control" id="exampleFormControlSelect1">
                              <option value=""><?php echo $this->lang->line("search_mile");?></option>
                              <?php  foreach($result_mile as $row){?>
                              <?php if($this->lang->line("set_lang")=="th"){?>
                                  <option value="<?php echo $row->name_mile_min; ?>-<?php echo $row->name_mile_max; ?>"><?php echo $row->name_mile_min;?>  ถึง <?php echo $row->name_mile_max." ".$this->lang->line("km");?></option>
                              <?php }else{?>
                                  <option value="<?php echo $row->name_mile_min; ?>-<?php echo $row->name_mile_max; ?>"><?php echo $row->name_mile_min;?>  to <?php echo $row->name_mile_max." ".$this->lang->line("km");?></option>
                              <?php }?>
                              <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="column is-12">
                    <div class="columns is-multiline">
                      <div class="column is-12">
                        <div class="control">
                          <div class="select is-fullwidth">
                            <select name="price" class="form-control" id="exampleFormControlSelect1">
                              <option value=""><?php echo $this->lang->line("search_price");?></option>
                              <?php  foreach($result_price as $row){?>
                              <?php if($this->lang->line("set_lang")=="th"){?>
                                  <option value="<?php echo $row->name_price_min; ?>-<?php echo $row->name_price_max; ?>"><?php echo number_format($row->name_price_min);?> ถึง <?php echo number_format($row->name_price_max);?> บาท</option>
                              <?php }else{?>
                                  <option value="<?php echo $row->name_price_min; ?>-<?php echo $row->name_price_max; ?>"><?php echo number_format($row->name_price_min);?> to <?php echo number_format($row->name_price_max);?> Baht</option>
                              <?php }?>
                              <?php }?>
                            </select>  
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> 
 <!--__________________________________________________-->
                  <div class="column is-12">
                    <div class="columns">
                      <div class="column is-12">
                        <input type="submit"  name="search" id="clickMe" class="button is-orange is-fullwidth" value="<?php echo $this->lang->line("search");?>">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>

            </div>
          </div>


          <div class="column is-9">
            <div class="columns is-multiline">
              <!-- Input Search -->
              <div class="column is-12">
                <div class="w-md-100 mx-auto">
                  <form action="<?php echo base_url('buy?page=1'.'&&offset=0');?>" method="post">  
                  <div class="input-search">
                      <div class="field has-addons">
                        <div class="control is-expanded">
                          <input
                            name="keyword"
                            class="input"
                            type="text"
                            placeholder="<?php echo $this->lang->line("search_car");?>"
                            value="<?php echo set_value('keyword');?>"
                          />
                        </div>
                        <div class="control">
                          <button type="submit" name="search" id="ImageHosting"  class="button is-orange"><i class="bx bx-search-alt"></i></button>
                        </div>
                      </div>
                  </div>
                  </form>
                </div>
              </div>
              <!-- CAR LIST -->
              <div class="column is-12">
              <?php if($this->lang->line("set_lang")=="th"){?> 
                <?php if(!empty($type['name_type_th'])){?>
                    <?php echo '<div class="button is-gray">'.@$type['name_type_th'].'</div>';?>
                <?php }?>
              <?php }else{?>
                <?php if(!empty($type['name_type_en'])){?>
                    <?php echo '<div class="button is-gray">'.@$type['name_type_en'].'</div>';?>
                <?php }?>
              <?php }?>
              <?php if($this->lang->line("set_lang")=="th"){?> 
                <?php if(!empty($name['name_th'])){?>
                    <?php echo '<div class="button is-gray">'.@$name['name_th'].'</div>';?>
                <?php }?>
              <?php }else{?>
                <?php if(!empty($name['name_en'])){?>
                    <?php echo '<div class="button is-gray">'.@$name['name_en'].'</div>';?>
                <?php }?>
              <?php }?>
              <?php if($this->lang->line("set_lang")=="th"){?> 
                <?php if(!empty($name_model['name_model_th'])){?>
                    <?php echo '<div class="button is-gray">'.@$name_model['name_model_th'].'</div>';?>
                <?php }?>
              <?php }else{?>
                 <?php if(!empty($name_model['name_model_en'])){?>
                    <?php echo '<div class="button is-gray">'.@$name_model['name_model_en'].'</div>';?>
                <?php }?>
              <?php }?>
              <?php if($this->lang->line("set_lang")=="th"){?> 
                <?php if(!empty($name_model_des['name_model_des_th'])){?>
                    <?php echo '<div class="button is-gray">'.@$name_model_des['name_model_des_th'].'</div>';?>
                <?php }?>
              <?php }else{?>
                 <?php if(!empty($name_model_des['name_model_des_en'])){?>
                    <?php echo '<div class="button is-gray">'.@$name_model_des['name_model_des_en'].'</div>';?>
                <?php }?>
              <?php }?>         
                <?php if(!empty(set_value('year_pro'))){?>
                    <?php echo '<div class="button is-gray">'.@set_value('year_pro').'</div>';?>
                <?php }?>
              <?php if($this->lang->line("set_lang")=="th"){?> 
                <?php if(!empty($color['name_color_th'])){?>
                    <?php echo '<div class="button is-gray">'.@$color['name_color_th'].'</div>';?>
                <?php }?>
              <?php }else{?>
                <?php if(!empty($color['name_color_en'])){?>
                    <?php echo '<div class="button is-gray">'.@$color['name_color_en'].'</div>';?>
                <?php }?>
              <?php }?>
              <?php if($this->lang->line("set_lang")=="th"){?> 
                <?php if(!empty($gear['name_gear_th'])){?>
                    <?php echo '<div class="button is-gray">'.@$gear['name_gear_th'].'</div>';?>
                <?php }?>
              <?php }else{?>
                <?php if(!empty($gear['name_gear_en'])){?>
                    <?php echo '<div class="button is-gray">'.@$gear['name_gear_en'].'</div>';?>
                <?php }?>
              <?php }?>
              <?php if(!empty(set_value('capacity'))){?>
                    <?php echo '<div class="button is-gray">'.@set_value('capacity').' CC</div>';?>
              <?php }?>

              <?php if(!empty(set_value('mile'))){?>
                    <?php echo '<div class="button is-gray">'.@set_value('mile').' KM.</div>';?>
              <?php }?>

              <?php if(!empty(set_value('price'))){?>
                    <?php echo '<div class="button is-gray">'.@set_value('price').' '.$this->lang->line("baht").'</div>';?>
              <?php }?>

              <?php if(!empty(set_value('year_min')) AND !empty(set_value('year_max'))){?>
                    <?php echo '<div class="button is-gray">'.@set_value('year_min').'-'.@set_value('year_max').'</div>';?>
              <?php }elseif(!empty(set_value('year_min')) AND empty(set_value('year_max'))){?>
                    <?php echo '<div class="button is-gray">'.@set_value('year_min').'-'.@date("Y").'</div>';?>
              <?php }?>
                <div class="column is-12">
                  <div class="w-md-100 mx-auto">
                    <div class="columns is-multiline">
                    <?php foreach($car_all as $row){ ?>
                        <?php if($row->no_car!==""){?>
                          <div class="column is-display-flex is-4">
                            <a href="<?php echo base_url('buy/car_view/'.$row->car_top_id.'');?>" style="width: 100%">
                              <div class="card is-car-product">
                                <?php if($row->status_id==4){?>
                                  <div class="ribbon is-link" style="background-color:red;"><?php echo $this->lang->line("closesale");?></div>
                                <?php }?>
                                <div class="card-image">
                                  <figure class="image is-3by2 fig-image">
                                    <img
                                      src="<?php
                                    if($row->thumb_name_multi=="" OR $row->status == "delete"){echo
                                    base_url().'frontend/assets/images/products/no-image.jpg';}else{echo
                                    base_url().'uploads_car/'.$row->thumb_name_multi;}?>"
                                      alt="Placeholder image"
                                    />
                                  </figure>
                                </div>
                                <div class="card-content">
                                   <p class="title is-4">
                                    <?php if($this->lang->line("set_lang")=="th"){?>
                                      <?php echo @$row->name_th_o;?>
                                    <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                      <?php echo @$row->name_en_o;?>
                                    <?php }else{?>
                                      <?php echo "";?>
                                    <?php }?> 
                                    </p>
                                      <p class="content is-marginless ">
                                        <?php if($this->lang->line("set_lang")=="th"){?>
                                          <?php echo @$row->name_model_th2;?>
                                        <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                           <?php echo @$row->name_model_en2;?>
                                        <?php }else{?>
                                          <?php echo "";?>
                                        <?php }?> 
                                        
                                        <?php if($this->lang->line("set_lang")=="th"){?>
                                          <?php echo @$row->car_model_des_th3;?>
                                        <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                           <?php echo @$row->car_model_des_en3;?>
                                        <?php }else{?>
                                          <?php echo "";?>
                                        <?php }?>    
                                      </p>
                                  <div class="content is-marginless ">
                                    <?php if($row->name_year_pro!==""){
                                      echo $row->name_year_pro;
                                    }?>
                                  </div> 
                                </div>
                                <footer class="card-footer">
                                  <p
                                    class="card-footer-item subtitle is-5 has-text-weight-bold has-text-price"
                                  >
                                    <?php echo @number_format($row->name_price);?> <?php echo $this->lang->line("baht");?>
                                  </p>
                                </footer>
                              </div>
                            </a>
                          </div>
                        <?php } else { ?>
                          <div class="column is-4">
                            <!-- Ad -->
                            <div
                              class="media-ad"
                              style="background: url('<?php echo base_url('uploads/'.$row->thumb_name_multi.'');?>') center center no-repeat;
                              background-size: cover;
                              min-height: 320px;
                              height: 100%;"
                            >
                              <div class="ribbon is-danger"><?php echo $this->lang->line("advt");?></div>
                            </div>
                          </div>
                        <?php } ?>
                      <?php }  ?>
                    </div>
                    <!-- Pagination -->
                    <div class="columns">
                      <div class="column is-12">
                        <div class="w-md-100 mx-auto">
                            <nav role="navigation" aria-label="pagination" class="pagination is-centered">
                              <?php  $count_page = ceil($count_all['count']/12);  //12 รายการต่อ 1 หน้า ?>
                                <?php if($count_page!=0){?>
                                  <?php 
                                  $next_page = $this->input->get('page')+1;
                                  $next_offset = $this->input->get('offset')+12;

                                  $prev_page = $this->input->get('page')-1;
                                  $prev_offset = $this->input->get('offset')-12;
                                  ?>

                                    <?php if(!empty($this->input->get('page'))){?>
                                    <?php  if($this->input->get('page') != $count_page){?>
                                    <a class="pagination-next" href="<?php echo base_url('buy?type='.$this->input->get('type').'&&car_type_id='.$this->input->get('car_type_id').'&&brand='.$this->input->get('brand').'&&car_id='.$this->input->get('car_id').'&&model='.$this->input->get('model').'&&car_model_id='.$this->input->get('car_model_id').'&&model_des='.$this->input->get('model_des').'&&car_model_des_id='.$this->input->get('car_model_des_id').'&&page='.$next_page.'&&offset='.$next_offset.'');?>"><?php if($this->lang->line("set_lang")=="th"){echo "ถัดไป";}else{echo "Next";}?></a>
                                    <?php }?>
                                    <?php  if($this->input->get('page') != 1){?>
                                    <a class="pagination-previous" href="<?php echo base_url('buy?type='.$this->input->get('type').'&&car_type_id='.$this->input->get('car_type_id').'&&brand='.$this->input->get('brand').'&&car_id='.$this->input->get('car_id').'&&model='.$this->input->get('model').'&&car_model_id='.$this->input->get('car_model_id').'&&model_des='.$this->input->get('model_des').'&&car_model_des_id='.$this->input->get('car_model_des_id').'&&page='.$prev_page.'&&offset='.$prev_offset.'');?>"><?php if($this->lang->line("set_lang")=="th"){echo "ย้อนกลับ";}else{echo "Previous";}?></a>
                                    <?php }?>
                                  <?php }?>

                              <ul class="pagination-list">
                                <?php  for( $i= 1 ; $i <= $count_page; $i++ ){?>   
                                  <?php 
                                    $count_2 = $i-1;
                                    $offset = $count_2*12;//12 รายการต่อ 1 หน้า
                                ?>
                                <?php if(empty($this->input->get('page'))){
                                    $page = 1;
                                  }else{
                                      $page = $this->input->get('page');
                                  }?>
                                <li><a class="pagination-link  <?php if($page==$i){ echo "is-current";}?>" href="<?php echo base_url('buy?type='.$this->input->get('type').'&&car_type_id='.$this->input->get('car_type_id').'&&brand='.$this->input->get('brand').'&&car_id='.$this->input->get('car_id').'&&model='.$this->input->get('model').'&&car_model_id='.$this->input->get('car_model_id').'&&model_des='.$this->input->get('model_des').'&&car_model_des_id='.$this->input->get('car_model_des_id').'&&page='.$i.'&&offset='.$offset.'');?>"><?php echo $i;?></a></li>
                                <?php } ?>
                                <?php } ?>
                              </ul>
                            </nav>
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
    var name_type = "<?php echo $this->input->post('name_type');?>";
    var name = "<?php echo $this->input->post('name');?>";
    var name_model = "<?php echo $this->input->post('name_model');?>";
    var name_model_des = "<?php echo $this->input->post('name_model_des');?>";
</script>

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
        <?php } ?>
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
          <?php } ?>
        <?php } ?> 
        ];

        let listItem2 = [
        <?php  foreach($result_model_des as $row){?>
          <?php if($this->lang->line("set_lang")=="th"){?>
            {
                id: <?php echo $row->car_model_des_id;?>,
                name: <?php echo '"'.$row->name_model_des_th.'"';?>,
                group: <?php echo $row->car_model_id;?>
            }, 
          <?php }else{?> 
            {
                id: <?php echo $row->car_model_des_id;?>,
                name: <?php echo '"'.$row->name_model_des_en.'"';?>,
                group: <?php echo $row->car_model_id;?>
            }, 
          <?php } ?>                                              
        <?php } ?>   
        ];

        function changeOption(event) {
            let target = event.target.id;
            let selectCate = document.getElementById('category'),
                selectFamily = document.getElementById('family'),
                selectItem = document.getElementById('item'),
                selectItem2 = document.getElementById('item2');
            let jsonCate = listCate,
                jsonFamily = listFamily,
                jsonItem = listItem,
                jsonItem2 = listItem2;
            let targerEle = document.getElementById(target);
            if(target == 'category' && targerEle.value != '0') {
                selectOption('family', targerEle.value, 'group');
                selectOption('item', 'none', 'group');
                selectOption('item2', 'none', 'group');
            } else if(target == 'category' && targerEle.value == '0') {
                selectOption('family', 'all', 'group');
                selectOption('item', 'all', 'group');
                selectOption('item2', 'all', 'group');
            } else if(target == 'family') {
                selectOption('item', targerEle.value, 'group');
                selectOption('item2', 'none', 'group');
            } else if(target == 'item') {
                selectOption('item2', targerEle.value, 'group');
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
                    defaultTarget = <?php echo "'".$this->lang->line("search_type")."'";?>;
                    selectTarget = document.getElementById('category');
                    dataTarget = listCate;
                    break;
                case "family":
                    defaultTarget = <?php echo "'".$this->lang->line("search_brand")."'";?>;
                    selectTarget = document.getElementById('family');
                    dataTarget = listFamily;
                    break;
                case "item":
                    defaultTarget = <?php echo "'".$this->lang->line("search_model")."'";?>;
                    selectTarget = document.getElementById('item');
                    dataTarget = listItem;
                    break;
                case "item2":
                    defaultTarget = <?php echo "'".$this->lang->line("search_model_des")."'";?>;
                    selectTarget = document.getElementById('item2');
                    dataTarget = listItem2;
                    break;
            }
            selectTarget.options.length = 0;
            selectTarget.options[selectTarget.options.length] = new Option(defaultTarget, '0');
            for (var i = 0; i < dataTarget.length; i++) {
                if(pointer == 'group' && dataTarget[i].group == position || position == 'all') {
                    selectTarget.options[selectTarget.options.length] = new Option(dataTarget[i].name, dataTarget[i].id);  
                } else if(pointer == 'id' && dataTarget[i].id == position || position == 'all') {
                    selectTarget.options[selectTarget.options.length] = new Option(dataTarget[i].name, dataTarget[i].id);  
                }
            }
        }

        function defaultBox() {
            selectOption('category', 'all', 'group');
            selectOption('family', 'all', 'group');
            selectOption('item', 'all', 'group');
            selectOption('item2', 'all', 'group');
        };

        $(window).on('load', function() {
            defaultBox();
        });
        
    </script>


<script type="text/javascript">
  $( "#clickbox" ).click(function() {
  $( "#boxshow" ).toggleClass( "is-hidden-mobile" );
});
</script>

<script>
        window.addEventListener('load', () => {
            let minVal = document.getElementById('input-min').value;
            if(minVal == '') {
                document.getElementById('input-max').disabled = true;
            }
        });

        function keyInput(iFocus, iTarget) {
            let focusVal = document.getElementById(iFocus).value;
            if(focusVal == '') {
                document.getElementById(iTarget).disabled = true;
            } else {
                document.getElementById(iTarget).disabled = false;
            }
        }
    </script>



