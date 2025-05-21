


    <?php if($this->session->userdata('menu_list')==1 
        OR $this->session->userdata('banner_multi')==1
        OR $this->session->userdata('about_edit')==1
        OR $this->session->userdata('news_list')==1
        OR $this->session->userdata('adv_list')==1
        OR $this->session->userdata('contact_edit')==1
        OR $this->session->userdata('member_list')==1
        OR $this->session->userdata('car_top_list')==1
        OR $this->session->userdata('car_buy_list')==1
        OR $this->session->userdata('contact_suggestion_list')==1
        OR $this->session->userdata('car_type_list')==1
        OR $this->session->userdata('car_price_list')==1
        OR $this->session->userdata('car_year_list')==1
        OR $this->session->userdata('car_color_list')==1
        OR $this->session->userdata('car_gear_list')==1
        OR $this->session->userdata('car_capacity_list')==1
        OR $this->session->userdata('car_mile_list')==1
        OR $this->session->userdata('car_device_list')==1
        OR $this->session->userdata('finance_list')==1
        OR $this->session->userdata('bank_list')==1
    ){?>    
 <!-- Content -->
    <div class="row ghhMCK pt-3">
        <div class="col-md-12 col-lg-12">
            <div class="wrap-box">
                <!-- Title -->
               

                <div class="title">
                    <h6 class="h6">เข้าสู่เครื่องมือจัดการแบบรวดเร็ว</h6>
                </div>
                <div class="content">

                    <div class="row">

                        <?php if($this->session->userdata('menu_list')==1){?>
                        <div class="col-6 col-md-3 col-lg-3 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/menu_list');?>">
                                <div class="button text-center" style="border: none;">
                                    <div class="pt-2 pb-2"><i class="bx-fw bx bx-menu bx-sm"></i></div>
                                    <p>จัดการแถบเมนู</p>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if($this->session->userdata('banner_multi')==1){?>
                        <div class="col-6 col-md-3 col-lg-3 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/banner_multi/1/1');?>">
                                <div class="button text-center" style="border: none;">
                                    <div class="pt-2 pb-2"><i class="bx-fw bx bxs-collection bx-sm"></i></div>
                                    <p>จัดการแบนเนอร์</p>
                                </div>
                            </a>
                        </div>
                         <?php }?>

                        <?php if($this->session->userdata('about_edit')==1){?>
                         <div class="col-6 col-md-3 col-lg-3 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/about_edit');?>">
                                <div class="button text-center" style="border: none;">
                                    <div class="pt-2 pb-2"><i class="bx-fw bx bxs-info-circle bx-sm"></i></div>
                                    <p>จัดการเกี่ยวกับเรา</p>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if($this->session->userdata('news_list')==1){?>
                         <div class="col-6 col-md-3 col-lg-3 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/news_list');?>">
                                <div class="button text-center" style="border: none;">
                                    <div class="pt-2 pb-2"><i class="bx-fw bx bxs-news bx-sm"></i></div>
                                    <p>จัดการข่าวสาร</p>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if($this->session->userdata('adv_list')==1){?>
                         <div class="col-6 col-md-3 col-lg-3 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/adv_list');?>">
                                <div class="button text-center" style="border: none;">
                                    <div class="pt-2 pb-2"><i class="bx-fw bx bxs-news bx-sm"></i></div>
                                    <p>จัดการโฆษณา</p>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if($this->session->userdata('contact_edit')==1){?>
                         <div class="col-6 col-md-3 col-lg-3 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/contact_edit');?>">
                                <div class="button text-center" style="border: none;">
                                    <div class="pt-2 pb-2"><i class="bx-fw bx bxs-contact bx-sm"></i></div>
                                    <p>จัดการช่องทางติดต่อ</p>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if($this->session->userdata('member_list')==1){?>
                         <div class="col-6 col-md-3 col-lg-3 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/member_list');?>">
                                <div class="button text-center" style="border: none;">
                                    <div class="pt-2 pb-2"><i class="bx-fw bx bxs-user-circle bx-sm"></i></div>
                                    <p>จัดการสมาชิก</p>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if($this->session->userdata('car_top_list')==1){?>
                         <div class="col-6 col-md-3 col-lg-3 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/car_top_list');?>">
                                <div class="button text-center" style="border: none;">
                                    <div class="pt-2 pb-2"><i class="bx-fw bx bxs-car bx-sm" style="position:relative;">
                                        <span class="badge badge-pill badge-danger" style="position: absolute;top: -10px;left:100%;font-size: .5em;"><?php echo number_format($count_member);?></span>
                                        
                                    </i>
                                    
                                  </div>
                                    <p>ข้อมูลการขายรถยนต์</p>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if($this->session->userdata('car_buy_list')==1){?>
                         <div class="col-6 col-md-3 col-lg-3 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/car_buy_list');?>">
                                <div class="button text-center" style="border: none;">
                                    <div class="pt-2 pb-2"><i class="bx-fw bx bxs-car bx-sm" style="position:relative;">
                                        <span class="badge badge-pill badge-danger" style="position: absolute;top: -10px;left:100%;font-size: .5em;"><?php echo number_format($check_count_comment);?></span>
                                        
                                    </i>
                                    </div>
                                    <p>ข้อมูลการซื้อรถยนต์</p>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if($this->session->userdata('contact_edit')==1){?>
                         <div class="col-6 col-md-3 col-lg-3 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/contact_suggestion_list');?>">
                                <div class="button text-center" style="border: none;">
                                    <div class="pt-2 pb-2"><i class="fas fa-users fa-lg fa-fw bx-sm" style="position:relative;">
                                        <span class="badge badge-pill badge-danger" style="position: absolute;top: -10px;left:100%;font-size: .5em;"><?php echo number_format($check_count_comment_contact);?></span>
                                        
                                    </i>
                                    </div>
                                    <p>ข้อเสนอแนะจากผู้ใช้</p>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if($this->session->userdata('car_type_list')==1){?>
                         <div class="col-6 col-md-3 col-lg-3 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/car_type_list');?>">
                                <div class="button text-center" style="border: none;">
                                    <div class="pt-2 pb-2"><i class="bx-fw bx bx-poll bx-sm"></i></div>
                                    <p>จัดการหมวดหมู่รถ</p>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if($this->session->userdata('car_price_list')==1){?>
                         <div class="col-6 col-md-3 col-lg-3 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/car_price_list');?>">
                                <div class="button text-center" style="border: none;">
                                    <div class="pt-2 pb-2"><i class="bx-fw bx bxs-dollar-circle bx-sm"></i></div>
                                    <p>จัดการราคารถ</p>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if($this->session->userdata('car_year_list')==1){?>
                         <div class="col-6 col-md-3 col-lg-3 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/car_year_list');?>">
                                <div class="button text-center" style="border: none;">
                                    <div class="pt-2 pb-2"><i class="bx-fw bx bx-calendar bx-sm"></i></div>
                                    <p>จัดการปีผลิต/ทะเบียนรถ</p>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if($this->session->userdata('car_color_list')==1){?>
                         <div class="col-6 col-md-3 col-lg-3 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/car_color_list');?>">
                                <div class="button text-center" style="border: none;">
                                    <div class="pt-2 pb-2"><i class="bx-fw bx bx-color-fill bx-sm"></i></div>
                                    <p>จัดการสีรถ</p>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if($this->session->userdata('car_gear_list')==1){?>
                         <div class="col-6 col-md-3 col-lg-3 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/car_gear_list');?>">
                                <div class="button text-center" style="border: none;">
                                    <div class="pt-2 pb-2"><i class="bx-fw bx bxs-wrench bx-sm"></i></div>
                                    <p>จัดการระบบเกียร์</p>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if($this->session->userdata('car_capacity_list')==1){?>
                         <div class="col-6 col-md-3 col-lg-3 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/car_capacity_list');?>">
                                <div class="button text-center" style="border: none;">
                                    <div class="pt-2 pb-2"><i class="bx-fw bx bxs-filter-alt bx-sm"></i></div>
                                    <p>จัดการขนาดเครื่องยนต์</p>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if($this->session->userdata('car_mile_list')==1){?>
                         <div class="col-6 col-md-3 col-lg-3 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/car_mile_list');?>">
                                <div class="button text-center" style="border: none;">
                                    <div class="pt-2 pb-2"><i class="bx-fw bx bx-dashboard bx-sm"></i></div>
                                    <p>จัดการเลขไมล์</p>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if($this->session->userdata('car_device_list')==1){?>
                         <div class="col-6 col-md-3 col-lg-3 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/car_device_list');?>">
                                <div class="button text-center" style="border: none;">
                                    <div class="pt-2 pb-2"><i class="bx-fw bx bx-dashboard bx-sm"></i></div>
                                    <p>จัดการอุปกรณ์รถยนต์</p>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if($this->session->userdata('finance_list')==1){?>
                         <div class="col-6 col-md-3 col-lg-3 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/finance_list');?>">
                                <div class="button text-center" style="border: none;">
                                    <div class="pt-2 pb-2"><i class="bx-fw bx bxs-flame bx-sm"></i></div>
                                    <p>รายละเอียดไฟแนนซ์</p>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if($this->session->userdata('bank_list')==1){?>
                         <div class="col-6 col-md-3 col-lg-3 mt-1 mb-1">
                            <a href="<?php echo base_url('admin_management/bank_list');?>">
                                <div class="button text-center" style="border: none;">
                                    <div class="pt-2 pb-2"><i class="bx-fw bx bx-credit-card bx-sm"></i></div>
                                    <p>จัดการข้อมูลธนาคาร</p>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>