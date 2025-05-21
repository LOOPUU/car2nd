    <!-- Section Forget Password -->
    <section class="section-forget-pw">
      <div class="container">
        <div class="w-md-50 mx-auto">
          <div class="forget-pw-box">
            <div class="columns">
              <div class="column is-12">
                <div class="w-md-100 mx-auto">
                  <div class="columns is-multiline">
                    <div class="column is-12">
                      <!-- Title -->
                      <h4 class="title is-4 has-text-orange has-text-centered">
                        <?php echo $this->lang->line("txt_change_pass");?>
                      </h4>
                    </div>
                    <div class="column is-12">
                      <?php echo form_open("member/change_password?id_login=".$member['id'].""); ?> 
                        <div class="field">
                          <label class="label"><?php echo $this->lang->line("user_or_email");?></label>
                          <div class="control">
                            <input class="input" type="text" value="<?php if(set_value('email')){echo set_value('email');}else{echo $member['email'];}?>" disabled/>
                            <input type="hidden" name="email" id="email" value="<?php if(set_value('email')){echo set_value('email');}else{echo $member['email'];}?>" placeholder="" />
                          </div>
                        </div>
                        <div class="field">
                          <label class="label"><?php echo $this->lang->line("r_pass_1");?></label>
                          <div class="control">
                            <input name="password" id="password" class="input" type="password" value="<?php echo set_value('password');?>" placeholder="<?php echo $this->lang->line("fillpass");?>" />
                            <?php echo form_error('password', '<p class="help is-danger">', '</p>'); ?>
                          </div>
                        </div>
                        <div class="field">
                          <label class="label"><?php echo $this->lang->line("r_pass_confirm");?></label>
                          <div class="control">
                            <input name="re_password" id="re_password" class="input" type="password" placeholder="<?php echo $this->lang->line("fillpass");?>" />
                            <?php echo form_error('re_password', '<p class="help is-danger">', '</p>'); ?>
                            <?php echo '<p class="help is-danger">'.$errer_1.'</p>';?>
                          </div>
                        </div>
                        <div class="field">
                          <div class="control">
                            <input type="submit" value="<?php echo $this->lang->line("submit");?>" name="login" class="button is-orange is-fullwidth" />
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