
<div class="sidebar-overlay" id="sidebar-overlay"></div>
<div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
<div class="mobile-menu-handle"></div>
     
<article class="content item-editor-page">
       
         <div class="title-block">
            <h3 class="title"> แบนเนอร์ </h3>

        </div>

        <div class="card card-block">
        <section class="example">
            <div class="table-responsive">
              <center>
              <?php $id = $this->uri->segment(3);?>
              <?php echo form_open_multipart('admin_management/banner_upload_image_multi/1/1/');?>

                  <input type="hidden" name="id_image" value="<?php if($id_image) echo $id_image ?>" />
                  <input type="hidden" name="num" value="<?php echo $num; ?>" />
                  <input type="hidden" name="id_image_multi" value="<?php if($id_image_multi) echo $id_image_multi; ?>" />
                  <input type="hidden" name="banner_id" value="<?php echo $id; ?>" >
                  <div class="card card-block">

                       <center>
                          <?php if($tn){
                            echo '<img alt="Thumbnail image" style="width: 40%;" src="'. base_url().'uploads/'.$tn.'" ><br><br>';
                          } ?>
                          <input type="file" name="userfile" size="20" class="btn btn-info"/> 
                          <input type="submit" name="submit" class="btn btn-primary" value="<?php if(empty($id_image_multi)){ echo "บันทึกข้อมูล";}else{echo "แก้ไขรูปภาพ";}?>">
                          <div style="color:red;"><?php echo $error;?></div>
                      </center>  


                    
              <?php echo form_close(); ?>
              </center>
            </div>
            

        <div class="card card-block">
        <section class="example">
            <div class="table-responsive">
             <table id="table_banner" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                          <th><center>ลำดับ</center></th>
                          <th><center>รูปภาพ</center></th>
                          <th><center>วันที่เพิ่มรูปภาพ</center></th>
                          <th><center>เลือกหน้าแสดง</center></th>
                          <th><center>จัดการ</center></th>
                      </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($query as $row){ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td>
                        <center>
                         <?php
                            if($row->img==""){
                              echo "<img src=".base_url('image/noimage100.gif')." style='width: 150px;'> ";
                            }elseif($row->img!==""){
                              echo "<img src=".base_url('uploads/'.$row->img.'')." style='width: 150px;'/> ";
                            }
                          ?>
                        </center>
                      </td>
                      <td><?php echo $row->upload_date; ?> </td>
                      <th>
                      <center>
                        <form action="<?php echo base_url('admin_management/banner_change_page?id_image_multi='.$row->id_image_multi.'');?>" method="POST">
                        <select name="page" style="height: 33px;">
                          <option value="" <?php if($row->page==""){echo "selected";}?>>กรุณาเลือกหน้าแสดง</option>
                          <option value="home" <?php if($row->page=="home"){echo "selected";}?>>หน้าแรก</option>
                          <option value="about" <?php if($row->page=="about"){echo "selected";}?>>เกี่ยวกับเรา</option>
                          <option value="product" <?php if($row->page=="product"){echo "selected";}?>>สินค้า</option>
                          <option value="howto_pay" <?php if($row->page=="howto_pay"){echo "selected";}?>>วิธีการชำระเงิน</option>
                          <option value="howto" <?php if($row->page=="howto"){echo "selected";}?>>วิธีการจัดส่ง</option>
                          <option value="contact" <?php if($row->page=="contact"){echo "selected";}?>>ติดต่อเรา</option>
                        </select>
                        <input type="submit" name="submit" class="btn btn-primary" value="บันทึกข้อมูล">
                       </form>
                      </center>
                      </th>
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
                                                    <a class="remove" data-toggle="modal" data-target="#confirm-modal<?php echo $row->id_image_multi;?>">
                                                        <i class="fa fa-trash-o "></i>
                                                    </a>

                                                    <!-- popup delete -->
                                                    <div class="modal fade" id="confirm-modal<?php echo $row->id_image_multi;?>">
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
                                                                    <button  onClick="window.location='<?php echo base_url('admin_management/banner_delete_image_multi/'.$id.'/'.$num.'/'.$row->id_image_multi); ?>'" type="button" onclass="btn btn-primary" data-dismiss="modal">ใช่</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ไม่</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </li>
                                                 <li>
                                                    <a class="edit" href="<?php echo base_url('admin_management/banner/'.$id.'/'.$num.'/'.$row->id_image_multi); ?>">
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
                    <?php $no++;}?>
                </tbody>
            </table>
            </div>
          </section>
        </div>

</article>

       
