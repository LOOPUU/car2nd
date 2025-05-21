 <style type="text/css">
    .error {color:red;}
</style>

-ลืมรหัสผ่าน-

<?php echo form_open("member/forgot_password"); ?>
      <input name="email" id="email" type="email" class="form-control" autocomplete="email" value="">
      <?php echo form_error('email', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
      <?php echo '<div class="error">'.$error_email.'</div>';?>

      <input type="submit" value="ยืนยันการส่งอีเมล" name="sub"  class="btn btn-orange btn-block">
<?php echo form_close(); ?>

