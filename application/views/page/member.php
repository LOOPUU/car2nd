<style type="text/css">
    .error {color:red;}
</style>

เข้าสู่ระบบสมาชิก

<?php echo form_open("member"); ?> 

    <input name="account_user" id="account_user" type="email" class="form-control" autocomplete="email" value="<?php echo set_value('account_user');?>" placeholder="example@gmail.com">
    <?php echo form_error('account_user', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>

    <br>

    <input name="pass" id="pass" type="password" class="form-control" autocomplete="pass"  value="<?php echo set_value('pass');?>">
    <?php echo form_error('pass', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>

    <br>

    <input type="submit" value="เข้าสู่ระบบ" name="login"  class="btn btn-orange btn-block">
<?php echo form_close(); ?>


<br>
<a href="<?php echo base_url('register');?>">สมัครสมาชิก</a>
<br>
<a href="<?php echo base_url('member/forgot_password');?>">ลืมรหัสผ่าน</a>

