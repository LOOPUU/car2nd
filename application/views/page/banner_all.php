  <!-- Carousel -->
    <section class="slide-banner">
      <div
        class="carousel carousel-animated carousel-animate-slide"
        data-autoplay="<?php if($banner_count['count_id']==1){echo "";}else{echo "false";}?>"
        data-interval="1200"
      >

        <div class="carousel-container">
          <?php foreach($banner as $row){?>
          <div class="carousel-item has-background is-active">
            <img
              class="is-background"
              src="<?php echo base_url().'uploads/'.$row->thumb_name_multi;?>"
              alt=""
              width="640"
              height="310"
            />
          </div>
          <?php } ?>
         
        </div>
        <div class="carousel-navigation is-overlay">
          <div class="carousel-nav-left"><i class="bx bx-arrow-back"></i></div>
          <div class="carousel-nav-right">
            <i class="bx bx-arrow-back bx-flip-horizontal"></i>
          </div>
        </div>
      </div>
    </section>