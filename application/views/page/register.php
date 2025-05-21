<style type="text/css">
    .error {color:red;}
</style>
<center>
<form action="<?php echo base_url('register/');?>" method="POST">

	<h3>- สมัครสมาชิก -</h3>
	<br>
	<input type="text" name="firstname" value="<?php echo set_value('firstname');?>" placeholder="ชื่อ">
	<?php echo form_error('firstname', '<div class="error" style="padding: 0.5% 0%;">', '</div>'); ?>
	<br>
	<input type="text" name="lastname" value="<?php echo set_value('lastname');?>"  placeholder="นามสกุล">
	<?php echo form_error('lastname', '<div class="error" style="padding: 0.5% 0%;">', '</div>'); ?>
	<br>
	<input type="text" name="tel" value="<?php echo set_value('tel');?>" placeholder="เบอร์โทรศัพท์">
	<?php echo form_error('tel', '<div class="error" style="padding: 0.5% 0%;">', '</div>'); ?>
	<br>
	<input type="text" name="add_no" value="<?php echo set_value('add_no');?>" placeholder="บ้านเลขที่">
	<?php echo form_error('add_no', '<div class="error" style="padding: 0.5% 0%;">', '</div>'); ?>
	<br>
	<input type="text" name="moo" value="<?php echo set_value('moo');?>" placeholder="หมู่ที่">
	<?php echo form_error('moo', '<div class="error" style="padding: 0.5% 0%;">', '</div>'); ?>
	<br>
	<input type="text" name="district" value="<?php echo set_value('district');?>" placeholder="ตำบล">
	<?php echo form_error('district', '<div class="error" style="padding: 0.5% 0%;">', '</div>'); ?>
	<br>
	<input type="text" name="amphur" value="<?php echo set_value('amphur');?>" placeholder="อำเภอ">
	<?php echo form_error('amphur', '<div class="error" style="padding: 0.5% 0%;">', '</div>'); ?>
	<br>
	<input type="text" name="province" value="<?php echo set_value('province');?>" placeholder="จังหวัด">
	<?php echo form_error('province', '<div class="error" style="padding: 0.5% 0%;">', '</div>'); ?>
	<br>
	<input type="text" name="zipcode" value="<?php echo set_value('zipcode');?>" placeholder="รหัสไปรษณีย์">
	<?php echo form_error('zipcode', '<div class="error" style="padding: 0.5% 0%;">', '</div>'); ?>
	<br>
	<input type="email" name="email" value="<?php echo set_value('email');?>" placeholder="อีเมล">
	<?php echo form_error('email', '<div class="error" style="padding: 0.5% 0%;">', '</div>'); ?>
	<br>
	<input type="password" name="password" value="<?php echo set_value('password');?>" placeholder="รหัสผ่าน">
	<?php echo form_error('password', '<div class="error" style="padding: 0.5% 0%;">', '</div>'); ?>
	<br>
	<input type="password" name="re_password" value="" placeholder="ยืนยันรหัสผ่าน">
	<?php echo form_error('re_password', '<div class="error" style="padding: 0.5% 0%;">', '</div>'); ?>
	<?php echo '<div class="error">'.$confirm.'</div>';?>

	<input type="submit" name="submit" value="ยืนยันสมัครสมาชิก">

</form>

	
</center>

