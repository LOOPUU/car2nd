

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#23282D">
    <meta name="msapplication-TileColor" content="#23282D" />
    <title>ระบบหลังบ้าน [POSTSICAR]</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('');?>backend/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('');?>backend/css/toastr.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('');?>backend/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('');?>backend/css/login.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('');?>backend/css/tools.css">
</head>

<body class="page-login">

<section class="hero is-fullheight">
  <div class="hero-body">
        <div class="container">
            <div class="w-lg-30 mx-auto p-top">
                <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm3.61 6.34c1.07 0 1.93.86 1.93 1.93s-.86 1.93-1.93 1.93-1.93-.86-1.93-1.93c-.01-1.07.86-1.93 1.93-1.93zm-6-1.58c1.3 0 2.36 1.06 2.36 2.36s-1.06 2.36-2.36 2.36-2.36-1.06-2.36-2.36c0-1.31 1.05-2.36 2.36-2.36zm0 9.13v3.75c-2.4-.75-4.3-2.6-5.14-4.96 1.05-1.12 3.67-1.69 5.14-1.69.53 0 1.2.08 1.9.22-1.64.87-1.9 2.02-1.9 2.68zM12 20c-.27 0-.53-.01-.79-.04v-4.07c0-1.42 2.94-2.13 4.4-2.13 1.07 0 2.92.39 3.84 1.15C18.28 17.88 15.39 20 12 20z"/></svg>
                </div>
                <div class="form-login">
                    <center><h6><b>ระบบหลังบ้าน  [ POSTSICAR ]</b></h6></center>
                   <br>
                   <form name="myForm" action="<?php echo base_url('admin');?>" onsubmit="return validateForm()" method="post">
                   <!--  <?php echo form_open("admin"); ?>  -->
                        <div class="form-group">
                            <label for="account_user">ชื่อผู้ใช้งาน</label>
                            <input name="account_user" id="account_user" type="text" class="form-control" autocomplete="account_user">
                        </div>
                        <div class="form-group">
                            <label for="pass">รหัสผ่าน</label>
                            <input name="pass" id="pass" type="password" class="form-control" autocomplete="pass">
                        </div>

                        <input type="submit" value="เข้าสู่ระบบ" name="login"  class="btn btn-primary btn-block">
                    </form>
                   <!-- <?php echo form_close(); ?> -->
                    
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    function validateForm() {
  var account_user = document.forms["myForm"]["account_user"].value;
  var pass = document.forms["myForm"]["pass"].value;
  if (account_user == "") {
    alert("กรุณากรอกชื่อผู้ใช้งาน");
    return false;
  }
  if (pass == "") {
    alert("กรุณากรอกรหัสผ่าน");
    return false;
  }
}
</script>


    
</body>
</html>
   