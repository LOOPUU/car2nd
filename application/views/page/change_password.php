 <style type="text/css">
    .error {color:red;}
</style>

<?php echo form_open("member/change_password?mem_id=".$member['mem_id'].""); ?> 
<input name="email" id="email" type="text" class="form-control" autocomplete="email" value="<?php if(set_value('email')){echo set_value('email');}else{echo $member['email'];}?>" disabled>  
<br>
<input name="password" id="password" type="password" class="form-control" autocomplete="password" value="<?php echo set_value('password');?>">
<?php echo form_error('password', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
<br>
<input name="re_password" id="re_password" type="password" class="form-control" autocomplete="re_password" value="">
<?php echo form_error('re_password', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
<?php echo '<div class="error">'.$errer_1.'</div>';?>

 <input type="submit" value="ยืนยันการเปลี่ยนรหัสผ่าน" name="login"  class="btn btn-orange btn-block"> 

<?php echo form_close(); ?>

