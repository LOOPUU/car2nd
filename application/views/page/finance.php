    <?php if($car_view['id_login']==$this->session->userdata('member_id_log')){?>
    <?php header("Location: ".base_url('sale')."", true, 301);
    exit();?>
    <?php } ?> 
<script language="JavaScript">
document.onkeydown = chkEvent 
function chkEvent(e) {
  var keycode;
  if (window.event) keycode = window.event.keyCode; //*** for IE ***//
  else if (e) keycode = e.which; //*** for Firefox ***//
  if(keycode==13)
  {
    return false;
  }
}
</script>
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
                    <h3
                      class="title is-3 has-text-orange has-text-centered is-hidden-mobile"
                    >
                      <?php echo $this->lang->line("select_finance"); ?>
                    </h3>
                    <h4
                      class="title is-4 has-text-orange has-text-centered is-hidden-desktop is-hidden-tablet-only"
                    >
                      <?php echo $this->lang->line("select_finance"); ?>
                    </h4>
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
                            <h4
                              class="title is-4 has-text-orange has-text-weight-bold"
                            >
                              <?php echo $this->lang->line("select_car"); ?>
                            </h4>
                            <h6
                              class="title is-6 has-text-weight-normal"
                            >
                            <?php if ($this->lang->line("set_lang") == "th") { ?>
                              <?php echo @$car_view['name_th_o']; ?> <?php  } else { ?> <?php echo @$car_view['name_en_o']; ?> <?php  } ?> 
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
                                      <?php echo $this->lang->line("tx_model"); ?>
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
                                      <?php echo $this->lang->line("tx_type"); ?>
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
                                      <?php echo $this->lang->line("tx_price"); ?>
                                    </p>
                                  </div>
                                  <div class="column is-8">
                                    <!-- Detail -->
                                    <p
                                      class="subtitle is-5 has-text-weight-normal"
                                    >
                                      <?php echo @number_format($car_view['name_price']) . ' ' . $this->lang->line("baht"); ?>
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


            <?php if($bank['bank_id']!==""){?>

            
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
              <form id="iframe_target" target="iframe_target" action="<?php echo base_url('buy/finance/'.@$car_view['car_top_id'].'');?>#select" method="POST"  class="column is-12" style="text-align:center;">
              <div  class="columns" id="bank">
                <div  class="column is-2 is-flex" style="align-items: center"><h3 class="title is-5 has-text-orange has-text-centered"><?php echo $this->lang->line("amoutdownpayment");?></h3></div>
                <div  class="column is-10">


                <?php if(@$car_view['downpayment_check'] !==""){

                  $downpayment = @$car_view['downpayment_check'];

                }else{

                  $downpayment = @$car_view['downpayment'];

                }?>

                <input class="input is-fullwidth" onKeyUp="changeValue(this)" style="height: 45px;" type="number" id="someInput" name="downpayment"  value="<?php echo $downpayment;?>" placeholder="<?php echo $this->lang->line("filldownpayment");?>" />

              <?php echo "<div style='color:red;text-align:left;'>".$error_max.'</div>';?>
              <?php echo "<div style='color:red;text-align:left;'>".$error_min.'</div>';?>
              <?php echo "<div style='color:red;text-align:left;'>".$error_check.'</div>';?>

               </div>
            
            <?php } ?>

            </div>
              </form> 

              <?php if($bank['bank_id']!==""){?>
              <div class="column is-12" >
                <!-- Title -->
                <div class="columns">
                  <div class="column is-12">
                    <!-- Title Text-->
                    <h3
                      class="title is-3 has-text-orange has-text-centered is-hidden-mobile"
                    >
                      <?php echo $this->lang->line("select_period"); ?>
                    </h3>
                    <h4
                      class="title is-4 has-text-orange has-text-centered is-hidden-desktop is-hidden-tablet-only"
                    >
                      <?php echo $this->lang->line("select_period"); ?>
                    </h4>
                    <hr class="spacer" />
                  </div>
                </div>
              </div>
              <div class="column is-12">
                <!-- Choose Moth -->
                <div class="columns is-mobile is-multiline">
                  <div class="column is-3-desktop is-4-tablet is-6-mobile">

                    <form action="<?php echo base_url('buy/finance/' . $this->uri->segment(3) . '?year=four_year#bank'); ?>" method="POST">

                      <input type="hidden" name="year" value="four_year">
                      <input type="hidden" id="box1" name="downpayment" value="<?php if($car_view['downpayment_check']!==""){echo $car_view['downpayment_check'];}else{echo $car_view['downpayment'];}?>">

                      <a 
                      href="javascript:confirmSubmit48()" 
                      class="button-is-month <?php if ($this->input->get('year') == 'four_year') { echo "is-active"; } ?>"
                      >
                        <h2 class="title is-2 is-marginless is-hidden-mobile">
                          48
                        </h2>
                        <h3
                          class="title is-3 is-marginless is-hidden-desktop is-hidden-tablet-only"
                        >
                          48
                        </h3>
                        <p class="subtitle is-4 is-marginless is-hidden-mobile">
                          <?php echo $this->lang->line("month"); ?>
                        </p>
                        <p
                          class="subtitle is-6 is-marginless is-hidden-desktop is-hidden-tablet-only"
                        >
                          <?php echo $this->lang->line("month"); ?>
                        </p>
                      </a>
                      <input type="submit" id="submit48" name="submit_downpayment" value="48" style="display: none;">

                    </form>

                  </div>
                  <div class="column is-3-desktop is-4-tablet is-6-mobile">

                     <form action="<?php echo base_url('buy/finance/' . $this->uri->segment(3) . '?year=five_year#bank'); ?>" method="POST">

                      <input type="hidden" name="year" value="five_year">
                      <input type="hidden" id="box2" name="downpayment" value="<?php if($car_view['downpayment_check']!==""){echo $car_view['downpayment_check'];}else{echo $car_view['downpayment'];}?>">

                      <a 
                      href="javascript:confirmSubmit60()" 
                      class="button-is-month <?php if ($this->input->get('year') == 'five_year') { echo "is-active"; } ?>"
                      
                    >
                      <h2 class="title is-2 is-marginless is-hidden-mobile">
                        60
                      </h2>
                      <h3
                        class="title is-3 is-marginless is-hidden-desktop is-hidden-tablet-only"
                      >
                        60
                      </h3>
                      <p class="subtitle is-4 is-marginless is-hidden-mobile">
                        <?php echo $this->lang->line("month"); ?>
                      </p>
                      <p
                        class="subtitle is-6 is-marginless is-hidden-desktop is-hidden-tablet-only"
                      >
                        <?php echo $this->lang->line("month"); ?>
                      </p>
                    </a>

                      <input type="submit" id="submit60" name="submit_downpayment" value="60" style="display: none;">

                    </form>

                  
                  </div>
                  <div class="column is-3-desktop is-4-tablet is-6-mobile">
                    <form action="<?php echo base_url('buy/finance/' . $this->uri->segment(3) . '?year=six_year#bank'); ?>" method="POST">

                      <input type="hidden" name="year" value="six_year">
                      <input type="hidden" id="box3" name="downpayment" value="<?php if($car_view['downpayment_check']!==""){echo $car_view['downpayment_check'];}else{echo $car_view['downpayment'];}?>">

                       <a 
                      href="javascript:confirmSubmit72()" 
                      class="button-is-month <?php if ($this->input->get('year') == 'six_year') { echo "is-active"; } ?>"
                      
                    >
                      <h2 class="title is-2 is-marginless is-hidden-mobile">
                        72
                      </h2>
                      <h3
                        class="title is-3 is-marginless is-hidden-desktop is-hidden-tablet-only"
                      >
                        72
                      </h3>
                      <p class="subtitle is-4 is-marginless is-hidden-mobile">
                        <?php echo $this->lang->line("month"); ?>
                      </p>
                      <p
                        class="subtitle is-6 is-marginless is-hidden-desktop is-hidden-tablet-only"
                      >
                        <?php echo $this->lang->line("month"); ?>
                      </p>
                    </a> 

                      <input type="submit" id="submit72" name="submit_downpayment" value="72" style="display: none;">

                    </form>
                   
                  </div>
                  <div class="column is-3-desktop is-4-tablet is-6-mobile">
                    <form action="<?php echo base_url('buy/finance/' . $this->uri->segment(3) . '?year=seven_year#bank'); ?>" method="POST">

                      <input type="hidden" name="year" value="seven_year">
                      <input type="hidden" id="box4" name="downpayment" value="<?php if($car_view['downpayment_check']!==""){echo $car_view['downpayment_check'];}else{echo $car_view['downpayment'];}?>">

                      <a 
                      href="javascript:confirmSubmit84()" 
                      class="button-is-month <?php if ($this->input->get('year') == 'seven_year') { echo "is-active"; } ?>"
                     
                    >
                      <h2 class="title is-2 is-marginless is-hidden-mobile">
                        84
                      </h2>
                      <h3
                        class="title is-3 is-marginless is-hidden-desktop is-hidden-tablet-only"
                      >
                        84
                      </h3>
                      <p class="subtitle is-4 is-marginless is-hidden-mobile">
                        <?php echo $this->lang->line("month"); ?>
                      </p>
                      <p
                        class="subtitle is-6 is-marginless is-hidden-desktop is-hidden-tablet-only"
                      >
                        <?php echo $this->lang->line("month"); ?>
                      </p>
                    </a>

                      <input type="submit" id="submit84" name="submit_downpayment" value="84" style="display: none;">

                    </form>
                 
                  </div>
                </div>
                <hr />
              </div>
              <?php }?>
              <?php 
                if(!empty($this->input->get('year'))) {
              ?>



            <?php if($error_max!=="" OR $error_min!=="" OR $error_check!==""){}else{?>
              <div  class="column is-12">
                <!-- Title -->
                <div class="columns">
                  <div class="column is-12">
                    <!-- Title Text-->
                    <h3
                      class="title is-3 is-marginless has-text-orange has-text-centered is-hidden-mobile"
                    >
                      <?php echo $this->lang->line("select_bank"); ?>
                    </h3>
                    <h4
                      class="title is-4 is-marginless has-text-orange has-text-centered is-hidden-desktop is-hidden-tablet-only"
                    >
                      <?php echo $this->lang->line("select_bank"); ?>
                    </h4>
                  </div>
                </div>
              </div>
            <?php }?>



              <div class="column is-12">
                <!-- Choose Bank -->
                <!-- Bank Card Slide -->


                <div id="bank-card-slide">
                  <?php @$bank = explode(',',$bank['bank_id']);?>
                  <?php for($i=0; $i<count($bank); $i++){?>
                  <?php if(!empty($bank[$i])){?>
                         
                            <?php 
                              $query = $this->db->query ( 'SELECT a.bank_id,
                                a.four_year,
                                a.five_year,
                                a.six_year,
                                a.seven_year,
                                a.bank_name_th,
                                a.bank_name_en,
                                a.img,
                                a.status_id,
                                a.position_id,
                                a.create_date,
                                a.modify_date,
                                b.bank_id as bank_id1,
                                b.id_image as id_image,
                                b.img_name as img_name,
                                b.thumb_name as thumb_name,
                                b.ext as ext,
                                b.upload_date as upload_date,
                                b.bank_id as bank_id_img
                              FROM tbl_bank a
                              left join bank_uploads b on a.bank_id = b.bank_id
                              where a.status_id = 1 AND a.bank_id in ("'.$bank[$i].'")');
                              $row1 = $query->result();
                              foreach ($row1 as $row) {?>
                    <?php 
                      // CHECK YEAR
                      if ($this->input->get('year') == "four_year") {
                          $check_year = $row->four_year;
                          $check_year_num = 48;
                      } elseif ($this->input->get('year') == "five_year") {
                          $check_year = $row->five_year;
                          $check_year_num = 60;
                      } elseif ($this->input->get('year') == "six_year") {
                          $check_year = $row->six_year;
                          $check_year_num = 72;
                      } elseif ($this->input->get('year') == "seven_year") {
                          $check_year = $row->seven_year;
                          $check_year_num = 84;
                      } else {
                          $check_year = '0.0';
                          $check_year_num = '00';
                      }
                                                    // MONEY DOWN
                   
                        if(@$car_view['downpayment_check'] !==""){
                          if(@$car_view['downpayment_check']!==""){
                            $downpayment = @$car_view['downpayment_check'];
                          }else{
                            $downpayment = 0;
                          }
                          
                        }else{
                          if(@$car_view['downpayment']!==""){
                            $downpayment = @$car_view['downpayment'];
                          }else{
                            $downpayment = 0;
                          }
                        }
                     
                                                    // SUMMARY
                      if ($this->input->get('year') == "four_year") {
                          $interest_rate0 = $car_view['name_price'] - $downpayment;
                          $interest_rate = ((($car_view['name_price'] - $downpayment) * $check_year) / 100);
                          $interest_rate1 = ((($car_view['name_price'] - $downpayment) * $check_year) / 100) * 4;
                          $interest_rate_result = number_format($interest_rate, 2, '.', ',');
                          $interest_rate_result1 = number_format($interest_rate1, 2, '.', ',');

                      } elseif ($this->input->get('year') == "five_year") {
                          $interest_rate0 = $car_view['name_price'] - $downpayment;
                          $interest_rate = ((($car_view['name_price'] - $downpayment) * $check_year) / 100);
                          $interest_rate1 = ((($car_view['name_price'] - $downpayment) * $check_year) / 100) * 5;
                          $interest_rate_result = number_format($interest_rate, 2, '.', ',');
                          $interest_rate_result1 = number_format($interest_rate1, 2, '.', ',');
                      } elseif ($this->input->get('year') == "six_year") {
                          $interest_rate0 = $car_view['name_price'] - $downpayment;
                          $interest_rate = ((($car_view['name_price'] - $downpayment) * $check_year) / 100);
                          $interest_rate1 = ((($car_view['name_price'] - $downpayment) * $check_year) / 100) * 6;
                          $interest_rate_result = number_format($interest_rate, 2, '.', ',');
                          $interest_rate_result1 = number_format($interest_rate1, 2, '.', ',');
                      } elseif ($this->input->get('year') == "seven_year") {
                          $interest_rate0 = $car_view['name_price'] - $downpayment;
                          $interest_rate = ((($car_view['name_price'] - $downpayment) * $check_year) / 100);
                          $interest_rate1 = ((($car_view['name_price'] - $downpayment) * $check_year) / 100) * 7;
                          $interest_rate_result = number_format($interest_rate, 2, '.', ',');
                          $interest_rate_result1 = number_format($interest_rate1, 2, '.', ',');
                      } else {
                          $interest_rate1 = "";
                          $interest_rate_result1 = '0.00';
                          $interest_rate = "";
                          $interest_rate_result = '0.00';
                      }
                                                    // TOTAL RESULT
                      
                       $money_sum = $interest_rate0 + $interest_rate1; 
                       $money_all = ($money_sum*0.07);
                       $money_all0 = $money_sum+$money_all;
                       $money_all1 = @($money_all0/$check_year_num);


                      if (!empty($money_installment_result)) {
                          $money_installment_result = number_format($money_all1, 2, '.', ',');
                      } else {
                          $money_installment_result = number_format($money_all1, 2, '.', ',');
                      }

          
                    ?>


                  <?php if($error_max!=="" OR $error_min!=="" OR $error_check!==""){?>

                 

                  <?php }else{?>
                  <div class="columns">
                    <div class="column is-12">


                      <?php 
                       if(@$car_view['downpayment_check'] !==""){
                          $downpayment = @$car_view['downpayment_check'];
                        }else{
                          $downpayment = @$car_view['downpayment'];
                        }
                      ?>

                      
                      <a href="<?php echo base_url('buy/finance_detail/'.$this->uri->segment(3).'?year='.$this->input->get('year').'&&bank='.$row->bank_id.'&&id_login='.$id_login.'&&interest_rate='.$check_year.'&&interest_rate_result='.$interest_rate_result.'&&downpayment='.$downpayment.'&&installment_period='.$check_year_num.'&&installment_amount='.$money_installment_result.''); ?>"
                        >
                        <div class="card-is-bank">
                          <div class="columns is-multiline">
                            <div class="column is-12">
                              <!-- Bank Image -->
                              <div class="card-is-bank-image">
                                <?php if ($row->img == "") { ?>
                                <img
                                  class="card-image-rounded"
                                  src="<?php echo base_url('frontend'); ?>/assets/images/no-image.jpg"
                                  alt="Bank Name"
                                  style="width: 80px; height: 80px;"
                                />
                                <?php } else { ?>
                                <img
                                  class="card-image-rounded"
                                  src="<?php echo base_url('uploads').'/'.$row->img.'';?>"
                                  alt="Bank Name"
                                  style="width: 80px; height: 80px;"
                                />
                                <?php } ?>
                              </div>
                            </div>
                            <div class="column is-12 is-paddingless">
                              <!-- Bank Name -->
                              <div class="has-text-centered">
                                <h6 class="title is-6 has-text-weight-normal">
                                <?php if ($this->lang->line("set_lang") == "th") { ?> <?php echo $row->bank_name_th; ?> <?php } else { ?> <?php echo $row->bank_name_en; ?> <?php } ?>
                                </h6>
                              </div>
                              <hr style="margin: 1rem 0;" />
                            </div>
                            <div class="column is-12 is-paddingless">
                              <!-- Interest rate -->
                              <div class="columns is-multiline is-marginless">
                                <div class="column is-12">
                                  <div class="has-text-centered">
                                    <h6
                                      class="title is-6 has-text-weight-normal"
                                    >
                                      <?php echo $this->lang->line("interest_rate"); ?>
                                    </h6>
                                  </div>
                                </div>
                                <div class="column is-12 is-paddingless">
                                  <div class="has-text-centered">
                                    <p class="subtitle is-5 has-text-orange">
                                      <?php echo $check_year . '%'; ?>
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <hr style="margin: .5rem 0;" />
                            </div>
                            <div class="column is-12 is-paddingless">
                              <!-- Installment -->
                              <div class="columns is-multiline is-marginless">
                                <div class="column is-12">
                                  <div class="has-text-centered">
                                    <h6
                                      class="title is-6 has-text-weight-normal"
                                    >
                                      <?php echo $this->lang->line("down_payment"); ?>
                                    </h6>
                                  </div>
                                </div>
                                <div class="column is-12 is-paddingless">
                                  <div class="has-text-centered">
                                    <p class="subtitle is-5 has-text-orange">
                                    <?php if($car_view['downpayment_check']!==""){?>
                                      <?php if ($car_view['downpayment_check']) { echo @number_format($car_view['downpayment_check']); } else {  echo "0.00"; } ?> <?php echo $this->lang->line("baht"); ?> 
                                    <?php }else{?>
                                      <?php if ($car_view['downpayment']) { echo @number_format($car_view['downpayment']); } else {  echo "0.00"; } ?> <?php echo $this->lang->line("baht"); ?> 
                                    <?php }?>
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <hr style="margin: .5rem 0;" />
                            </div>
                            <div class="column is-12 is-paddingless">
                              <!-- Installment period -->
                              <div class="columns is-multiline is-marginless">
                                <div class="column is-12">
                                  <div class="has-text-centered">
                                    <h6
                                      class="title is-6 has-text-weight-normal"
                                    >
                                      <?php echo $this->lang->line("installment_period"); ?>
                                    </h6>
                                  </div>
                                </div>
                                <div class="column is-12 is-paddingless">
                                  <div class="has-text-centered">
                                    <p class="subtitle is-5 has-text-orange">
                                      <?php echo $check_year_num; ?>&nbsp;<?php echo $this->lang->line("period"); ?>
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <hr style="margin: .5rem 0;" />
                            </div>
                            <div class="column is-12 is-paddingless">
                              <!-- Monthly installments -->
                              <div class="columns is-multiline is-marginless">
                                <div class="column is-12">
                                  <div class="has-text-centered">
                                    <h6
                                      class="title is-6 has-text-weight-normal"
                                    >
                                      <?php echo $this->lang->line("installment_amount"); ?>
                                    </h6>
                                  </div>
                                </div>
                                <div class="column is-12 is-paddingless">
                                  <div class="has-text-centered">
                                    <p
                                      class="subtitle is-5 has-text-orange has-text-weight-bold"
                                    >
                                      <?php echo $money_installment_result; ?> <?php echo $this->lang->line("baht"); ?>
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <hr style="margin: .5rem 0;" />
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <?php }?>

                  <?php } ?>
                  <?php } ?>
                  <?php } ?>
                </div>
              </div>

              <?php if(!empty($this->input->get("year"))){?>
              <div class="has-text-centered" style="width: 100%;">
                  <?php echo $this->lang->line("text_comment"); ?>
              </div>
              <?php } ?>

              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>


<script type="text/javascript">
$(document).ready(function() {
    $('a[href*=\\#]').on('click', function(e){
        e.preventDefault();
        $('html, body').animate({
            scrollTop : $(this.hash).offset().top
        }, 500);
    });
});

</script>


<script>
  function changeValue(text) {
    document.getElementById('box1').value = text.value;
    document.getElementById('box2').value = text.value;
    document.getElementById('box3').value = text.value;
    document.getElementById('box4').value = text.value;
  }
</script>

<script>
  function confirmSubmit48() {
   document.getElementById("submit48").click();
  }

  function confirmSubmit60() {
   document.getElementById("submit60").click();
  }

  function confirmSubmit72() {
   document.getElementById("submit72").click();
  }

  function confirmSubmit84() {
   document.getElementById("submit84").click();
  }
</script>

<?php $_SESSION['car_top_id_buy'] = $car_view['car_top_id'];?>

