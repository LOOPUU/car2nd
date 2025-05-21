<?php
 ob_start();
 header("Cache-Control: no-cache, must-revalidate"); 
?>
<?php 
    $count_member = $this->model_admin->get_data_car_count();
    $check_count_comment = $this->model_admin->get_data_car_count_buy();
    $check_count_comment_contact = $this->model_admin->get_data_car_count_contact();
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
<title>Backoffice - POSTSICAR</title>
<meta charset="UTF-8" />
    <!-- <META HTTP-EQUIV="EXPIRES" CONTENT="Fri, 03 Mar 2019 03:00:00 GMT"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="theme-color" content="#FFFFFF" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="cache-control" content="no-cache"/>

    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <style type="text/css">
        a[href="https://froala.com/wysiwyg-editor"], a[href="https://www.froala.com/wysiwyg-editor?k=u"] {
            display: none !important;
            position: absolute;
            top: -99999999px;
        }
    </style>
    <link
      rel="apple-touch-icon-precomposed"
      sizes="57x57"
      href="<?php echo base_url('frontend');?>/assets/favicons/apple-touch-icon-57x57.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="114x114"
      href="<?php echo base_url('frontend');?>/assets/favicons/apple-touch-icon-114x114.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="72x72"
      href="<?php echo base_url('frontend');?>/assets/favicons/apple-touch-icon-72x72.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="144x144"
      href="<?php echo base_url('frontend');?>/assets/favicons/apple-touch-icon-144x144.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="60x60"
      href="<?php echo base_url('frontend');?>/assets/favicons/apple-touch-icon-60x60.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="120x120"
      href="<?php echo base_url('frontend');?>/assets/favicons/apple-touch-icon-120x120.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="76x76"
      href="<?php echo base_url('frontend');?>/assets/favicons/apple-touch-icon-76x76.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="152x152"
      href="<?php echo base_url('frontend');?>/assets/favicons/apple-touch-icon-152x152.png"
    />
    <link
      rel="icon"
      type="image/png"
      href="<?php echo base_url('frontend');?>/assets/favicons/favicon-196x196.png"
      sizes="196x196"
    />
    <link
      rel="icon"
      type="image/png"
      href="<?php echo base_url('frontend');?>/assets/favicons/favicon-96x96.png"
      sizes="96x96"
    />
    <link
      rel="icon"
      type="image/png"
      href="<?php echo base_url('frontend');?>/assets/favicons/favicon-32x32.png"
      sizes="32x32"
    />
    <link
      rel="icon"
      type="image/png"
      href="<?php echo base_url('frontend');?>/assets/favicons/favicon-16x16.png"
      sizes="16x16"
    />
    <link
      rel="icon"
      type="image/png"
      href="<?php echo base_url('frontend');?>/assets/favicons/favicon-128.png"
      sizes="128x128"
    />
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('');?>backend/css/all.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('');?>backend/css/boxicons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('');?>backend/css/toastr.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('');?>backend/plugins/elfinder/css/elfinder.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('');?>backend/plugins/filepond/css/filepond.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('');?>backend/plugins/filepond/css/filepond-plugin-image-preview.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('');?>backend/css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('');?>backend/css/bootstrap-table.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('');?>backend/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('');?>backend/css/custom.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('');?>backend/css/load.css">

    <script type="text/javascript" src="<?php echo base_url('');?>backend/js/jquery-3.3.1.min.js"></script>
   <!--  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->

    <script type="text/javascript" src="<?php echo base_url('');?>backend/js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('');?>backend/js/bootstrap.min.js"></script>   
    <script type="text/javascript" src="<?php echo base_url('');?>backend/js/bootstrap-table.js"></script>    
    <script type="text/javascript" src="<?php echo base_url('');?>backend/js/bootstrap-table-th-TH.js"></script> 
    <script type="text/javascript" src="<?php echo base_url('');?>backend/js/toastr.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.3/tinymce.min.js"></script>  
    <script type="text/javascript" src="<?php echo base_url('');?>backend/js/ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('');?>backend/plugins/elfinder/js/elfinder.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('');?>backend/plugins/filepond/js/filepond-plugin-image-preview.js"></script>
    <script type="text/javascript" src="<?php echo base_url('');?>backend/plugins/filepond/js/filepond-plugin-image-exif-orientation.js"></script>
    <script type="text/javascript" src="<?php echo base_url('');?>backend/plugins/filepond/js/filepond-plugin-file-encode.js"></script>
    <script type="text/javascript" src="<?php echo base_url('');?>backend/plugins/filepond/js/filepond-plugin-file-validate-size.js"></script>
    <script type="text/javascript" src="<?php echo base_url('');?>backend/plugins/filepond/js/filepond-plugin-file-validate-type.js"></script>
    <script type="text/javascript" src="<?php echo base_url('');?>backend/plugins/filepond/js/filepond.js"></script>

    <script type="text/javascript" src="<?php echo base_url('');?>backend/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('');?>backend/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('');?>backend/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="<?php echo base_url('backend/wysiwyg-editor-master');?>/css/froala_editor.css">
    <link rel="stylesheet" href="<?php echo base_url('backend/wysiwyg-editor-master');?>/css/froala_style.css">
    <link rel="stylesheet" href="<?php echo base_url('backend/wysiwyg-editor-master');?>/css/plugins/code_view.css">
    <link rel="stylesheet" href="<?php echo base_url('backend/wysiwyg-editor-master');?>/css/plugins/colors.css">
    <link rel="stylesheet" href="<?php echo base_url('backend/wysiwyg-editor-master');?>/css/plugins/emoticons.css">
    <link rel="stylesheet" href="<?php echo base_url('backend/wysiwyg-editor-master');?>/css/plugins/image_manager.css">
    <link rel="stylesheet" href="<?php echo base_url('backend/wysiwyg-editor-master');?>/css/plugins/image.css">
    <link rel="stylesheet" href="<?php echo base_url('backend/wysiwyg-editor-master');?>/css/plugins/line_breaker.css">
    <link rel="stylesheet" href="<?php echo base_url('backend/wysiwyg-editor-master');?>/css/plugins/table.css">
    <link rel="stylesheet" href="<?php echo base_url('backend/wysiwyg-editor-master');?>/css/plugins/char_counter.css">
    <link rel="stylesheet" href="<?php echo base_url('backend/wysiwyg-editor-master');?>/css/plugins/video.css">
    <link rel="stylesheet" href="<?php echo base_url('backend/wysiwyg-editor-master');?>/css/plugins/fullscreen.css">
    <link rel="stylesheet" href="<?php echo base_url('backend/wysiwyg-editor-master');?>/css/plugins/quick_insert.css">
    <link rel="stylesheet" href="<?php echo base_url('backend/wysiwyg-editor-master');?>/css/plugins/file.css">
    <link rel="stylesheet" href="<?php echo base_url('backend/wysiwyg-editor-master');?>/css/themes/gray.css">
    <link rel="stylesheet" href="<?php echo base_url('backend/wysiwyg-editor-master');?>/codemirror.min.css">
    <style type="text/css">
        .error { color: red; }
    </style>
</head>
<body>


<div class="loader"></div> 
    <!-- Desktop -->
    <nav class="navbar fixed-top navbar-dark bg-color d-none d-md-flex flex-md-nowrap p-0">

        <ul class="navbar-nav col-sm-3 col-md-2 mr-0">
            <li class="nav-item text-center" style="background-color: #073b5a;padding: 5px;">
                <a class="nav-link text-white" href="<?php echo base_url('');?>" target="_blank"><i class="bx-fw bx bxs-home bx-sm"></i> POSTSICAR</a>
            </li>
        </ul>
        

        <ul class="navbar-nav" style="flex-direction: row;">
            <li  class="nav-item text-center" style="padding: 5px;padding-left: 15px;padding-right: 20px;">
                <a class="nav-link text-white"><i class="fas fa-user fa-lg fa-fw"></i>
                &nbsp;&nbsp;<?php echo $this->session->userdata('admin_name_ikko');?>&nbsp;&nbsp;&nbsp;</a>
            </li>
            <li class="nav-item text-center" style="background-color: #073b5a;padding: 5px;padding-left: 15px;padding-right: 20px;">
                <a class="nav-link text-white" href="<?php echo base_url('admin/logout'); ?>"><i class="bx-fw bx bx-power-off bx-sm"></i> ออกจากระบบ</a>
            </li>
        </ul>
    </nav>
    
    <!-- Mobile -->
    <nav id="main" class="navbar navbar-dark bg-color d-md-none d-lg-none">
        <h5 class="text-white">ระบบจัดการหลังบ้าน</h5>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php if($this->session->userdata('admin_id_ikko')==1){?>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-user fa-lg fa-fw"></i> <?php echo $this->session->userdata('admin_name_ikko');?></a>
                </li>
                <?php }?>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>"><i class="fas fa-home fa-lg fa-fw"></i> ไปยังหน้าแรก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('admin/logout'); ?>"><i class="fas fa-sign-out-alt fa-lg fa-fw"></i> ออกจากระบบ</a>
                </li>

                <?php if($this->session->userdata('menu_list')==1 
                        OR $this->session->userdata('banner_multi')==1
                        OR $this->session->userdata('about_edit')==1
                        OR $this->session->userdata('finance_list')==1
                        OR $this->session->userdata('news_list')==1
                        OR $this->session->userdata('contact_edit')==1
                        OR $this->session->userdata('car_type_list')==1
                        OR $this->session->userdata('car_top_list')==1
                        OR $this->session->userdata('car_buy_list')==1
                        OR $this->session->userdata('member_list')==1
                        ){?>
                 <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="main" OR empty($this->uri->segment(2)))
                {echo "active";}?>" href="<?php echo base_url('admin_management/main');?>">
                        <i class="fas fa-sliders-h fa-lg fa-fw"></i> หน้าควบคุม
                    </a>
                </li>
                <?php }?>

                <?php if($this->session->userdata('setting_edit')==1){?>
                <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="setting_edit")
                {echo "active";}?>" href="<?php echo base_url('admin_management/setting_edit');?>">
                        <i class="fas fa-link fa-lg fa-fw"></i> ตั้งค่าเว็บไซต์
                    </a>
                </li>
                <?php }?>

                <?php if($this->session->userdata('admin_id_ikko')==1){?>
                <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="admin_list" OR
                    $this->uri->segment(2)=="admin_edit" OR
                    $this->uri->segment(2)=="admin_add" OR
                    $this->uri->segment(2)=="admin_setting")
                {echo "active";}?>" href="<?php echo base_url('admin_management/admin_list');?>">
                        <i class="fas fa-link fa-lg fa-fw"></i> ตั้งค่าผู้ดูแลระบบ
                    </a>
                </li>
                <?php }?>

                <?php if($this->session->userdata('menu_list')==1){?>
                <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="menu_list" 
                OR $this->uri->segment(2)=="menu_add"
                OR $this->uri->segment(2)=="menu_edit")
                {echo "active";}?>" href="<?php echo base_url('admin_management/menu_list');?>">
                        <i class="fas fa-bars fa-lg fa-fw"></i> เมนูหลัก
                    </a>
                </li>
                <?php }?>

                <?php if($this->session->userdata('banner_multi')==1){?>
                <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="banner_upload_image_multi" 
                Or $this->uri->segment(2)=="banner_multi")
                {echo "active";}?>" href="<?php echo base_url('admin_management/banner_multi/1/1');?>">
                        <i class="fas fa-address-book fa-lg fa-fw"></i> แบนเนอร์
                    </a>
                </li>
                <?php }?>

                <?php if($this->session->userdata('about_edit')==1){?>
                 <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="about_edit" )
                {echo "active";}?>" href="<?php echo base_url('admin_management/about_edit');?>">
                        <i class="fas fa-address-card fa-lg fa-fw"></i> เกี่ยวกับเรา
                    </a>
                </li>
                <?php }?>

                <?php if($this->session->userdata('finance_list')==1){?>
                <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="finance_list" 
                OR $this->uri->segment(2)=="finance_add"
                OR $this->uri->segment(2)=="finance_list"
                OR $this->uri->segment(2)=="finance_edit"
                OR $this->uri->segment(2)=="finance_add")
                {echo "active";}?>" href="<?php echo base_url('admin_management/finance_list');?>">
                        <i class="fas fa-clone fa-lg fa-fw"></i> ไฟแนนซ์
                    </a>
                </li>
                <?php }?>

                <?php if($this->session->userdata('news_list')==1){?>
                <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="news_list" 
                OR $this->uri->segment(2)=="news_add"
                OR $this->uri->segment(2)=="news_edit"
                Or $this->uri->segment(2)=="news_edit_image")
                {echo "active";}?>" href="<?php echo base_url('admin_management/news_list');?>">
                        <i class="fas fa-bookmark fa-lg fa-fw"></i> ข่าวสาร
                    </a>
                </li>
                <?php }?>

                 <?php if($this->session->userdata('adv_list')==1){?>
                <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="adv_list" 
                OR $this->uri->segment(2)=="adv_add"
                OR $this->uri->segment(2)=="adv_edit"
                )
                {echo "active";}?>" href="<?php echo base_url('admin_management/adv_list');?>">
                        <i class="fas fa-bookmark fa-lg fa-fw"></i> โฆษณา
                    </a>
                </li>
                <?php }?>

                <?php if($this->session->userdata('contact_edit')==1){?>
               <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="contact_edit"
                    OR $this->uri->segment(2)=="contact_multi"
                    )
                {echo "active";}?>" href="<?php echo base_url('admin_management/contact_edit');?>">
                        <i class="fas fa-users fa-lg fa-fw"></i> ติดต่อเรา
                    </a>
                </li>
                <?php }?>

            </ul>


            <?php if($this->session->userdata('member_list')==1 
            OR $this->session->userdata('car_top_list')==1
            OR $this->session->userdata('car_buy_list')==1
            ){?>

            <h6 class="sidebar-heading px-3 mt-1 mb-3 text-white">
                <span>ข้อมูลผู้ใช้ระบบ</span>
                <a class="d-flex align-items-center text-white">
                    <i class="fas fa-angle-down fa-lg fa-fw"></i>
                </a>
            </h6>
            <ul class="nav flex-column">
                <?php if($this->session->userdata('member_list')==1){?>
                 <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="member_list" 
                        OR $this->uri->segment(2)=="member_add"
                        OR $this->uri->segment(2)=="member_edit"
                        OR $this->uri->segment(2)=="change_password_member")
                        {echo "active";}?>" href="<?php echo base_url('admin_management/member_list');?>">
                                <i class="fas fa-user-plus fa-lg fa-fw"></i> สมาชิก
                    </a>
                </li>
                <?php }?>

                <?php if($this->session->userdata('car_top_list')==1){?>
                 <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="car_top_list" 
                OR $this->uri->segment(2)=="car_top_add"
                OR $this->uri->segment(2)=="car_top_edit")
                {echo "active";}?>" href="<?php echo base_url('admin_management/car_top_list');?>">
                        <i class="fas fa-bus fa-lg fa-fw"></i> ขายรถ
                    </a>
                </li>
                <?php }?>

                <?php if($this->session->userdata('car_buy_list')==1){?>
                <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="car_buy_list" OR $this->uri->segment(2)=="car_buy_view")
                        {echo "active";}?>" href="<?php echo base_url('admin_management/car_buy_list');?>">
                        <i class="fas fa-bus fa-lg fa-fw"></i> ซื้อรถ
                    </a>
                </li>
                <?php }?>

                <?php if($this->session->userdata('contact_edit')==1){?>
                <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="contact_suggestion_list")
                        {echo "active";}?>" href="<?php echo base_url('admin_management/contact_suggestion_list');?>">
                        <i class="fas fa-users fa-lg fa-fw"></i> ข้อเสนอแนะจากผู้ใช้
                    </a>
                </li>
                <?php }?>

            </ul>
            <?php }?>

            <?php if($this->session->userdata('car_type_list')==1 
            OR $this->session->userdata('car_year_list')==1
            OR $this->session->userdata('car_color_list')==1
            OR $this->session->userdata('car_gear_list')==1
            OR $this->session->userdata('car_capacity_list')==1
            OR $this->session->userdata('car_mile_list')==1
            OR $this->session->userdata('car_device_list')==1
            OR $this->session->userdata('finance_list')==1
            ){?>

              <h6 class="sidebar-heading px-3 mt-1 mb-3 text-white">
                <span>จัดการรถยนต์</span>
                <a class="d-flex align-items-center text-white">
                    <i class="fas fa-angle-down fa-lg fa-fw"></i>
                </a>
            </h6>
            <ul class="nav flex-column">
                <?php if($this->session->userdata('car_type_list')==1){?>
                 <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="car_type_list" 
                 OR $this->uri->segment(2)=="car_type_add"
                 OR $this->uri->segment(2)=="car_type_edit"
                 OR $this->uri->segment(2)=="car_list" 
                 OR $this->uri->segment(2)=="car_add"
                 OR $this->uri->segment(2)=="car_edit"
                 OR $this->uri->segment(2)=="car_model_list" 
                 OR $this->uri->segment(2)=="car_model_add"
                 OR $this->uri->segment(2)=="car_model_edit"
                 OR $this->uri->segment(2)=="car_model_des_list" 
                 OR $this->uri->segment(2)=="car_model_des_add"
                 OR $this->uri->segment(2)=="car_model_des_edit"
                 
                 )
                {echo "active";}?>" href="<?php echo base_url('admin_management/car_type_list');?>">
                        <i class="fas fa-car fa-lg fa-fw"></i> หมวดหมู่รถ
                    </a>
                </li>
                <?php }?>
                
                 <!-- <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="car_price_list" 
                        OR $this->uri->segment(2)=="car_price_add"
                        OR $this->uri->segment(2)=="car_price_edit")
                        {echo "active";}?>" href="<?php echo base_url('admin_management/car_price_list');?>">
                        <i class="fas fa-clone fa-lg fa-fw"></i> ราคารถ
                    </a>
                </li> -->
                <?php if($this->session->userdata('car_year_list')==1){?>
                <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="car_year_list" 
                        OR $this->uri->segment(2)=="car_year_add"
                        OR $this->uri->segment(2)=="car_year_edit")
                        {echo "active";}?>" href="<?php echo base_url('admin_management/car_year_list');?>">
                        <i class="fas fa-clone fa-lg fa-fw"></i> ปีผลิต/จดทะเบียน
                    </a>
                </li>
                <?php }?>

                <?php if($this->session->userdata('car_color_list')==1){?>
                <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="car_color_list" 
                        OR $this->uri->segment(2)=="car_color_add"
                        OR $this->uri->segment(2)=="car_color_edit")
                        {echo "active";}?>" href="<?php echo base_url('admin_management/car_color_list');?>">
                        <i class="fas fa-clone fa-lg fa-fw"></i> สีรถ
                    </a>
                </li>
                <?php }?>

                <?php if($this->session->userdata('car_gear_list')==1){?>
                <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="car_gear_list" 
                        OR $this->uri->segment(2)=="car_gear_add"
                        OR $this->uri->segment(2)=="car_gear_edit")
                        {echo "active";}?>" href="<?php echo base_url('admin_management/car_gear_list');?>">
                        <i class="fas fa-clone fa-lg fa-fw"></i> ระบบเกียร์
                    </a>
                </li>
                <?php }?>

                <?php if($this->session->userdata('car_capacity_list')==1){?>
                <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="car_capacity_list" 
                        OR $this->uri->segment(2)=="car_capacity_add"
                        OR $this->uri->segment(2)=="car_capacity_edit")
                        {echo "active";}?>" href="<?php echo base_url('admin_management/car_capacity_list');?>">
                        <i class="fas fa-clone fa-lg fa-fw"></i> ความจุเครื่องยนต์
                    </a>
                </li>
                <?php }?>

                <!-- <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="car_mile_list" 
                        OR $this->uri->segment(2)=="car_mile_add"
                        OR $this->uri->segment(2)=="car_mile_edit")
                        {echo "active";}?>" href="<?php echo base_url('admin_management/car_mile_list');?>">
                        <i class="fas fa-clone fa-lg fa-fw"></i> เลขไมล์
                    </a>
                </li> -->
                <?php if($this->session->userdata('car_device_list')==1){?>
                <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="car_device_list" 
                        OR $this->uri->segment(2)=="car_device_add"
                        OR $this->uri->segment(2)=="car_device_edit")
                        {echo "active";}?>" href="<?php echo base_url('admin_management/car_device_list');?>">
                        <i class="fas fa-clone fa-lg fa-fw"></i> อุปกรณ์รถ
                    </a>
                </li>
                <?php }?>

                <?php if($this->session->userdata('finance_list')==1){?>
                <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="finance_list" 
                        OR $this->uri->segment(2)=="finance_add"
                        OR $this->uri->segment(2)=="finance_edit")
                        {echo "active";}?>" href="<?php echo base_url('admin_management/finance_list');?>">
                        <i class="fas fa-clone fa-lg fa-fw"></i> ไฟแนนซ์
                    </a>
                </li>
                <?php }?>

                <?php if($this->session->userdata('bank_list')==1){?>
                <li class="nav-item">
                    <a class="nav-link <?php if($this->uri->segment(2)=="bank_list" 
                        OR $this->uri->segment(2)=="bank_add"
                        OR $this->uri->segment(2)=="bank_edit"
                        OR $this->uri->segment(2)=="bank_edit_image")
                        {echo "active";}?>" href="<?php echo base_url('admin_management/bank_list');?>">
                        <i class="fas fa-clone fa-lg fa-fw"></i> ธนาคาร/ดอกเบี้ย
                    </a>
                </li>
                <?php }?>


            </ul>
            <?php }?>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div id="sidebar" class="col-md-2 d-none d-md-block bg-slide sidebar">
                <div class="sidebar-sticky">

                    <?php if($this->session->userdata('menu_list')==1 OR
                    $this->session->userdata('setting_edit')==1
                    OR $this->session->userdata('banner_multi')==1
                    OR $this->session->userdata('about_edit')==1
                    OR $this->session->userdata('finance_list')==1
                    OR $this->session->userdata('news_list')==1
                    OR $this->session->userdata('contact_edit')==1
                    OR $this->session->userdata('car_type_list')==1
                    OR $this->session->userdata('car_top_list')==1
                    OR $this->session->userdata('car_buy_list')==1
                    OR $this->session->userdata('member_list')==1
                    ){?>
                    <div class="sidebar-heading px-3 mt-1 mb-3">
                        <a data-toggle="collapse" href="#sub-item-1" class="text-dark" role="button" aria-expanded="true">
                            <div class="row">
                                <div class="col-md-9">
                                    <span>ระบบพื้นฐาน</span>
                                </div>
                                <div class="col-md-3">
                                    <span><i class="bx-fw bx bx-chevron-down"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                  

                    <ul id="sub-item-1" class="fix-nav collapse <?php if($this->uri->segment(2)=="main" OR $this->uri->segment(2)=="setting_edit" OR $this->uri->segment(2)=="admin_edit"  OR $this->uri->segment(2)=="admin_add"  OR $this->uri->segment(2)=="admin_list" OR $this->uri->segment(2)=="admin_setting" OR empty($this->uri->segment(2))) {echo "show";}?>">

                        <?php if($this->session->userdata('menu_list')==1 
                        OR $this->session->userdata('banner_multi')==1
                        OR $this->session->userdata('about_edit')==1
                        OR $this->session->userdata('finance_list')==1
                        OR $this->session->userdata('news_list')==1
                        OR $this->session->userdata('contact_edit')==1
                        OR $this->session->userdata('car_type_list')==1
                        OR $this->session->userdata('car_top_list')==1
                        OR $this->session->userdata('car_buy_list')==1
                        OR $this->session->userdata('member_list')==1
                        ){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="main" OR empty($this->uri->segment(2)))
                                {echo "active";}?>" href="<?php echo base_url('admin_management/main');?>">
                                <i class="bx-fw bx bxs-pie-chart"></i> หน้าแรก
                            </a>
                        </li>
                        <?php }?>

                        <?php if($this->session->userdata('setting_edit')==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="setting_edit")
                        {echo "active";}?>" href="<?php echo base_url('admin_management/setting_edit');?>">
                                <i class="bx-fw bx bxs-cog"></i> ตั้งค่าเว็บไซต์
                            </a>
                        </li>
                        <?php }?>

                        <?php if($this->session->userdata('admin_id_ikko')==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="admin_list" OR
                            $this->uri->segment(2)=="admin_edit" OR
                            $this->uri->segment(2)=="admin_add" OR
                            $this->uri->segment(2)=="admin_setting")
                        {echo "active";}?>" href="<?php echo base_url('admin_management/admin_list');?>">
                                <i class="fas fa-link fa-lg fa-fw"></i> ตั้งค่าผู้ดูแลระบบ
                            </a>
                        </li>
                        <?php }?>
                    </ul>
                    <?php }?>


                    <?php if($this->session->userdata('menu_list')==1 
                    OR $this->session->userdata('banner_multi')==1
                    OR $this->session->userdata('about_edit')==1
                    OR $this->session->userdata('finance_list')==1
                    OR $this->session->userdata('news_list')==1
                    OR $this->session->userdata('contact_edit')==1
                    ){?>

                    <div class="sidebar-heading px-3 mt-1 mb-3">
                        <a data-toggle="collapse" href="#sub-item-2" class="text-dark" role="button" aria-expanded="true">
                            <div class="row">
                                <div class="col-md-9">
                                    <span>ระบบหลัก</span>
                                </div>
                                <div class="col-md-3">
                                    <span><i class="bx-fw bx bx-chevron-down"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <ul id="sub-item-2" class="fix-nav collapse <?php if($this->uri->segment(2)=="menu_list" 
                        OR $this->uri->segment(2)=="menu_add"
                        OR $this->uri->segment(2)=="menu_edit"
                        OR $this->uri->segment(2)=="banner_upload_image_multi" 
                        OR $this->uri->segment(2)=="banner_multi"
                        OR $this->uri->segment(2)=="about_edit"
                        OR $this->uri->segment(2)=="about_upload_image_multi" 
                        OR $this->uri->segment(2)=="about_multi"
                        OR $this->uri->segment(2)=="news_list" 
                        OR $this->uri->segment(2)=="news_add"
                        OR $this->uri->segment(2)=="news_edit"
                        OR $this->uri->segment(2)=="news_edit_image"
                        OR $this->uri->segment(2)=="news_upload_image_multi" 
                        OR $this->uri->segment(2)=="news_multi"
                        OR $this->uri->segment(2)=="adv_list" 
                        OR $this->uri->segment(2)=="adv_add"
                        OR $this->uri->segment(2)=="adv_edit"
                        OR $this->uri->segment(2)=="contact_edit"
                        OR $this->uri->segment(2)=="contact_multi"

                        OR $this->uri->segment(2)=="news_list"
                        OR $this->uri->segment(2)=="news_add"
                        OR $this->uri->segment(2)=="news_edit"
                        )
                        {echo "show";}?>">

                        <?php if($this->session->userdata('menu_list')==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="menu_list" OR $this->uri->segment(2)=="menu_add" OR $this->uri->segment(2)=="menu_edit") {echo "active";}?>" href="<?php echo base_url('admin_management/menu_list');?>">
                                <i class="bx-fw bx bx-menu"></i> จัดการแถบเมนู
                            </a>
                        </li>
                        <?php }?>

                        <?php if($this->session->userdata('banner_multi')==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="banner_upload_image_multi" OR $this->uri->segment(2)=="banner_multi") {echo "active";}?>" href="<?php echo base_url('admin_management/banner_multi/1/1');?>">
                                <i class="bx-fw bx bxs-collection"></i> จัดการแบนเนอร์
                            </a>
                        </li>
                        <?php }?>

                        <?php if($this->session->userdata('about_edit')==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="about_edit" OR $this->uri->segment(2)=="about_multi" OR $this->uri->segment(2)=="about_upload_image_multi") {echo "active";}?>" href="<?php echo base_url('admin_management/about_edit');?>">
                            <i class="bx-fw bx bxs-info-circle"></i> จัดการเกี่ยวกับเรา
                            </a>
                        </li>
                        <?php }?>

                        <?php if($this->session->userdata('news_list')==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="news_list" 
                        OR $this->uri->segment(2)=="news_add"
                        OR $this->uri->segment(2)=="news_edit"
                        OR $this->uri->segment(2)=="news_edit_image"
                        OR $this->uri->segment(2)=="news_multi"
                        OR $this->uri->segment(2)=="news_upload_image_multi")
                        {echo "active";}?>" href="<?php echo base_url('admin_management/news_list');?>">
                                <i class="bx-fw bx bxs-news"></i> จัดการข่าวสาร
                            </a>
                        </li>
                        <?php }?>

                        <?php if($this->session->userdata('adv_list')==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="adv_list" 
                        OR $this->uri->segment(2)=="adv_add"
                        OR $this->uri->segment(2)=="adv_edit"
                        )
                        {echo "active";}?>" href="<?php echo base_url('admin_management/adv_list');?>">
                                <i class="bx-fw bx bxs-news"></i> จัดการโฆษณา
                            </a>
                        </li>
                        <?php }?>


                         <?php if($this->session->userdata('contact_edit')==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="contact_edit" OR $this->uri->segment(2)=="contact_multi")
                            {echo "active";}?>" href="<?php echo base_url('admin_management/contact_edit');?>">
                                <i class="bx-fw bx bxs-contact"></i> จัดการช่องทางติดต่อ
                            </a>
                        </li>
                        <?php }?>
                    </ul>
                    <?php }?>


                    <?php if($this->session->userdata('member_list')==1 
                    OR $this->session->userdata('car_buy_list')==1
                    OR $this->session->userdata('car_top_list')==1
                    OR $this->session->userdata('contact_edit')==1
                   
                    ){?>

                    <div class="sidebar-heading px-3 mt-1 mb-3">
                        <a data-toggle="collapse" href="#sub-item-3" class="text-dark" role="button" aria-expanded="true">
                            <div class="row">
                                <div class="col-md-9">
                                    <span>ฐานข้อมูลระบบ</span>
                                </div>
                                <div class="col-md-3">
                                    <span><i class="bx-fw bx bx-chevron-down"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <ul id="sub-item-3" class="fix-nav collapse <?php if($this->uri->segment(2)=="member_list" 
                                OR $this->uri->segment(2)=="member_add"
                                OR $this->uri->segment(2)=="member_edit"
                                OR $this->uri->segment(2)=="change_password_member"
                                OR $this->uri->segment(2)=="car_top_list" 
                                OR $this->uri->segment(2)=="car_top_add"
                                OR $this->uri->segment(2)=="car_top_edit_send_email"
                                OR $this->uri->segment(2)=="car_top_edit"
                                OR $this->uri->segment(2)=="car_buy_list" 
                                OR $this->uri->segment(2)=="car_buy_view"
                                OR $this->uri->segment(2)=="gallery_multi"
                                OR $this->uri->segment(2)=="gallery_upload_image_multi"
                                OR $this->uri->segment(2)=="file_multi"
                                OR $this->uri->segment(2)=="file_upload_image_multi"
                                OR $this->uri->segment(2)=="contact_suggestion_list"
                                OR $this->uri->segment(2)=="contact_suggestion_view")
                                {echo "show";}?>">

                        <?php if($this->session->userdata('member_list')==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="member_list" 
                                OR $this->uri->segment(2)=="member_add"
                                OR $this->uri->segment(2)=="member_edit"
                                OR $this->uri->segment(2)=="change_password_member")
                                {echo "active";}?>" href="<?php echo base_url('admin_management/member_list');?>">
                                    <i class="bx-fw bx bxs-user-circle"></i> ข้อมูลสมาชิก
                            </a>
                        </li>
                        
                        <?php }?>

                        <?php if($this->session->userdata('car_top_list')==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="car_top_list" 
                        OR $this->uri->segment(2)=="car_top_add"
                        OR $this->uri->segment(2)=="car_top_edit"
                        OR $this->uri->segment(2)=="car_top_edit_send_email"
                        OR $this->uri->segment(2)=="gallery_multi"
                        OR $this->uri->segment(2)=="gallery_upload_image_multi"
                        OR $this->uri->segment(2)=="file_multi"
                        OR $this->uri->segment(2)=="file_upload_image_multi")
                        {echo "active";}?>" href="<?php echo base_url('admin_management/car_top_list');?>">
                                <i class="bx-fw bx bxs-car"></i> ข้อมูลการขายรถยนต์&nbsp;<b style="color: red;">(<?php echo $count_member;?>)</b>
                            </a>
                        </li>
                        <?php }?>


                        <?php if($this->session->userdata('car_buy_list')==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="car_buy_list" OR $this->uri->segment(2)=="car_buy_view")
                                {echo "active";}?>" href="<?php echo base_url('admin_management/car_buy_list');?>">
                                <i class="bx-fw bx bxs-car"></i> ข้อมูลการซื้อรถยนต์&nbsp;<b style="color: red;">(<?php echo $check_count_comment;?>)</b>
                            </a>
                        </li>
                        <?php }?>

                        <?php if($this->session->userdata('contact_edit')==1){?>
                         <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="contact_suggestion_list")
                                {echo "active";}?>" href="<?php echo base_url('admin_management/contact_suggestion_list');?>">
                                    <i class="fas fa-users fa-lg fa-fw"></i> ข้อเสนอแนะจากผู้ใช้&nbsp;<b style="color: red;">(<?php echo $check_count_comment_contact;?>)</b>
                            </a>
                        </li>
                         <?php }?>

                    </ul>
                    <?php }?>

                    <?php if($this->session->userdata('car_type_list')==1 
                    OR $this->session->userdata('car_price_list')==1
                    OR $this->session->userdata('car_year_list')==1
                    OR $this->session->userdata('car_color_list')==1
                    OR $this->session->userdata('car_gear_list')==1
                    OR $this->session->userdata('car_capicity_list')==1
                    OR $this->session->userdata('car_mile_list')==1
                    OR $this->session->userdata('car_device_list')==1
                    ){?>

                    <div class="sidebar-heading px-3 mt-1 mb-3">
                        <a data-toggle="collapse" href="#sub-item-4" class="text-dark" role="button" aria-expanded="true">
                            <div class="row">
                                <div class="col-md-9">
                                    <span>จัดการรถยนต์</span>
                                </div>
                                <div class="col-md-3">
                                    <span><i class="bx-fw bx bx-chevron-down"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <ul id="sub-item-4" class="fix-nav collapse <?php if($this->uri->segment(2)=="car_type_list" 
                        OR $this->uri->segment(2)=="car_type_add" OR $this->uri->segment(2)=="car_type_edit"
                        OR $this->uri->segment(2)=="car_list" OR $this->uri->segment(2)=="car_add" OR $this->uri->segment(2)=="car_edit" OR $this->uri->segment(2)=="car_model_list" 
                        OR $this->uri->segment(2)=="car_model_add" OR $this->uri->segment(2)=="car_model_edit" OR $this->uri->segment(2)=="car_model_des_list"  OR $this->uri->segment(2)=="car_model_des_add"
                        OR $this->uri->segment(2)=="car_model_des_edit" OR $this->uri->segment(2)=="finance_edit" OR $this->uri->segment(2)=="finance_add" OR $this->uri->segment(2)=="car_price_list"
                        OR $this->uri->segment(2)=="car_price_add" OR $this->uri->segment(2)=="car_price_edit" OR $this->uri->segment(2)=="car_year_list" OR $this->uri->segment(2)=="car_year_add"
                        OR $this->uri->segment(2)=="car_year_edit" OR $this->uri->segment(2)=="car_color_list" OR $this->uri->segment(2)=="car_color_add" OR $this->uri->segment(2)=="car_color_edit" 
                        OR $this->uri->segment(2)=="car_gear_list" OR $this->uri->segment(2)=="car_gear_add" OR $this->uri->segment(2)=="car_gear_edit"
                        OR $this->uri->segment(2)=="car_capacity_list"  OR $this->uri->segment(2)=="car_capacity_add" OR $this->uri->segment(2)=="car_capacity_edit" OR $this->uri->segment(2)=="car_mile_list" 
                        OR $this->uri->segment(2)=="car_mile_add" OR $this->uri->segment(2)=="car_mile_edit" OR $this->uri->segment(2)=="car_device_list"  OR $this->uri->segment(2)=="car_device_add"
                        OR $this->uri->segment(2)=="car_device_edit")
                        {echo "show";}?>">

                        <?php if($this->session->userdata('car_type_list')==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="car_type_list" 
                                OR $this->uri->segment(2)=="car_type_add"
                                OR $this->uri->segment(2)=="car_type_edit"
                                OR $this->uri->segment(2)=="car_list" 
                                OR $this->uri->segment(2)=="car_add"
                                OR $this->uri->segment(2)=="car_edit"
                                OR $this->uri->segment(2)=="car_model_list" 
                                OR $this->uri->segment(2)=="car_model_add"
                                OR $this->uri->segment(2)=="car_model_edit"
                                OR $this->uri->segment(2)=="car_model_des_list" 
                                OR $this->uri->segment(2)=="car_model_des_add"
                                OR $this->uri->segment(2)=="car_model_des_edit")
                        {echo "active";}?>" href="<?php echo base_url('admin_management/car_type_list');?>">
                                <i class="bx-fw bx bx-poll"></i> จัดการหมวดหมู่รถยนต์
                            </a>
                        </li>
                        <?php }?>

                        <?php if($this->session->userdata('car_price_list')==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="car_price_list" 
                                OR $this->uri->segment(2)=="car_price_add"
                                OR $this->uri->segment(2)=="car_price_edit")
                                {echo "active";}?>" href="<?php echo base_url('admin_management/car_price_list');?>">
                                <i class="bx-fw bx bxs-dollar-circle"></i> จัดการราคารถยนต์
                            </a>
                        </li> 
                        <?php }?>

                        <?php if($this->session->userdata('car_year_list')==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="car_year_list" 
                                OR $this->uri->segment(2)=="car_year_add"
                                OR $this->uri->segment(2)=="car_year_edit")
                                {echo "active";}?>" href="<?php echo base_url('admin_management/car_year_list');?>">
                                <i class="bx-fw bx bx-calendar"></i> จัดการปีผลิต
                            </a>
                        </li>
                        <?php }?>

                        <?php if($this->session->userdata('car_color_list')==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="car_color_list" 
                                OR $this->uri->segment(2)=="car_color_add"
                                OR $this->uri->segment(2)=="car_color_edit")
                                {echo "active";}?>" href="<?php echo base_url('admin_management/car_color_list');?>">
                                <i class="bx-fw bx bx-color-fill"></i> จัดการสีรถยนต์
                            </a>
                        </li>
                        <?php }?>


                        <?php if($this->session->userdata('car_gear_list')==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="car_gear_list" 
                                OR $this->uri->segment(2)=="car_gear_add"
                                OR $this->uri->segment(2)=="car_gear_edit")
                                {echo "active";}?>" href="<?php echo base_url('admin_management/car_gear_list');?>">
                                <i class="bx-fw bx bxs-wrench"></i> จัดการระบบเกียร์
                            </a>
                        </li>
                        <?php }?>

                        <?php if($this->session->userdata('car_capacity_list')==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="car_capacity_list" 
                                OR $this->uri->segment(2)=="car_capacity_add"
                                OR $this->uri->segment(2)=="car_capacity_edit")
                                {echo "active";}?>" href="<?php echo base_url('admin_management/car_capacity_list');?>">
                                <i class="bx-fw bx bxs-filter-alt"></i> จัดการความจุเครื่องยนต์
                            </a>
                        </li>
                        <?php }?>

                        <?php if($this->session->userdata('car_mile_list')==1){?>
                         <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="car_mile_list" 
                                OR $this->uri->segment(2)=="car_mile_add"
                                OR $this->uri->segment(2)=="car_mile_edit")
                                {echo "active";}?>" href="<?php echo base_url('admin_management/car_mile_list');?>">
                                <i class="bx-fw bx bx-dashboard"></i> จัดการเลขไมล์
                            </a>
                        </li> 
                        <?php }?>

                        <?php if($this->session->userdata('car_device_list')==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="car_device_list" 
                                OR $this->uri->segment(2)=="car_device_add"
                                OR $this->uri->segment(2)=="car_device_edit")
                                {echo "active";}?>" href="<?php echo base_url('admin_management/car_device_list');?>">
                                <i class="bx-fw bx bxs-layer"></i> จัดการอุปกรณ์รถยนต์
                            </a>
                        </li>
                        <?php }?>
                    </ul>

                    <?php }?>



                    <?php if($this->session->userdata('finance_list')==1 OR $this->session->userdata('bank_list')==1){?>

                    <div class="sidebar-heading px-3 mt-1 mb-3">
                        <a data-toggle="collapse" href="#sub-item-5" class="text-dark" role="button" aria-expanded="true">
                            <div class="row">
                                <div class="col-md-9">
                                    <span>จัดการไฟแนนซ์</span>
                                </div>
                                <div class="col-md-3">
                                    <span><i class="bx-fw bx bx-chevron-down"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <ul id="sub-item-5" class="fix-nav collapse <?php if($this->uri->segment(2)=="finance_list" 
                                OR $this->uri->segment(2)=="finance_add"
                                OR $this->uri->segment(2)=="finance_list"
                                OR $this->uri->segment(2)=="finance_edit"
                                OR $this->uri->segment(2)=="finance_add"
                                OR $this->uri->segment(2)=="bank_list" 
                                OR $this->uri->segment(2)=="bank_add"
                                OR $this->uri->segment(2)=="bank_edit"
                                OR $this->uri->segment(2)=="bank_edit_image")
                                {echo "show";}?>">

                        <?php if($this->session->userdata('finance_list')==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="finance_list" 
                                OR $this->uri->segment(2)=="finance_add"
                                OR $this->uri->segment(2)=="finance_list"
                                OR $this->uri->segment(2)=="finance_edit"
                                OR $this->uri->segment(2)=="finance_add")
                                {echo "active";}?>" href="<?php echo base_url('admin_management/finance_list');?>">
                              <i class="bx-fw bx bxs-flame"></i> รายละเอียดไฟแนนซ์
                            </a>
                        </li>
                        <?php }?>

                        <?php if($this->session->userdata('bank_list')==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(2)=="bank_list" 
                                OR $this->uri->segment(2)=="bank_add"
                                OR $this->uri->segment(2)=="bank_edit"
                                OR $this->uri->segment(2)=="bank_edit_image")
                                {echo "active";}?>" href="<?php echo base_url('admin_management/bank_list');?>">
                                <i class="bx-fw bx bx-credit-card"></i> จัดการข้อมูลธนาคาร
                            </a>
                        </li>
                        <?php }?>
                    </ul>
                    <?php }?>
                </div>        
            </div>
            <main id="main" role="main" class="col-md-10 ml-sm-auto col-lg-10 px-3"> 
                <div class="wrap">

    
<?php $_SESSION['link'] =  @base_url($_SERVER['PATH_INFO']);?>
<?php $_SESSION['url'] = @$_SERVER['HTTP_REFERER'];?>


    
<?php $link =  @base_url($_SERVER['PATH_INFO']); //ลิ้งค์ปัจจุบัน?> 
<?php $url = @$_SERVER['HTTP_REFERER']; //ลิ้งค์ก่อนหน้า?>
<?php $link_admin = @base_url($_SERVER['PATH_INFO']); //ลิ้งค์admin?>
<?php $admin = $this->uri->segment(1); //check admin?>
<?php $path = @$_SERVER['HTTP_REFERER'];?>


<input type="hidden" id="link" name="" value="<?php echo $link;?>" />
<input type="hidden" id="url" name="" value="<?php echo $url;?>" />
<input type="hidden" id="path" name="" value="<?php echo $path;?>" />
<input type="hidden" id="admin" name="" value="<?php echo $admin;?>" />

<script>
                
    var link = $("#link").val();
    var url = $("#url").val();
    var path = $("#path").val();
    var admin = $("#admin").val();


        
 if ( history.replaceState ) history.replaceState( {}, document.title, window.location.href);



jQuery(document).ready(function($) {

  if (window.history && window.history.replaceState) {
      //เมื่อผู้ใช้กดปุ่ม back บน browser 
      $(window).on('popstate', function() {
      if(admin=="admin"){
        if(link==url){
            window.history.back(-1);
        }else{

            window.location.href = url;
        }
      }

      if(link==url){
        window.history.back(-1);
      }else{
        window.location.href = url;
      }
      

    });

  }
});




  
    // if(admin=="admin"){

    //     if(link!==url){
    //       history.pushState(null, null, path);
    //       window.addEventListener('popstate', function(event) {
    //       history.pushState(null, null, path);
    //         });
    //     }else{
    //          history.pushState(null, null, path);
    //       window.addEventListener('popstate', function(event) {
    //       history.pushState(null, null, path);
    //         });
    //     }

    // }else{

    //   if(link==url){

    //       history.pushState(null, null, path);
    //       window.addEventListener('popstate', function(event) {
    //       history.pushState(null, null, path);
    //     });
    //   }

    // }

    

</script>