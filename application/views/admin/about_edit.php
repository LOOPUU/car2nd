
<div class="pt-3 pb-2 mb-3 border-bottom">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-8 mb-2">
        <h4 class="h4">จัดการเกี่ยวกับเรา</h4>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
       
      </div>
    </div>
  </div>
  
  <!-- Content -->
  
  <?php foreach ( $data as $result ) {    ?>
  
  <form
    action="<?php echo base_url('admin_management/about_edit/1');?>"
    method="post"
  >
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="wrap-box">
          <!-- Title -->
          <div class="title">
            รายละเอียด
          </div>
          <!-- Form Input -->
          <div class="form-input">
            <ul class="nav nav-tabs" id="TabLanguage" role="tablist">
                <li class="nav-item">
                    <a
                    class="nav-link active"
                    data-toggle="tab"
                    href="#thTab"
                    role="tab"
                    aria-controls="th-Tab"
                    aria-selected="true"
                    >ภาษาไทย</a
                    >
                </li>
                <li class="nav-item">
                    <a
                    class="nav-link"
                    data-toggle="tab"
                    href="#enTab"
                    role="tab"
                    aria-controls="en-Tab"
                    aria-selected="false"
                    >ภาษาอังกฤษ
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="Language">
                <!-- Thai -->
                <div
                    class="tab-pane fade show active"
                    id="thTab"
                    role="tabpanel"
                    aria-labelledby="th-Tab"
                >
                    <div class="pt-3">
                        <div class="form-group">
                            <h6 class="h6"><b>- รายละเอียด (แสดงหน้าแรก) -</b></h6>
                            <label>คำอธิบาย&nbsp;<span style="color:#DC3545;">*</span></label>
                            <div id="editor">
                            <textarea
                                style="height:150px;"
                                id="showtinymce3"
                                name="descript_th"
                                class="form-control"
                            ><?php if(set_value("descript_th")){echo set_value("descript_th");}else{echo $result->descript_th;}?></textarea>
                            <?php echo form_error('descript_th', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <h6 class="h6"><b>- รายละเอียด (แสดงหน้า เกี่ยวกับเรา) -</b></h6>
                            <label>คำอธิบาย&nbsp;<span style="color:#DC3545;">*</span></label>
                            <div id="editor">
                            <textarea
                                name="descript_th_about"
                                style="height:150px;"
                                id="showtinymce"
                                name="descript_th_about"
                                class="form-control"
                            ><?php if(set_value("descript_th_about")){echo set_value("descript_th_about");}else{echo $result->descript_th_about;}?></textarea>
                            <?php echo form_error('descript_th_about', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- English -->
                <div
                    class="tab-pane fade"
                    id="enTab"
                    role="tabpanel"
                    aria-labelledby="en-Tab"
                >
                <div class="pt-3">
                    <div class="form-group">
                        <h6 class="h6"><b>- รายละเอียด (แสดงหน้าแรก) -</b></h6>
                        <label>คำอธิบาย&nbsp;<span style="color:#DC3545;">*</span></label>
                        <div id="editor">
                        <textarea
                            style="height:150px;"
                            id="showtinymce4"
                            name="descript_en"
                            class="form-control"
                        >
                    <?php if(set_value("descript_en")){echo set_value("descript_en");}else{echo $result->descript_en;}?></textarea
                        >
                        <?php echo form_error('descript_en', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 class="h6"><b>- รายละเอียด (แสดงหน้า เกี่ยวกับเรา) -</b></h6>
                        <label>คำอธิบาย&nbsp;<span style="color:#DC3545;">*</span></label>
                        <div id="editor">
                        <textarea
                            style="height:150px;"
                            id="showtinymce1"
                            name="descript_en_about"
                            class="form-control"
                        >
                    <?php if(set_value("descript_en_about")){echo set_value("descript_en_about");}else{echo $result->descript_en_about;}?></textarea
                        >
                        <?php echo form_error('descript_en_about', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer pb-3">
            <div class="row ghhMCK d-flex justify-content-center">
                <div class="col-sm-6 col-md-6 col-lg-6 mt-1 mb-1">
                    <input type="submit" name="submit" class="btn btn-primary btn-block text-white" value="บันทึกข้อมูล">
                </div>
            </div>
        </div>
    </div>
</form>
<?php }?>




</div>        
</main>
</div>
</div>


<script src="<?php echo base_url('backend/plugins/tinymce/tinymce.min.js');?>"></script>
<script type="text/javascript">
  tinymce.init({
    selector:
      "#showtinymce,#showtinymce1,#showtinymce2,#showtinymce3,#showtinymce4,#showtinymce5,#showtinymce6",

    plugins: [
      "advlist autolink lists link image charmap print preview anchor",
      "searchreplace visualblocks code fullscreen",
      "insertdatetime media table contextmenu paste"
    ],
    toolbar:
      "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent "
    // | link image
  });
</script>