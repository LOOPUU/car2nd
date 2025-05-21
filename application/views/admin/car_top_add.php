<?php
        if (!empty($this->input->post('name_type'))) {
            $category = $this->input->post("name_type");
        }
        if (!empty($this->input->post("name"))) {
            $family = $this->input->post("name");
        }
        if (!empty($this->input->post("name_model"))) {
            $item = $this->input->post("name_model");
        }
        if (!empty($this->input->post("name_year_pro"))) {
            $year = $this->input->post("name_year_pro");
        }
        if (!empty($this->input->post("name_model_des"))) {
            $item2 = $this->input->post("name_model_des");
        }
    ?>
   
<style>
        select {
            width: 300px;
            height: 25px;
            border: 1px solid #eee;
        }
    </style>
<div class="pt-3 pb-2 mb-3 border-bottom">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
            <h4 class="h4">เพิ่มข้อมูลรถ</h4>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3 mb-2"></div>
        <div class="col-sm-12 col-md-12 col-lg-3 mb-2">
            <a href="<?php echo base_url('admin_management/car_top_list');?>" class="btn btn-secondary btn-block">
                กลับไปหน้ารายการข้อมูลรถ
            </a> 
        </div> 
    </div>
</div>
<form action="<?php echo base_url('admin_management/car_top_add?type='.$this->input->get('type').'&&car_type_id='.$this->input->get('car_type_id').'&&brand='.$this->input->get('brand').'&&car_id='.$this->input->get('car_id').'&&model='.$this->input->get('model').'&&car_model_id='.$this->input->get('car_model_id').'&&model_des='.$this->input->get('model_des').'&&car_model_des_id='.$this->input->get('car_model_des_id').'');?>" method="post">

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="wrap-box">
                <div class="title">
                    <h6 class="h6">รายละเอียด</h6>
                </div>
                <div class="form-input">
                        <div class="form-group">
                            <label>ประเภทรถ&nbsp;<span style="color:#DC3545;">*</span></label>
                            <select name="name_type" class="form-control" id="category" data-child="family" onchange="changeOption(event)">
                                <option value="">== เลือกประเภทรถ ==</option>
                                <?php  foreach($result_type as $row){?>
                                <option value="<?php echo $row->car_type_id;?>" <?php if(set_value('name_type')==$row->car_type_id){echo "selected";}?>>
                                    <?php echo $row->name_type_th;?>
                                </option>
                                <?php }?>
                            </select>     
                            <?php echo form_error('name_type', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?> 
                        </div>
 
                        <div class="form-group">
                            <label>ยี่ห้อรถ&nbsp;<span style="color:#DC3545;">*</span></label>
                            <select name="name" class="form-control" id="family" data-child="item" onchange="changeOption(event)">
                                <option data-group='SHOW' value=''>== เลือกยี่ห้อ ==</option>
                                <?php  foreach($result as $row){?>
                                <option data-group="<?php echo $row->car_type_id;?>"  value="<?php echo $row->car_id;?>" <?php if(set_value('name')==$row->car_id){echo "selected";}?>>
                                    <?php echo $row->name_th;?>
                                </option>
                              <?php }?>
                            </select>
                            <?php echo form_error('name', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?> 
                        </div>

                        <div class="form-group">
                            <label>รุ่นรถ&nbsp;<span style="color:#DC3545;">*</span></label>
                            <select name="name_model" class="form-control" id="item" data-child="item2" onchange="changeOption(event)">
                                <option data-group='SHOW' value=''>== เลือกรุ่น ==</option>
                                <?php  foreach($result_model as $row){?>
                                <option data-group="<?php echo $row->car_id;?>"  value="<?php echo $row->car_model_id;?>" <?php if(set_value('name_model')==$row->car_model_id){echo "selected";}?>>
                                    <?php echo $row->name_model_th;?>
                                </option>
                              <?php }?>
                            </select>
                            <?php echo form_error('name_model', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>

                        <div class="form-group">
                            <label>ปีที่ผลิต</label>
                            <select name="name_year_pro" id="year"  data-child="item2"  onchange="changeOption(event)" class="form-control">
                                <option data-group='SHOW' value=''>== เลือกปีที่ผลิต ==</option>
                                <?php  foreach($car_year_pro_text as $row){?>
                                <option data-group="<?php echo $row->car_model_id;?>"  value="<?php echo $row->name_year_pro;?>" <?php if(set_value('name_year_pro')==$row->name_year_pro){echo "selected";}?>>
                                    <?php echo $row->name_year_pro;?>
                                </option>
                              <?php }?>
                            </select>
                            <?php echo form_error('name_year_pro', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div> 
                        <div class="form-group">
                            <label>รายละเอียดรุ่น</label>
                            <select name="name_model_des" class="form-control" id="item2" onchange="changeOption(event)">
                                <option data-group='SHOW' value=''>== เลือกรายละเอียดรุ่น ==</option>
                                <?php  foreach($result_model_des as $row){?>
                                <option data-group="<?php echo $row->name_year_pro;?>"  value="<?php echo $row->car_model_des_id;?>" <?php if(set_value('name_model_des')==$row->car_model_des_id){echo "selected";}?>>
                                    <?php echo $row->name_model_des_th;?>
                                </option>
                              <?php }?>
                            </select>
                            <?php echo form_error('name_model_des', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>

                        <div class="form-group">
                            <label>ระบบเกียร์</label>
                            <select name="name_gear"  class="form-control">
                                <option value="">== เลือกเกียร์ ==</option>
                                <?php  foreach($result_gear as $row){?>
                               <option value="<?php echo $row->name_gear_th; ?>" <?php if(set_value('name_gear')==$row->name_gear_th){echo "selected";}?>>
                                    <?php echo $row->name_gear_th;?> 
                                </option>
                            <?php }?>
                           </select>
                            <?php echo form_error('name_gear', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>ความจุเครื่องยนต์</label>
                            <select name="name_capacity"  class="form-control">
                                <option value="">== เลือกความจุเครื่องยนต์ ==</option>
                                <?php  foreach($result_capacity as $row){?>
                                <option value="<?php echo $row->name_capacity_th; ?>" <?php if(set_value('name_capacity')==$row->name_capacity_th){echo "selected";}?>>
                                    <?php echo $row->name_capacity_th;?>
                                </option>
                            <?php }?>
                           </select>
                            <?php echo form_error('name_capacity', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>เลขไมล์</label>
                            <input name="name_mile" type="number" class="form-control" value="<?php echo set_value('name_mile');?>">
                            <?php echo form_error('name_mile', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>จังหวัด&nbsp;<span style="color:#DC3545;">*</span></label>
                            <select name="province"  class="form-control">
                                <option value="">== เลือกจังหวัด ==</option>
                                <?php  foreach($province as $row){?>
                                <option value="<?php echo $row->PROVINCE_NAME;?>" <?php if(set_value('province')==$row->PROVINCE_NAME){echo "selected";}?>>
                                    <?php echo $row->PROVINCE_NAME;?>
                                </option>
                                <?php }?>
                           </select>
                            <?php echo form_error('province', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>อุปกรณ์</label><hr>
                            <div class="row">
                                <?php foreach($device as $row){?>
                                    <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
                                        <label class="checkbox-inline">
                                            <span><input type="checkbox" name="device[]" value="<?php echo $row->device_name_th;?>"> <?php echo $row->device_name_th;?></span>
                                        </label>
                                    </div>
                                <?php }?>
                            </div>
                            <?php echo form_error('device[]', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>ราคา (บาท)&nbsp;<span style="color:#DC3545;">*</span></label>
                            <input name="name_price" type="number" class="form-control" value="<?php echo set_value('name_price');?>">
                            <?php echo form_error('name_price', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                       <div class="form-group">
                            <label>สี&nbsp;<span style="color:#DC3545;">*</span></label>
                            <select name="name_color" class="form-control">
                                <option value="">== เลือกสี ==</option>
                                <?php  foreach($result_color as $row){?>
                                <option value="<?php echo $row->name_color_th; ?>" <?php if(set_value('name_color')==$row->name_color_th){echo "selected";}?>>
                                    <?php echo $row->name_color_th;?>
                                </option>
                                <?php }?>
                           </select>
                            <?php echo form_error('name_color', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div> 
                        <div class="form-group">
                            <label>ข้อความผู้ประกาศขาย</label>
                            <textarea name="descript" class="form-control"><?php echo set_value('descript');?></textarea>
                            <?php echo form_error('descript', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                         <div class="form-group">
                            <label>สถานะ&nbsp;<span style="color:#DC3545;">*</span></label>
                            <select class="custom-select mr-sm-2" name="status_id">
                                <option value="" <?php if(set_value('status_id')==""){echo "selected";}?>>==== เลือกสถานะการใช้งาน ====</option>
                                <option value="1" <?php if(set_value('status_id')=="1"){echo "selected";}?>>เปิดการขาย</option> 
                                <option value="3" <?php if(set_value('status_id')=="3"){echo "selected";}?>>แสดงรถแนะนำ</option>
                                <option value="4" <?php if(set_value('status_id')=="4"){echo "selected";}?>>ปิดการขาย</option>
                                <option value="2" <?php if(set_value('status_id')=="2"){echo "selected";}?>>ยกเลิกการขาย</option>
                            </select>
                            <?php echo form_error('status_id', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
                        </div>
                        <div class="footer pb-3">
                            <div class="row ghhMCK d-flex justify-content-center">
                               
                                <div class="col-sm-6 col-md-6 col-lg-6 mt-1 mb-1">
                                    <input type="submit" name="submit" class="btn btn-primary btn-block text-white" value="บันทึกข้อมูล">
                                </div>
                            </div>
                        </div>
                </div>

            </div>    
        </div>
    </div>
</form>

               
    <script>
        let listCate = [
        <?php  foreach($result_type as $row){?>
          
            {
                id: <?php echo $row->car_type_id;?>,
                name: <?php echo '"'.$row->name_type_th.'"';?>
            },
         
        <?php } ?>
        ];

        let listFamily = [
        <?php  foreach($result as $row){?>
            {
                id: <?php echo $row->car_id;?>,
                name: <?php echo '"'.$row->name_th.'"';?>,
                group: <?php echo $row->car_type_id;?>
            }, 
        <?php }?>
        ];

        let listItem = [
        <?php  foreach($result_model as $row){?>
            {
                id: <?php echo $row->car_model_id;?>,
                name: <?php echo '"'.$row->name_model_th.'"';?>,
                group: <?php echo $row->car_id;?>
            },
        <?php }?>
            
        ];

        let listYear = [
        <?php  foreach($car_year_pro_text as $row){?>
            {
                id: <?php echo $row->name_year_pro;?>,
                name: <?php echo '"'.$row->name_year_pro.'"';?>,
                group: <?php echo $row->car_model_id;?>           
            },
        <?php }?>    
        ];

        let listItem2 = [
        <?php  foreach($result_model_des as $row){?>
            {
                id: <?php echo $row->car_model_des_id;?>,
                name: <?php echo '"'.$row->name_model_des_th.'"';?>,
                group: <?php echo $row->car_model_id;?>,
                group2: <?php echo $row->name_year_pro;?>
            },                                                
        <?php }?>        
        ];

        function changeOption(event) {
            let target = event.target.id;
            let targerEle = document.getElementById(target);
            if(target == 'category' && targerEle.value != '') {
                selectOption('family', targerEle.value, 'group');
                selectOption('item', 'none', 'group');
                selectOption('year', 'none', 'group');
                selectOption('item2', 'none', 'group');
            } else if(target == 'category' && targerEle.value == '') {
                selectOption('family', 'all', 'group');
                selectOption('item', 'all', 'group');
                selectOption('year', 'all', 'group');
                selectOption('item2', 'all', 'group');
            } else if(target == 'family') {
                selectOption('item', targerEle.value, 'group');
                selectOption('year', 'none', 'group');
                selectOption('item2', 'none', 'group');
            } else if(target == 'item') {
                selectOption2('year', targerEle.value, 'group');
                selectOption('item2', 'none', 'group');
            } else if(target == 'year') {
                doubleOption('item2', 'item', 'year', 'group', '1');
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
                case "year":
                    dataTarget = listYear;
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
                    defaultTarget = 'กรุณาเลือกประเภท';
                    selectTarget = document.getElementById('category');
                    dataTarget = listCate;
                    break;
                case "family":
                    defaultTarget = 'กรุณาเลือกยี่ห้อ';
                    selectTarget = document.getElementById('family');
                    dataTarget = listFamily;
                    break;
                case "item":
                    defaultTarget = 'กรุณาเลือกรุ่น';
                    selectTarget = document.getElementById('item');
                    dataTarget = listItem;
                    break;
                case "year":
                    defaultTarget = 'กรุณาเลือกปี';
                    selectTarget = document.getElementById('year');
                    dataTarget = listYear;
                    break;
                case "item2":
                    defaultTarget = 'กรุณาเลือกรายละเอียดรุ่น';
                    selectTarget = document.getElementById('item2');
                    dataTarget = listItem2;
                    break;
            }
            selectTarget.options.length = 0;
            selectTarget.options[selectTarget.options.length] = new Option(defaultTarget, '');
            for (var i = 0; i < dataTarget.length; i++) {
                if(pointer == 'group' && dataTarget[i].group == position || position == 'all') {
                    selectTarget.options[selectTarget.options.length] = new Option(dataTarget[i].name, dataTarget[i].id);  
                } else if(pointer == 'id' && dataTarget[i].id == position || position == 'all') {
                    selectTarget.options[selectTarget.options.length] = new Option(dataTarget[i].name, dataTarget[i].id);  
                }
            }
        }

        function selectOption2(target, position, pointer) {
            switch (target) {
                case "category":
                    defaultTarget = 'กรุณาเลือกประเภท';
                    selectTarget = document.getElementById('category');
                    dataTarget = listCate;
                    break;
                case "family":
                    defaultTarget = 'กรุณาเลือกยี่ห้อ';
                    selectTarget = document.getElementById('family');
                    dataTarget = listFamily;
                    break;
                case "item":
                    defaultTarget = 'กรุณาเลือกรุ่น';
                    selectTarget = document.getElementById('item');
                    dataTarget = listItem;
                    break;
                case "year":
                    defaultTarget = 'กรุณาเลือกปี';
                    selectTarget = document.getElementById('year');
                    dataTarget = listYear;
                    break;
                case "item2":
                    defaultTarget = 'กรุณาเลือกรายละเอียดรุ่น';
                    selectTarget = document.getElementById('item2');
                    dataTarget = listItem2;
                    break;
            }
            selectTarget.options.length = 0;
            selectTarget.options[selectTarget.options.length] = new Option(defaultTarget, '');
            var dataRaw = [];
            var dataConv = [];
            for (var i = 0; i < dataTarget.length; i++) {
                if(pointer == 'group' && dataTarget[i].group == position || position == 'all') {
                    dataRaw.push(dataTarget[i].name);
                } else if(pointer == 'id' && dataTarget[i].id == position || position == 'all') {
                    dataRaw.push(dataTarget[i].name);
                }    
            }
            var dataConv = array_unique(dataRaw);
            for (var i = 0; i < dataConv.length; i++) {
                selectTarget.options[selectTarget.options.length] = new Option(dataConv[i], dataConv[i]);
            }
        }

        function array_unique(inputArr) {
            var key = ''
            var tmpArr2 = [];
            var val = ''
            var _arraySearch = function (needle, haystack) {
                var fkey = ''
                for (fkey in haystack) {
                    if (haystack.hasOwnProperty(fkey)) {
                        if ((haystack[fkey] + '') === (needle + '')) {
                            return fkey;
                        }
                    }
                }
                return false
            }
            for (key in inputArr) {
                if (inputArr.hasOwnProperty(key)) {
                    val = inputArr[key]
                    if (_arraySearch(val, tmpArr2) === false) {
                        key2 = tmpArr2.length;
                        tmpArr2[key2] = val;
                    }
                }
            }
            return tmpArr2
        }

        function getSelected(selTar) {
            let tarGet = document.getElementById(selTar);
            for ( var i = 0; i < tarGet.options.length; i++ ) {
                optSel = tarGet.options[i];
                if ( optSel.selected === true ) {
                    return optSel = tarGet.options[i].value;
                }
            }
        }

        function doubleOption(target, position, position2, pointer, choice) {
            if(choice == '1') {
                var value = document.getElementById(position).value;
                var value2 = document.getElementById(position2).value;
            } else if(choice == '2') {
                var value = getSelected(position);
                var value2 = getSelected(position2);
            }
            switch (target) {
                case "category":
                    defaultTarget = 'กรุณาเลือกประเภท';
                    selectTarget = document.getElementById('category');
                    dataTarget = listCate;
                    break;
                case "family":
                    defaultTarget = 'กรุณาเลือกยี่ห้อ';
                    selectTarget = document.getElementById('family');
                    dataTarget = listFamily;
                    break;
                case "item":
                    defaultTarget = 'กรุณาเลือกรุ่น';
                    selectTarget = document.getElementById('item');
                    dataTarget = listItem;
                    break;
                case "year":
                    defaultTarget = 'กรุณาเลือกปี';
                    selectTarget = document.getElementById('year');
                    dataTarget = listYear;
                    break;
                case "item2":
                    defaultTarget = 'กรุณาเลือกรายละเอียดรุ่น';
                    selectTarget = document.getElementById('item2');
                    dataTarget = listItem2;
                    break;
            }
            selectTarget.options.length = 0;
            selectTarget.options[selectTarget.options.length] = new Option(defaultTarget, '');
            for (var i = 0; i < dataTarget.length; i++) {
                if(pointer == 'group' && dataTarget[i].group == value && dataTarget[i].group2 == value2  || position == 'all') {
                    selectTarget.options[selectTarget.options.length] = new Option(dataTarget[i].name, dataTarget[i].id);  
                } else if(pointer == 'id' && dataTarget[i].id == value && dataTarget[i].group2 == value2 || position == 'all') {
                    selectTarget.options[selectTarget.options.length] = new Option(dataTarget[i].name, dataTarget[i].id);  
                }
            }
        }

        function searchIndex(target, value, func) {
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
                case "year":
                    dataTarget = listYear;
                    break;
                case "item2":
                    dataTarget = listItem2;
                    break;
            }
            if(func == '1') {
                for (var i = 0; i < dataTarget.length; i++) {
                    if(dataTarget[i].id == value) {
                        return i + 1;
                    }
                }
            } else if(func == '2') {
                var dataRaw = [];
                var dataConv = [];
                for (var i = 0; i < dataTarget.length; i++) {
                    dataRaw.push(dataTarget[i].name);
                }
                var dataConv = array_unique(dataRaw);   
                for (var i = 0; i < dataConv.length; i++) {
                    if(dataConv[i] == value) {
                        return i + 1;
                    }
                }
            } else if(func == '3') {
                var selOpt = document.getElementById(target);
                for (var i = 0; i < selOpt.options.length; i++) {
                    if (selOpt.options[i].value == value) {
                        return i;
                    }
                }
            }
        }

        function selectList(target, value, func) {
            document.getElementById(target).selectedIndex = searchIndex(target, value ,func);
        }

        function loadOption(target, func) {
            switch (target) {
                case "category":
                    pevEle = '';
                    break;
                case "family":
                    pevEle = 'category';
                    break;
                case "item":
                    pevEle = 'family';
                    break;
                case "year":
                    pevEle = 'item';
                    break;
                case "item2":
                    pevEle = 'year';
                    break;
            }
            if(func == '1') {
                selectOption(target, document.getElementById(pevEle).value, 'group');
            } else if(func == '2') {
                selectOption2(target, document.getElementById(pevEle).value, 'group');
            } else {
                selectOption(target, document.getElementById(pevEle).value, 'group');
            }
        }

        function defaultBox() {
            selectOption('category', 'all', 'group');
            <?php if (isset($category) && $category != '') { ?>
                selectList('category', '<?php echo $category; ?>', '1');
                selectOption('family', '<?php echo $category; ?>', 'group');
                selectOption('item', 'none', 'group');
                selectOption('year', 'none', 'group');
                selectOption('item2', 'none', 'group');
            <?php } ?>

            <?php if (isset($family) && $family != '0') { ?>
                // selectOption('family', 'all', 'group');
                selectList('family', '<?php echo $family; ?>', '3');
                selectOption('item', '<?php echo $family; ?>', 'group');
                selectOption('year', 'none', 'group');
                selectOption('item2', 'none', 'group');
            <?php } else if(isset($category) && $category != '') { ?>
                // loadOption('family', '1');
                selectOption('family', '<?php echo $category; ?>', 'group');
            <?php } else { ?>
                selectOption('family', 'none', 'group');
            <?php } ?>

            <?php if (isset($item) && $item != '0') { ?>
                // selectOption('item', 'all', 'group');
                selectList('item', '<?php echo $item; ?>', '3');
                selectOption2('year', '<?php echo $item; ?>', 'group');
                selectOption('item2', 'none', 'group');
            <?php } else if(isset($family) && $family != '') { ?>
                // loadOption('item', '1');
                selectOption('item', '<?php echo $family; ?>', 'group');
            <?php } else { ?>
                selectOption('item', 'none', 'group');
            <?php } ?> 

            <?php if (isset($year) && $year != '') { ?>
                // selectOption2('year', 'all', 'group');
                selectList('year', '<?php echo $year; ?>', '3');
                doubleOption('item2', 'item', 'year', 'group', '2');
            <?php } else if(isset($item) && $item != '') { ?>
                // loadOption('year', '2');
                selectOption2('year', '<?php echo $item; ?>', 'group');
            <?php } else { ?>
                selectOption2('year', 'none', 'group');
            <?php } ?>

            <?php if (isset($item2) && $item2 != '') { ?>
                // selectOption('item2', 'all', 'group');
                selectList('item2', '<?php echo $item2; ?>', '3');
            <?php } else if(isset($year) && $year != '') { ?>
                // loadOption('item2', '1');
                doubleOption('item2', 'item', 'year', 'group', '2');
            <?php } else { ?>
                selectOption('item2', 'none', 'group');
            <?php } ?>
        };

        $(window).on('load', function() {
            defaultBox();
        });
        
    </script>


