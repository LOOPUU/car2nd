<!-- 

<section class="u-content-space">
  <div class="container">
    <div
      class="tile is-ancestor"
      style="max-width: 1240px; margin: 0px auto; z-index: 90;"
    >
      <div class="tile is-parent">
        <div
          class="tile is-child box"
          style="padding: calc(3rem + 20px) 2rem 2rem;"
        >

          <div class="pt-3 mr-3 ml-3 pb-3">
            <div class="row">
              <div class="col-sm-12 col-md-9 col-lg-9 mb-3">
                <h4 class="h4"><?php echo $this->lang->line("detail_finish");?></h4>
              </div>
              <div class="col-sm-12 col-md-9 col-lg-9 mb-3">
                <input type="button" name="button" class="button is-orange" onclick="window.location.href='<?php echo base_url('buy');?>'" value="<?php echo $this->lang->line('txt_close_window');?>">
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
</section>


 -->

     <!-- Section Rent Step 5 -->
    <section class="rent">
      <div class="container">
        <div class="w-md-75 mx-auto">
          <div class="form-box">
            <div class="columns is-multiline">
             
              <div class="column is-12">
                <div class="content has-text-centered">
                  <h4 class="title is-4"><?php echo $this->lang->line("detail_finish");?></h4>
                 
                </div>
           
              </div>
              <!-- Section From -->
              <div class="column is-12">
                <div class="w-md-75 mx-auto">
                  <div class="rent-input">
                    
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
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  
