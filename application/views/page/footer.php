    <!-- Footer -->
    <footer class="app-footer section">
      <div class="container">
        <div class="columns is-multiline">
          <div
            class="column is-12"
          >
            <div class="columns" style="padding-top: 20px;padding-bottom: 0px;">
              <div class="column is-4">
                <div class="menu">
                  <p class="menu-label">POSTSICAR</p>
                  <ul class="menu-list">
                    
                    <li>
                      <a href="<?php echo base_url('contact');?>"
                        ><i class="bx bx-question-mark"></i
                        >&nbsp;<?php echo $this->lang->line("ques");?></a>
                    </li>
                    <li>
                      <a href="tel:<?php echo $contact['tel'];?>"
                        ><i class="bx bxs-phone"></i>&nbsp;<?php echo $contact['tel'];?></a
                      >
                    </li>
                    <li>
                      <a href="mailto:<?php echo $contact['email'];?>"
                        ><i class="bx bxs-envelope"></i
                        >&nbsp;<?php echo $contact['email'];?></a
                      >
                    </li>
                  </ul>
                </div>
              </div>
              <div class="column is-4">
                <div class="menu">
                  <p class="menu-label"><?php echo $this->lang->line("service_1");?></p>
                  <ul class="menu-list">
                    <?php foreach($menu_footer2 as $row){?>
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
                      <li><a href="<?php echo base_url('').$hyperLink;?>"><?php if($this->lang->line("set_lang")=="th"){echo $row->name_th;}else{echo $row->name_en;}?></a></li>
                    <?php }?>
                  </ul>
                </div>
              </div>
              <div class="column is-4 is-hidden-mobile">
                <div class="menu">
                  <ul class="menu-list">
                    <li>
                      <?php $page = $this->uri->segment(1);?>
                      <?php 
                        if($page == "" OR $page == "home"){$p = "home";}elseif ($page == "about") {$p = "about";
                        }elseif ($page == "buy"){$p = "buy";}elseif ($page == "sale"){$p = "sale";
                        }elseif ($page == "finance"){$p = "finance";}elseif ($page == "news"){$p = "news";
                        }elseif ($page == "contact"){$p = "contact";}elseif ($page == "member"){$p = "member";
                        }elseif ($page == "register"){$p = "register";}elseif ($page == "department"){$p = "department";}
                      ?>
                      <?php if($this->lang->line("set_lang")=="th") { ?>
                        <a href="<?php echo base_url(''.$p.'').'/change/english';?>"
                        ><i class="bx bx-world"></i>&nbsp;English&nbsp;<!-- <i
                          class="bx bx-caret-down"
                        ></i
                      > --></a>
                      <?php } else { ?>
                        <a href="<?php echo base_url(''.$p.'').'/change/thailand';?>"
                        ><i class="bx bx-world"></i>&nbsp;ภาษาไทย&nbsp;<!-- <i
                          class="bx bx-caret-down"
                        ></i
                      > --></a>
                      <?php } ?>
                    </li>
                    
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="column is-12">
            <hr />
            <div class="columns">
              <div class="column is-9">
                <p>
                  &copy; 2018 POSTSICAR.COM
                  <a href="#" class="has-text-white"><?php echo $this->lang->line("text_foot1");?></a
                  >&nbsp;<a href="#" class="has-text-white"
                    ><?php echo $this->lang->line("text_foot2");?></a
                  >
                </p>
              </div>
              <div class="column is-3">
                <div class="has-text-centered">
                  <?php if($contact_twitter['twitter']!==""){?>
                  <span class="icon is-large">
                    <a href="<?php echo $contact_twitter['twitter'];?>" target="_blank" aria-label="Twitter"
                      ><i
                        class="bx bxl-twitter bx-sm"
                        style="color: #FFFFFF;"
                      ></i
                    ></a>
                  </span>
                  <?php }?>
                  <?php if($contact_facebook['facebook']!==""){?>
                  <span class="icon is-large">
                    <a href="<?php echo $contact_facebook['facebook'];?>" target="_blank" aria-label="Facebook"
                      ><i
                        class="bx bxl-facebook bx-sm"
                        style="color: #FFFFFF;"
                      ></i
                    ></a>
                  </span>
                  <?php }?>
                  <?php if($contact_instragram['instragram']!==""){?>
                  <span class="icon is-large">
                    <a href="<?php echo $contact_instragram['instragram'];?>" target="_blank" aria-label="Instagram"
                      ><i
                        class="bx bxl-instagram bx-sm"
                        style="color: #FFFFFF;"
                      ></i
                    ></a>
                  </span>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Render Javascript -->
    <script src="<?php echo base_url('frontend');?>/assets/vendors/jquery.min.js"></script>
    <script src="<?php echo base_url('frontend');?>/assets/js/jquery-ui.min.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url('frontend');?>/assets/js/slick.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('frontend');?>/assets/js/carousel.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('frontend');?>/assets/js/scrollreveal.js"></script>
    <script type="text/javascript" src="<?php echo base_url('frontend');?>/assets/js/sticky-kit.js"></script>
    <script type="text/javascript" src="<?php echo base_url('frontend');?>/assets/js/slide.js"></script>
    <script type="text/javascript" src="<?php echo base_url('frontend');?>/assets/js/bulma-tagsinput.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('frontend');?>/assets/js/global.js"></script>
    <script type="text/javascript" src="<?php echo base_url('frontend');?>/assets/js/jquery-3.0.0.min.js"></script>
    <script type="text/javascript">
      var carousels = bulmaCarousel.attach();
      var tags = bulmaTagsinput.attach();
    </script>
  </body>
</html>

<!-- JAVASCRIPTS -->


<script type="text/javascript">
   $(window).on('load', function () {
          $.HSCore.components.HSHeader.init($('#js-header-secondary'));
  });
</script>



 <script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
    
        $(function () {
            var url = window.location.pathname;  
            var activePage = url.substring(url.lastIndexOf('/')+1);
            $('#ul-nav a').each(function () {
                var currentPage = this.href.substring(this.href.lastIndexOf('/')+1);
                if (activePage == currentPage) {
                    $(this).addClass('active');
                }
            });
    
        });

       

////////////////////click upload file step3 //////////////////////////////////////
        $("#pic1").click(function() {
            $("input[id='file1']").click();
        });
         $("#pic2").click(function() {
            $("input[id='file2']").click();
        });
         $("#pic3").click(function() {
            $("input[id='file3']").click();
        });
         $("#pic4").click(function() {
            $("input[id='file4']").click();
        });
         $("#pic_all").click(function() {
            $("input[id='file_all']").click();
        });

////////////////////click upload file step4 //////////////////////////////////////
         $("#text1").click(function() {
            $("input[id='my_file']").click();
        });

        $("#text2").click(function() {
            $("input[id='my_file1']").click();
        });

    
    });
</script> 


<script type="text/javascript">

    function close_popUp(name) {
        $('#'+name).modal('hide');
    }
    
    function reloader(name) {
        $('#load').show();
        $('#submit_'+name).click();
    }

</script>

</body>
</html>
