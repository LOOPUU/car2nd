 <!-- Member Edit -->
<style type="text/css">
  .error{color: red;}
</style>
 <?php echo form_open_multipart('sale/edit_password?id_login='.$this->input->get('id_login').'&&check=button');?>
    <section class="member-details">
      <div class="container">
        <div class="w-md-75 mx-auto">
          <div class="member-box">
            <div class="columns is-multiline">
              <div class="column is-12">
                <!-- Title -->
                <div class="columns">
                  <div class="column is-9">
                    <!-- Title Text-->
                    <h5 class="title is-5">
                      <a style="color: #FF5C00;" href="<?php echo base_url('sale/');?>"><?php echo $this->lang->line("resume");?></a>
                      <span style="font-weight: 700;font-size: 16px;">/ </span> 
                      <span style="font-weight: 700;font-size: 16px;"><?php echo $this->lang->line("txt_change_pass");?></span>
                    </h5>
                  </div>
                  <div class="column is-3">
                    <!-- Title Text-->
                        <input type="button" id="update" class="button is-orange is-medium is-fullwidth" name="submit_pass" value="<?php echo $this->lang->line('txt_change_pass');?>">

                        <input type="submit" id="save" class="button is-orange is-medium is-fullwidth" name="submit_pass" value="<?php echo $this->lang->line("submit");?> ">
                  </div>
                 
                </div>
              </div>
            
              <div class="column is-12">
                <!-- Content information -->
                <div id="changepass" class="content-tab1">
                <div class="column is-10 mx-auto">
         
                 <!--  <div class="field">
                      <label class="label"><?php echo $this->lang->line("r_pass_old");?></label>
                      <div class="control">
                        <input type="password" class="input" id="inputPassword1" placeholder="<?php echo $this->lang->line("r_pass_old");?>" name="password" value="<?php echo set_value('password');?>">
                      </div>
                      <?php echo form_error('password', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        <?php echo '<div class="error">'.$error_text2.'</div>';?>
                  </div> -->
                  <div class="field">
                      <label class="label"><?php echo $this->lang->line("r_pass_new");?></label>
                      <div class="control">
                        <input type="password" class="input" id="inputPassword2" name="password_new" placeholder="<?php echo $this->lang->line("r_pass_new");?>" value="<?php echo set_value('password_new');?>" >
                      </div>
                      <?php echo form_error('password_new', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                  </div>
                  <div class="field">
                      <label class="label"><?php echo $this->lang->line("r_pass_confirm");?></label>
                      <div class="control">
                        <input type="password" class="input" id="inputPassword3"  name="re_password" placeholder="<?php echo $this->lang->line("r_pass_confirm");?>" value="<?php echo set_value('re_password');?>" >
                      </div>
                       <?php echo form_error('re_password', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                       <?php echo '<div class="error">'.$error_text3.'</div>';?>
                  </div>
                 
                </div>
                </div>
                <!-- Content password -->
                
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
</form>



<script type="text/javascript">
  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
    $('#blah').attr('src', e.target.result);
  }
  reader.readAsDataURL(input.files[0]);
  }
  }
  $("#imgInp").change(function() {
  readURL(this);
  });
</script>

<script type="text/javascript">
  

  $("#update").on("click", function(){
  $("#save").show();
  $("#update").hide();
  $("#inputPassword1").prop("disabled", false);
  $("#inputPassword2").prop("disabled", false);
  $("#inputPassword3").prop("disabled", false);
  $("#icon_change_pass1").hide();
  $("#icon_change_pass2").show();
  });

 $(document).ready(function(){
  var check = '<?php echo $this->input->get('check');?>';
if (check == '') {
  $("#save").hide();
  $("#inputPassword1").prop("disabled", true);
  $("#inputPassword2").prop("disabled", true);
  $("#inputPassword3").prop("disabled", true);
  $("#icon_change_pass1").show();
  $("#icon_change_pass2").hide();
}else{
  $("#update").hide();
  $("#inputPassword1").prop("disabled", false);
  $("#inputPassword2").prop("disabled", false);
  $("#inputPassword3").prop("disabled", false);
  $("#icon_change_pass1").hide();
  $("#icon_change_pass2").show();
}
})

</script>