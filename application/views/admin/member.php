 <div class="sidebar-overlay" id="sidebar-overlay"></div>
<div class="sidebar-mobile-member-handle" id="sidebar-mobile-member-handle"></div>
<div class="mobile-member-handle"></div>


<!-------------------------[member_add]----------------------------->

<?php if($this->input->get('page')=="member_add"){?>

                <article class="content item-editor-page">
                    <div class="title-block">
                        <h3 class="title"> 
                            <a href="<?php echo base_url('admin_management/member?page=member_list');?>"> สมาชิก </a> 
                            &nbsp; <i class="fa fa-sign-in"></i> &nbsp;
                            เพิ่มสมาชิก
                        </h3>
                    </div>
                     <form action="<?php echo base_url('admin_management/member?page=member_add');?>" method="post">
                        <div class="card card-block">
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                ชื่อสมาชิก : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="firstname" class="form-control boxed" placeholder="" value='<?php echo set_value("firstname");?>'> 
                                    <?php echo form_error('firstname', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                นามสกุล : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="lastname" class="form-control boxed" placeholder="" value='<?php echo set_value("lastname");?>'> 
                                    <?php echo form_error('lastname', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                เบอร์โทรศัพท์ : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="tel" class="form-control boxed" placeholder="" value='<?php echo set_value("tel");?>'> 
                                    <?php echo form_error('tel', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                อีเมล : </label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control boxed" placeholder="" value='<?php echo set_value("email");?>'> 
                                    <?php echo form_error('email', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                รหัสผ่าน : </label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control boxed" placeholder="" value='<?php echo set_value("password");?>'> 
                                    <?php echo form_error('password', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                บ้านเลขที่ : </label>
                                <div class="col-sm-10">
                                    <input type="number" name="add_no" class="form-control boxed" placeholder="" value='<?php echo set_value("add_no");?>'> 
                                    <?php echo form_error('add_no', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                หมู่ที่ : </label>
                                <div class="col-sm-10">
                                    <input type="number" name="moo" class="form-control boxed" placeholder="" value='<?php echo set_value("moo");?>'> 
                                    <?php echo form_error('moo', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                ตำบล/เขต : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="district" class="form-control boxed" placeholder="" value='<?php echo set_value("district");?>'> 
                                    <?php echo form_error('district', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                อำเภอ/แขวง : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="amphur" class="form-control boxed" placeholder="" value='<?php echo set_value("amphur");?>'> 
                                    <?php echo form_error('amphur', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                จังหวัด : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="province" class="form-control boxed" placeholder="" value='<?php echo set_value("province");?>'> 
                                    <?php echo form_error('province', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                รหัสไปรษณีย์ : </label>
                                <div class="col-sm-10">
                                    <input type="number" name="zipcode" class="form-control boxed" placeholder="" value='<?php echo set_value("zipcode");?>'> 
                                    <?php echo form_error('zipcode', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <input type="submit" name="submit" value="บันทึกข้อมูล" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
                </article>
<?php } ?>


<!-------------------------[member_edit]----------------------------->

<?php if($this->input->get('page')=="member_edit"){?>

                <article class="content item-editor-page">
                    <div class="title-block">
                        <h3 class="title"> 
                             <a href="<?php echo base_url('admin_management/member?page=member_list');?>"> สมาชิก </a> 
                            &nbsp; <i class="fa fa-sign-in"></i> &nbsp;
                            แก้ไขสมาชิก
                            
                        </h3>
                    </div>
                     <form action="<?php echo base_url('admin_management/member?page=member_edit&&mem_id='.$data['mem_id'].'');?>" method="post">
                        <div class="card card-block">
                           
                           
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                ชื่อสมาชิก : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="firstname" class="form-control boxed" placeholder="" value='<?php if(set_value("firstname")){echo set_value("firstname");}else{echo $data['firstname'];}?>'> 
                                    <?php echo form_error('firstname', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                นามสกุล : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="lastname" class="form-control boxed" placeholder="" value='<?php if(set_value("lastname")){echo set_value("lastname");}else{echo $data['lastname'];}?>'> 
                                    <?php echo form_error('lastname', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                เบอร์โทรศัพท์ : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="tel" class="form-control boxed" placeholder="" value='<?php if(set_value("tel")){echo set_value("tel");}else{echo $data['tel'];}?>'> 
                                    <?php echo form_error('tel', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                อีเมล : </label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control boxed" placeholder="" value='<?php if(set_value("email")){echo set_value("email");}else{echo $data['email'];}?>' disabled> 
                                    <?php echo form_error('email', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                บ้านเลขที่ : </label>
                                <div class="col-sm-10">
                                    <input type="number" name="add_no" class="form-control boxed" placeholder="" value='<?php if(set_value("add_no")){echo set_value("add_no");}else{echo $data['add_no'];}?>'> 
                                    <?php echo form_error('add_no', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>


                             <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                หมู่ที่ : </label>
                                <div class="col-sm-10">
                                    <input type="number" name="moo" class="form-control boxed" placeholder="" value='<?php if(set_value("moo")){echo set_value("moo");}else{echo $data['moo'];}?>'> 
                                    <?php echo form_error('moo', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                ตำบล/เขต : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="district" class="form-control boxed" placeholder="" value='<?php if(set_value("district")){echo set_value("district");}else{echo $data['district'];}?>'> 
                                    <?php echo form_error('district', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                           <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                อำเภอ/แขวง : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="amphur" class="form-control boxed" placeholder="" value='<?php if(set_value("amphur")){echo set_value("amphur");}else{echo $data['amphur'];}?>'> 
                                    <?php echo form_error('amphur', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                จังหวัด : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="province" class="form-control boxed" placeholder="" value='<?php if(set_value("province")){echo set_value("province");}else{echo $data['province'];}?>'> 
                                    <?php echo form_error('province', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">
                                รหัสไปรษณีย์ : </label>
                                <div class="col-sm-10">
                                    <input type="number" name="zipcode" class="form-control boxed" placeholder="" value='<?php if(set_value("zipcode")){echo set_value("zipcode");}else{echo $data['zipcode'];}?>'> 
                                    <?php echo form_error('zipcode', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div> 

                             <div class="form-group row">

                                <label class="col-sm-2 form-control-label text-xs-right">สถานะการใช้งาน&nbsp;<span style="color:#DC3545;">*</span></label>
                                <div class="col-sm-10">
                                <select class="custom-select mr-sm-2" name="email_confirm">
                                    <option value="" <?php if($data['email_confirm']==""){echo "selected";}?>>==== เลือกสถานะการใช้งาน ====</option>
                                    <option value="1" <?php if($data['email_confirm']=="1"){echo "selected";}?>>ยืนยันอีเมลแล้ว</option>
                                    <option value="0" <?php if($data['email_confirm']=="0"){echo "selected";}?>>รอการยืนยันอีเมล</option>
                                </select>
                                </div>
                            </div>
                                <?php echo form_error('email_confirm', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>


                            <div class="form-group row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <input type="submit" name="submit" value="บันทึกข้อมูล" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
                </article>    

<?php } ?>


<!-------------------------[member_list]----------------------------->

<?php if($this->input->get('page')=="member_list"){?>

    <article class="content item-editor-page">
       
         <div class="title-block">
            <h3 class="title"> 
                สมาชิก
                 &nbsp; <i class="fa fa-sign-in"></i> &nbsp; 
                <a href="<?php echo base_url('admin_management/member?page=member_add');?>"> เพิ่มสมาชิก </a>  
                 <a style="float:right;" href="<?php echo base_url('admin_management/member?page=member_excel');?>" class="btn btn-primary"> ส่งออก Excel </a> 
            </h3>

        </div>
        <div class="card card-block">
        <section class="example">

            <div class="table-responsive">
            <table id="table_menu" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th><center>ชื่อสมาชิก</center></th>
                        <th><center>นามสกุล</center></th>
                        <th><center>เบอร์โทรศัพท์</center></th>
                        <th><center>อีเมล</center></th>
                        <th><center>วันที่เพิ่ม</center></th>
                        <th><center>สถานะ</center></th>
                        <th><center>จัดการ</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $row){ ?>
                    <tr>
                        <td>
                            <a href="<?php echo base_url('admin_management/member?page=member_edit&&mem_id='.$row->mem_id.'');?>"><?php echo $row->firstname;?></a>
                        </td>
                        <td><?php echo $row->lastname;?></td>
                        <td><?php echo $row->tel;?></td>
                        <td><?php echo $row->email;?></td>
                        <td><?php echo $row->created_date;?></td>
                        <td><?php if($row->email_confirm==0){echo "<p style='color:red';>ยังไม่ยืนยันอีเมล</p>";}else{echo "<p style='color:green';>ยืนยันอีเมลแล้ว</p>";}?></td>
                        <td>

                            <div class="item-list striped">
                                <div class="item-col fixed item-col-actions-dropdown">

                                    <div class="item-actions-dropdown">
                                        <a class="item-actions-toggle-btn">
                                            <span class="inactive">
                                                <i class="fa fa-cog"></i>
                                            </span>
                                            <span class="active">
                                                <i class="fa fa-chevron-circle-right"></i>
                                            </span>
                                        </a>
                                        <div class="item-actions-block">
                                            <ul class="item-actions-list">
                                                <li>
                                                    <a class="remove" data-toggle="modal" data-target="#confirm-modal<?php echo $row->mem_id;?>">
                                                        <i class="fa fa-trash-o "></i>
                                                    </a>

                                                    <!-- popup delete -->
                                                    <div class="modal fade" id="confirm-modal<?php echo $row->mem_id;?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">
                                                                        <i class="fa fa-warning"></i> แจ้งเตือน</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>คุณต้องการลบรายการนี้หรือไม่</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button  onClick="window.location='<?php echo base_url('admin_management/member?page=member_delete&&mem_id='.$row->mem_id.'');?>'" type="button" onclass="btn btn-primary" data-dismiss="modal">ใช่</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ไม่</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </li>
                                                <li>
                                                    <a class="edit" href="<?php echo base_url('admin_management/member?page=member_edit&&mem_id='.$row->mem_id.'');?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            </div>
        </section>
        </div>
    </article>

<?php } ?> 


<!-------------------------[member_list_history]----------------------------->

<?php if($this->input->get('page')=="member_list_history"){?>

    <article class="content item-editor-page">
       
         <div class="title-block">
            <h3 class="title"> ประวัติการลบ สมาชิก</h3>

        </div>
        <div class="card card-block">
        <section class="example">
            <div class="table-responsive">
            <table id="table_menu" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th><center>ชื่อสมาชิก</center></th>
                        <th><center>นามสกุลสมาชิก</center></th>
                        <th><center>เบอร์โทรศัพท์</center></th>
                        <th><center>อีเมล</center></th>
                        <th><center>วันที่เพิ่ม</center></th>
                        <th><center>สถานะ</center></th>
                        <th><center>จัดการ</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $row){ ?>
                    <tr>
                        <td>
                            <?php echo $row->firstname;?>
                        </td>
                        <td><?php echo $row->lastname;?></td>
                        <td><?php echo $row->tel;?></td>
                        <td><?php echo $row->email;?></td>
                        <td><?php echo $row->created_date;?></td>
                        <td><?php if($row->email_confirm==0){echo "<p style='color:red';>ยังไม่ยืนยันอีเมล</p>";}else{echo "<p style='color:green';>ยืนยันอีเมลแล้ว</p>";}?></td>
                        <td>

                            <div class="item-list striped">
                                <div class="item-col fixed item-col-actions-dropdown">

                                    <div class="item-actions-dropdown">
                                        <a class="item-actions-toggle-btn">
                                            <span class="inactive">
                                                <i class="fa fa-cog"></i>
                                            </span>
                                            <span class="active">
                                                <i class="fa fa-chevron-circle-right"></i>
                                            </span>
                                        </a>
                                        <div class="item-actions-block">
                                            <ul class="item-actions-list">
                                                <li>
                                                    <a class="remove" data-toggle="modal" data-target="#confirm-modal<?php echo $row->mem_id;?>">
                                                        <i class="fa fa-trash-o "></i>
                                                    </a>

                                                    <!-- popup delete -->
                                                    <div class="modal fade" id="confirm-modal<?php echo $row->mem_id;?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">
                                                                        <i class="fa fa-warning"></i> แจ้งเตือน</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>คุณต้องการลบรายการนี้หรือไม่</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button  onClick="window.location='<?php echo base_url('admin_management/member?page=member_delete_history&&mem_id='.$row->mem_id.'');?>'" type="button" onclass="btn btn-primary" data-dismiss="modal">ใช่</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ไม่</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            </div>
        </section>
        </div>
    </article>

<?php } ?> 


<!-------------------------[member_excel]----------------------------->

<?php if($this->input->get('page')=="member_excel"){?>

<?php header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=member.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1'>
  <tr>
    <td>ลำดับ</td>
    <td>ชื่อ</td>
    <td>นามสกุล</td>
    <td>เบอร์โทรศัพท์</td>
    <td>อีเมล</td>
    <td>บ้านเลขที่</td>
    <td>หมู่ที่</td>
    <td>ตำบล/เขต</td>
    <td>อำเภอ/แขวง</td>
    <td>จังหวัด</td>
    <td>รหัสไปรษณีย์</td>
    <td>วันที่เพิ่ม</td>
    <td>สถานะ</td>
   
  </tr>
  <?php $i=1;foreach($data as $row){?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $row->firstname;?></td>
    <td><?php echo $row->lastname;?></td>
    <td><?php echo $row->tel;?></td>
    <td><?php echo $row->email;?></td>
    <td><?php echo $row->add_no;?></td>
    <td><?php echo $row->moo;?></td>
    <td><?php echo $row->district;?></td>
    <td><?php echo $row->amphur;?></td>
    <td><?php echo $row->province;?></td>
    <td><?php echo $row->zipcode;?></td>
    <td><?php echo $row->created_date;?></td>
    <td><?php if($row->email_confirm==1){echo "ยืนยันอีเมลแล้ว";}else{echo "ยังไม่ยืนยันอีเมล";}?></td>
  </tr>
  <?php $i++;} ?>
</table>

<?php }?>
                

                
 