 <!-- Section Banner -->

    <section class="banner">
      <div
        class="carousel carousel-animated carousel-animate-slide"
        <?php if($count_banner=="TRUE"){?>
        	data-autoplay="false"
        	data-interval="1200"
        <?php }?>
      >
        <div class="carousel-container">
       <?php foreach($banner as $row){?>  
          <div class="carousel-item has-background is-active">
            <img
              class="is-background"
              src="<?php echo base_url().'uploads/'.$row->img;?>"
              alt=""
              width="640"
              height="310"
            />
          </div>
        <?php }?> 
      <?php foreach($banner_all as $row){?>  
          <div class="carousel-item has-background">
            <img
              class="is-background"
              src="<?php echo base_url().'uploads/'.$row->img;?>"
              alt=""
              width="640"
              height="310"
            />
          </div>
        <?php }?>
        </div>
        <div class="carousel-navigation is-overlay">
          <div class="carousel-nav-left"><i class="fas fa-angle-left"></i></div>
          <div class="carousel-nav-right">
            <i class="fas fa-angle-right"></i>
          </div>
        </div>
      </div>
    </section>
<hr>
<div>
	<?php echo $content['title_th'];?>
	<?php echo $content['description_th'];?>
</div>
<hr>