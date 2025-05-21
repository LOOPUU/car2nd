<div class="sidebar-overlay" id="sidebar-overlay"></div>
<div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
<div class="mobile-menu-handle"></div>


<!-------------------------[suggestion_list]----------------------------->

<?php if($this->input->get('view') == "suggestion_list"){ ?>

    <article class="content item-editor-page">
       
         <div class="title-block">
            <h3 class="title"> รายการข้อเสนอแนะ 
                 <a style="float:right;" href="<?php echo base_url('admin_management/contact?view=suggestion_excel');?>" class="btn btn-primary"> ส่งออก Excel </a> 
            </h3>

        </div>

        <div class="card card-block">
        <section class="example">
            <div class="table-responsive">
                <table id="table_contact" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><center>หัวข้อ</center></th>
                            <th><center>ชื่อ - นามสกุล</center></th>
                            <th><center>เบอร์โทรศัพท์</center></th>
                            <th><center>อีเมล</center></th>
                            <th><center>วันที่แจ้ง</center></th>
                            <th><center>จัดการ</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $row){ ?>
                        <tr>
                            <td><?php echo $row->topic;?></td>
                            <td><?php echo $row->name;?></td>
                            <td><?php echo $row->tel;?></td>
                            <td><?php echo $row->email;?></td>
                            <td><?php echo $row->created_date;?></td>
                            <td>
                           
                                     <div class="item-list striped">
                                        <div class="item-col fixed item-col-actions-dropdown">
                                             <button class="btn btn-primary" onClick="window.location='<?php echo base_url('admin_management/contact?view=suggestion_view&&id='.$row->id.'');?>'">ดูรายละเอียด</button>&nbsp;&nbsp;
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
                                                            <a class="remove" data-toggle="modal" data-target="#confirm-modal<?php echo $row->id;?>">
                                                                <i class="fa fa-trash-o "></i>
                                                            </a>

                                                            <!-- popup delete -->
                                                            <div class="modal fade" id="confirm-modal<?php echo $row->id;?>">
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
                                                                            <button  onClick="window.location='<?php echo base_url('admin_management/contact?view=suggestion_delete&&id='.$row->id.'');?>'" type="button" onclass="btn btn-primary" data-dismiss="modal">ใช่</button>
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


<!-------------------------[suggestion_view]----------------------------->

<?php if($this->input->get('view') == "suggestion_view"){ ?>

    <article class="content item-editor-page">
         <div class="title-block">
            <h3 class="title"> 
                <a href="<?php echo base_url('admin_management/contact?view=suggestion_list');?>"> รายการข้อเสนอแนะ </a> 
                &nbsp; <i class="fa fa-sign-in"></i> &nbsp;
                รายละเอียดข้อเสนอแนะ
            </h3>
        </div>
        <div class="card card-block">
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">หัวข้อ : </label>
                    <div class="col-sm-10">
                        <input type="text" name="topic" class="form-control boxed" placeholder="" value='<?php if(set_value("topic")){echo set_value("topic");}else{echo $data['topic'];}?>' disabled> 
                    </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">ชื่อ - นามสกุล : </label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control boxed" placeholder="" value='<?php if(set_value("name")){echo set_value("name");}else{echo $data['name'];}?>' disabled> 
                    </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">อีเมล : </label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control boxed" placeholder="" value='<?php if(set_value("email")){echo set_value("email");}else{echo $data['email'];}?>' disabled> 
                    </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">เบอร์โทรศัพท์ : </label>
                    <div class="col-sm-10">
                        <input type="text" name="tel" class="form-control boxed" placeholder="" value='<?php if(set_value("tel")){echo set_value("tel");}else{echo $data['tel'];}?>' disabled> 
                    </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">รายละเอียด : </label>
                    <div class="col-sm-10">
                        <textarea name="description" class="form-control boxed" disabled><?php if(set_value("description")){echo set_value("description");}else{echo $data['description'];}?></textarea>
                    </div>
            </div>
        </div> 
    </article>

<?php } ?>


<!-------------------------[contact]-------------------------------------->


<?php if(empty($this->input->get('view'))){ ?>

    <article class="content item-editor-page">
        <div class="title-block">
            <h3 class="title"> ติดต่อเรา
                <span class="sparkline bar" data-type="bar"></span>
            </h3>
        </div>
        <form action="<?php echo base_url('admin_management/contact');?>" method="post">
            <div class="card card-block">
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right"> 
                        <img src="<?php echo base_url('backend/images/thailand.png');?>" width=20px;> 
                        หัวข้อ : </label>
                    <div class="col-sm-10">
                        <input type="text" name="title_th" class="form-control boxed" placeholder="" value='<?php if(set_value("title_th")){echo set_value("title_th");}else{echo $data['title_th'];}?>'> 
                        <?php echo form_error('title_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                    </div>
                 </div>

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right"> 
                        <img src="<?php echo base_url('backend/images/thailand.png');?>" width=20px;> 
                        รายละเอียด : </label>
                    <div class="col-sm-10">
                        <textarea  name="description_th" class="form-control boxed"><?php if(set_value("description_th")){echo set_value("description_th");}else{echo $data['description_th'];}?></textarea>
                        <?php echo form_error('description_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right"> 
                        <img src="<?php echo base_url('backend/images/thailand.png');?>" width=20px;> 
                        ที่อยู่ : </label>
                    <div class="col-sm-10">
                        <textarea  name="address_th" class="form-control boxed"><?php if(set_value("address_th")){echo set_value("address_th");}else{echo $data['address_th'];}?></textarea>
                        <?php echo form_error('address_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                    </div>
                </div>

                <hr>
                            
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right"> 
                        <img src="<?php echo base_url('backend/images/english.png');?>" width=20px;> 
                        หัวข้อ : </label>
                    <div class="col-sm-10">
                        <input type="text" name="title_en" class="form-control boxed" placeholder="" value="<?php if(set_value("title_en")){echo set_value("title_en");}else{echo $data['title_en'];}?>">
                        <?php echo form_error('title_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?> 
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right"> 
                        <img src="<?php echo base_url('backend/images/english.png');?>" width=20px;> 
                        รายละเอียด : </label>
                    <div class="col-sm-10">
                        <textarea name="description_en" class="form-control boxed"><?php if(set_value("description_en")){echo set_value("description_en");}else{echo $data['description_en'];}?></textarea>
                        <?php echo form_error('description_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?> 
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right"> 
                        <img src="<?php echo base_url('backend/images/english.png');?>" width=20px;> 
                        ที่อยู่ : </label>
                    <div class="col-sm-10">
                        <textarea  name="address_en" class="form-control boxed"><?php if(set_value("address_en")){echo set_value("address_en");}else{echo $data['address_en'];}?></textarea>
                        <?php echo form_error('address_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                    </div>
                </div>

                <hr>
                           
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right">facebook : </label>
                    <div class="col-sm-10">
                        <input type="text" name="fb_link" class="form-control boxed" placeholder="" value="<?php if(set_value("fb_link")){echo set_value("fb_link");}else{echo $data['fb_link'];}?>">
                        <?php echo form_error('fb_link', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?> 
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right">line : </label>
                    <div class="col-sm-10">
                        <input type="text" name="line_link" class="form-control boxed" placeholder="" value="<?php if(set_value("line_link")){echo set_value("line_link");}else{echo $data['line_link'];}?>">
                        <?php echo form_error('line_link', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?> 
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right">instragram : </label>
                    <div class="col-sm-10">
                        <input type="text" name="ig_link" class="form-control boxed" placeholder="" value="<?php if(set_value("ig_link")){echo set_value("ig_link");}else{echo $data['ig_link'];}?>">
                        <?php echo form_error('ig_link', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?> 
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right">เบอร์โทรศัพท์ : </label>
                    <div class="col-sm-10">
                        <input type="text" name="tel" class="form-control boxed" placeholder="" value="<?php if(set_value("tel")){echo set_value("tel");}else{echo $data['tel'];}?>">
                        <?php echo form_error('tel', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?> 
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right">อีเมล : </label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control boxed" placeholder="" value="<?php if(set_value("email")){echo set_value("email");}else{echo $data['email'];}?>">
                        <div class="error" style="padding: 1% 0%;">* (อีเมล ส่วนนี้ใช้สำหรับรับข้อมูลข้อเสนอแนะจากลูกค้า)</div>
                        <?php echo form_error('email', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?> 
                    </div>
                </div>
    
                <div class="form-group row">
                    <div class="col-sm-10 col-sm-offset-2">
                        <input type="submit" name="submit" value="บันทึกข้อมูล" class="btn btn-primary">
                    </div>
                </div>
        </form>
    </article>


<?php } ?>

<!-------------------------[suggestion_excel]----------------------------->

<?php if($this->input->get('view')=="suggestion_excel"){?>

<?php header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=suggestion.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1'>
  <tr>
    <td>ลำดับ</td>
    <td>หัวข้อ</td>
    <td>ชื่อ-นามสกุล</td>
    <td>เบอร์โทรศัพท์</td>
    <td>อีเมล</td>
    <td>รายละเอียด</td>
    <td>วันที่แจ้ง</td> 
  </tr>
  <?php $i=1;foreach($data as $row){?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $row->topic;?></td>
    <td><?php echo $row->name;?></td>
    <td><?php echo $row->tel;?></td>
    <td><?php echo $row->email;?></td>
    <td><?php echo nl2br($row->description);?></td>
    <td><?php echo $row->created_date;?></td>
  </tr>
  <?php $i++;} ?>
</table>

<?php }?>
                
 
                

