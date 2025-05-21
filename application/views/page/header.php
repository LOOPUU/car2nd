<?php
 ob_start();
 header("Cache-Control: no-cache, must-revalidate"); 
?>

<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width,initial-scale=1,shrink-to-fit=no"
    />
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-color" content="#FFFFFF" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta
      http-equiv="Cache-Control"
      content="no-cache, no-store, must-revalidate"
    />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta http-equiv="X-UA-Compatible" content="IE=11,IE=10, IE=9" />
    <meta
      name="viewport"
      content="width=device-width,initial-scale=1,user-scalable=0"
    />
    <meta name="description" content="เอ็มอีซี มอเตอร์เซ็นเตอร์ | Postsicars" />
    <meta name="keywords" content="เอ็มอีซี มอเตอร์เซ็นเตอร์ | Postsicars" />
    <!-- Favicon -->
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
    <meta
      name="application-name"
      content="<?php if($this->lang->line("set_lang")=="th"){echo $setting['setting_top_th'];}else{echo $setting['setting_top_en'];}?><?php if($this->lang->line("set_lang")=="th"){echo '('.$setting['setting_des_th'].')';}else{echo '('.$setting['setting_des_en'].')';}?>"
    />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta
      name="msapplication-TileImage"
      content="<?php echo base_url('frontend');?>/assets/favicons/mstile-144x144.png"
    />
    <meta
      name="msapplication-square70x70logo"
      content="<?php echo base_url('frontend');?>/assets/favicons/mstile-70x70.png"
    />
    <meta
      name="msapplication-square150x150logo"
      content="<?php echo base_url('frontend');?>/assets/favicons/mstile-150x150.png"
    />
    <meta
      name="msapplication-wide310x150logo"
      content="<?php echo base_url('frontend');?>/assets/favicons/mstile-310x150.png"
    />
    <meta
      name="msapplication-square310x310logo"
      content="<?php echo base_url('frontend');?>/assets/favicons/mstile-310x310.png"
    />
    <!-- End of Favicon -->
    <link rel="stylesheet" href="<?php echo base_url('frontend');?>/assets/css/carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('frontend');?>/assets/css/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('frontend');?>/assets/css/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('frontend');?>/assets/css/boxicons.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('frontend');?>/assets/css/ribbon.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('frontend');?>/assets/css/styles.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('frontend');?>/assets/css/steps.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('frontend');?>/assets/css/custom.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('frontend');?>/assets/css/section.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('frontend');?>/assets/css/button.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('frontend');?>/assets/css/input.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('frontend');?>/assets/css/bulma-tagsinput.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('frontend');?>/assets/css/card.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('frontend');?>/assets/css/tools.css" />
    <title><?php if($this->lang->line("set_lang")=="th"){echo $setting['setting_top_th'];}else{echo $setting['setting_top_en'];}?></title>

    <!-- SEO Meta -->
    <meta name="keywords" content="<?php if($this->lang->line("set_lang")=="th"){echo $setting['seo_keyword_th'];}else{echo $setting['seo_keyword_en'];}?>" />
    <meta name="description" content="<?php if($this->lang->line("set_lang")=="th"){echo $setting['seo_descript_th'];}else{echo $setting['seo_descript_en'];}?>" />

    <!-- google bot -->
    <link rel="canonical" href="<?php echo base_url('frontend');?>" />
    <!-- End of SEO Meta -->
    
    <!-- Render Javascript -->
    <script type="text/javascript" src="<?php echo base_url('frontend');?>/assets/js/jquery.min.js"></script>
    <script
      type="text/javascript"
      src="<?php echo base_url('frontend');?>/assets/js/jquery.migrate.min.js"
    ></script>
    <script type="text/javascript" src="<?php echo base_url('frontend');?>/assets/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('frontend');?>/assets/js/Drift.js"></script>
    
  </head>
<body>

    <!-- Navigation For Desktop Only!!! -->
    <nav
      class="navbar is-transparent has-border-bottom is-hidden-mobile is-hidden-tablet-only"
      role="navigation"
      aria-label="main navigation"
      style="min-height: 2.25rem;"
    >
      <div class="container" style="min-height: 2.25rem;">
        <div class="navbar-menu">
          <div class="navbar-end">
            <?php if(!empty($check_login_logout)){?>
               <a class="navbar-item" href="<?php echo base_url('sale');?>">
                <span class="icon">
                  <i class="bx bxs-user"></i>
                </span>
                <span> <?php echo $data_member['name'];?> </span>
              </a>
            <?php } ?>
            <?php if(!empty($check_login_logout)){?>
            <a class="navbar-item" href="<?php echo base_url('member/logout');?>">
              <span class="icon">
                <i class="bx bx-log-out"></i>
              </span>
              <span> <?php echo $this->lang->line("logout");?> </span>
            </a>
            <?php }else{?>
            <a class="navbar-item" href="<?php echo base_url('member');?>">
              <span class="icon">
                <i class="bx bx-log-in"></i>
              </span>
              <span> <?php echo $this->lang->line("login");?> </span>
            </a>
            <?php }?>
            <?php $page = $this->uri->segment(1);?>
            <?php 
              if($page == "" OR $page == "home" OR $page == "home."){$p = "home";}elseif ($page == "about" OR $page == "about.") {$p = "about";
              }elseif ($page == "buy" OR $page == "buy."){$p = "buy";}elseif ($page == "sale" OR $page == "sale."){$p = "sale";
              }elseif ($page == "finance" OR $page == "finance."){$p = "finance";}elseif ($page == "news" OR $page == "news."){$p = "news";
              }elseif ($page == "contact" OR $page == "contact."){$p = "contact";}elseif ($page == "member" OR $page == "member."){$p = "member";
              }elseif ($page == "register" OR $page == "register."){$p = "register";}elseif ($page == "department" OR $page == "department."){$p = "department";}
            ?>
            <?php if($this->lang->line("set_lang")=="th") { ?>
              <a class="navbar-item" href="<?php echo base_url(''.$p.'').'/change/english';?>"><span> EN </span> </a>
            <?php } else { ?>
              <a class="navbar-item" href="<?php echo base_url(''.$p.'').'/change/thailand';?>"><span> TH </span> </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </nav>

    <!-- Navigation For Mobile, Tablet -->
    <nav
      class="navbar has-shadow-orange is-spaced brand-postsicars"
      role="navigation"
      aria-label="main navigation"
      style="padding: 0"
    >
      <div class="container">
        <div class="navbar-brand">
          <a
            class="navbar-item is-hidden-mobile is-hidden-tablet-only"
            href="<?php echo base_url();?>"
          >
            <img
              src="<?php echo base_url('frontend');?>/assets/images/contact-logo.png"
              alt="Logo"
              style="max-height: 4rem;"
            />
          </a>
          <a class="navbar-item is-hidden-desktop" href="<?php echo base_url();?>">
            <img src="<?php echo base_url('frontend');?>/assets/images/contact-logo.png" alt="Logo" />
          </a>
          <?php $page = $this->uri->segment(1);?>
          <?php 
            if($page == "" OR $page == "home"){$p = "home";}elseif ($page == "about") {$p = "about";
            }elseif ($page == "buy"){$p = "buy";}elseif ($page == "sale"){$p = "sale";
            }elseif ($page == "finance"){$p = "finance";}elseif ($page == "news"){$p = "news";
            }elseif ($page == "contact"){$p = "contact";}elseif ($page == "member"){$p = "member";
            }elseif ($page == "register"){$p = "register";}elseif ($page == "department"){$p = "department";}
          ?>
          <?php if($this->lang->line("set_lang")=="th") { ?>
            <a class="navbar-item is-hidden-desktop" href="<?php echo base_url(''.$p.'').'/change/english';?>"><span> EN </span> </a>
          <?php } else { ?>
            <a class="navbar-item is-hidden-desktop" href="<?php echo base_url(''.$p.'').'/change/thailand';?>"><span> TH </span> </a>
          <?php } ?>
          <a
            role="button"
            class="navbar-burger burger"
            aria-label="menu"
            aria-expanded="false"
            data-target="navbarBottom"
          >
            <span aria-hidden="true"></span> <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>

        <div id="navbarBottom" class="navbar-menu">
          <div class="navbar-start is-hidden-desktop">
            <?php if(!empty($check_login_logout)){?>
              <a class="navbar-item" href="<?php echo base_url('sale');?>">
              <span class="icon">
                <i class="bx bxs-user"></i>
              </span>
              <span> <?php echo $data_member['name'];?> </span>
            </a>
            <?php } ?>
            <?php if(!empty($check_login_logout)){?>
            <a class="navbar-item" href="<?php echo base_url('member/logout');?>">
              <span class="icon">
                <i class="bx bx-log-out"></i>
              </span>
              <span> <?php echo $this->lang->line("logout");?> </span>
            </a>
            <?php }else{?>
            <a class="navbar-item" href="<?php echo base_url('member');?>">
              <span class="icon">
                <i class="bx bx-log-in"></i>
              </span>
              <span> <?php echo $this->lang->line("login");?> </span>
            </a>
            <?php }?>
          </div>
          <div class="dropdown-divider is-hidden-desktop"></div>
          <div class="navbar-end">
            <?php foreach($menu as $row){?>
              <?php 
                if($row->route_path == "home"){
                  $hyperLink = "home";
                }elseif ($row->route_path == "buy") {
                  $hyperLink = "buy?page=1&&offet=0";
                }elseif ($row->route_path == "sale"){
                  $hyperLink = "sale";
                }elseif ($row->route_path == "finance"){
                  $hyperLink = "finance";
                }elseif ($row->route_path == "news"){
                  $hyperLink = "news?page=1&&offset=0";
                }elseif ($row->route_path == "contact"){
                  $hyperLink = "contact";
                }
              ?>
            <a class="navbar-item <?php if($page==$row->route_path){echo "is-active";}?>" href="<?php echo base_url('');?><?php echo $hyperLink;?>"> <?php if($this->lang->line("set_lang")=="th"){echo $row->name_th;}else{echo $row->name_en;}?></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </nav>
 

<?php if(!empty($_SERVER['PATH_INFO'])){?>

<?php $_SESSION['page_buy'] = $_SERVER['PATH_INFO'].'?'.$_SERVER['QUERY_STRING'];?>
<?php $_SESSION['page_news'] = $_SERVER['PATH_INFO'].'?'.$_SERVER['QUERY_STRING'];?>
<?php $_SESSION['page_sale'] = $_SERVER['PATH_INFO'].'?'.$_SERVER['QUERY_STRING'];?>
<?php $_SESSION['page_contact'] = $_SERVER['PATH_INFO'].'?'.$_SERVER['QUERY_STRING'];?>
<?php $_SESSION['page_member'] = $_SERVER['PATH_INFO'].'?'.$_SERVER['QUERY_STRING'];?>


<?php } ?>

<script type="text/javascript">
$(document).ready(function() {
    $('a[href*=\\#]').on('click', function(e){
        e.preventDefault();
        $('html, body').animate({
            scrollTop : $(this.hash).offset().top
        }, 500);
    });
});

</script>




<?php $_SESSION['link'] =  @base_url($_SERVER['PATH_INFO']);?>
<?php $_SESSION['url'] = @$_SERVER['HTTP_REFERER'];?>

<?php 
  if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
    $protocol = 'https://';
  } else {
    $protocol = 'http://';
  }?>


    
<?php $link =  @($protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); //ลิ้งค์ปัจจุบัน?> 
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
        if(link!==url){
           window.location.href = url; 
        }else{
            window.history.back(-1);
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



</script>