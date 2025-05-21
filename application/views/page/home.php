    <?php if(!empty($car_top_count['car_top_id'])){?>
    <!-- Section Recommend Cars -->
    <section class="recommend-cars">
      <div class="container">
        <div class="w-md-100 mx-auto">
          <div class="card-custom">
            <div class="columns is-multiline">
              <div class="column is-12">
                <!-- Title & Button -->
                <div class="columns">
                  <div class="column is-9">
                    <!-- Title Text-->
                    <h5 class="title is-5 has-text-weight-normal">
                      <?php echo $this->lang->line("title_car");?>
                    </h5>
                  </div>
                  <div class="column is-3 is-hidden-mobile">
                    <!-- Button Text-->
                    <a href="<?php echo base_url('buy');?>" class="button is-orange is-fullwidth"><?php echo $this->lang->line("view_car_all");?></a>
                  </div>
                </div>
              </div>
              <div class="column is-12">
                <!-- Cars Card Only Desktop, Tablet -->
                <div class="columns is-multiline is-hidden-mobile">
                  <?php foreach($car_top as $row){?> 
                  <div class="column is-display-flex is-4">
                    <a href="<?php echo base_url('buy/car_view/'.$row->car_top_id.'');?>" style="width: 100%;">
                      <div class="card is-car-product">
                        <div class="card-image">
                          <!-- <div class="ribbon is-orange"><?php echo $this->lang->line("recom_car");?></div> -->
                          <figure class="image is-3by2 fig-image">
                            <img
                              src="<?php
                                if($row->thumb_name_multi=="" OR $row->status == "delete"){echo
                                base_url().'frontend/assets/images/products/no-image.jpg';}else{echo
                                base_url().'uploads_car/'.$row->thumb_name_multi;}?>"
                              alt="Recommend Product Image"
                            />
                          </figure>
                        </div>
                        <div class="card-content">
                          <div class="media">
                            <div class="media-left">
                           
                                <p class="title is-4">
                                <?php if($this->lang->line("set_lang")=="th"){?>
                                  <?php echo @$row->name_th_o;?>
                                <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                  <?php echo @$row->name_en_o;?>
                                <?php }else{?>
                                  <?php echo "";?>
                                <?php }?> 
                                </p>
                          
                                <p class="content">
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
                            </div>
                          </div>
                          <div class="content">
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
                  <?php } ?>
                </div>
                <!-- Cars Card Only Mobile -->
                <div class="columns is-hidden-tablet-only is-hidden-desktop">
                  <div id="recommend-cars-mobile-slide">
                    <?php foreach($car_top as $row){?> 
                    <div class="columns">
                      <div class="column is-12">
                        <a href="<?php echo base_url('buy/car_view/'.$row->car_top_id.'');?>" style="width: 100%;">
                          <div class="card is-car-product">
                            <div class="card-image">
                             <!--  <div class="ribbon is-orange"><?php echo $this->lang->line("recom_car");?></div> -->
                              <figure class="image is-3by2 fig-image">
                                <img
                                  src="<?php
                                    if($row->thumb_name_multi=="" OR $row->status == "delete"){echo
                                    base_url().'frontend/assets/images/products/no-image.jpg';}else{echo
                                    base_url().'uploads_car/'.$row->thumb_name_multi;}?>"
                                  alt="Recommend Product Image"
                                />
                              </figure>
                            </div>
                            <div class="card-content">
                              <div class="media">
                                <div class="media-left">
                                 
                                    <p class="title is-4">
                                    <?php if($this->lang->line("set_lang")=="th"){?>
                                      <?php echo @$row->name_th_o;?>
                                    <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                      <?php echo @$row->name_en_o;?>
                                    <?php }else{?>
                                      <?php echo "";?>
                                    <?php }?> 
                                    </p>
                                    
                                     <p class="content">
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
                                </div>
                              </div>
                              <div class="content">
                              
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
                    </div>
                    <?php } ?> 
                  </div>
                </div>
              </div>
              <div class="column is-12 is-hidden-tablet-only is-hidden-desktop">
                <a href="<?php echo base_url('buy');?>" class="button is-orange is-fullwidth"><?php echo $this->lang->line("view_car_all");?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php } ?>

    <?php if(!empty($car_top2_count['car_top_id'])){?>
    <!-- Section Cars Last Added -->
    <section class="cars-all">
      <div class="container">
        <div class="w-md-100 mx-auto">
          <div class="card-custom">
            <div class="columns is-multiline">
              <div class="column is-12">
                <!-- Title & Button -->
                <div class="columns">
                  <div class="column is-9">
                    <!-- Title Text-->
                    <h5 class="title is-5 has-text-weight-normal">
                      <?php echo $this->lang->line("car_all");?>
                    </h5>
                  </div>
                  <div class="column is-3 is-hidden-mobile">
                    <!-- Button Text-->
                    <a href="<?php echo base_url('buy');?>" class="button is-orange is-fullwidth"><?php echo $this->lang->line("view_car_all");?></a>
                  </div>
                </div>
              </div>
              <div class="column is-12">
                <!-- Cars Card Only Desktop, Tablet -->
                <div class="columns is-multiline is-hidden-mobile">
                  <?php foreach($car_top2 as $row){?> 
                  <div class="column is-display-flex is-4">
                    <a href="<?php echo base_url('buy/car_view/'.$row->car_top_id.'');?>" style="width: 100%;">
                      <div class="card is-car-product">
                        <div class="card-image">
                          <?php if($row->status_id==4){?>
                            <div class="ribbon is-link" style="background-color:red;"><?php echo $this->lang->line("closesale");?></div>
                          <?php }?>
                          <figure class="image is-3by2 fig-image">
                            <img
                              src="<?php
                                if($row->thumb_name_multi=="" OR $row->status == "delete"){echo
                                base_url().'frontend/assets/images/products/no-image.jpg';}else{echo
                                base_url().'uploads_car/'.$row->thumb_name_multi;}?>"
                              alt="Recommend Product Image"
                            />
                          </figure>
                        </div>
                        <div class="card-content">
                          <div class="media">
                            <div class="media-left">
                             
                                <p class="title is-4">
                                <?php if($this->lang->line("set_lang")=="th"){?>
                                  <?php echo @$row->name_th_o;?>
                                <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                  <?php echo @$row->name_en_o;?>
                                <?php }else{?>
                                  <?php echo "";?>
                                <?php }?> 
                                </p>
                                
                                <p class="content">
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
                            </div>
                          </div>
                          <div class="content">
                        
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
                  <?php } ?> 
                </div>
                <!-- Cars Card Only Mobile -->
                <div class="columns is-hidden-tablet-only is-hidden-desktop">
                  <div id="cars-all-mobile-slide">
                    <?php foreach($car_top2 as $row){?> 
                    <div class="columns">
                      <div class="column is-12">
                        <a href="<?php echo base_url('buy/car_view/'.$row->car_top_id.'');?>" style="width: 100%;">
                          <div class="card is-car-product">
                            <div class="card-image">
                              <?php if($row->status_id==4){?>
                                <div class="ribbon is-link" style="background-color:red;"><?php echo $this->lang->line("closesale");?></div>
                              <?php }?>
                              <figure class="image is-3by2 fig-image">
                                <img
                                  src="<?php
                                    if($row->thumb_name_multi=="" OR $row->status == "delete"){echo
                                    base_url().'frontend/assets/images/products/no-image.jpg';}else{echo
                                    base_url().'uploads_car/'.$row->thumb_name_multi;}?>"
                                  alt="Recommend Product Image"
                                />
                              </figure>
                            </div>
                            <div class="card-content">
                              <div class="media">
                                <div class="media-left">
                                  
                                     <p class="title is-4">
                                    <?php if($this->lang->line("set_lang")=="th"){?>
                                      <?php echo @$row->name_th_o;?>
                                    <?php }elseif($this->lang->line("set_lang")=="en"){?>
                                      <?php echo @$row->name_en_o;?>
                                    <?php }else{?>
                                      <?php echo "";?>
                                    <?php }?> 
                                  </p>
                                   
                                  <p class="content">
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
                                </div>
                              </div>
                              <div class="content">
                          
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
                    </div>
                    <?php } ?> 
                  </div>
                </div>
              </div>
              <div class="column is-12 is-hidden-tablet-only is-hidden-desktop">
                <a href="<?php echo base_url('buy');?>" class="button is-orange is-fullwidth"><?php echo $this->lang->line("view_car_all");?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php } ?>

    <!-- Section Content About Us -->
    <section class="section-about-us">
      <div class="container">
        <div class="w-md-100 mx-auto has-text-centered">
          <div class="columns is-multiline">
            <div class="column is-12">
              <!-- Title -->
              <h4 class="title is-4"><?php echo $this->lang->line("text1");?></h4>
            </div>
            <div class="column is-12">
              <!-- Subtitle -->
              <p class="subtitle is-4 has-text-orange is-uppercase">
                Postsicar
              </p>
            </div>
            <div class="column is-12">
              <!-- Details -->
              <p class="subtitle is-6 has-text-weight-normal">
                <?php if($this->lang->line("set_lang")=="th"){echo $about['descript_th'];}else{echo $about['descript_en'];}?>
              </p>
            </div>
            <div class="column is-12">
              <!-- Button -->
              <div class="w-md-25 mx-auto">
                <a href="<?php echo base_url('about');?>" class="button is-orange is-fullwidth"
                  ><?php echo $this->lang->line("know");?></a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section Images Background -->
    <section>
      <img src="<?php echo base_url('frontend/assets/images/abouts/background-image.png');?>" alt="Abouts" />
    </section>

    <!-- Section Finance List -->
    <section class="section-finance">
      <div class="container">
        <div class="columns is-multiline">
          <div class="column is-12">
            <!-- Title -->
            <div class="content has-text-centered">
              <h4 class="title is-4 has-text-orange">
                <?php echo $this->lang->line("title_finance");?>
              </h4>
            </div>
          </div>
          <div class="column is-12">
            <!-- Tutorial STEP -->
            <div class="columns is-mobile">
              <?php if(!empty($finance1)){?>
              <div class="column is-4">
                <div class="columns is-multiline">
                  <div class="column is-12">
                    <!-- Icon -->
                    <div class="has-text-centered">
                      <i class="bx bxs-shield bx-lg" style="color:#ff5c00"></i>
                    </div>
                  </div>
                  <div class="column is-12">
                    <!-- Title -->
                    <h5 class="title is-5 has-text-orange has-text-centered">
                      <?php if($this->lang->line("set_lang")=="th"){echo $finance1['title_th'];}else{echo $finance1['title_en'];}?>
                    </h5>
                  </div>
                  <div class="column is-12">
                    <!-- Details -->
                    <p class="subtitle is-6 has-text-orange has-text-centered">
                     <?php if($this->lang->line("set_lang")=="th"){echo $finance1['descript_th'];}else{echo $finance1['descript_en'];}?>
                    </p>
                  </div>
                </div>
              </div>
             <?php }?>
             <?php if(!empty($finance2)){?>
              <div class="column is-4">
                <div class="columns is-multiline">
                  <div class="column is-12">
                    <!-- Icon -->
                    <div class="has-text-centered">
                      <i class="bx bxs-group bx-lg" style="color:#ff5c00"></i>
                    </div>
                  </div>
                  <div class="column is-12">
                    <!-- Title -->
                    <h5 class="title is-5 has-text-orange has-text-centered">
                      <?php if($this->lang->line("set_lang")=="th"){echo $finance2['title_th'];}else{echo $finance2['title_en'];}?>
                    </h5>
                  </div>
                  <div class="column is-12">
                    <!-- Details -->
                    <p class="subtitle is-6 has-text-orange has-text-centered">
                      <?php if($this->lang->line("set_lang")=="th"){echo $finance2['descript_th'];}else{echo $finance2['descript_en'];}?>
                    </p>
                  </div>
                </div>
              </div>
              <?php }?>
              <?php if(!empty($finance3)){?>
              <div class="column is-4">
                <div class="columns is-multiline">
                  <div class="column is-12">
                    <!-- Icon -->
                    <div class="has-text-centered">
                      <i
                        class="bx bxs-dollar-circle bx-lg"
                        style="color:#ff5c00"
                      ></i>
                    </div>
                  </div>
                  <div class="column is-12">
                    <!-- Title -->
                    <h5 class="title is-5 has-text-orange has-text-centered">
                      <?php if($this->lang->line("set_lang")=="th"){echo $finance3['title_th'];}else{echo $finance3['title_en'];}?>
                    </h5>
                  </div>
                  <div class="column is-12">
                    <!-- Details -->
                    <p class="subtitle is-6 has-text-orange has-text-centered">
                      <?php if($this->lang->line("set_lang")=="th"){echo $finance3['descript_th'];}else{echo $finance3['descript_en'];}?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php }?>
          <div class="column is-12">
            <div class="content has-text-centered">
              <h6 class="title is-6 has-text-orange has-text-weight-normal">
                <?php echo $this->lang->line("text2");?>
                <a href="<?php echo base_url('sale');?>" class="has-text-dark"><?php echo $this->lang->line("servicefinance");?></a>
              </h6>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php if(!empty($news)){?>

    <!-- Section News -->
    <section class="section-news">
      <div class="container">
        <div class="w-md-100 mx-auto">
          <div class="card-custom">
            <div class="columns is-multiline">
              <div class="column is-12">
                <!-- Title & Button -->
                <div class="columns">
                  <div class="column is-9">
                    <!-- Title Text-->
                    <h5 class="title is-5 has-text-weight-normal">
                      <?php echo $this->lang->line("titlenews");?>
                    </h5>
                  </div>
                  <div class="column is-3 is-hidden-mobile">
                    <!-- Button Text-->
                    <a href="<?php echo base_url('news?page=1&&offset=0');?>" class="button is-orange is-fullwidth"><?php echo $this->lang->line("newsall");?></a>
                  </div>
                </div>
              </div>       
              <div class="column is-12">
                <!-- News Only Desktop, Tablet -->
                <div class="columns is-multiline is-hidden-mobile">

                  <?php foreach($news as $row){?>
                  <div class="column is-12">
                    <a href="<?php echo base_url('news?page=news_view&&news_id='.$row->news_id.'')?>">
                      <div class="columns">
                        <div class="column is-4-tablet is-3-widescreen">
                          <!-- Image -->
                          <div class="has-text-centered news-img-container">
                            <img
                              src="<?php if($row->img==""){echo base_url().'frontend/assets/images/products/no-image.jpg';}else{echo base_url().'uploads/'.$row->img;}?>"
                              alt="News Image"
                              class="img-rounded"
                            />
                          </div>
                        </div>
                        <div class="column is-8-tablet is-9-widescreen">
                          <!-- Details -->
                          <div class="columns is-multiline">
                            <div class="column is-12">
                              <!-- Title -->
                              <h4
                                class="title is-4 has-text-orange has-text-weight-normal"
                              >
                                <?php if($this->lang->line("set_lang")=="th"){echo $row->title_th;}else{echo $row->title_en;}?>
                              </h4>
                            </div>
                            <div class="column is-12">
                              <!-- Detail -->
                              <div class="w-md-75">
                                <p class="subtitle is-6">
                                  <?php if($this->lang->line("set_lang")=="th"){echo $row->description_th;}else{echo $row->description_en;}?>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <?php }?>
                </div>
                <!-- News Only Mobile -->
                <div class="columns is-hidden-tablet-only is-hidden-desktop">
                  <div id="news-mobile-slide">
                    <?php foreach($news as $row){?>
                    <div class="columns">
                      <div class="column is-12">
                        <a href="<?php echo base_url('news?page=news_view&&news_id='.$row->news_id.'')?>">
                          <div class="columns">
                            <div class="column is-4-tablet is-3-widescreen">
                              <!-- Image -->
                              <div class="has-text-centered news-img-container">
                                <img
                                  src="<?php if($row->img==""){echo base_url().'frontend/assets/images/products/no-image.jpg';}else{echo base_url().'uploads/'.$row->img;}?>"
                                  alt="News Image"
                                  class="img-rounded"
                                />
                              </div>
                            </div>
                            <div class="column is-8-tablet is-9-widescreen">
                              <!-- Details -->
                              <div class="columns is-multiline">
                                <div class="column is-12">
                                  <!-- Title -->
                                  <h5
                                    class="title is-5 has-text-orange has-text-weight-normal"
                                  >
                                    <?php if($this->lang->line("set_lang")=="th"){echo $row->title_th;}else{echo $row->title_en;}?>
                                  </h5>
                                </div>
                                <div class="column is-12">
                                  <!-- Detail -->
                                  <div class="w-md-75">
                                    <p class="subtitle is-6">
                                      <?php if($this->lang->line("set_lang")=="th"){echo $row->description_th;}else{echo $row->description_en;}?>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <?php }?>
                  </div>
                </div>
              </div>
              <div class="column is-12 is-hidden-tablet-only is-hidden-desktop">
                <a href="<?php echo base_url('news?page=1&&offset=0');?>" class="button is-orange is-fullwidth"><?php echo $this->lang->line("newsall");?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php }?>