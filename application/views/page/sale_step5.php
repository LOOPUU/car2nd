

    <!-- Section Rent Step 5 -->
    <section class="rent">
      <div class="container">
        <div class="w-md-75 mx-auto">
          <div class="form-box">
            <div class="columns is-multiline">
              <div class="column is-12">
                <!-- Step -->

              <?php if(empty($this->input->get('car_top_id')) OR $this->input->get('car_top_id') == ""){?>


                <div class="steps">

                  <div class="step-item is-completed">
                    <div class="step-marker">1</div>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 1</p>
                      <p><?php echo $this->lang->line("txt_fill_place");?></p>
                    </div>
                  </div>
                  <div class="step-item is-completed">
                    <div class="step-marker">2</div>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 2</p>
                      <p><?php echo $this->lang->line("txt_fill_des");?></p>
                    </div>
                  </div>
                  <div class="step-item is-completed">
                    <div class="step-marker">3</div>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 3</p>
                      <p><?php echo $this->lang->line("txt_upload_pic");?></p>
                    </div>
                  </div>
                  <div class="step-item is-completed">
                    <div class="step-marker">4</div>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 4</p>
                      <p><?php echo $this->lang->line("txt_upload_file");?></p>
                    </div>
                  </div>
                  
                  <div class="step-item is-active is-success">
                    <div class="step-marker">5</div>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 5</p>
                      <p><?php echo $this->lang->line("txt_finish");?></p>
                    </div>
                    <div class="step-dec"></div>
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
                    <div class="step-marker">2</div> </a>
                    <div class="step-details is-completed is-success">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 2</p>
                      <p><?php echo $this->lang->line("txt_fill_des");?></p>
                    </div>
                   
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
                  <div class="step-item is-active">
                   <div class="step-marker">5</div>
                    <div class="step-details">
                      <p class="step-title"><?php echo $this->lang->line("stepp");?> 5</p>
                      <p><?php echo $this->lang->line("txt_finish");?></p>
                    </div>
                    <div class="step-dec"></div>
                  </div>
                </div>
                <hr />


              <?php } ?>

              </div>
              <div class="column is-12">
                <div class="content has-text-centered">
                  <h4 class="title is-4"><?php echo $this->lang->line("txt_finish");?></h4>
                  <p class="subititle is-6">
                    <?php echo $this->lang->line("txt_des_finish");?>
                  </p>
                </div>
                <hr class="spacer" />
              </div>
              <!-- Section From -->
              <div class="column is-12">
                <div class="w-md-75 mx-auto">
                  <div class="rent-input">
                    <form>
                      <div class="columns is-multiline">
                        <div class="column is-12">
                          <div class="columns">
                            <div class="column is-12">
                              <div class="w-md-50 mx-auto">
                                <div class="has-text-centered">
                                  <img class="" src="<?php echo base_url('frontend')?>/assets/images/navigation-logo.png" alt="LOGO" style="width: 75%;" />
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
                                <a
                                  href="<?php echo base_url('sale/sale_step5_complete?id_login='.$this->input->get('id_login').'');?>"
                                  class="button is-orange is-fullwidth"
                                >
                                  <?php echo $this->lang->line("txt_close_window");?>
                                </a>
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


<?php $_SESSION['url5'] = base_url('sale/sale_step5/1/1/?id_login='.$this->input->get('id_login').''); ?>
<?php $_SESSION['step5'] = 'step5'; ?>
<?php $_SESSION['province'] = $province; ?>

