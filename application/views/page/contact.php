    <!-- Section Contact -->
    <section class="section-contact">
      <div class="container">
        <div class="columns">
          <div class="column is-6">
            <!-- Image -->
            <div class="has-text-centered">
              <img
                class="img-rounded"
                src="<?php echo base_url('frontend')?>/assets/images/contact/contact-us-1.jpg"
                alt="Image"
                style="width: 80%;"
              />
            </div>
          </div>
          <div class="column is-6">
            <!-- Detail -->
            <div class="columns is-multiline">
              <div class="column is-12">
                <!-- Title -->
                <h4 class="title is-4 has-text-weight-normal">
                  <?php echo $this->lang->line("follow");?>
                </h4>
              </div>
              <div class="column is-12">
                <!-- Logo -->
                <img
                  src="<?php echo base_url('frontend')?>/assets/images/contact-logo.png"
                  alt="Postsicars Logo"
                  style="width: 30%;"
                />
              </div>
              <div class="column is-12">
                <!-- Details -->
                <div class="columns is-multiline">
                  <div class="column is-12">
                    <div class="w-md-75">
                      <p>
                        <?php if($this->lang->line("set_lang")=="th"){echo $contact['company_th'];}else{echo $contact['company_en'];}?>
                        <br />
                        <?php if($this->lang->line("set_lang")=="th"){echo $contact['address_th'];}else{echo $contact['address_en'];}?>
                      </p>
                    </div>
                  </div>
                  <div class="column is-12">
                    <div class="w-md-75">
                      <div><?php echo $this->lang->line("email");?> : <?php echo $contact['email'];?></div>
                    </div>
                  </div>
                  <div class="column is-12">
                    <div class="w-md-75">
                      <div><?php echo $this->lang->line("tel");?> : <?php echo $contact['tel'];?></div>
                      <div><?php echo $this->lang->line("fax");?> : <?php echo $contact['fax'];?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section Maps -->
    <section class="section-maps">
      <!-- Container Maps -->
    </section>

    <!-- Section Contact Form -->
    <section class="section-contact-form" style="margin-top: -10rem">
      <div class="container" id="contact1">
        <div class="w-md-50 mx-auto">
          <div class="form-input">
            <div class="columns is-multiline" >
              <div class="column is-12">
                <!-- Title -->
                <div class="has-text-centered" >
                  <h4 class="title is-4 has-text-weight-normal has-text-orange">
                    <?php echo $this->lang->line("contact1");?>
                  </h4>
                </div>
              </div>
              <div class="column is-12">
                <!-- Form -->
                <div class="w-md-100 mx-auto" >
                  <form action="<?php echo base_url('contact/suggestion_save#contact1');?>" method="POST">
                    <div class="field">
                      <label class="label"><?php echo $this->lang->line("contact4");?></label>
                      <div class="control">
                        <input name="name" class="input" type="text" autocomplete="name" value="<?php echo set_value('name');?>"/>
                        <?php echo form_error('name', '<p class="help is-danger">', '</p>'); ?>
                      </div>
                    </div>
                    <div class="field">
                      <label class="label"><?php echo $this->lang->line("tel");?></label>
                      <div class="control">
                        <input name="tel" class="input" type="tel" autocomplete="tel" value="<?php echo set_value('tel');?>" placeholder="0xxxxxxx"/>
                        <?php echo form_error('tel', '<p class="help is-danger">', '</p>'); ?>
                      </div>
                    </div>
                    <div class="field">
                      <label class="label"><?php echo $this->lang->line("email");?></label>
                      <div class="control">
                        <input name="email" class="input" type="email" autocomplete="email" value="<?php echo set_value('email');?>" placeholder="example@example.com"/>
                        <?php echo form_error('email', '<p class="help is-danger">', '</p>'); ?>
                      </div>
                    </div>
                    <div class="field">
                      <label class="label"><?php echo $this->lang->line("contact3");?></label>
                      <div class="control">
                        <input name="topic" class="input" type="text" value="<?php echo set_value('topic');?>"/>
                        <?php echo form_error('topic', '<p class="help is-danger">', '</p>'); ?>
                      </div>
                    </div>
                    <div class="field">
                      <label class="label"><?php echo $this->lang->line("contact7");?></label>
                      <div class="control">
                        <textarea name="description" class="textarea" placeholder=""><?php echo set_value('name');?></textarea>
                        <?php echo form_error('description', '<p class="help is-danger">', '</p>'); ?>
                      </div>
                    </div>
                    <div class="field">
                      <div class="control">
                        <input type="hidden" name="lang" value="<?php echo $this->lang->line("set_lang");?>" />
                        <button type="submit" name="submit" class="button is-orange is-fullwidth">
                          <?php echo $this->lang->line("send_m");?>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>