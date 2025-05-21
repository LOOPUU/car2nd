    <!-- Section Signin & Register -->
    <section class="section-pre-register">
      <div class="container">
        <div class="w-md-75 mx-auto">
          <div class="pre-register-box">
            <div class="columns">
              <div class="column is-5">
                <!-- Login -->
                <div class="w-md-100 mx-auto">
                  <div class="columns is-multiline">
                    <div class="column is-12">
                      <!-- Title -->
                      <h4 class="title is-4 has-text-orange has-text-centered">
                        <?php echo strtoupper($this->lang->line("login"));?>
                      </h4>
                    </div>
                    <div class="column is-12">
                      <?php echo form_open("member"); ?> 
                        <div class="field">
                          <label class="label"><?php echo $this->lang->line("user_or_email");?></label>
                          <div class="control">
                            <input name="account_user" id="account_user" class="input" type="text" placeholder="example@example.com" />
                            <?php echo form_error('account_user', '<p class="help is-danger">', '</p>'); ?>
                          </div>
                        </div>
                        <div class="field">
                          <label class="label"><?php echo $this->lang->line("r_pass");?></label>
                          <div class="control">
                            <input
                              name="pass"
                              id="pass"
                              class="input"
                              type="password"
                              placeholder=""
                            />
                            <?php echo form_error('pass', '<p class="help is-danger">', '</p>'); ?>
                          </div>
                        </div>
                        <div class="field">
                          <div class="control">
                            <input type="submit" value="<?php echo $this->lang->line("login");?>" name="login" class="button is-orange is-fullwidth" />
                          </div>
                        </div>
                        <div class="field">
                          <div class="control">
                            <a href="<?php echo base_url('member/forgot_password');?>" class="button is-text">
                              <?php echo $this->lang->line("txt_forgot_pass");?>
                            </a>
                          </div>
                        </div>
                      <?php echo form_close(); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-display-flex is-2 is-hidden-mobile">
                <div class="w-md-10 mx-auto">
                  <div class="divider-register"></div>
                </div>
              </div>
              <div class="column is-12 is-hidden-tablet-only is-hidden-desktop">
                <hr />
              </div>
              <div class="column is-5">
                <!-- Register -->
                <div class="w-md-100 mx-auto">
                  <div class="columns is-multiline">
                    <div class="column is-12">
                      <!-- Title -->
                      <h4 class="title is-4 has-text-orange has-text-centered">
                        <?php echo strtoupper($this->lang->line("noregis"));?>
                      </h4>
                    </div>
                    <div class="column is-12 is-hidden-mobile">
                      <hr class="spacer is-3" />
                    </div>
                    <div class="column is-12">
                      <p class="has-text-centered"><?php echo strtoupper($this->lang->line("welcome_message"));?></p>
                      <hr class="spacer is-1" />
                      <a href="<?php echo base_url('register');?>" class="button is-orange is-fullwidth"><?php echo $this->lang->line("r_register");?></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php $_SESSION['page'] = $page;?>