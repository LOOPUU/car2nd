<style type="text/css">
    .form-inline {
    display: -ms-flexbox;
     display: inline; 
    -ms-flex-flow: row wrap;
    flex-flow: row wrap;
    -ms-flex-align: center;
    align-items: center;
}
</style>
<!-- Modal -->
<div class="modal fade" id="modalDel" tabindex="-1" role="dialog" aria-labelledby="modalDel">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" id="modal_content_del">

      </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>backend/js/function.js"></script>        
</main>
    </div>
</div>

<iframe name="k_frame_admin" id="k_frame_admin" style="display:none;"></iframe>

<script type="text/javascript">

    $(document).ready(function() {
        setTimeout(function(){
            $('#load').hide();
        }, 600);
    });

    function close_popUp(name) {
        $('#'+name).modal('hide');
    }

    function reloader(name) {
        $('#load').show();
        $('#submit_'+name).click();
    }

    function reloader_hide() {
        setTimeout(function(){
            $('#load').hide();
        }, 600);
    }
</script>


<!--/////////////////////////////////////////////text editor//////////////////////////////////////////////////////////////////-->



  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/codemirror.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/xml.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/froala_editor.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/image.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/file.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/video.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/table.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/url.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/quick_insert.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/save.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/fullscreen.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('backend/wysiwyg-editor-master');?>/js/plugins/quote.min.js"></script>


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


<!--  <?php echo $link;?>
<?php echo "<br>";?>
<?php echo $url;?> 
<?php echo "<br>";?>
<?php echo $link_admin;?>
<?php echo "<br>";?>
<?php echo  $this->uri->segment(1);?>  -->


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



jQuery(document).ready(function($)
 {

  if (window.history && window.history.replaceState) {
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

 <script type="text/javascript">
    $(function(){
      $('#edit').froalaEditor({

        theme: 'gray',

        
        linkStyles: {
          class1: 'Class 1',
          class2: 'Class 2'
        }
       
      })

    });

     $(function(){
      $('#edit1').froalaEditor({

        theme: 'gray',
        linkStyles: {
          class1: 'Class 1',
          class2: 'Class 2'
        }
      })
    });


  </script> 



</body>
</html>

