
<style type="text/css">
    .error {color:red;}
</style>


<center>
- ข้อมูลส่วนตัว -



<form action="<?php echo base_url('buy');?>" method="post">

	<input type="text" name="firstname" value="<?php if(set_value("firstname")){echo set_value("firstname");}else{echo $member['firstname'];}?>" placeholder="ชื่อ"> <input type="text" name="lastname" value="<?php if(set_value("lastname")){echo set_value("lastname");}else{echo $member['lastname'];}?>" placeholder="นามสกุล">

	 <?php echo form_error('firstname', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
	 <?php echo form_error('lastname', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
	<br>
	<input type="text" name="tel" value="<?php if(set_value("tel")){echo set_value("tel");}else{echo $member['tel'];}?>" placeholder="เบอร์ดทร">
	 <?php echo form_error('tel', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
	<br>
	<input type="text" name="add_no" value="<?php if(set_value("add_no")){echo set_value("add_no");}else{echo $member['add_no'];}?>" placeholder="บ้านเลขที่">
	<?php echo form_error('add_no', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
	<br>
	<input type="text" name="moo" value="<?php if(set_value("moo")){echo set_value("moo");}else{echo $member['moo'];}?>" placeholder="หมู่ที่">
	<?php echo form_error('moo', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
	<br>
	<input type="text" name="district" value="<?php if(set_value("district")){echo set_value("district");}else{echo $member['district'];}?>" placeholder="ตำบล/เขต">
	<?php echo form_error('district', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
	<br>
	<input type="text" name="amphur" value="<?php if(set_value("amphur")){echo set_value("amphur");}else{echo $member['amphur'];}?>" placeholder="อำเภอ/แขวง">
	<?php echo form_error('amphur', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
	<br>
	<input type="text" name="province" value="<?php if(set_value("province")){echo set_value("province");}else{echo $member['province'];}?>" placeholder="จังหวัด">
	<?php echo form_error('province', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
	<br>
	<input type="text" name="zipcode" value="<?php if(set_value("zipcode")){echo set_value("zipcode");}else{echo $member['zipcode'];}?>" placeholder="รหัสไปรษณีย์">
	<?php echo form_error('zipcode', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
	<br>
	<input type="submit" name="submit" value="บันทึกข้อมูล">
</form>

</center>

