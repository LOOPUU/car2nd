    <!-- Finace -->
    <section class="finance-details">
      <div class="container">
        <div class="w-md-75 mx-auto">
          <div class="finance-box">
            <div class="columns is-multiline">
              <div class="column is-12">
                <!-- Title -->
                <div class="columns">
                  <div class="column is-12">
                    <!-- Title Text-->
                    <h4
                      class="title is-4 has-text-orange has-text-centered is-hidden-mobile"
                    >
                        <?php echo $this->lang->line("detail_finance");?> <?php echo $data_member['name'];?> <?php echo $this->lang->line("selectt");?>
                    </h4>
                    <h5
                      class="title is-5 has-text-orange has-text-centered is-hidden-desktop is-hidden-tablet-only"
                    >
                        <?php echo $this->lang->line("detail_finance");?> <?php echo $data_member['name'];?> <?php echo $this->lang->line("selectt");?>
                    </h5>
                    <hr class="spacer" />
                  </div>
                </div>
              </div>
              <div class="column is-12">
                <!-- Car Details -->
                <div class="columns is-multiline">
                  <div class="column is-12">
                    <div class="columns">
                      <div class="column is-5">
                        <!-- Preview Images -->
                        <?php foreach ($car_image1 as $row) { ?>
                        <div class="has-text-centered">
                          <figure class="image is-3by2 fig-image">
                            <?php if ($row->thumb_name_multi == "") { ?>
                            <img
                              class="img-rounded"
                              src="<?php echo base_url('frontend');?>/assets/images/products/no-image.jpg"
                              alt="Placeholder image"
                            />
                            <?php } else { ?>
                            <img
                              class="img-rounded"
                              src="<?php echo base_url('uploads_car').'/'.$row->thumb_name_multi.'';?>"
                              alt="Placeholder image"
                            />
                            <?php } ?>
                          </figure>
                        </div>
                        <?php } ?>
                      </div>
                      <div class="column is-7">
                        <!-- Car Selected -->
                        <div class="columns is-multiline">
                          <div class="column is-12">
                            <!-- Title -->
                            <h4 class="title is-4 has-text-orange">
                              <?php echo $this->lang->line("select_car"); ?>
                            </h4>
                            <h6 class="title is-6 has-text-weight-normal">
                                <?php echo $car_view['name'];?> 
                                &bull;
                                <?php if($car_view['name_year_pro']!==""){
                                  echo "(".$car_view['name_year_pro'].")";
                                }?> 
                                &bull;   
                                <?php if ($this->lang->line("set_lang") == "th") { ?> <?php echo @$car_view['name_model_th2']; ?> <?php  } else { ?> <?php echo @$car_view['name_model_en2']; ?> <?php  } ?> 
                            </h6>
                            <hr style="margin: .5rem 0;" />
                          </div>
                          <div class="column is-12">
                            <div class="columns is-multiline">
                              <div class="column is-12">
                                <div class="columns">
                                  <div class="column is-3">
                                    <!-- Tag -->
                                    <p
                                      class="subtitle is-5 has-text-weight-bold"
                                    >
                                        <?php echo $this->lang->line("tx_model");?>
                                    </p>
                                  </div>
                                  <div class="column is-8">
                                    <!-- Detail -->
                                    <p
                                      class="subtitle is-5 has-text-weight-normal"
                                    >
                                     <?php if ($this->lang->line("set_lang") == "th") { ?> <?php echo @$car_view['name_model_th2']; ?> <?php  } else { ?> <?php echo @$car_view['name_model_en2']; ?> <?php  } ?> 
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div class="column is-12">
                                <div class="columns">
                                  <div class="column is-3">
                                    <!-- Tag -->
                                    <p
                                      class="subtitle is-5 has-text-weight-bold"
                                    >
                                        <?php echo $this->lang->line("tx_type");?>
                                    </p>
                                  </div>
                                  <div class="column is-8">
                                    <!-- Detail -->
                                    <p
                                      class="subtitle is-5 has-text-weight-normal"
                                    >
                                        <?php if ($this->lang->line("set_lang") == "th") { ?> <?php echo @$car_view['name_type_th_t']; ?> <?php  } else { ?> <?php echo @$car_view['name_type_en_t']; ?> <?php  } ?> 
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div class="column is-12">
                                <div class="columns">
                                  <div class="column is-3">
                                    <!-- Tag -->
                                    <p
                                      class="subtitle is-5 has-text-weight-bold"
                                    >
                                        <?php echo $this->lang->line("tx_price");?>
                                    </p>
                                  </div>
                                  <div class="column is-8">
                                    <!-- Detail -->
                                    <p
                                      class="subtitle is-5 has-text-weight-normal"
                                    >
                                        <?php echo @number_format($car_view['name_price']).' '.$this->lang->line("baht");?>
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
                <hr />
              </div>
              <div class="column is-12">
                <div class="columns">
                  <div class="column is-6">
                    <!-- Choose Moth -->
                    <div class="has-text-centered">
                      <h3
                        class="title is-3 is-marginless is-hidden-mobile"
                        style="padding: 3rem;"
                      >
                        <?php echo $this->lang->line("installment_period");?>
                      </h3>
                      <h4
                        class="title is-4 is-marginless is-hidden-desktop is-hidden-tablet-only"
                      >
                        <?php echo $this->lang->line("installment_period");?>
                      </h4>
                    </div>
                  </div>
                  <div class="column is-6">
                    <!-- Choose Moth -->
                    <div class="button-is-month is-selected">
                      <h3
                        class="title is-3 is-marginless has-text-orange is-hidden-mobile"
                      >
                        <?php echo $this->input->get('installment_period');?>
                      </h3>
                      <h3
                        class="title is-3 is-marginless has-text-orange is-hidden-desktop is-hidden-tablet-only"
                      >
                        <?php echo $this->input->get('installment_period');?>
                      </h3>
                      <p class="subtitle is-5 is-marginless is-hidden-mobile">
                        <?php echo $this->lang->line("month");?>
                      </p>
                      <p
                        class="subtitle is-6 is-marginless is-hidden-desktop is-hidden-tablet-only"
                      >
                        <?php echo $this->lang->line("month");?>
                      </p>
                    </div>
                  </div>
                </div>
                <hr />
              </div>
              <div class="column is-12">
                <!-- Bank Selected -->
                <div class="bank-box is-selected">
                  <div class="columns">
                    <div class="column is-2">
                      <!-- Image Bank -->
                      <div class="has-text-centered">
                        <?php if($data_bank_image['img']==""){ ?>
                        <img
                            class="card-image-rounded"
                            src="<?php echo base_url('frontend'); ?>/assets/images/no-image.jpg"
                            alt="Bank Name"
                            width="80"
                            height="80"
                        />
                        <?php } else { ?>
                        <img
                            class="card-image-rounded"
                            src="<?php echo base_url('');?>uploads/<?php echo $data_bank_image['img'];?>"
                            alt="Bank Name"
                            width="80"
                            height="80"
                        />
                        <?php } ?>
                      </div>
                    </div>
                    <div class="column is-2">
                      <!-- Interest rate -->
                      <div class="columns is-multiline">
                        <div class="column is-12">
                          <div class="has-text-centered">
                            <h4 class="title is-5 has-text-weight-normal">
                                <?php echo $this->lang->line("interest_rate");?>
                            </h4>
                          </div>
                        </div>
                        <div class="column is-12">
                          <div class="has-text-centered">
                            <p
                              class="subtitle is-5 has-text-orange has-text-weight-bold"
                            >
                                <?php echo $this->input->get('interest_rate').'%';?>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="column is-2">
                      <!-- Interest rate -->
                      <div class="columns is-multiline">
                        <div class="column is-12">
                          <div class="has-text-centered">
                            <h4 class="title is-5 has-text-weight-normal">
                                <?php echo $this->lang->line("down_payment");?>
                            </h4>
                          </div>
                        </div>
                        <div class="column is-12">
                          <div class="has-text-centered">
                            <p
                              class="subtitle is-5 has-text-orange has-text-weight-bold"
                            >
                                <?php if(empty($this->input->get('downpayment'))){echo "0.00";}else{echo number_format($this->input->get('downpayment'));}?><?php echo $this->lang->line("baht");?>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="column is-3">
                      <!-- Installment -->
                      <div class="columns is-multiline">
                        <div class="column is-12">
                          <div class="has-text-centered">
                            <h4 class="title is-5 has-text-weight-normal">
                                <?php echo $this->lang->line("installment_period");?>
                            </h4>
                          </div>
                        </div>
                        <div class="column is-12">
                          <div class="has-text-centered">
                            <p
                              class="subtitle is-5 has-text-orange has-text-weight-bold"
                            >
                                <?php echo $this->input->get('installment_period');?> <?php echo $this->lang->line("period");?>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="column is-3">
                      <!-- Monthly installments -->
                      <div class="columns is-multiline">
                        <div class="column is-12">
                          <div class="has-text-centered">
                            <h4 class="title is-5 has-text-weight-normal">
                                <?php echo $this->lang->line("installment_amount");?>
                            </h4>
                          </div>
                        </div>
                        <div class="column is-12">
                          <div class="has-text-centered">
                            <p
                              class="subtitle is-5 has-text-orange has-text-weight-bold"
                            >
                                <?php echo $this->input->get('installment_amount');?><?php echo $this->lang->line("baht");?>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr />
              </div>
              <div class="column is-12">
                <!-- Button -->
                <div class="columns">
                  <div class="column is-6">
                    <a href="#" onclick="history.go(-1);" class="button is-orange is-fullwidth"><?php echo $this->lang->line("selsect_finance_1");?></a>
                  </div>
                  <div class="column is-6">
                    <button type="submit" name="submit" class="button is-orange is-fullwidth" onclick="window.location.href='<?php echo base_url('buy/send_finance_detail/'.$this->uri->segment(3).'?car_top_id='.$car_view['car_top_id'].'&&price='.$car_view['name_price'].'&&bank='.$this->input->get('bank').'&&year='.$this->input->get('year').'&&bank='.$this->input->get('bank').'&&id_login='.$this->input->get('id_login').'&&interest_rate='.$this->input->get('interest_rate').'&&interest_rate_result='.$this->input->get('interest_rate_result').'&&downpayment='.$this->input->get('downpayment').'&&installment_period='.$this->input->get('installment_period').'&&installment_amount='.$this->input->get('installment_amount').'#scroll1');?>'"><?php echo $this->lang->line("send_person_sale");?></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>