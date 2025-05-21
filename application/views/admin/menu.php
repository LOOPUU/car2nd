 <div class="sidebar-overlay" id="sidebar-overlay"></div>
<div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
<div class="mobile-menu-handle"></div>


<!-------------------------[menu_add]----------------------------->

<?php if($this->input->get('page')=="menu_add"){?>

                <article class="content item-editor-page">
                    <div class="title-block">
                        
                        <h3 class="title"> 
                            <a href="<?php echo base_url('admin_management/menu?page=menu_list');?>"> รายการเมนูหลัก </a> 
                            &nbsp; <i class="fa fa-sign-in"></i> &nbsp;
                            เพิ่มเมนูหลัก
                        </h3>
                    </div>
                     <form action="<?php echo base_url('admin_management/menu?page=menu_add');?>" method="post">
                        <div class="card card-block">
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> 
                                <img src="<?php echo base_url('backend/images/thailand.png');?>" width=20px;> 
                                ชื่อเมนูหลัก : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="name_th" class="form-control boxed" placeholder="" value='<?php echo set_value("name_th");?>'> 
                                    <?php echo form_error('name_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                    
                           <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> 
                                <img src="<?php echo base_url('backend/images/english.png');?>" width=20px;> 
                                ชื่อเมนูหลัก : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="name_en" class="form-control boxed" placeholder="" value='<?php echo set_value("name_en");?>'> 
                                    <?php echo form_error('name_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">ที่อยู่ลิ้งค์ : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="route_path" class="form-control boxed" placeholder="" value='<?php echo set_value("route_path");?>'> 
                                    <?php echo form_error('route_path', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> ตำแหน่งการแสดงผล : </label>
                                <div class="col-sm-10">
                                    <input type="number" name="position_id" class="form-control boxed" placeholder="" value='<?php echo set_value("position_id");?>'> 
                                    <?php echo form_error('position_id', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">สถานะ : </label>
                                <div class="col-sm-10">
                                    <select class="c-select form-control boxed" name="status_id">
                                        <option value="" <?php if(set_value("status_id")==""){echo "selected";}?>>==== เลือกสถานะการใช้งาน ====</option>
                                        <option value="1" <?php if(set_value("status_id")=="1"){echo "selected";}?>>เปิดการใช้งาน</option>
                                        <option value="2" <?php if(set_value("status_id")=="2"){echo "selected";}?>>ปิดการใช้งาน</option>
                                    </select>
                                    <?php echo form_error('status_id', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
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


<!-------------------------[menu_edit]----------------------------->

<?php if($this->input->get('page')=="menu_edit"){?>

                <article class="content item-editor-page">
                    <div class="title-block">
                        <h3 class="title"> 
                            <a href="<?php echo base_url('admin_management/menu?page=menu_list');?>"> รายการเมนูหลัก </a> 
                            &nbsp; <i class="fa fa-sign-in"></i> &nbsp;
                            แก้ไขเมนูหลัก
                            
                        </h3>
                    </div>
                     <form action="<?php echo base_url('admin_management/menu?page=menu_edit&&menu_id='.$data['menu_id'].'');?>" method="post">
                        <div class="card card-block">
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> 
                                <img src="<?php echo base_url('backend/images/thailand.png');?>" width=20px;> 
                                ชื่อเมนูหลัก : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="name_th" class="form-control boxed" placeholder="" value='<?php if(set_value("name_th")){echo set_value("name_th");}else{echo $data['name_th'];}?>'> 
                                    <?php echo form_error('name_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                    
                           <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> 
                                <img src="<?php echo base_url('backend/images/english.png');?>" width=20px;> 
                                ชื่อเมนูหลัก : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="name_en" class="form-control boxed" placeholder="" value='<?php if(set_value("name_en")){echo set_value("name_en");}else{echo $data['name_en'];}?>'> 
                                    <?php echo form_error('name_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> ตำแหน่งการแสดงผล : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="position_id" class="form-control boxed" placeholder="" value='<?php if(set_value("position_id")){echo set_value("position_id");}else{echo $data['position_id'];}?>'> 
                                    <?php echo form_error('position_id', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right">สถานะ : </label>
                                <div class="col-sm-10">
                                    <select class="c-select form-control boxed" name="status_id">
                                        <option value="" <?php if($data['status_id']==""){echo "selected";}?>>==== เลือกสถานะการใช้งาน ====</option>
                                        <option value="1" <?php if($data['status_id']=="1"){echo "selected";}?>>เปิดการใช้งาน</option>
                                        <option value="2" <?php if($data['status_id']=="2"){echo "selected";}?>>ปิดการใช้งาน</option>
                                    </select>
                                        <?php echo form_error('status_id', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
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


<!-------------------------[menu_list]----------------------------->

<?php if($this->input->get('page')=="menu_list"){?>

    <article class="content item-editor-page">


         <div class="title-block">
            <h3 class="title"> 
                รายการเมนูหลัก 
                <a style="float:right;" href="<?php echo base_url('admin_management/menu?page=menu_excel');?>" class="btn btn-primary"> ส่งออก Excel </a> 
            </h3>

        </div>
        <div class="card card-block">
        <section class="example">
            <div class="table-responsive">
            <table id="table_menu" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th><center>ชื่อเมนูหลัก  <img src="<?php echo base_url('backend/images/thailand.png');?>" width=20px;></center></th>
                        <th><center>ชื่อเมนูหลัก  <img src="<?php echo base_url('backend/images/english.png');?>" width=20px;></center></th>
                        <th><center>ตำแหน่ง</center></th>
                        <th><center>สถานะ</center></th>
                        <th><center>วันที่เพิ่ม</center></th>
                        <th><center>วันที่แก้ไข</center></th>
                        <th><center>จัดการ</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $row){ ?>
                    <tr>
                        <td>
                            <a href="<?php echo base_url('admin_management/menu?page=menu_edit&&menu_id='.$row->menu_id.'');?>"><?php echo $row->name_th;?></a>
                        </td>
                        <td><?php echo $row->name_en;?></td>
                        <td><?php echo $row->position_id;?></td>
                        <td><?php if($row->status_id==1){ echo "<p class='text-success'>เปิด</p>";}else{echo "<p class='text-danger'>ปิด</p>";}?></td>
                        <td><?php echo $row->created_date;?></td>
                        <td><?php echo $row->modify_date;?></td>
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
                                                <!-- <li>
                                                    <a class="remove" data-toggle="modal" data-target="#confirm-modal<?php echo $row->menu_id;?>">
                                                        <i class="fa fa-trash-o "></i>
                                                    </a>

                                                   
                                                    <div class="modal fade" id="confirm-modal<?php echo $row->menu_id;?>">
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
                                                                    <button  onClick="window.location='<?php echo base_url('admin_management/menu?page=menu_delete&&menu_id='.$row->menu_id.'');?>'" type="button" onclass="btn btn-primary" data-dismiss="modal">ใช่</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ไม่</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </li> -->
                                                <li>
                                                    <a class="edit" href="<?php echo base_url('admin_management/menu?page=menu_edit&&menu_id='.$row->menu_id.'');?>">
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

<!-------------------------[menu_list_history]----------------------------->

<?php if($this->input->get('page')=="menu_list_history"){?>

    <article class="content item-editor-page">
       
         <div class="title-block">
            <h3 class="title">
            
             ประวัติการลบ เมนูหลัก 
            
            </h3>

        </div>
        <div class="card card-block">
        <section class="example">
            <div class="table-responsive">
            <table id="table_menu_his" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th><center>ชื่อเมนูหลัก  <img src="<?php echo base_url('backend/images/thailand.png');?>" width=20px;></center></th>
                        <th><center>ชื่อเมนูหลัก  <img src="<?php echo base_url('backend/images/english.png');?>" width=20px;></center></th>
                        <th><center>ตำแหน่ง</center></th>
                        <th><center>สถานะ</center></th>
                        <th><center>วันที่เพิ่ม</center></th>
                        <th><center>วันที่แก้ไข</center></th>
                        <th><center>จัดการ</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $row){ ?>
                    <tr>
                        <td>
                            <?php echo $row->name_th;?>
                        </td>
                        <td><?php echo $row->name_en;?></td>
                        <td><?php echo $row->position_id;?></td>
                        <td><?php if($row->status_id==1){ echo "<p class='text-success'>เปิด</p>";}else{echo "<p class='text-danger'>ปิด</p>";}?></td>
                        <td><?php echo $row->created_date;?></td>
                        <td><?php echo $row->modify_date;?></td>
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
                                                    <a class="remove" data-toggle="modal" data-target="#confirm-modal<?php echo $row->menu_id;?>">
                                                        <i class="fa fa-trash-o "></i>
                                                    </a>

                                                    <!-- popup delete -->
                                                    <div class="modal fade" id="confirm-modal<?php echo $row->menu_id;?>">
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
                                                                    <button  onClick="window.location='<?php echo base_url('admin_management/menu?page=menu_delete_history&&menu_id='.$row->menu_id.'');?>'" type="button" onclass="btn btn-primary" data-dismiss="modal">ใช่</button>
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
                
<!-------------------------[menu_excel]----------------------------->

<?php if($this->input->get('page')=="menu_excel"){?>

<?php header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=menu.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1'>
  <tr>
    <td>ลำดับ</td>
    <td>ชื่อเมนูหลัก(ไทย)</td>
    <td>ชื่อเมนูหลัก(อังกฤษ)</td>
    <td>ตำแหน่ง</td>
    <td>วันที่เพิ่ม</td>
    <td>วันที่แก้ไข</td>
    <td>สถานะ</td>
  </tr>
  <?php $i=1; foreach($data as $row){?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $row->name_th;?></td>
    <td><?php echo $row->name_en;?></td>
    <td><?php echo $row->position_id;?></td>
    <td><?php echo $row->created_date;?></td>
    <td><?php echo $row->modify_date;?></td>
    <td><?php if($row->status_id==1){echo "เปิด";}else{echo "ปิด";}?></td>
  </tr>
  <?php $i++;} ?>
</table>

<?php }?>
                
 