<?php $_SESSION['car_top_id'] = $this->uri->segment(3);?>

    <!-- Section Car Detail -->
    <section class="car-detail">
      <div class="container">
        <div class="w-md-75 mx-auto">
          <div class="car-box">
            <div class="columns is-multiline">
              <div class="column is-12">
                <!-- Car Detail -->
                <div class="columns is-multiline">
                  <div class="column is-12 is-hidden-mobile">
                    <!-- Section Image Desktop -->
                    <div class="columns">
                      <div class="column is-6">
                        <!-- Preview Images -->
                        <?php if(!empty($car_image1)){?>
                          <?php foreach($car_image1 as $row){?>
                            <?php if(empty($this->input->get('img'))){?>
                              <?php             
                                if($row->thumb_name_multi==""){
                              ?>
                                <div class="has-text-centered">
                                  <figure class="image is-3by2 fig-image">
                                    <img
                                      class="img-rounded trigger"
                                      src="<?php echo base_url('frontend');?>/assets/images/products/no-image.jpg"
                                      alt="No Image"
                                    />
                                  </figure>
                                </div>
                              <?php } else { ?>
                                <div class="has-text-centered">
                                  <figure class="image is-3by2 fig-image">
                                    <img
                                      id = "expandedImg"
                                      class="img-rounded trigger"
                                      src="<?php echo base_url('uploads_car').'/'.$row->thumb_name_multi.'';?>"
                                      data-zoom="<?php echo base_url('uploads_car').'/'.$row->thumb_name_multi.'';?>?w=1500&ch=DPR&dpr=5"
                                      alt="Thumbnail image"
                                    />
                                    <div class="trigger-view"></div>
                                  </figure>
                                </div>
                              <?php } ?>
                            <?php } else{ ?>
                              <?php             
                                if($row->thumb_name_multi==""){
                              ?>
                                <div class="has-text-centered">
                                  <figure class="image is-3by2">
                                    <img
                                      class="img-rounded"
                                      src="<?php echo base_url('frontend');?>/assets/images/products/no-image.jpg"
                                      alt="No Image"
                                    />
                                  </figure>
                                </div>
                              <?php } else { ?>
                                <div class="has-text-centered">
                                  <figure class="image is-3by2">
                                    <img
                                      id = "expandedImg"
                                      class="img-rounded trigger"
                                      src="<?php echo base_url('uploads_car').'/'.$this->input->get('img').'';?>"
                                      data-zoom="<?php echo base_url('uploads_car').'/'.$this->input->get('img').'';?>?w=1500&ch=DPR&dpr=5"
                                      alt="Thumbnail image"
                                    />
                                    <div class="trigger-view"></div>
                                  </figure>
                                </div>
                              <?php } ?>
                            <?php }?>
                          <?php } ?>
                        <?php } ?>
                      </div>
                      <div class="column is-6">
                        <!-- Grid Images -->
                        <div class="columns is-multiline">
                          <?php if(!empty($car_image)){?>
                            <?php foreach($car_image as $row){?>
                              <div class="column is-4">
                                <?php             
                                  if($row->thumb_name_multi==""){
                                ?>
                                  <div class="has-text-centered">
                                    <figure class="image is-3by2">
                                      <img
                                        class="img-rounded"
                                        src="<?php echo base_url('frontend');?>/assets/images/products/no-image.jpg"
                                        alt="No Image"
                                      />
                                    </figure>
                                  </div>
                                <?php } else { ?>

                                  <!--_______________________reload______________________________-->

                                    <script type="text/javascript">
                                    $(window).load(function() {
                                        $(".loader1").fadeOut(50);
                                    })
                                    </script>
                                    <style type="text/css">  

                                        .loader1 {
                                        position: fixed;
                                        left: 0px;
                                        top: 0px;
                                        width: 100%;
                                        height: 100%;
                                        z-index: 9999;
                                        background: url('<?php echo base_url();?>/backend/images/display-loading-image-while-page-loads-02.gif') 50% 50% no-repeat rgb(249,249,249);
                                    }

                                    </style>  
                                    <div class="loader1"></div> 
                                    <!--_______________________end reload______________________________-->


                                  <div class="has-text-centered">
     
                                      <figure class="image is-3by2">
                                        <img
                                          onclick="myFunction(this);"
                                          class="img-rounded"
                                          src="<?php echo base_url('uploads_car').'/'.$row->thumb_name_multi.'';?>"
                                          alt="Thumbnail image"
                                        />
                                      </figure>
           
                                  </div>
                                <?php } ?>
                              </div>
                            <?php } ?>
                          <?php } ?>
                          <div class="column is-12">
                            <!-- Pagination -->
                            <div class="w-md-100 mx-auto">
                              <?php $count_page = ceil($count_all/9); ?>
                              <?php if($count_all<=9){ ?>
                                <!-- NULL Pagination -->
                              <?php } else { ?>
                              <nav
                                class="pagination is-centered"
                                role="navigation"
                                aria-label="pagination"
                              >
                                <ul class="pagination-list">
                                <?php for( $i= 1 ; $i <= $count_page; $i++ ){ ?>   
                                  <?php $count_2 = $i-1; $offset = $count_2*9; ?>
                                    <?php if(empty($this->uri->segment(4))){ $page = 1; }else{ $page = $this->uri->segment(4); } ?>
                                      <li>
                                        <a
                                          href="<?php echo base_url('buy/car_view/'.$this->uri->segment(3).'/'.$i.'?offset='.$offset.'&&page='.$this->input->get('page').'&&car_top_id='.$this->input->get('car_top_id').'&&id_login='.$this->input->get('id_login').'');?>"
                                          class="pagination-link <?php if($page==$i){ echo "is-current";}?>"
                                          aria-label="Page 1"
                                          aria-current="page"
                                          ><?php echo $i;?></a
                                        >
                                      </li>
                                  <?php } ?>
                                </ul>
                              </nav>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="column is-12 is-hidden-desktop is-hidden-tablet-only">
                    <!-- Section Image Mobile -->
                    <div id="car-image-mobile-for">
                      <?php if(!empty($car_image)){?>
                        <?php foreach($car_image as $row){?>
                      <div class="columns">
                        <div class="column is-12">
                          <div class="has-text-centered">
                            <figure class="image is-3by2">
                              <img
                                class="img-rounded"
                                src="<?php echo base_url('uploads_car').'/'.$row->thumb_name_multi.'';?>"
                                alt="Thumbnail image"
                              />
                            </figure>
                          </div>
                        </div>
                      </div>
                        <?php } ?>
                      <?php } ?>
                    </div>
                    <div id="car-image-mobile-nav">
                      <?php if(!empty($car_image)){?>
                        <?php foreach($car_image as $row){?>
                      <div class="columns">
                        <div class="column is-12">
                          <div class="has-text-centered">
                            <figure class="image is-3by2">
                              <img
                                class="img-rounded"
                                src="<?php echo base_url('uploads_car').'/'.$row->thumb_name_multi.'';?>"
                                alt="Thumbnail image"
                              />
                            </figure>
                          </div>
                        </div>
                      </div>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="column is-12">
                    <!-- Section Button Finace -->
                    <div class="columns">
                      <div class="column is-6">
                        <!-- Car Title -->
                        <h4 class="title is-4 has-text-weight-normal">
                          <?php echo $car_view['no_car'];?> &bull; 
                              <?php if(!empty($car_view['name_year_th']) AND !empty($car_view['name_year_en'])){?>
                                    <?php if($this->lang->line("set_lang")=="th"){?>
                                      <?php echo '('.@$car_view['name_year_th'].')';?>
                                      &bull;
                                    <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                      <?php echo '('.@$car_view['name_year_en'].')';?>
                                      &bull;
                                    <?php }?>
                              <?php }else{?>
                                    <?php if($car_view['name_year_pro']!==""){?>
                                      <?php echo '('.@$car_view['name_year_pro'].')';?>
                                    <?php }?>
                              <?php }?>
                               
                                     <?php echo $car_view['name'];?>
                        </h4>
                      </div>
                      <div class="column is-6">
                        <!-- Button -->
                        <?php if(!empty($this->input->get('page'))){
                            $car_top_id = $this->input->get('car_top_id');
                          }else{
                            $car_top_id = $this->uri->segment(3);
                        }?>
                        <?php if($car_view['status_id']!=4){?>
                          <?php if(!empty($data_member['name'])){?>
                          <a href="<?php echo base_url('buy/finance/'.$car_top_id.'');?>" class="button is-orange is-fullwidth"><i class="bx bxs-hot"></i>&nbsp;<?php echo $this->lang->line("service_finance_");?></a>
                          <?php }else{ ?>
                            <a href="<?php echo base_url('member');?>" class="button is-orange is-fullwidth"
                                ><i class="bx bxs-hot"></i>&nbsp;<?php echo $this->lang->line("service_finance_");?></a
                              >
                          <?php } ?>

                        <?php } ?>


                        <!-- <?php if($car_view['status_id']!=4){?>
                          <?php if($car_view['car_top_id'] !== $this->input->get('car_top_id')){?>

                          <?php if($car_view['id_login'] !== $data_member['id']){?>
                            <?php if(!empty($data_member['name'])){?>
                              <?php if($buy_car_id=="FALSE"){?>
                                <a href="<?php echo base_url('buy/finance/'.$car_top_id.'');?>" class="button is-orange is-fullwidth"
                                  ><i class="bx bxs-hot"></i>&nbsp;<?php echo $this->lang->line("service_finance_");?></a
                                >
                              <?php }?>
                            <?php }else{ ?>
                              <a href="<?php echo base_url('member');?>" class="button is-orange is-fullwidth"
                                ><i class="bx bxs-hot"></i>&nbsp;<?php echo $this->lang->line("service_finance_");?></a
                              >
                            <?php }?>
                          <?php }?>

                          <?php }?>
                        <?php }?> -->
                       
                       
                      </div>
                    </div>
                  </div>
                  <div class="column is-12">
                    <!-- Section Price & Detail -->
                    <div class="columns">
                      <div class="column is-6">
                        <!-- Price -->
                        <div class="columns">
                          <div class="column is-12">
                            <div class="price-box is-hidden-mobile">
                              <h3 class="title is-3 has-text-centered">
                                <?php if ($car_view['id_login'] == $data_member['id']) { ?>
                                  <?php if ($car_view['status_id'] == 0 or $car_view['status_id'] == 1 or $car_view['status_id'] == 3) { ?>
                                    <!-- แสดงราคา *สำหรับผู้โพส* -->
                                    <?php echo '' . @number_format($car_view['name_price']) . ' ' . $this->lang->line("baht"); ?>
                                  <?php } else { ?>
                                    <?php echo '' . @number_format($car_view['name_price']) . ' ' . $this->lang->line("baht"); ?>
                                    <!-- Input ให้แก้ไขราคา -->
                                  <?php } } else { ?>
                                    <!-- แสดงราคาสำหรับบุคคลทั่วไป -->
                                    <?php echo '' . @number_format($car_view['name_price']) . ' ' . $this->lang->line("baht"); ?>
                                <?php } ?>
                              </h3>
                            </div>
                            <div class="price-box is-hidden-desktop is-hidden-tablet-only">
                              <h4 class="title is-4 has-text-centered">
                                <?php if ($car_view['id_login'] == $data_member['id']) { ?>
                                  <?php if ($car_view['status_id'] == 0 or $car_view['status_id'] == 1 or $car_view['status_id'] == 3) { ?>
                                    <!-- แสดงราคา *สำหรับผู้โพส* -->
                                    <?php echo '' . @number_format($car_view['name_price']) . ' ' . $this->lang->line("baht"); ?>
                                  <?php } else { ?>
                                    <?php echo '' . @number_format($car_view['name_price']) . ' ' . $this->lang->line("baht"); ?>
                                    <!-- Input ให้แก้ไขราคา -->
                                  <?php } } else { ?>
                                    <!-- แสดงราคาสำหรับบุคคลทั่วไป -->
                                    <?php echo '' . @number_format($car_view['name_price']) . ' ' . $this->lang->line("baht"); ?>
                                <?php } ?>
                              </h4>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="column is-6">
                        <!-- Detail Right -->
                        <div class="columns is-multiline">
                          <div class="column is-12">
                            <!-- Table -->
                            <table class="table is-hoverable is-fullwidth">
                              <tbody>
                                <tr>
                                  <th><?php echo $this->lang->line("tx_type");?></th>
                                  <td class="has-text-right">
                                    <?php if($this->lang->line("set_lang")=="th"){?>
                                      <?php echo @$car_view['name_type_th_t'];?>
                                    <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                      <?php echo @$car_view['name_type_en_t'];?>
                                    <?php }else{?>
                                      <?php echo "-";?>
                                    <?php }?>
                                    <?php if(empty($car_view['name_type_th_t']) OR empty($car_view['name_type_en_t'])){echo "-";}?>
                                  </td>
                                </tr>
                                <tr>
                                  <th><?php echo $this->lang->line("tx_brand");?></th>
                                  <td class="has-text-right">
                                    <?php if($this->lang->line("set_lang")=="th"){?>
                                      <?php echo @$car_view['name_th_o'];?>
                                    <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                      <?php echo @$car_view['name_en_o'];?>
                                    <?php }else{?>
                                      <?php echo "-";?>
                                    <?php }?> 
                                    <?php if(empty($car_view['name_th_o']) OR empty($car_view['name_en_o'])){echo "-";}?>
                                  </td>
                                </tr>
                                <tr>
                                  <th><?php echo $this->lang->line("tx_model");?></th>
                                  <td class="has-text-right">
                                    <?php if($this->lang->line("set_lang")=="th"){?>
                                      <?php echo @$car_view['name_model_th2'];?>
                                    <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                      <?php echo @$car_view['name_model_en2'];?>
                                    <?php }else{?>
                                      <?php echo "-";?>
                                    <?php }?>
                                    <?php if(empty($car_view['name_model_th2']) OR empty($car_view['name_model_en2'])){echo "-";}?>  
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="column is-12">
                    <!-- Table Detail -->
                    <div class="columns">
                      <div class="column is-6">
                        <table class="table is-hoverable is-fullwidth">
                          <tbody>
                            
                            <tr>
                              <th><?php echo $this->lang->line("tx_model_des");?></th>
                              <td class="has-text-right">
                                    <?php if($this->lang->line("set_lang")=="th"){?>
                                      <?php echo @$car_view['car_model_des_th3'];?>
                                    <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                      <?php echo @$car_view['car_model_des_en3'];?>
                                    <?php }else{?>
                                      <?php echo "-";?>
                                    <?php }?> 
                                    <?php if(empty($car_view['car_model_des_th3']) OR empty($car_view['car_model_des_en3']) OR $car_view['car_model_des_en3']=="" OR $car_view['car_model_des_th3']==""){echo "-";}?>  
                                </td>
                            </tr>
                            <tr>
                              <th><?php echo $this->lang->line("year");?></th>
                              <td class="has-text-right">
                                <?php if(!empty($car_view['name_year_th']) AND !empty($car_view['name_year_en'])){?>
                                    <?php if($this->lang->line("set_lang")=="th"){?>
                                      <?php echo @$car_view['name_year_th'];?>
            
                                    <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                      <?php echo @$car_view['name_year_en'];?>
        
                                    <?php }?>
                              <?php }else{?>
                                    <?php if($car_view['name_year_pro']!==""){?>
                                      <?php echo @$car_view['name_year_pro'];?>
                                    <?php }?>
                              <?php }?>
                                     <?php if($car_view['name_year_pro']==""){echo "-";}?> 
                              </td>
                            </tr>
                            <tr>
                              <th><?php echo $this->lang->line("tx_capacity");?></th>
                              <td class="has-text-right">
                                <?php if(!empty($car_view['name_capacity_th']) AND !empty($car_view['name_capacity_en'])){?>
                                  <?php if(!empty($car_view['name_capacity_th'])){?>
                                      <?php if($this->lang->line("set_lang")=="th"){?>
                                        <?php echo @$car_view['name_capacity_th'].' ซีซี';?>
                                      <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                        <?php echo @$car_view['name_capacity_en'].' CC';?>
                                      <?php }?> 
                                  <?php }?>
                                <?php }else{?>
                                  <?php if($car_view['name_capacity']!==""){?>
                                  <?php echo @$car_view['name_capacity'];?>
                                      <?php if($this->lang->line("set_lang")=="th"){?>
                                        <?php echo ' ซีซี';?>
                                      <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                        <?php echo ' CC';?>
                                      <?php }?> 
                                  <?php }?>
                                <?php }?>

                                    <?php if($car_view['name_capacity']==""){echo "-";}?> 
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="column is-6">
                        <table class="table is-hoverable is-fullwidth">
                          <tbody>
                            <tr>
                              <th><?php echo $this->lang->line("tx_gear");?></th>
                              <td class="has-text-right">
                                <?php if(!empty($car_view['name_gear_th']) AND !empty($car_view['name_gear_en'])){?>
                                    <?php if($this->lang->line("set_lang")=="th"){?>
                                      <?php echo @$car_view['name_gear_th'];?>
                                    <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                      <?php echo @$car_view['name_gear_en'];?>
                                    <?php }?> 
                                <?php }else{ ?>
                                  <?php if($car_view['name_gear']!==""){?>
                                    <?php echo @$car_view['name_gear'];?>
                                  <?php } ?>
                                <?php } ?>
                                    <?php if($car_view['name_gear']==""){echo "-";}?> 
                              </td>
                            </tr>
                           
                            <tr>
                              <th><?php echo $this->lang->line("mile");?></th>
                              <td class="has-text-right">
                                    <?php if($this->lang->line("set_lang")=="th"){?>
                                      <?php echo @$car_view['name_mile'];?>
                                    <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                      <?php echo @$car_view['name_mile'];?>
                                    <?php }else{?>
                                      <?php echo "-";?>
                                    <?php }?> 

                                     <?php if(empty($car_view['name_mile'])  OR $car_view['name_mile']==""){echo "-";}?> 

                                    
                              </td>
                            </tr>
                            <tr>
                              <th><?php echo $this->lang->line("tx_color");?></th>
                              <td class="has-text-right">
                                <?php if(!empty($car_view['name_color_th']) AND !empty($car_view['name_color_en'])){?>
                                    <?php if($this->lang->line("set_lang")=="th"){?>
                                      <?php echo @$car_view['name_color_th'];?>
                                    <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                      <?php echo @$car_view['name_color_en'];?>
                                    <?php }else{?>
                                      <?php echo "-";?>
                                    <?php }?> 
                                <?php }else{?>
                                  <?php if($car_view['name_color']!==""){?>
                                    <?php echo @$car_view['name_color'];?>
                                  <?php } ?>
                                <?php }?>
                                    <?php if($car_view['name_color']==""){echo "-";}?> 
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <hr class="spacer is-1" />
                  </div>
                  <div class="column is-12">
                    <!-- Section Accessory -->
                    <div class="columns is-multiline">
                      <div class="column is-12">
                        <!-- Title Accessory -->
                      <?php if(!empty($car_view['device'])){?>
                        <h4 class="title is-4 has-text-weight-normal">
                          <?php echo $this->lang->line("device_1");?>
                        </h4>
                      <?php }?>
                      </div>
                      <div class="column is-12">
                        <div class="w-md-100 mx-auto">
                          <div class="field is-grouped is-grouped-multiline is-hidden-mobile">
                           <?php $de = explode(',', $car_view['device']);?>
                            <?php for($i=0; $i<count($de); $i++){?>
                              <?php if(!empty($de[$i])){?>
                              <div class="control">
                                <div class="tags has-addons">
                                  <?php
                                    $query = $this->db->query ( 'SELECT * FROM tbl_device WHERE device_name_th in ("'.$de[$i].'") OR device_name_en in ("'.$de[$i].'")');
                                    $row = $query->result();
                                  ?>
                                  <span class="tag is-light is-medium"><?php foreach ($row as $key) { if($this->lang->line("set_lang")=="th"){ echo $key->device_name_th; }else{ echo $key->device_name_en; }} ?></span>
                                </div>
                              </div>
                              <?php }?>
                            <?php }?>
                          </div>
                          <div class="field is-grouped is-grouped-multiline is-hidden-desktop is-hidden-tablet-only">
                           <?php $de = explode(',', $car_view['device']);?>
                            <?php for($i=0; $i<count($de); $i++){?>
                              <?php if(!empty($de[$i])){?>
                              <div class="control">
                                <div class="tags has-addons">
                                  <?php
                                    $query = $this->db->query ( 'SELECT * FROM tbl_device WHERE device_name_th in ("'.$de[$i].'")');
                                    $row = $query->result();
                                  ?>
                                  <span class="tag is-light is-small"><?php foreach ($row as $key) { if($this->lang->line("set_lang")=="th"){ echo $key->device_name_th; }else{ echo $key->device_name_en; }} ?></span>
                                </div>
                              </div>
                              <?php }?>
                            <?php }?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr class="spacer is-1" />
                  </div>

                <?php if(!empty($this->session->userdata('member_id_log'))){?>
                  <div class="column is-12">
                    <!-- Post Profile User -->
                    <div class="columns is-multiline">
                      <div class="column is-12">
                        <!-- Title -->
                        <h4 class="title is-4 has-text-weight-normal">
                          <?php echo $this->lang->line("profile_sale");?>
                        </h4>
                      </div>
                      <div class="column is-12">
                        <!-- Profile -->
                        <div class="columns">
                          <div class="column is-12">
                            <!-- Profile Detail -->
                            <div class="post-box">
                              <div class="columns is-multiline">
                                <div class="column is-12">
                                  <div class="columns">
                                    <!-- Name -->
                                    <div class="column is-4">
                                      <p class="subtitle is-6"><?php echo $this->lang->line("r_name");?> :</p>
                                    </div>
                                    <div class="column is-8">
                                      <p class="subtitle is-6"><?php if($id_login==0){?><?php echo "admin";?><?php }else{?><?php echo $car_view['name_lastname'];?><?php }?></p>
                                    </div>
                                  </div>
                                </div>
                                <div class="column is-12">
                                  <div class="columns">
                                    <!-- Detail -->
                                    <div class="column is-4">
                                      <p class="subtitle is-6"><?php echo $this->lang->line("data_profile_sale");?> :</p>
                                    </div>
                                    <div class="column is-8">
                                      <p class="subtitle is-6">
                                        <?php echo $car_view['descript'].'';?>
                                        <!-- ยังขาดส่วนของการแก้ไขข้อมูล -->
                                      </p>
                                    </div>
                                  </div>
                                </div>
                                <div class="column is-12">
                                  <div class="columns">
                                    <!-- Email -->
                                    <div class="column is-4">
                                      <p class="subtitle is-6"><?php echo $this->lang->line("email");?> :</p>
                                    </div>
                                    <div class="column is-8">
                                      <p class="subtitle is-6">                                          
                                        <?php if($car_view['status_id']!=4){?>

                                        <?php if($id_login==0){?>
                                          <?php if($car_view_check['email']){echo $car_view_check['email'];}else{echo "-";}?>
                                        <?php } else { ?>
                                          <?php if($car_view['email']){echo $car_view['email'];}else{echo "-";}?>
                                        <?php } ?>

                                        <?php } ?>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                                <div class="column is-12">
                                  <div class="columns">
                                    <!-- Phone -->
                                    <div class="column is-4">
                                      <p class="subtitle is-6"><?php echo $this->lang->line("tel");?> :</p>
                                    </div>
                                    <div class="column is-8">
                                      <p class="subtitle is-6">

                                    
                                      <?php if($car_view['status_id']!=4){?>

                                        <?php if (@$car_view['status'] == 0) { ?>
                                        <?php if (empty($check['car_top_id'])) { ?>
                                          <?php if ($id_login == 0) { ?>
                                            <?php if ($car_view_check['tel']) {?>
                                              
                                                <?php echo $car_view_check['tel'];?>

                                            <?php } else {
                                                echo "-";
                                            } ?>
                                          <?php 
                                        } else { ?>

                                            <?php if ($car_view['tel']) {
                                                echo $car_view['tel'];
                                            } else {
                                                echo "-";
                                            } ?>
                                        
                                          <?php 
                                        } ?>
                                        <?php 
                                        } ?>
                                        <?php 
                                        } elseif ($car_view['status'] == 1) { ?>
                                          <?php if ($id_login == 0) { ?>
                                        
                                          <?php 
                                        } else { ?>
                                          <?php 
                                        } ?>
                                        <?php 
                                        } ?>

                                      <?php 
                                      } ?>

                                      </p>
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
                <?php }?>
                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php if(empty($this->input->get('page'))){?>
      <?php if($car_view['id_login'] !== $data_member['id']){?>
      <!-- Section Recommend Cars List -->
      <section class="cars-recommend-list">
        <div class="container">
          <div class="w-md-75 mx-auto">
            <div class="columns is-multiline">
              <div class="column is-12">
                <!-- Title & Button -->
                <div class="columns">
                  <div class="column is-12">
                    <!-- Title Text-->
                    <h4 class="title is-4 has-text-weight-normal">
                      <?php echo $this->lang->line("show_some");?>
                    </h4>
                  </div>
                </div>
              </div>
              <div class="column is-12">
                <!-- Cars Card Only Desktop, Tablet -->
                <div class="columns is-multiline is-hidden-mobile">
                  <?php foreach($car_top as $row){?>
                    <div class="column is-display-flex is-4">
                      <a href="<?php echo base_url('buy/car_view/'.$row->car_top_id);?>" style="width: 100%;">
                        <div class="card is-car-product">
                          <div class="card-image">
                           <!--  <div class="ribbon is-orange"><?php echo $this->lang->line("car_simi");?></div> -->
                            <figure class="image is-3by2 fig-image">
                              <img
                                src="<?php
                            if($row->thumb_name_multi=="" OR $row->status == "delete"){echo
                            base_url().'frontend/assets/images/products/no-image.jpg';}else{echo 
                            base_url().'uploads_car/'.$row->thumb_name_multi;}?>"
                                alt="Car image"
                              />
                            </figure>
                          </div>
                          <div class="card-content">
                            <div class="media">
                              <div class="media-left">
                                <p class="title is-4">
                                  <?php if($this->lang->line("set_lang")=="th"){?>
                                    <?php echo @$car_view['name_th_o'];?>
                                  <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                    <?php echo @$car_view['name_en_o'];?>
                                  <?php }else{?>
                                    <?php echo "";?>
                                  <?php }?> 
                                </p>
                              </div>
                            </div>
                            <div class="content">
                              <?php if($this->lang->line("set_lang")=="th"){?>
                                <?php echo @$car_view['name_model_th2'];?>
                              <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                  <?php echo @$car_view['name_model_en2'];?>
                              <?php }else{?>
                                <?php echo "";?>
                              <?php }?> 
                              <hr class="spacer" />
                              <?php if($this->lang->line("set_lang")=="th"){?>
                                <?php echo @$car_view['car_model_des_th3'];?>
                              <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                <?php echo @$car_view['car_model_des_en3'];?>
                              <?php }else{?>
                                <?php echo "";?>
                              <?php }?> 
                              <hr class="spacer" />
                              <?php if(!empty($car_view['name_year_th']) AND !empty($car_view['name_year_en'])){?>
                                    <?php if($this->lang->line("set_lang")=="th"){?>
                                      <?php echo @$car_view['name_year_th'];?>
            
                                    <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                      <?php echo @$car_view['name_year_en'];?>
        
                                    <?php }?>
                              <?php }else{?>
                                    <?php if($car_view['name_year_pro']!==""){?>
                                      <?php echo @$car_view['name_year_pro'];?>
                                    <?php }?>
                              <?php }?>
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
                  <?php } ?> 
                </div>
                <!-- Button -->
                <div class="columns is-multiline is-hidden-mobile">
                  <div class="w-md-100 mx-auto pt-3">
                    <a href="<?php echo base_url('buy');?>" class="button is-orange"><?php echo $this->lang->line("show_all_car");?></a>
                  </div>
                </div>
                <!-- Cars Card Only Mobile -->
                <div class="columns is-hidden-tablet-only is-hidden-desktop">
                  <div id="recommend-cars-list">
                    <?php foreach($car_top as $row){?>
                    <div class="columns">
                      <div class="column is-12">
                        <a href="<?php echo base_url('buy/car_view/'.$row->car_top_id);?>" style="width: 100%;">
                          <div class="card is-car-product">
                            <div class="card-image">
                              <!-- <div class="ribbon is-orange"><?php echo $this->lang->line("car_simi");?></div> -->
                              <figure class="image is-3by2 fig-image">
                                <img
                                  src="<?php
                              if($row->thumb_name_multi=="" OR $row->status == "delete"){echo
                              base_url().'frontend/assets/images/products/no-image.jpg';}else{echo 
                              base_url().'uploads_car/'.$row->thumb_name_multi;}?>"
                                  alt="Car image"
                                />
                              </figure>
                            </div>
                            <div class="card-content">
                              <div class="media">
                                <div class="media-left">
                                  <p class="title is-4">
                                    <?php if($this->lang->line("set_lang")=="th"){?>
                                      <?php echo @$car_view['name_th_o'];?>
                                    <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                      <?php echo @$car_view['name_en_o'];?>
                                    <?php }else{?>
                                      <?php echo "";?>
                                    <?php }?> 
                                  </p>
                                </div>
                              </div>
                              <div class="content">
                                <?php if($this->lang->line("set_lang")=="th"){?>
                                  <?php echo @$car_view['name_model_th2'];?>
                                <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                    <?php echo @$car_view['name_model_en2'];?>
                                <?php }else{?>
                                  <?php echo "";?>
                                <?php }?> 
                                <hr class="spacer" />
                                <?php if($this->lang->line("set_lang")=="th"){?>
                                  <?php echo @$car_view['car_model_des_th3'];?>
                                <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                  <?php echo @$car_view['car_model_des_en3'];?>
                                <?php }else{?>
                                  <?php echo "";?>
                                <?php }?> 
                                <hr class="spacer" />
                                <?php if(!empty($car_view['name_year_th']) AND !empty($car_view['name_year_en'])){?>
                                    <?php if($this->lang->line("set_lang")=="th"){?>
                                      <?php echo @$car_view['name_year_th'];?>
            
                                    <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                      <?php echo @$car_view['name_year_en'];?>
        
                                    <?php }?>
                              <?php }else{?>
                                    <?php if($car_view['name_year_pro']!==""){?>
                                      <?php echo @$car_view['name_year_pro'];?>
                                    <?php }?>
                              <?php }?>
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
                    </div>
                    <?php } ?> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php } ?>
    <?php } ?>

<script type="text/javascript">
  function myFunction(imgs) {

  var expandImg = document.getElementById("expandedImg");

  var imgText = document.getElementById("imgtext");

  expandImg.src = imgs.src;

  imgText.innerHTML = imgs.alt;

  expandImg.parentElement.style.display = "block";
}
</script>

