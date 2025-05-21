 <style>
  .image-button {
    position: relative;
    width: 150px;
    height: 150px;
    border-radius: 1000px;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  } 
</style>

    <form action="<?php echo base_url('register');?>?check=submit" method="POST" enctype="multipart/form-data">
      <section class="section-pre-register">
        <div class="container">
          <div class="w-md-75 mx-auto">
            <div class="pre-register-box">
              <div class="columns is-multiline">
                <div class="column is-12">
                  <div class="content has-text-centered">
                    <h4 class="title is-4"><?php echo strtoupper($this->lang->line("r_register"));?></h4>
                    <h4 class="title is-4">POSTSICARS</h4>
                  </div>
                  <hr class="spacer" />
                </div>
                <div class="column is-12">
                  <!-- Inforamtion -->
                  <h5 class="title is-5 has-text-weight-normal has-text-centered-mobile">
                    <?php echo $this->lang->line("resume");?>
                  </h5>
                  <hr class="is-marginless" />
                </div>

                <div class="column is-12">
                  <div class="columns is-multiline">
                    <div class="column is-12">
                      <div class="columns">
                        <div class="column is-3">
                          <div class="has-text-right has-text-left-mobile">
                            <label class="label has-text-weight-bold"
                              ><?php echo $this->lang->line("txt_upload_pic");?></label
                            >
                          </div>
                        </div>
                        <div class="column is-9">
                          <div class="field">
                            <div class="control mx-auto">

                              <div class="image-button mx-auto-mobile" id="imgInp1-container" style="border: 1px solid #ccc; background-image: url('<?php echo base_url('frontend/assets/images/none.jpg');?>');">
                                  
                                  <input type="file" name="userfile" id="imgInp1">
                                  <div class="trans">
                                  <i class="bx bx-camera"></i><span style="font-size: 14px;"><?php echo $this->lang->line("update");?></span>
                                  </div>
                              </div>
                            </div>    
                          </div>
                        </div>
                      </div>
                    </div>
                
                    <div class="column is-12">
                      <div class="columns">
                        <div class="column is-3">
                          <div class="has-text-right has-text-left-mobile">
                            <label class="label has-text-weight-bold"
                              ><?php echo $this->lang->line("r_name");?></label
                            >
                          </div>
                        </div>
                        <div class="column is-9">
                          <div class="field">
                            <div class="control">
                              <input
                                id="inputName" 
                                name="name"
                                class="input"
                                type="text"
                                value="<?php echo set_value('name');?>"
                                placeholder="<?php echo $this->lang->line("r_name");?>"
                              />
                            </div>
                            <?php echo form_error('name', '<p class="help is-danger">', '</p>'); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="column is-12">
                      <div class="columns">
                        <div class="column is-3">
                          <div class="has-text-right has-text-left-mobile">
                            <label class="label has-text-weight-bold"
                              ><?php echo $this->lang->line("r_tel");?></label
                            >
                          </div>
                        </div>
                        <div class="column is-9">
                          <div class="field">
                            <div class="control">
                              <input
                                id="inputPhone" 
                                name="tel"
                                class="input"
                                type="number"
                                maxlength="10"
                                value="<?php echo set_value('tel');?>"
                                placeholder="0xxxxxxxxx"
                              />
                            </div>
                            <?php echo form_error('tel', '<p class="help is-danger">', '</p>'); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="column is-12">
                  <!-- Inforamtion -->
                  <h5 class="title is-5 has-text-weight-normal has-text-centered-mobile">
                    <?php echo $this->lang->line("resume1");?>
                  </h5>
                  <hr class="is-marginless" />
                </div>
                <div class="column is-12">
                  <div class="columns is-multiline">
                    <div class="column is-12">
                      <div class="columns">
                        <div class="column is-3">
                          <div class="has-text-right has-text-left-mobile">
                            <label class="label has-text-weight-bold"
                              ><?php echo $this->lang->line("r_email");?></label
                            >
                          </div>
                        </div>
                        <div class="column is-9">
                          <div class="field">
                            <div class="control">
                              <input
                                id="inputEmail" 
                                name="email"
                                class="input"
                                type="email"
                                value="<?php echo set_value('email');?>"
                                placeholder="e.g. example@example.com"
                                autocomplete="email"
                              />
                            </div>
                            <?php echo form_error('email', '<p class="help is-danger">', '</p>'); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="column is-12">
                      <div class="columns">
                        <div class="column is-3">
                          <div class="has-text-right has-text-left-mobile">
                            <label class="label has-text-weight-bold"
                              ><?php echo $this->lang->line("r_pass");?></label
                            >
                          </div>
                        </div>
                        <div class="column is-9">
                          <div class="field">
                            <div class="control">
                              <input
                                id="inputPassword" 
                                name="password"
                                class="input"
                                type="password"
                                placeholder="<?php echo $this->lang->line("fillpass");?>"
                                value="<?php echo set_value('password');?>"
                              />
                            </div>
                            <?php echo form_error('password', '<p class="help is-danger">', '</p>'); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="column is-12">
                      <div class="columns">
                        <div class="column is-3">
                          <div class="has-text-right has-text-left-mobile">
                            <label class="label has-text-weight-bold"
                              ><?php echo $this->lang->line("r_pass_confirm");?></label
                            >
                          </div>
                        </div>
                        <div class="column is-9">
                          <div class="field">
                            <div class="control">
                              <input
                                id="inputRePassword" 
                                name="re_password"
                                class="input"
                                placeholder="<?php echo $this->lang->line("fillpass_con");?>"
                                type="password"
                                value=""
                              />
                            </div>
                             <?php echo form_error('re_password', '<p class="help is-danger">', '</p>'); ?>
                            <?php echo '<p class="help is-danger">'.$confirm.'</p>';?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="column is-12">
                  <div class="w-md-75 mx-auto"><hr /></div>
                </div>
                <div class="column is-12">
                  <div class="w-md-75 mx-auto">
                    <div class="w-md-50 mx-auto">
                      <div class="field">
                        <div class="control">
                          <input
                            type="submit" 
                            name="submit"
                            id="submit-btn"
                            class="button is-orange is-fullwidth"
                            value="<?php echo $this->lang->line("r_register");?>"
                          >
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
    </form>
 <script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
        $('.image-button').css('background-image', 'url(' + e.target.result + ')').addClass('has-img');
        return imageLocal = 'url(' + e.target.result + ')';
        }
        reader.readAsDataURL(input.files[0]);
        }
      }

      $("#imgInp1").change(function() {
        readURL(this);
      });

      $('#submit-btn').click(function() {
        let hasClass = $('.image-button').hasClass('has-img');
          if(hasClass == true) {
            localStorage.setItem('imageLocal', imageLocal);
          }
      });

      $(window).load(function() {
        let image = localStorage.getItem('imageLocal');
        localStorage.setItem('imageLocal', '');
        if(image != '') {
          $('.image-button').css('background-image', image).addClass('has-img');
        }
      return imageLocal = image;

  });
</script>

<?php if(empty($this->input->get('check'))){?>
 <script>localStorage.setItem('imageLocal', '');</script>
<?php }?>