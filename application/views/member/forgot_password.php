    <!-- Section Forget Password -->
    <section class="section-forget-pw">
      <div class="container">
        <div class="w-md-50 mx-auto">
          <div class="forget-pw-box">
            <div class="columns">
              <div class="column is-12">
                <!-- Login -->
                <div class="w-md-100 mx-auto">
                  <div class="columns is-multiline">
                    <div class="column is-12">
                      <!-- Title -->
                      <h4 class="title is-4 has-text-orange has-text-centered">
                        <?php echo $this->lang->line("txt_forgot_pass");?>
                      </h4>
                    </div>
                    <div class="column is-12">
                      <?php echo form_open("member/forgot_password"); ?> 
                        <div class="field">
                          <label class="label"><?php echo $this->lang->line("user_or_email");?></label>
                          <div class="control">
                            <input name="email" id="email" class="input" type="email" autocomplete="email" placeholder="example@example.com"/>
                            <?php echo form_error('email', '<p class="help is-danger">', '</p>'); ?>
                            <?php echo '<p class="help is-danger">'.$error_email.'</p>';?>
                          </div>
                        </div>
                        <div class="field">
                          <div class="control">
                            <button type="submit" name="sub" class="button is-orange is-fullwidth">
                              <?php echo $this->lang->line("sub");?>
                            </button>
                          </div>
                        </div>
                      <?php echo form_close(); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>