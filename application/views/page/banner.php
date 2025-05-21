<script type='text/javascript'>

(function()
{
  if( window.localStorage )
  {
    if( !localStorage.getItem('firstLoad') )
    {
      localStorage['firstLoad'] = true;
      window.location.reload();
    }  
    else
      localStorage.removeItem('firstLoad');
  }
})();

</script>

<!-- Carousel -->
<section class="slide-banner overlay-layer">
    <div class="carousel carousel-animated carousel-animate-slide carousel-postsicars" data-autoplay="<?php if($banner_count['count_id']==1){echo "";}else{echo "false";}?>" data-interval="1200">
        <div class="carousel-container">
         
            <?php foreach ($banner as $row) { ?>
            <div class="carousel-item has-background is-active">
                <img class="is-background" src="<?php echo base_url() . 'uploads/' . $row->thumb_name_multi; ?>" alt="" width="640" height="310" />
            </div>
            <?php 
          } ?>
        </div>
        <div class="carousel-navigation is-overlay">
            <div class="carousel-nav-left"><i class="bx bx-arrow-back"></i></div>
            <div class="carousel-nav-right">
                <i class="bx bx-arrow-back bx-flip-horizontal"></i>
            </div>
        </div>
    </div>
    <div class="banner-box overlay-item is-hidden-mobile">
    <nav class="tabs is-boxed is-fullwidth">
        <div class="container">
          <ul>
            <li class="tab is-active" onclick="openTab(event,'buy')"><a ><?php echo $this->lang->line("sale");?></a></li>
            <li class="tab" onclick="openTab(event,'rent')"><a ><?php echo $this->lang->line("buy");?></a></li>
          </ul>
          <div id="buy" class="content-tab">
            <div class="banner-content">
              <div class="columns is-multiline">
                <div class="column is-12">
                  <h6 class="title is-6 has-text-weight-normal has-text-centered"><?php echo $this->lang->line("sale3");?></h6>
                </div>
                <div class="column is-12">
                  <div class="columns">
                    <div class="column is-2">
                      <div class="has-text-centered">
                        <h4 class="title is-4 has-text-orange">1</h4>
                      </div>
                    </div>
                    <div class="column is-7">
                      <div class="has-text-left">
                        <h6 class="title is-6 has-text-dark"><?php echo $this->lang->line("register");?></h6>
                      </div>
                    </div>
                    <div class="column is-3">
                      <div class="has-text-centered">
                        <i class="bx bxs-user-badge bx-sm"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="column is-12">
                  <div class="columns">
                    <div class="column is-2">
                      <div class="has-text-centered">
                        <h4 class="title is-4 has-text-orange">2</h4>
                      </div>
                    </div>
                    <div class="column is-7">
                      <div class="has-text-left">
                        <h6 class="title is-6 has-text-dark"><?php echo $this->lang->line("descript");?></h6>
                      </div>
                    </div>
                    <div class="column is-3">
                      <div class="has-text-centered">
                        <i class="bx bxs-map bx-sm"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="column is-12">
                  <div class="columns">
                    <div class="column is-2">
                      <div class="has-text-centered">
                        <h4 class="title is-4 has-text-orange">3</h4>
                      </div>
                    </div>
                    <div class="column is-7">
                      <div class="has-text-left">
                        <h6 class="title is-6 has-text-dark"><?php echo $this->lang->line("startsale");?></h6>
                      </div>
                    </div>
                    <div class="column is-3">
                      <div class="has-text-centered">
                        <i class="bx bxs-car bx-sm"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="column is-12">
                  <div class="field">
                    <div class="control">
                      <button class="button is-orange is-fullwidth" onclick="window.location.href='<?php echo base_url('sale');?>'" ><?php echo $this->lang->line("startsale");?></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div id="rent" class="content-tab" style="display:none">
            <div class="banner-content">
              <div class="columns">
                <div class="column is-12">
                  <form style="width: 100%;" action="<?php echo base_url('buy?type='.$this->input->get('type').'&&car_type_id='.$this->input->get('car_type_id').'&&brand='.$this->input->get('brand').'&&car_id='.$this->input->get('car_id').'&&model='.$this->input->get('model').'&&car_model_id='.$this->input->get('car_model_id').'&&model_des='.$this->input->get('model_des').'&&car_model_des_id='.$this->input->get('car_model_des_id').'&&page='.'1'.'&&offset='.'0'.'');?>" method="post">
                    <div class="field">
                      <div class="control">
                        <div class="select is-fullwidth">
                              <select  name="name_type"  id="category" data-child="family"  onchange="changeOption(event)">
                                <option value="0">
                                    <?php echo $this->lang->line("search_type");?>
                                </option>
                                <?php  foreach($result_type as $row){?>
                                  <?php if($this->lang->line("set_lang")=="th"){?>
                                    <option value="<?php echo $row->car_type_id;?>">
                                        <?php echo $row->name_type_th;?>
                                    </option>
                                  <?php }else{?>
                                    <option value="<?php echo $row->car_type_id;?>">
                                              <?php echo $row->name_type_en;?>
                                    </option>
                                  <?php }?>
                                <?php }?>
                              </select>
                        </div>
                      </div>
                    </div>
                    <div class="field">
                      <div class="control">
                        <div class="select is-fullwidth">
                              <select name="name"  id="family" data-child="item"  onchange="changeOption(event)">
                                  <option data-group='SHOW' value="0"><?php echo $this->lang->line("search_brand");?></option>
                                <?php  foreach($result as $row){?>

                                  <?php if($this->lang->line("set_lang")=="th"){?>
                            
                                  <option data-group="<?php echo $row->car_type_id;?>" value="<?php echo $row->car_id;?>">
                                            <?php echo $row->name_th;?>
                                  </option>

                                  <?php }else{?>

                                  <option data-group="<?php echo $row->car_type_id;?>" value="<?php echo $row->car_id;?>">
                                            <?php echo $row->name_en;?>
                                  </option>
                                            
                                  <?php }?>

                                <?php }?>
                              </select>
                        </div>
                      </div>
                    </div>
                    <div class="field">
                      <div class="control">
                        <div class="select is-fullwidth">
                              <select  name="name_model"  id="item" data-child="item2"  onchange="changeOption(event)">
                                <option data-group='SHOW' value="0"><?php echo $this->lang->line("search_model");?></option>
                                <?php  foreach($result_model as $row){?>

                                  <?php if($this->lang->line("set_lang")=="th"){?>
                          
                                    <option data-group="<?php echo $row->car_id;?>" value="<?php echo $row->car_model_id;?>">
                                              <?php echo $row->name_model_th;?>
                                    </option>

                                  <?php }else{?>

                                    <option data-group="<?php echo $row->car_id;?>" value="<?php echo $row->car_model_id;?>">
                                              <?php echo $row->name_model_en;?>
                                    </option>
                                              
                                  <?php }?>

                                <?php }?>
                              </select> 
                        </div>
                      </div>
                    </div>
                    <div class="field">
                      <div class="control">
                        <div class="select is-fullwidth">
                              <select name="price" class="form-control" >
                                <option value=""><?php echo $this->lang->line("search_price");?></option>
                                <?php  foreach($result_price as $row){?>

                                <?php if($this->lang->line("set_lang")=="th"){?>
                                    <option value="<?php echo $row->name_price_min; ?>-<?php echo $row->name_price_max; ?>"><?php echo number_format($row->name_price_min);?> บาท ถึง <?php echo number_format($row->name_price_max);?> บาท</option>
                                <?php }else{?>
                                    <option value="<?php echo $row->name_price_min; ?>-<?php echo $row->name_price_max; ?>"><?php echo number_format($row->name_price_min);?> Baht to <?php echo number_format($row->name_price_max);?> Baht</option>
                                <?php }?>
                                <?php }?>
                              </select>
                        </div>
                      </div>
                    </div>
                    <div class="field">
                      <div class="control">
                        <button class="button is-orange is-fullwidth"><?php echo $this->lang->line("search");?></button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
</section> 

    <script> 
        let listCate = [
        <?php  foreach($result_type as $row){?>
          <?php if($this->lang->line("set_lang")=="th"){?>
            {
                id: <?php echo $row->car_type_id;?>,
                name: <?php echo '"'.$row->name_type_th.'"';?>
            },
          <?php }else{?>
            {
                id: <?php echo $row->car_type_id;?>,
                name: <?php echo '"'.$row->name_type_en.'"';?>
            },
          <?php } ?>
        <?php } ?>
        ];

        let listFamily = [
        <?php  foreach($result as $row){?>
          <?php if($this->lang->line("set_lang")=="th"){?>
            {
                id: <?php echo $row->car_id;?>,
                name: <?php echo '"'.$row->name_th.'"';?>,
                group: <?php echo $row->car_type_id;?>
            },
          <?php }else{?>
            {
                id: <?php echo $row->car_id;?>,
                name: <?php echo '"'.$row->name_en.'"';?>,
                group: <?php echo $row->car_type_id;?>
            },
          <?php } ?>
        <?php } ?>
        ];

        let listItem = [
        <?php  foreach($result_model as $row){?>
          <?php if($this->lang->line("set_lang")=="th"){?>
            {
                id: <?php echo $row->car_model_id;?>,
                name: <?php echo '"'.$row->name_model_th.'"';?>,
                group: <?php echo $row->car_id;?>
            },
          <?php }else{?>
            {
                id: <?php echo $row->car_model_id;?>,
                name: <?php echo '"'.$row->name_model_en.'"';?>,
                group: <?php echo $row->car_id;?>
            },
          <?php } ?>
        <?php } ?> 
        ];

        let listItem2 = [
        <?php  foreach($result_model_des as $row){?>
          <?php if($this->lang->line("set_lang")=="th"){?>
            {
                id: <?php echo $row->car_model_des_id;?>,
                name: <?php echo '"'.$row->name_model_des_th.'"';?>,
                group: <?php echo $row->car_model_id;?>
            }, 
          <?php }else{?> 
            {
                id: <?php echo $row->car_model_des_id;?>,
                name: <?php echo '"'.$row->name_model_des_en.'"';?>,
                group: <?php echo $row->car_model_id;?>
            }, 
          <?php } ?>                                              
        <?php } ?>   
        ];

        function changeOption(event) {
            let target = event.target.id;
            let selectCate = document.getElementById('category'),
                selectFamily = document.getElementById('family'),
                selectItem = document.getElementById('item'),
                selectItem2 = document.getElementById('item2');
            let jsonCate = listCate,
                jsonFamily = listFamily,
                jsonItem = listItem,
                jsonItem2 = listItem2;
            let targerEle = document.getElementById(target);
            if(target == 'category' && targerEle.value != '0') {
                selectOption('family', targerEle.value, 'group');
                selectOption('item', 'none', 'group');
                selectOption('item2', 'none', 'group');
            } else if(target == 'category' && targerEle.value == '0') {
                selectOption('family', 'all', 'group');
                selectOption('item', 'all', 'group');
                selectOption('item2', 'all', 'group');
            } else if(target == 'family') {
                selectOption('item', targerEle.value, 'group');
                selectOption('item2', 'none', 'group');
            } else if(target == 'item') {
                selectOption('item2', targerEle.value, 'group');
            }
        }
        
        function searchGroup(target, position) {
            switch (target) {
                case "category":
                    dataTarget = listCate;
                    break;
                case "family":
                    dataTarget = listFamily;
                    break;
                case "item":
                    dataTarget = listItem;
                    break;
                case "item2":
                    dataTarget = listItem2;
                    break;
            }
            for (var i = 0; i < dataTarget.length; i++) {
                if(dataTarget[i].id == position) {
                    return dataTarget[i].group;
                }
            }
        }

        function selectOption(target, position, pointer) {
            switch (target) {
                case "category":
                    defaultTarget = <?php echo "'".$this->lang->line("search_type")."'";?>;
                    selectTarget = document.getElementById('category');
                    dataTarget = listCate;
                    break;
                case "family":
                    defaultTarget = <?php echo "'".$this->lang->line("search_brand")."'";?>;
                    selectTarget = document.getElementById('family');
                    dataTarget = listFamily;
                    break;
                case "item":
                    defaultTarget = <?php echo "'".$this->lang->line("search_model")."'";?>;
                    selectTarget = document.getElementById('item');
                    dataTarget = listItem;
                    break;
                case "item2":
                    defaultTarget = <?php echo "'".$this->lang->line("search_model_des")."'";?>;
                    selectTarget = document.getElementById('item2');
                    dataTarget = listItem2;
                    break;
            }
            selectTarget.options.length = 0;
            selectTarget.options[selectTarget.options.length] = new Option(defaultTarget, '0');
            for (var i = 0; i < dataTarget.length; i++) {
                if(pointer == 'group' && dataTarget[i].group == position || position == 'all') {
                    selectTarget.options[selectTarget.options.length] = new Option(dataTarget[i].name, dataTarget[i].id);  
                } else if(pointer == 'id' && dataTarget[i].id == position || position == 'all') {
                    selectTarget.options[selectTarget.options.length] = new Option(dataTarget[i].name, dataTarget[i].id);  
                }
            }
        }

        function defaultBox() {
            selectOption('category', 'all', 'group');
            selectOption('family', 'all', 'group');
            selectOption('item', 'all', 'group');
            selectOption('item2', 'all', 'group');
        };

        $(window).on('load', function() {
            defaultBox();
        });
        
    </script>
