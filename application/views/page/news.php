    <?php if($this->input->get('page')!=="news_view"){?>
    <!-- Section Article News -->
    <section class="article-news">
      <div class="container">
        <div class="w-md-100 mx-auto">
          <div class="article-box">
            <div class="columns is-multiline">
              <div class="column is-12">
                <!-- Title -->
                <h5 class="title is-5 has-text-weight-normal">
                    <?php echo $this->lang->line("news_title");?>
                </h5>
              </div>
              <div class="column is-12">
                <!-- Article Card Only Desktop, Tablet -->
                <div class="columns is-multiline">
                  <!-- First Article -->
                  <?php if(!empty($news_top)){?>
                  <?php foreach($news_top as $row){?> 
                  <div class="column is-12">
                    <div class="columns">
                      <div class="column is-4">
                        <!-- Image -->
                        <a href="<?php echo base_url('news?page=news_view&&news_id='.$row->news_id.'')?>">
                          <div class="has-text-centered">
                            <img
                              src="<?php if($row->img==""){echo base_url().'frontend/assets/images/products/no-image.jpg';}else{echo base_url().'uploads/'.$row->img;}?>"
                              alt="News Image"
                              class="img-rounded"
                            />
                          </div>
                        </a>
                      </div>
                      <div class="column is-8">
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
                            <div class="">
                              <p class="subtitle is-5">
                                <?php if($this->lang->line("set_lang")=="th"){echo $row->description_th;}else{echo $row->description_en;}?>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <?php } ?>
                  <!-- Multiple Article -->
                  <?php if(!empty($news_all)){?>
                  <?php foreach($news_all as $row){?>
                  <?php if(empty($row->title_th) OR empty($row->title_en)){?>
                  <div class="column is-4">
                    <!-- Ad -->
                    
                      <div
                        class="media-ad"
                        style="background: url('<?php if($row->img==""){echo './frontend/assets/images/products/no-image.jpg';}else{echo './uploads/'.$row->img;}?>') center center no-repeat;
                      background-size: cover;
                      min-height: 320px;
                      height: 100%;"
                      >
                        <div class="ribbon is-danger"><?php echo $this->lang->line("advt");?></div>
                      </div>
                   
                  </div>
                  <?php }else{?> 
                  <div class="column is-display-flex is-4">
                    <!-- Article -->
                    <a href="<?php echo base_url('news?page=news_view&&news_id='.$row->news_id.'')?>" style="width: 100%;">
                      <div class="card is-article news-article">
                        <div class="card-image">
                          <figure class="image is-3by2 fig-image">
                            <img
                              src="<?php if($row->img==""){echo './frontend/assets/images/products/no-image.jpg';}else{echo './uploads/'.$row->img;}?>"
                              alt="News Image"
                            />
                          </figure>
                        </div>
                        <div class="card-content">
                          <div class="media">
                            <div class="media-left">
                              <p class="title is-5">
                                <?php if($this->lang->line("set_lang")=="th"){echo $row->title_th;}else{echo $row->title_en;}?>
                              </p>
                            </div>
                          </div>
                          <div class="content">
                            <?php if($this->lang->line("set_lang")=="th"){echo $row->description_th;}else{echo $row->description_en;}?>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <?php } } }?>
                </div>
              </div>
              <div class="column is-12">
                <!-- Pagination -->
                <div class="column is-12">
                  <!-- <?php echo $pagination;?> -->

                  <!-- Pagination -->

                  <?php if(!empty($count_news['count'])){?>
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
                                   <a class="pagination-next" href="<?php echo base_url('news?page='.$next_page.'&&offset='.$next_offset.'');?>"><?php if($this->lang->line("set_lang")=="th"){echo "ถัดไป";}else{echo "Next";}?></a>
                                  <?php }?>
                                  <?php  if($this->input->get('page') != 1){?>
                                   <a class="pagination-previous" href="<?php echo base_url('news?page='.$prev_page.'&&offset='.$prev_offset.'');?>"><?php if($this->lang->line("set_lang")=="th"){echo "ย้อนกลับ";}else{echo "Previous";}?></a>
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


                               <li><a class="pagination-link  <?php if($page==$i){ echo "is-current";}?>" href="<?php echo base_url('news?page='.$i.'&&offset='.$offset.'');?>"><?php echo $i;?></a></li>

                              <?php } ?>
                              
                               <?php } ?>
                            </ul>
                          </nav>
                        </div>
                     
                    </div>
                  </div>
                  <?php } ?>


                  <!-- <div class="w-md-100 mx-auto">
                    <nav
                      class="pagination is-centered"
                      role="navigation"
                      aria-label="pagination"
                    >
                      <a class="pagination-previous">ก่อนหน้า</a>
                      <a class="pagination-next">ถัดไป</a>
                      <ul class="pagination-list">
                        <li>
                          <a
                            class="pagination-link is-current"
                            aria-label="Page 1"
                            aria-current="page"
                            >1</a
                          >
                        </li>
                      </ul>
                    </nav>
                  </div> -->
                </div>
              </div>
              <!-- Article Card Only Mobile -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php }else{?>
    <section class="article-news">
      <div class="container">
        <div class="w-md-100 mx-auto">
          <div class="article-box">
            <div class="columns is-multiline">
              <div class="column is-12">
                <!-- Title -->
                <h5 class="title is-5 has-text-weight-normal">
                  <?php echo $this->lang->line("news_title");?>
                </h5>
              </div>
              <div class="column is-12">
                <!-- Article Card -->
                <div class="columns is-multiline">
                  <div class="column is-12">
                    <div class="columns">
                      <div class="column is-4">
                        <!-- Image -->
                        <div class="has-text-centered">
                          <img
                            src="<?php if($news_view['img']==""){echo base_url().'frontend/assets/images/products/no-image.jpg';}else{echo base_url().'uploads/'.$news_view['img'];}?>"
                            alt="News Image"
                            class="img-rounded"
                          />
                        </div>
                      </div>
                      <div class="column is-8">
                        <!-- Details -->
                        <div class="columns is-multiline">
                          <div class="column is-12">
                            <!-- Title -->
                            <h5
                              class="title is-5 has-text-orange has-text-weight-normal"
                            >
                              <?php if($this->lang->line("set_lang")=="th"){echo $news_view['title_th'];}else{echo $news_view['title_en'];}?>
                            </h5>
                          </div>
                          <div class="column is-12">
                            <!-- Detail -->
                            <div class="w-md-75">
                              <p class="subtitle is-5">
                                <?php if($this->lang->line("set_lang")=="th"){echo $news_view['description_th'];}else{echo $news_view['description_en'];}?>
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
        </div>
      </div>
    </section>
    <?php }?> 